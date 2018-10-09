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
</body>
</html>