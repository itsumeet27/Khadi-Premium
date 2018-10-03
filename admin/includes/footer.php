
<script type="text/javascript">
	function get_child_options(){
		var parentID = jQuery('#parent').val();
		jQuery.ajax({
			url: '/khadi/admin/parsers/child_categories.php',
			type: 'POST',
			data: {parentID : parentID},
			success: function(data){
				jQuery('#child').html(data);
			},
			error: function(){
				alert("Something went wrong!");
			},
		});
	}
	jQuery('select[name="parent"]').change(get_child_options);
</script>

	</body>
</html>