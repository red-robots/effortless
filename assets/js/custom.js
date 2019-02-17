/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	$('iframe.dynamic-embed').load(function(){
        var $this = $(this);
        var scroll_height = $this[0].contentWindow.document.body.scrollHeight;
        $this.css("height",scroll_height+"px");
    });
    if($("#eff-embed-signup").length > 0) {	
        if (document.cookie.indexOf('visited=true') === -1) {
            var fifteenDays = 1000*60*60*24*15;
            var expires = new Date((new Date()).valueOf() + fifteenDays);
            document.cookie = "visited=true;expires=" + expires.toUTCString();

            
            var width = window.innerWidth*0.5 > 960 ? "960px" : "50%";
            width = window.innerWidth < 600 ? "95%": width;
            var cboxOptions = {
            width: width,
            // height: '95%',
            // maxWidth: '960px',
            // maxHeight: '960px',
            inline:true, 
            href:"#eff-embed-signup",
            opacity:.8,
            close: '<i class="fa fa-close"></i>'
            }


            $.colorbox(cboxOptions);

            $(window).resize(function(){
                var width = window.innerWidth*0.5 > 960 ? "960px" : "50%";
                width = window.innerWidth < 600 ? "95%": width;
                $.colorbox.resize({
                    width: width,
                    // height: window.innerHeight > parseInt(cboxOptions.maxHeight) ? cboxOptions.maxHeight : cboxOptions.height
                });
            });            
        }
    }
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
	

    $('#home_slideshow').flexslider({
        animation: "slide",
        useCSS: false,
        directionNav: false,
        touch: true,  
        start: function(slider) {
            var count, current, slide;
            slide = slider.currentSlide;
            count = slider.count;
            current = slider.slides.eq(slider.currentSlide);
            current.find('.caption').addClass('fadeIn');
        },
        before: function(slider) {
            var current, first, next, prev;
            current = slider.slides.eq(slider.currentSlide);
            prev = slider.slides.eq(slider.currentSlide - 1);
            next = slider.slides.eq(slider.animatingTo);
            first = slider.slides.eq(0);
            current.find('.caption').removeClass('fadeIn');
            prev.find('.caption').removeClass('fadeIn');
            next.find('.caption').addClass('fadeIn');
            return first.find('.caption').removeClass('fadeIn');
        },
        after: function(slider) {
            var current, slide;
            slide = slider.currentSlide;
            current = slider.slides.eq(slider.currentSlide);
            return current.find('.caption').addClass('fadeIn');
        },
        end: function(slider) {
            var first;
            first = slider.slides.eq(0);
            return first.find('.caption').addClass('fadeIn');
        }
    }); 

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
	*	Equal Heights Divs
	*
	------------------------------------*/
    $('.js-blocks').matchHeight();
    
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
                gutter: 0
            }
        });
	});

	
	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

    /* custom mobile menu */
    $('#masthead > .row-3 .button').click(function(){
        $('#masthead >.row-3 #mobile-site-navigation').toggle();
    });
    $('#masthead-login > .row-2 .button').click(function(){
        var $nav = $('#masthead-login >.row-2 #login-site-navigation');
        if($nav.hasClass("toggled")){
            $nav.removeClass("toggled");
        } else {
            $nav.addClass("toggled");
        }
    });
    

    /*--------------------------------------------
     * Custom slider for homepage
     ------------------------------------------*/
    function init_slider(){
        var $container = $('.template-index > .row-1 > .outer-wrapper');//get container for slides
        var $slides = $container.css({	//set container properties and get slides
            "position":"relative",
            "overflow":"hidden"
        }).find(".slide");
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

    $('.filter-term').click(function(){
        var value = this.className.match(new RegExp("\\bvalue-(.*)\\b"));
        if(value===null){
            return;
        }
        value = value[1];
        var $redirect_node = $(this).parents('.redirect-url').eq(0);
        if($redirect_node.length===0){
            return;
        }
        var redirect = $redirect_node[0].className.match(new RegExp("\\bvalue-(.*)\\b"));
        if(redirect===null){
            return;
        }
        redirect = redirect[1];
        var redirect_query = redirect.match(new RegExp("\\?[^#]*(filter=([^&#]*))"));
        var current_page_query = window.location.href.match(new RegExp("\\?[^#]*(filter=([^&#]*))"));
        var filters = current_page_query ? 
            current_page_query[2]===""? Array():current_page_query[2].replace("%2C",",").split(",") :
            Array();
        var index = filters.indexOf(value);
        if(index === -1){
            filters.push(value);
        } else {
            filters.splice(index,1);
        }
        if(filters.length>0){
            filters = filters.join(",");
        } else {
            filters = "";
        }
        if(redirect_query===null){
            var index = redirect.indexOf("?");
            if(index===-1){
                var index = redirect.indexOf("#");
                if(index===-1){
                    var full_url = redirect+"?filter="+filters;
                } else {
                    var full_url = redirect.slice(0,index)+"?filter="+filters+redirect.slice(index);
                }
            } else {
                var length = redirect.length;
                var full_url = redirect.slice(0,index+1)+"filter="+filters;
                if(index===length-1){
                    full_url = full_url + redirect.slice(index+1);
                } else {
                    full_url = full_url + "&"+redirect.slice(index+1);
                }
            }
        } else {
            var filter_string = redirect_query[1];
            var full_url = redirect.replace(filter_string,"filter="+filters);
        }
        window.location.href = full_url;
    });
    $('.terms-wrapper').click(function(){
        var $this = $(this);
        if($this.hasClass("toggled")){
            $this.removeClass("toggled");
        } else {
            $this.addClass("toggled");
        }
    });
    $('.terms-wrapper').each(function(){
        var $this = $(this);
        if($this.find('.fa-check-square-o').length>0){
            $this.addClass("toggled");
        }
    });
    function update_cart_count(){
        jQuery.post(
            bellaajaxurl.url,
            {
                'action': 'bella_get_cart_count',
                'data': '',
            },
            function (response) {
                if ($(response).find("response_data").length > 0) {
                    $text = $(response).find("response_data").eq(0).text();
                    $('#cart-icon .num').html($text);
                }
            }
        );
    }
    update_cart_count();

    $(".burgerMenu").on("click",function(e){
        e.preventDefault();
        $('.nav-misc-wrapper').addClass('opennav');
    });

    $("#closeNavMisc").on("click",function(e){
        e.preventDefault();
        $('.nav-misc-wrapper').removeClass('opennav');
        $("#navMisc li.menu-item-has-children").removeClass('open');
    });

    $("#navMisc li.menu-item-has-children").on("click",function(e){
        e.preventDefault();
        $(this).toggleClass('open');
        $(this).find('>ul').slideToggle();
    });


});// END #####################################    END