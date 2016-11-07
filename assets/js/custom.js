/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	 $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

    /* custom mobile menu */
    $('#masthead > .row-3 .button').click(function(){
        $('#masthead >.row-3 #mobile-site-navigation').toggle();
    })

    /*--------------------------------------------
     * Custom slider for homepage
     ------------------------------------------*/
    function init_slider(){
        var $container = $('.template-index > .row-1 > .outer-wrapper');//get container for slides
        var $slides = $container.css({	//set container properties and get slides
            "position":"relative",
            "overflow":"hidden"
        }).find(".slide");
        console.log($slides.length);
        if($slides.length<1){ //if no slides don't don anything else
            return;
        }
        $slides.eq(0).css({ //set first slide to active and in view
            "position":"absolute",
            "width":"100%",
            "height":"100%",
            "top": 0,
            "left": 0,
            "z-index":-1,
            "display": "block"
        }).addClass("active");
        if($slides.length<2){ //if no more slides do nothing else, just show first slide
            return;
        }
        for(var i=1;i<$slides.length;i++){//for each slide after the first
            var $this = $slides.eq(i); //get slide as $this
            $this.css({					//set css properties for slide
                "position":"absolute",
                "width":"100%",
                "height":"100%",
                "top":0,
                "left": "100%",
                "z-index":-1,
                "display": "block"
            });
        }
        var timeout;//timeout with outer scope for when slides need to stop moving with clear timeout
        function slide(){//recursive function to move slides
            timeout = setTimeout(function(){ //set timeout
                var $active_slide = $slides.filter(".active").removeClass("active").animate({//animate the active slide out of view and remove class active
                    "left":"-100%"
                },1000,function(){
                    $(this).css({//move back to the right with all the other slides off screen
                        "left":"100%"
                    });
                });
                //if last slide move to the first, otherwise get sibling slide
                var $next_slide = $active_slide.index() !== $slides.length-1 ? $active_slide.next() : $slides.eq(0);
                $next_slide.addClass("active").animate({ //animate slide into view and add class active
                    "left":"0"
                },1000);
                slide();//call self recursively
            },6000);
        }
        slide();
    }
    init_slider();//call function to init slider
});// END #####################################    END