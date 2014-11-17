(function($) {

	/* Parts and Services Left Tabs */
	$("ul.nav-sidebar li").on("click", function() {
		$("ul.nav-sidebar li").not(this).removeClass("active");
		$(this).addClass("active");
		var target = "#" + $(this).data("target");
		$(".col-sm-9").not(target).addClass("hidden");
		$(target).removeClass("hidden");
	});

	/* Parts and Services Report Images */
	$(".placeholders .img-responsive").on("click", function() {
		$(".placeholders .img-responsive").not(this).removeClass("active");
		$(this).addClass("active");
		var target = "#" + $(this).data("target");
		$(".table-responsive.reports").not(target).addClass("hidden");
		$(target).removeClass("hidden");
	});

	/* Parts Menu Buttons */

}(jQuery));