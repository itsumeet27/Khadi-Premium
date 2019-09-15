<?php
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/includes/functions.php';
	$product_id = sanitize($_POST['product_id']);
	$quantity = sanitize($_POST['quantity']);
	$item = array();
	$item[] = array(
		'id' => $product_id,
		'quantity' => $quantity,

	);

	$domain = ($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false;
	$query = $db->query("SELECT * FROM products WHERE id = '{$product_id}'");
	$product = mysqli_fetch_assoc($query);
	// $_SESSION['success_flash'] = $product['title']. ' was added to your cart.';

	//Check to see if the cart cookie exists
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
        $sql = "SELECT * FROM customers WHERE email = '$email'";
        $result = $db->query($sql); 
        $row_cus = mysqli_fetch_array($result);
        $cus_id = $row_cus['id'];
        $cus_name = $row_cus['fullname'];

        if($cart_id != ''){
			$ip = getIp();
			$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
			$cart = mysqli_fetch_assoc($cartQ);
			$previous_items = array();
			$previous_items = json_decode($cart['items'],true);
			$item_match = 0;
			$new_items = array();
			foreach ((array)$previous_items as $pitem) {
				if($item[0]['id'] == $pitem['id']){
					$pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'];
					if($pitem['quantity'] > 10){
						$pitem['quantity'] = 10;
					}

					$item_match = 1;
				}

				$new_items[] = $pitem;
			}
			if($item_match != 1){
				$new_items = array_merge($item,$previous_items);
			}
			$items_json = json_encode($new_items);
			$cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
			$db->query("UPDATE cart SET items = '{$items_json}' WHERE id = '{$cart_id}' AND cid = '$cus_id'");
			setcookie(CART_COOKIE,'',1,"/",$domain,false);
			setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);

		}else{
			$ip = getIp();
			//add the cart to the database and set cookie
			$items_json = json_encode($item);
			$cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
			$db->query("INSERT INTO cart (items,ip_add,cid) VALUES ('{$items_json}','$ip','$cus_id')");
			$cart_id = $db->insert_id;
			setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
		}
	}


	if($cart_id != ''){
		$ip = getIp();
		$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
		$cart = mysqli_fetch_assoc($cartQ);
		$previous_items = array();
		$previous_items = json_decode($cart['items'],true);
		$item_match = 0;
		$new_items = array();
		foreach ((array)$previous_items as $pitem) {
			if($item[0]['id'] == $pitem['id']){
				$pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'];
				if($pitem['quantity'] > 10){
					$pitem['quantity'] = 10;
				}

				$item_match = 1;
			}

			$new_items[] = $pitem;
		}
		if($item_match != 1){
			$new_items = array_merge($item,$previous_items);
		}
		$items_json = json_encode($new_items);
		$cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
		$db->query("UPDATE cart SET items = '{$items_json}', ip_add = '{$ip}' WHERE id = '{$cart_id}'");
		setcookie(CART_COOKIE,'',1,"/",$domain,false);
		setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);

	}else{
		$ip = getIp();
		//add the cart to the database and set cookie
		$items_json = json_encode($item);
		$cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
		$db->query("INSERT INTO cart (items,ip_add) VALUES ('{$items_json}','$ip')");
		$cart_id = $db->insert_id;
		setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
	}

?>