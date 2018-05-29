jQuery(document).ready(function($) {
	$('span.hic').click(function(event) {
		if ($(this).hasClass('quick_open')) {
			$(this).removeClass('quick_open');
			$(this).parents('.hello').find('.quick').slideUp('fast');
		}else{
			$(this).addClass('quick_open');
			$(this).parents('.hello').find('.quick').slideDown('fast');
		}
	});
	/*$('.user-form .btn.btn-warning').click(function(event) {
		var data = $('.hoten').html();
		$('.user-form').html(data);
		return false;
	});

	$('.hoten').change(function(event) {
		var hoten = $(this).val();
		$('.user-form').append(hoten);
	});*/

	$('.sortby').change(function(event) {
		var nsx = '';
		var new_url = window.location.pathname;
		var value = $(this).val();

		var results = new RegExp('[\?&]nxs=([^&#]*)').exec(window.location.href);
	   	
	   	if (results !=  null && value != 0) {
	   		nsx = results[1];
	   		new_url += '?nxs='+nsx+'&sortby='+value;
	   	}else{
	   		if(value != 0){
	   			new_url += '?sortby='+value;
	   		}
	   	}
	   	if (results !=  null && value == 0) {
	   		nsx = results[1];
	   		new_url += '?nxs='+nsx;
	   	}

	   	window.location.href = new_url;
	});

	/*Search*/
if ($("#Owl_Carosel1").length > 0) {
  var sync1 = $("#Owl_Carosel1");
  var sync2 = $("#Owl_Carosel2");
    var slidesPerPage = 5; 
  var syncedSecondary = true;

  sync1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: true,
    autoplay: true,
    loop: true,
    responsiveRefreshRate : 200,
  }).on('changed.owl.carousel', syncPosition);

  sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
    items : slidesPerPage,
    smartSpeed: 200,
    slideSpeed : 500,
    slideBy: slidesPerPage, 
    responsiveRefreshRate : 100
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }    
    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();
    
    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
  
  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
  
  sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
}
	
/* CZoom Image */
if ($('.zoom-section').length > 0) {
$(".cloud-zoom").data("zoom").destroy();
}


});