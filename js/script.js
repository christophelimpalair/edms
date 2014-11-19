(function($) {

/**
 * Navigation
 */

// Parts and Services Left Tabs
$("ul.nav-sidebar li").on("click", function() {
	$("ul.nav-sidebar li").not(this).removeClass("active");
	$(this).addClass("active");
	var target = "#" + $(this).data("target");
	$(".col-sm-9").not(target).addClass("hidden");
	$(target).removeClass("hidden");
});

// Parts and Services Report Images
$(".placeholders .img-responsive").on("click", function() {
	$(".placeholders .img-responsive").not(this).removeClass("active");
	$(this).addClass("active");
	var target = "#" + $(this).data("target");
	$(".table-responsive.reports").not(target).addClass("hidden");
	$(target).removeClass("hidden");
});

// Parts Menu Buttons
$("button.menu").on("click", function() {
	$("button.menu").not(this).removeClass("active");
	$(this).addClass("active");
	var target = "#" + $(this).data("target");
	$("section").not(target).addClass("hidden");
	$(target).removeClass("hidden");
});

/**
 * # End Navigation
 */

//------------------------------------------------------

/**
 * Ajax Calls
 */

// TODO: DRY -- Use functions

/* Order Parts */
$("#order_parts_btn").on("click", function(e) {
  e.preventDefault();
  var button = $(this);
  var error = button.next("p");
  var name = $(".form_parts_order .part_name").val();
  var part_num = $(".form_parts_order .part_number").val();
  var order_amt = $(".form_parts_order .order_amount").val();
  var inventory_cost = $(".form_parts_order .inventory_cost").val();
  var retail_cost = $(".form_parts_order .retail_cost").val();
  if ( name.length != 0 && part_num.length !=0 && order_amt.length !=0 && inventory_cost.length != 0 && retail_cost.length !=0 )
  {
	$.ajax({
		type: "POST",
		url: "/edms/services/ajax/order_parts.php",
		data: { partname: name , partnum: part_num , amount: order_amt , inventory_cost: inventory_cost , retail_cost: retail_cost },
		async: false,
		success: function(result) {
			if (result.success === "false") {
				console.log("Error with ajax call: " + result.message);
				button.addClass("btn-danger");
				error.html(result.message);
				error.addClass("btn-danger");
				error.removeClass("hidden");
			} else {
				console.log("Successful ajax call: " + result.message);
				button.removeClass("btn-danger");
				button.addClass("btn-success");
				error.html("Successfully ordered!");
				error.addClass("btn-sucess");
				error.removeClass("hidden btn-danger");
			}
		},
		error: function() {
			// get better error handling
			error.html("Error with ajax call");
			error.addClass("btn-danger");
			button.addClass("btn-danger");
		},
		timeout: 10000
	});
  } else {
  	error.html("All fields are required!");
  	error.addClass("btn-danger");
  	button.addClass("btn-danger");
  	error.removeClass("hidden");
  }
});

// Schedule Service
$("#schedule_service_btn").on("click", function(e) {
  e.preventDefault();
  var button = $(this);
  var error = button.next("p");
  var advisor = $(".form_schedule_service .schedule_service_advisor_id").val();
  var tech = $(".form_schedule_service .schedule_service_tech_id").val();
  var reason = $(".form_schedule_service .schedule_service_reason").val();
  var vin = $(".form_schedule_service .schedule_service_vin").val();
  if ( advisor.length != 0 && tech.length !=0 && reason.length !=0 && vin.length != 0 )
  {
	$.ajax({
		type: "POST",
		url: "/edms/services/ajax/schedule_service.php",
		data: { advisor: advisor , tech: tech , reason: reason , vin: vin},
		async: false,
		success: function(result) {
			if (result.success === "false") {
				button.addClass("btn-danger");
				error.html(result.message);
				error.addClass("btn-danger");
				error.removeClass("hidden");
			} else {
				button.removeClass("btn-danger");
				button.addClass("btn-success");
				error.html(result.message);
				error.addClass("btn-sucess");
				error.removeClass("hidden btn-danger");
			}
		},
		error: function() {
			// get better error handling
			error.html("Error with ajax call");
			error.addClass("btn-danger");
			error.removeClass("hidden");
			button.addClass("btn-danger");
		},
		timeout: 10000
	});
  } else {
  	error.html("All fields are required!");
  	error.addClass("btn-danger");
  	button.addClass("btn-danger");
  	error.removeClass("hidden");
  }
});

// Schedule Service
$("#search_parts_btn").on("click", function(e) {
  e.preventDefault();
  var button = $(this);
  var error = button.next("p");
  var param = $(".select_part option:selected").val();
  console.log(param);
  if ( param.length != 0 )
  {
	$.ajax({
		type: "POST",
		url: "/edms/services/ajax/search_parts.php",
		data: { value: param },
		async: false,
		success: function(result) {
			if (result.success === "false") {
				button.addClass("btn-danger");
				error.html(result.message);
				error.addClass("btn-danger");
				error.removeClass("hidden");
			} else {
				button.removeClass("btn-danger");
				button.addClass("btn-success");
				error.html(result.parts.part_name);
				error.addClass("btn-sucess");
				error.removeClass("hidden btn-danger");
			}
		},
		error: function() {
			// get better error handling
			error.html("Error with ajax call");
			error.addClass("btn-danger");
			error.removeClass("hidden");
			button.addClass("btn-danger");
		},
		timeout: 10000
	});
  } else {
  	error.html("All fields are required!");
  	error.addClass("btn-danger");
  	button.addClass("btn-danger");
  	error.removeClass("hidden");
  }
});

/**
 * # End Ajax Calls
 */

}(jQuery));