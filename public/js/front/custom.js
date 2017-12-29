$(window).load(function(){
    $('.thumbnail-slider').flexslider({
    animation: "fade",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    asNavFor: '.slider',
    directionNav: false,
    });

    $('.slider').flexslider({
    animation: "slide",
    controlNav: false,
    slideshowSpeed: 4000,
    pausePlay: true,
    animationLoop: false,
    slideshow: true,
    sync: ".thumbnail-slider",
    directionNav: false,
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
    $(".thumbnail-slider li").hover(function(){
    $(this).click();
    });
});
$(document).ready(function(){
    $('.menu').slicknav({
        label: ''
    });
    $('.search a, .search-box .close').click(function(){
        $('.search-box').fadeToggle()
    });
    $('.slicknav_menu').prepend('<div class="slick-top"></div>');
    if ($(window).width() < 960) {
        $('.header-top nav').detach().appendTo('.header .menu > ul');
        $('.header .search').detach().prependTo('.slicknav_nav');
        $('.slicknav_nav .search-box').addClass('responsive-search');
        $('.responsive-search').removeClass('search-box');
        $('.search-box').detach().appendTo('.slicknav_nav .search');
        $('.header .logo').detach().prependTo('.slicknav_menu');
        $('.header-top .call, .header-top .join-us').detach().prependTo('.slicknav_menu .slick-top');
    }
    // if ($(window).width() > 961) {
    //     $('.search a, .search-box .close').click(function(){$('.search-box').fadeToggle()});
    // };
    $(window).on('resize', function(){
        var win = $(this); //this = window
        if (win.width() >=961) {
            $('.search a, .search-box .close').click(function(){
                $('.search-box').fadeToggle();
            });        
        };
        if (win.width() <= 960) {
            // alert('raman');    
            $('.header-top nav').detach().appendTo('.header .menu ul');
            $('.header .search').detach().prependTo('.slicknav_nav');
            $('.search-box').detach().appendTo('.slicknav_nav .search');
            $('.slicknav_nav .search-box').addClass('responsive-search');
            $('.responsive-search').removeClass('search-box');
            $('.header .logo').detach().prependTo('.slicknav_menu');
            $('.header-top .call, .header-top .join-us').detach().prependTo('.slicknav_menu .slick-top');
        }
        else {
            $('.header .menu > ul > nav').detach().appendTo('.header-top .main-container');
            $('.slicknav_nav .search').detach().appendTo('.header .right');
            
            $('.slicknav_menu .call, .slicknav_menu .join-us').detach().appendTo('.header-top .main-container');
            $('.slicknav_menu .logo').detach().prependTo('.header .main-container');
        }
    });
    
    $(window).scroll(function() {
        if ($(this).scrollTop() < 199){  
            $('.header').removeClass("ha-header-hide");
        }
        if ($(this).scrollTop() > 200){  
            $('.header').addClass("ha-header-hide").css("position","fixed");
        }
        if ($(this).scrollTop() > 530){  
            $('.header').addClass("ha-header-show");
        }
        else{
            $('.header').removeClass("ha-header-hide, ha-header-show").css("position","static");
        }
    });

    // $('.slider').owlCarousel({
    //     dots: true,
    //     autoplay:true,
    //     smartSpeed: 500,
    //     loop: true,
    //     autoplayTimeout: 4000,
    //     items: 1,
    //     thumbs: true,
    //     thumbImage: true,
    //     thumbContainerClass: 'owl-thumbs',
    //     thumbItemClass: 'owl-thumb-item'
    // });

    // reference for main items
    // var slider = $('.slider');
    // // reference for thumbnail items
    // var thumbnailSlider = $('.thumbnail-slider');
    // //transition time in ms
    // var duration = 250;

    // // carousel function for main slider
    // slider.owlCarousel({
    //     loop:false,
    //     nav:false,
    //     items:1
    // }).on('changed.owl.carousel', function (e) {
    //     //On change of main item to trigger thumbnail item
    //     thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
    // });

    // // carousel function for thumbnail slider
    // thumbnailSlider.owlCarousel({
    //     loop:false,
    //     center:false, //to display the thumbnail item in center
    //     // items:1,
    //     dots: false,
    //     nav:false
    // })
    // .on('mouseenter', '.owl-item', function () {
    //     // On click of thumbnail items to trigger same main item
    //     slider.trigger('to.owl.carousel', [$(this).index(), duration, true]);

    // }).on('changed.owl.carousel', function (e) {
    //     // On change of thumbnail item to trigger main item
    //     slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
    // });


    //These two are navigation for main items
    // $('.slider-right').click(function() {
    //     slider.trigger('next.owl.carousel');
    // });
    // $('.slider-left').click(function() {
    //     slider.trigger('prev.owl.carousel');
    // });
    
    $('.announcement-trigger').owlCarousel({
        // animateOut: 'slide',
        autoplay:true,
        smartSpeed: 500,
        loop: true,
        autoplayTimeout: 4000,
        navText: [ '', '' ],
        nav: true,
        dots: false,
        items: 1
    });

    $('.num span').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    $('.tab-menu li').click(function(){
        var tab_id = $(this).attr('data-link');
        $('.tab-menu li').removeClass('active');
        $('.tab-content').removeClass('active');

        $(this).addClass('active');
        //$("#"+tab_id).addClass('active');
        $("#"+tab_id).addClass('active');
    });
    // $('.inside-tab-list li a').click(function(){
    //     event.preventDefault();
    //     var get_id = $(this).attr('href');
    //     //alert(get_id);
    //     $('.inside-tab-list li').removeClass('active');
    //     $('.range').removeClass('active');
    //     $(this).parent('li').addClass('active');
    //     $('#'+get_id).addClass('active');
    // });

    //var he = $(".slide-left").height();
    
    $(".inside-tab-list li").mouseenter(function(){
        //event.preventDefault();
        var index = $(this).index();
        //alert(index)
        var slid =  398 * index;
        var slidleft = 348 * index;
        $(".tab-content .left .left-inside").css("margin-top" , +slidleft)
        $(".tab-content .right .right-inside").css("margin-top" , -slid)
        $(".inside-tab-list li").removeClass("active");
        $(this).addClass("active");
    });
    
    $('.customer-list').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:45,
        loop:true,
        autoWidth:true,
        autoplay:true,
        autoplayTimeout: 3000,
        items:7
    });
   
	
	 $('.left-slider-l .certification-list.certification-list-l').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:5,
        loop:false,
        autoWidth:false,
        autoplay:true,
        autoplayTimeout: 3000,
        items:3,
        smartSpeed: 800,
        autoplayHoverPause: true
    });
	
	 $('.certification-list.certification-list-r').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:5,
        loop:false,
        autoWidth:false,
        autoplay:true,
        autoplayTimeout: 3000,
        items:3,
        smartSpeed: 800,
        autoplayHoverPause: true
    });
	
	 $('.certification-list').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:5,
        loop:false,
        autoWidth:false,
        autoplay:true,
        autoplayTimeout: 3000,
        items:6,
        smartSpeed: 800,
        autoplayHoverPause: true
    });
	
	
	
    $('.event-list ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:15,
        loop:false,
        autoWidth:true,
        autoplay:false,
        autoplayTimeout: 3000,
        items:3,
        smartSpeed: 800,
        autoplayHoverPause: true
    });
    $('.history-slider').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:15,
        loop:false,
        autoWidth:true,
        autoplay:true,
        autoplayTimeout: 3000,
        items:6,
        smartSpeed: 1800,
        autoplayHoverPause: true
    });
    $('.finance-list-comon ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:79,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:4,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
    $('.quarterly-result ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:79,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:4,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
    $('.shareholding-list ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:79,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:8,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
    $('.corporate-presentation ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:29,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:7,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
    $('.corporate-announcement ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:29,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:7,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
    $('.media-category-list ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:32,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 100,
        items:3,
        smartSpeed: 3000,
        autoplayHoverPause: false
    });
    // $('.media-list li .button a').click(function(){
    //     alert();
    // })
    $('.fancybox').fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
    });
    $('.baord').fancybox();
    $('.exihi').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        helpers : {
            thumbs : {
                width: 75,
                height: 50
            }
        }
        // defaults: {
        //     padding: 0
        // }
    });
    

    

    $(window).scroll(function() {
      var scrollVisible = $(window).scrollTop() + $(window).height();
      
      $(".history .history-slider .owl-item").each(function(i) {
        //var indexnum = $(this).index();  
        
        if (scrollVisible > $(this).offset().top - 150) {
            var r = $(this);
            setTimeout(function(){
                r.addClass("onscreen-left");
            }, (i+1) * 500);
        }
      });
      $(".sm-left, .home-gallery").each(function() {
        if (scrollVisible > $(this).position().top - 50) {
          $(this).addClass("onscreen-left")
        }
      });
      $(".sm-right, .network").each(function() {
        if (scrollVisible > $(this).position().top - 50) {
          $(this).addClass("onscreen-right")
        }
      });
      $(".awards").each(function() {
        if (scrollVisible > $(this).position().top - 50) {
          $(this).addClass("onscreen-down")
        }
      });
    });
    // contact us 
    $('.offices-row ul li i').click(function(e){
        e.preventDefault();
        $('.office-addInner').slideUp();
        $('.offices-row ul li i').removeClass('offices-icon');
        $(this).toggleClass('offices-icon');
        $(this).next('.office-addInner').stop().slideToggle();
    });

    $('.archive-list ul > li').click(function(){
        // alert();
        $('.archive-list ol').toggleClass('active');
    });

    var set = $('li', '.board-director-list').slice(0, 5);
    var set2 = $('li','.board-director-list').slice(5,10);
    var set3 = $('li','.board-director-list').slice(10);
    set2.each(function(){
        $(this).detach().appendTo('.board-director-list ul:nth-of-type(2n)');
    });
    set3.each(function(){
        $(this).detach().appendTo('.board-director-list ul:nth-of-type(3n)');
    });
    
    $('.business-list li').each(function(){
        // var map-data = 
        var ts = $(this).find('.name');
        var mapdata = ts.attr('map-data')
        $(ts).click(function(){
            $('.business-list li').addClass('active');
            $('.presence iframe').attr('src',mapdata);
        })
        
    });

});


$(window).load(function() {
  $(".scroll-area").mCustomScrollbar({
    axis:"x",
    theme:"dark-thin",
    autoExpandScrollbar:true,
    //advanced:{autoExpandHorizontalScroll:true}
  });
});


var baseurl = 'http://interactivebees.in/hpl/public';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//alert(appBaseUrl);

$(document).ready(function () {
	
   $('#presentation').on('change',function(){
	 //  alert()
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'/presentation/'+catid,
            data: {catid:catid},
            success:function(data){
				
				//alert(data);
                $(".corporate-presentation").html(data);
				$('.corporate-presentation ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:29,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:7,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
				
            }
        });
		 
    });
	$('#announcement').on('change',function(){
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'/announcement/'+catid,
            data: {catid:catid},
            success:function(data){
				//alert(data);
                $(".corporate-announcement").html(data);
				$('.corporate-announcement ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:29,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:7,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });
            }
        });
		 
    });
	$('#quaterlyresult').on('change',function(){
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'/quaterlyresult/'+catid,
            data: {catid:catid},
            success:function(data){
			$(".quaterdata").html(data);
$('.quarterly-result ul').owlCarousel({
        dots: false,
        nav: true,
        navText: [ '', '' ],
        margin:79,
        loop:false,
        autoWidth:false,
        autoplay:false,
        autoplayTimeout: 3000,
        items:4,
        smartSpeed: 1800,
        autoplayHoverPause: true 
    });			
            }
        });
		 
    });
});