function load_all_staff(currentPage){
	//var ajaxurl = '/wp-admin/admin-ajax.php';

	//data
	var postData = {
		page: currentPage,
		search: jQuery('#key-word').val(),
		department: jQuery('#dept').val()
	};

	jQuery.ajax({
		type: "post",
		url: staffAjax.ajaxurl,
		data:{
			action: "load_staff",
			data: postData
		},
		beforeSend: function() {
			jQuery('.staff-lists').empty();
			jQuery("#loaderDiv").show();
		},
		success: function(result) {
			jQuery('.staff-lists').html(result);
			jQuery("#loaderDiv").hide();
			jQuery('.staff-lists .staff').each(function(i) {		
				jQuery(this).fadeOut(0).delay(300*i).fadeIn(500);
			});
		}
	});
}
jQuery(function() {

	//ini run
	load_all_staff(1);

	//get next page number
	jQuery('.staff-lists').on("click", "div.staff-pagination a.nextButton", function(){
		jQuery("html, body").animate({ scrollTop: 0 }, 500);
		load_all_staff(jQuery(this).data('page'));
	});
	
	//get prev page number
	jQuery('.staff-lists').on("click", "div.staff-pagination a.prevButton", function(){
		jQuery("html, body").animate({ scrollTop: 0 }, 500);
		load_all_staff(jQuery(this).data('page'));
	});
	
	//when search word do ajax call
	jQuery("#key-word").keyup(function (e) {
		load_all_staff(1);
	});
	
	//when do filter do ajax call
	jQuery("#dept").change(function () {
		load_all_staff(1);
	});

});
