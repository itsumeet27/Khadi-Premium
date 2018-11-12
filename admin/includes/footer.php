<!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="https://www.facebook.com/khadipremium" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>

            <a href="https://instagram.com/khadipremium" target="_blank">
                <i class="fa fa-instagram mr-3"></i>
            </a>

            <a href="https://www.youtube.com/" target="_blank">
                <i class="fa fa-youtube mr-3"></i>
            </a>
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="https://localhost/khadi/index.php" target="_blank"> Khadi Premium Cosmetics </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>

    <script type="text/javascript" src="../js/datatables.js"></script>

    <script type="text/javascript" src="../js/datatables.min.js"></script>
    <script type="text/javascript">
		function get_child_options(selected){
			if(typeof selected === 'undefined'){
				var selected = '';
			}
			var parentID = jQuery('#parent').val();
			jQuery.ajax({
				url: '/khadi/admin/parsers/child_categories.php',
				type: 'POST',
				data: {parentID : parentID, selected : selected},
				success: function(data){
					jQuery('#child').html(data);
				},
				error: function(){
					alert("Something went wrong!");
				},
			});
		}
		jQuery('select[name="parent"]').change(function(){
			get_child_options();
		});
	</script>
    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
    <script>
        // Regular map
        function regular_map() {
            var var_location = new google.maps.LatLng(40.725118, -73.997699);

            var var_mapoptions = {
                center: var_location,
                zoom: 14
            };

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                var_mapoptions);

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title: "New York"
            });
        }

        // Initialize maps
        google.maps.event.addDomListener(window, 'load', regular_map);
    </script>

</body>

</html>

	</body>
</html>