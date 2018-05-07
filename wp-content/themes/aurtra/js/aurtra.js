jQuery(document).ready(function($){ 
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });


jQuery(document).ready(function($){ 
$('.downarrow').on('click', function () {
    var ele = $(this).closest("section").find(".container");
    // this will search within the section
    $("html, body").animate({
         scrollTop: $(ele).offset().top+200
    }, 2000);
    return false;
	});
	
	
   $('#backtothetop').on('click', function () {
		$('html, body').animate({
		 scrollTop: $("#masthead").offset().top-200
                }, 2000);
				
    return false;
	});
	
	$('.registerbtn').on('click', function () {
       $('#regoForm').toggleClass('hide-con',''); 
     }); 
	
});
		

		



		


