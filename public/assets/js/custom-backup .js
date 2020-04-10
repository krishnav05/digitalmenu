// add items to kitchen
$('.add-item-btn').on('click',function(event){
    event.preventDefault();
    $(this).next('div').children('input').val(function(i, oldval) {
    return ++oldval;
    });
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: '/kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id:this.id, action:'create'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $("#kitchen_total").html(data.msg); 
                    }
                }); 
    $(this).hide("fast");
    $(this).next("div").show("fast");
});

$('.firstadd').on('click',function(event){
    var temp = '#form'+this.id;
    const arr = $(temp).serializeArray(); // get the array
  const data = arr.reduce((acc, {name, value}) => ({...acc, [name]: value}),{}); // form the object
  console.log(data);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: '/kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id:this.id, action:'addon',totaldata: data},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $("#kitchen_total").html(data.msg); 
                    }
                });
    $('#n'+this.id).modal('hide');
});

$('.plus').on('click',function(event) {
	event.preventDefault();
    $(this).prev('input').val(function(i, oldval) {
    return ++oldval;
	});
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
                    /* the route pointing to the post function */
                    url: '/kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id:this.id, action:'add'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $("#kitchen_total").html(data.msg); 
                    }
                }); 
});

$('.minus').on('click',function(event) {
    $(this).next('input').val(function(i, oldval) {
    return --oldval;
	});
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
                    /* the route pointing to the post function */
                    url: '/kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id:this.id, action:'minus'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $("#kitchen_total").html(data.msg); 
                    }
                }); 
	if ($(this).next('input').val() == 0) {
		$(this).parent().prev().show('fast');
		$(this).closest('.input-group').hide('fast');
	}
});

// sort non veg dish
$('#non_veg_only').on('click',function(){
	event.preventDefault();
	$('.pure-veg-1').hide();
	$('.veg').hide();
	$('.nonveg').show();
});

// show veg dish only
$('#veg_only').on('click',function(){
	event.preventDefault();
	$('.pure-veg-1').show();
	$('.veg').show();
	$('.nonveg').hide();
});

// show all dishes
$('#all_veg_nveg').on('click',function(){
	event.preventDefault();
	$('.pure-veg-1').show();
	$('.veg').show();
	$('.nonveg').show();
});

// change theme to dark
$('#theme-color-dark').click(function () {
    $('head').append('<link rel="stylesheet" href="assets/css/menu-dark-style.css" type="text/css" id="menu-dark" />');
});
 
// change theme to light
$('#theme-color-light').click(function () {
    $('head').find('link#menu-dark').remove();
});

// accessibility slider
$("#text-range").on("input",function () {
            $('.change-txt-size').css("font-size", $(this).val() + "px");
    });

$('a.helpmakeactive').click(function(){
	$('a.helpmakeactive').removeClass('active');
	$(this).addClass('active');
});


// new pages regarding table and restraunt cover
var slider = document.getElementById("table-range");
var output = document.getElementById("table-select-value");
output.innerHTML = slider.value;
slider.oninput = function(){
	output.innerHTML = this.value;
}

slider.onchange = function() {
	element = '#'+this.value;
	$(element).trigger("click");
}

// modal pass dining table value
$('#exampleModal').on('show.bs.modal',function(e){
	var tableId = $(e.relatedTarget).data('table-id');
    var tableStatus = $(e.relatedTarget).data('table-status');
	$(e.currentTarget).find('input[name="tableId"]').val(tableId);
    $(e.currentTarget).find('input[name="status"]').val(tableStatus);
});

// billing
