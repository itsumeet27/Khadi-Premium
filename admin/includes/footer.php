<!--Footer-->
<footer class="page-footer unique-color-dark wow fadeIn">
    <div class="blue-grey">
      <div class="container">
        <!--Grid row-->
        <div class="row py-3 d-flex align-items-center">
          <!--Grid column-->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
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

<!-- Copyright -->
<div class="footer-copyright text-center py-3">&copy; 2018 Copyright:
  <a href="https://www.khadipremium.in"> Khadi Premium Cosmetics</a> developed and maintained by <a href="https://www.lukaenterprises.com">Luka Enterprises</a>
</div>
<!-- Copyright -->

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