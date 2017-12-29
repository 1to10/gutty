$(document).ready(function(){

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

    $('.search a, .search-box .close').click(function(){
        //alert();
        $('.search-box').fadeToggle();
    });
    
    $('.slider').owlCarousel({
        dots: true,
        autoplay:false,
        smartSpeed: 500,
        loop: false,
        autoplayTimeout: 4000,
        items: 1
    });

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
    
    $(".inside-tab-list li").click(function(){
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
        items:2,
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

    // var initThumbnailsSlider = function(object) {

    //     var $bxSlider = $(object);

    //     if ($bxSlider.length < 1) {
    //       return;
    //     }

    //     $bxSlider.bxSlider({
    //       controls: false,
    //       pagerCustom: '#bx-pager',
    //       easing: 'easeInOutQuint',
    //       infiniteLoop: true,
    //       speed: 500
    //     });

    //     $('.bx-custom-pager').bxSlider({
    //       mode: 'horizontal',
    //       maxSlides: 4,
    //       minSlides: 2,
    //       slideWidth: 156,
    //       slideMargin: 25,
    //       easing: 'easeInOutQuint',
    //       controls: true,
    //       nextText: "<i class='icm icm-Arrow_right'></i>",
    //       prevText: "<i class='icm icm-Arrow_left'></i>",
    //       pager: false,
    //       moveSlides: 1,
    //       infiniteLoop: false,
    //       speed: 500,
    //       onSlideBefore: bxMove

    //     });

    //     function bxMove($ele, from, to) {
    //       var idx = parseInt(to, 10) - 1;
    //       bx.goToSlide(idx);
    //     }

    // };


    // // execute the function
    // initThumbnailsSlider('[data-bx-slider]');


    var set = $('li', '.board-director-list').slice(0, 3);
    var set2 = $('li','.board-director-list').slice(3,7);
    var set3 = $('li','.board-director-list').slice(7);
    set2.each(function(){
        $(this).detach().appendTo('.board-director-list ul:nth-of-type(2n)');
    });
    set3.each(function(){
        $(this).detach().appendTo('.board-director-list ul:nth-of-type(3n)');
    });
    

});


$(window).load(function() {
  $(".scroll-area").mCustomScrollbar({
    axis:"x",
    theme:"dark-thin",
    autoExpandScrollbar:true,
    //advanced:{autoExpandHorizontalScroll:true}
  });
})



// var animate = new Animate({
//     target: '[data-animate]',
//     animatedClass: 'visible',
//     offset: [0.5, 0.5],
//     delay: 0,
//     remove: false,
//     reverse: false,
//     scrolled: false,
//     debug: true,
//     onLoad: true,
//     onScroll: true,
//     onResize: false,
//     callbackOnInit: function() {
//         console.log('Initialised');
//     },
//     callbackOnAnimate: function(element) {
//         console.log(element)
//     }
// });

// animate.init();

// client grayscal
    // $(".item img").css({"display":"none");
    // On window load. This waits until images have loaded which is essential
    /*$(window).load(function(){
        // Fade in images so there isn't a color "pop" document load and then on window load
        $(".item img").animate({opacity:1},500);
        // clone image
        $('.item img').each(function(){
            var el = $(this);
            el.css({}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
                var el = $(this);
                el.parent().css({"width":this.width,"height":this.height});
                el.dequeue();
            });
            this.src = grayscale(this.src);
        });
        // Fade image 
        $('.item img').mouseover(function(){
            $(this).parent().find('img:first').stop().animate({opacity:1}, 500);
        })
        $('.img_grayscale').mouseout(function(){
            $(this).stop().animate({opacity:0}, 500);
        });     
    });
    // Grayscale w canvas method
    function grayscale(src){
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var imgObj = new Image();
        imgObj.src = src;
        canvas.width = imgObj.width;
        canvas.height = imgObj.height; 
        ctx.drawImage(imgObj, 0, 0); 
        var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
        for(var y = 0; y < imgPixels.height; y++){
            for(var x = 0; x < imgPixels.width; x++){
                var i = (y * 4) * imgPixels.width + x * 4;
                var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
                imgPixels.data[i] = avg; 
                imgPixels.data[i + 1] = avg; 
                imgPixels.data[i + 2] = avg;
            }
        }
        ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
        return canvas.toDataURL();
    }*/

// client grayscal 