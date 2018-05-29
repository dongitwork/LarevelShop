jQuery(document).ready(function($) {

/*	check del all
*/
$('.container1 .select-all').click(function() {
	$('.container1 .checkbox').prop('checked', true);
	return false;
});

$('.container1 .dis-select').click(function() {
	$('.container1 .checkbox').prop('checked', false);
	return false;
});

/* Check required form */
if ($('.required').length > 0) {
    $('.required').prop('required',true);
    //$('.required').attr('required','required');
}
$("form").validate();


$('.container1 .btn-apply').click(function() {
	var url = $(this).attr('data-url');
	var listid = [];
	$('.container1 .checkbox').each(function(index, el) {
		if ($(this).is(':checked') == true) {
			listid.push($(this).val());
		}
	});

	if(listid.length > 0){
		var listids = listid.toString();
		$(this).attr('href',url+'/'+listids); 
	}else{
		alert('Vui lòng chọn mục để xóa');
		return false;
	}
});

// get product detail
$('.form-category').change(function(event) {
    var id = 0;
	id  = $(this).val();
	$.ajax({url: "/admin/product/list-detail/"+id, success: function(result){
        $('.list-product-option').html(result);
    }});
});

$('.checkpromotion').change(function(event) {
    var type = $(this).attr('types');
    var wp = '';
    if (type == 'gift') {
        wp = '.gift_wp';
    }else{
        wp = '.discount_wp';
    }
    if ($(this).is(':checked') == true) {
        $.ajax({url: "/admin/product/has-promotion/"+type, success: function(result){
            $(wp).html(result);
            $(wp).slideDown('slow');
        }});
    }else{
        $(wp).slideUp('slow');
        $(wp).html('');
    }
});

$('.ProductCheck').change(function(event) {
    var id = $(this).val();
    if (id != '') {
         $.ajax({url: "/admin/product/check-product/"+id, success: function(result){
            if (result != '') {
                $('.ProductCheck').css('border', 'solid 1px #ff0000');
                $('.ProductErro').html(result);
            }else{
                $('.ProductCheck').css('border', 'none');
                $('.ProductErro').html('');
            }
        }});
     }else{
        $('.ProductCheck').css('border', 'none');
        $('.ProductErro').html('');
     }
   
});


/* previews images before Upload */

$('.Image').change(function(event) {
	if (typeof(FileReader)!="undefined"){
         var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png)$/;
         $($(this)[0].files).each(function () {
             var getfile = $(this);
             if (regex.test(getfile[0].name.toLowerCase())) {
                 var reader = new FileReader();
                 reader.onload = function (e) {
                 	$('.AttachImage').html('<img width="100" src="'+e.target.result+'" />');
                 	$('.AttachImage').show();
                    // $("#img").attr("src",e.target.result);
                 }
                 reader.readAsDataURL(getfile[0]);
             } else {
                 alert(getfile[0].name + " is not image file.");
                 return false;
             }
         });
     }
     else {
         alert("Browser does not supportFileReader.");
     }
});

$( document ).ajaxComplete(function( event,request, settings ) {
  $('.Image').change(function(event) {
        if (typeof(FileReader)!="undefined"){

             var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.PNG)$/;
             $($(this)[0].files).each(function () {
                 var getfile = $(this);
                 if (regex.test(getfile[0].name.toLowerCase())) {
                     var reader = new FileReader();
                     reader.onload = function (e) {
                        $('.AttachImage').html('<img width="100" src="'+e.target.result+'" />');
                        $('.AttachImage').show();
                        // $("#img").attr("src",e.target.result);
                     }
                     reader.readAsDataURL(getfile[0]);
                 } else {
                     alert(getfile[0].name + " is not image file.");
                     return false;
                 }
             });
         }
         else {
             alert("Browser does not supportFileReader.");
         }
    });
    if ($('.required').length > 0) {
        $('.required').prop('required',true);
    }
    $("form").validate();
});

$('a.colobox-ajax').colorbox({width:"600px"});

});
