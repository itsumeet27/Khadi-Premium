
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

	</body>
</html>