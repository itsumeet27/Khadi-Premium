<!-- Footer -->
  <footer class="page-footer unique-color-dark" style="font-family: Roboto;font-weight: 400;">

    <!-- Social buttons -->
    <div class="blue-grey">
      <div class="container">
        <!--Grid row-->
        <div class="row py-3 d-flex align-items-center">
          <!--Grid column-->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0 white-text" style="font-weight: 400">Get connected with us on social networks!</h6>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-lg-7 text-center text-md-right">
            <!--Facebook-->
            <a class="fb-ic" href="https://instagram.com/khadipremium">
              <i class="fa fa-facebook white-text mr-3"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic" href="https://instagram.com/khadipremium">
              <i class="fa fa-instagram white-text mr-3"> </i>
            </a>
            <!-- Youtube -->
            <a href="https://www.youtube.com/" target="_blank">
                <i class="fa fa-youtube white-text mr-3"></i>
            </a>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
      </div>
    </div>
    <!-- Social buttons -->

    <!-- Footer Links -->
    <div class="container mt-5 mb-4 text-center text-md-left">
      <div class="row mt-3">

        <!--First column-->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Who We Are</strong>
          </h6>
          <hr class="blue-grey accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="about.php">About Us</a>
          </p>
          <p>
            <a href="blog.php">Blog</a>
          </p>
          <p>
            <a href="index.php#contact">Contact Us</a>
          </p>
          <p>
            <a href="products.php">All Products</a>
          </p>
        </div>
        <!--/.First column-->

        <!--Second column-->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Categories</strong>
          </h6>
          <hr class="blue-grey accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="skin-care.php">Skin Care</a>
          </p>
          <p>
            <a href="hair-care.php">Hair Care</a>
          </p>
          <p>
            <a href="body-care.php">Body Care</a>
          </p>
          <p>
            <a href="bath-and-beauty.php">Bath and Beauty</a>
          </p>
        </div>
        <!--/.Second column-->

        <!--Third column-->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Useful links</strong>
          </h6>
          <hr class="blue-grey accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="terms-and-conditions.php">Terms and Conditions</a>
          </p>
          <p>
            <a href="privacy-policy.php">Privacy Policy</a>
          </p>
          <p>
            <a href="delivery-and-returns.php">Delivery and Returns</a>
          </p>
          <p>
            <a href="faq.php">FAQ</a>
          </p>
        </div>
        <!--/.Third column-->

        <!--Fourth column-->
        <div class="col-md-4 col-lg-3 col-xl-3">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Contact</strong>
          </h6>
          <hr class="blue-grey accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p style="text-align: justify;">
            <i class="fa fa-home mr-3"></i> Adarsh Nagar, Off Link Road, Jogeshwari (W), Mumbai - 400102, India
          </p>
          <p>
            <i class="fa fa-envelope mr-3"></i> info@khadipremium.in
          </p>
          <p>
            <i class="fa fa-phone mr-3"></i> + 91 9619531115
          </p>
                
                </div>
                <!--/.Fourth column-->

              </div>
            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="font-family: Poppins">&copy; 2018 Copyright:
              <a href="https://www.khadipremium.in"> Khadi Premium Cosmetics</a> developed and maintained by <a href="https://www.lukaenterprises.com">Luka Enterprises</a>
            </div>
            <!-- Copyright -->

          </footer>
          <!-- Footer -->
  <!-- SCRIPTS -->
          <!-- JQuery -->
          <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
          <!-- Bootstrap tooltips -->
          <script type="text/javascript" src="js/popper.min.js"></script>
          <!-- Bootstrap core JavaScript -->
          <script type="text/javascript" src="js/bootstrap.min.js"></script>
          <!-- MDB core JavaScript -->
          <script type="text/javascript" src="js/mdb.min.js"></script>

          <script type="text/javascript" src="js/mdb.min.js"></script>

          <script type="text/javascript">
            function initMap(){
              var location = {lat: 19.147030,lng: 72.828730};
              var map = new google.maps.Map(document.getElementById("map-container"),{
                zoom: 8,
                center: location
              });
              var marker = new google.maps.Marker({
                position: location,
                map: map
              });
            }
          </script>

          <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3LOQAS97y1ctCLRMVl6NjMlcG6pLC_8o&callback=initMap">
</script>

          <script type="text/javascript">
            function detailsmodal(id){
              var data = {"id" : id};
              jQuery.ajax({
                url : 'includes/modal.php',
                method : "post",
                data : data,
                success: function(data){
                  jQuery('body').append(data);
                  jQuery('#details-modal').modal('toggle');
                },
                error: function(){
                  alert("Something went wrong!");
                }
              })
            }

            function add_to_cart(){
              jQuery('#modal-errors').html("");
              var quantity = jQuery('#quantity').val();
              var available = jQuery('#available').val();
              var error = '';
              var data = jQuery('#add_product_form').serialize();
              if(quantity == '' || quantity == 0){
                error += '<p class="text-danger text-center">You must choose a quantity</p>';
                jQuery('#modal_errors').html(error);
                return;
              }else if(quantity > 10){
                error += '<p class="text-danger text-center">Sorry, there are only '+available+' avaialable.</p>';
                jQuery('#modal_errors').html(error);
                return;
              }else{
                jQuery.ajax({
                  url : '/khadi/admin/parsers/add_cart.php',
                  method : 'post',
                  data : data,
                  success : function(){
                    location.reload();
                  },
                  error : function(){
                    alert('Something went wrong');
                  }
                });
              }
            }
          </script>
          <script type="text/javascript">
            function detailsmodal(id){
              var data = {"id" : id};
              jQuery.ajax({
                url : '/khadi/includes/modal.php',
                method : "post",
                data : data,
                success: function(data){
                  jQuery('body').append(data);
                  jQuery('#details-modal').modal('toggle');
                },
                error: function(){
                  alert("Something went wrong!");
                }
              })
            }

            function update_cart(mode,edit_id){
              var data = {"mode" : mode, "edit_id" : edit_id};
              jQuery.ajax({
                url : '/khadi/admin/parsers/update_cart.php',
                method : "post",
                data : data,
                success : function(){
                  location.reload();
                },
                error : function(){
                  alert("Something went wrong");
                },
              });
            }
          
          </script> 
          <script>
            $('.carousel').carousel({
              interval: 3000,
            })
          </script>
</body>

</html>
