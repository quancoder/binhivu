//main
$(document).ready(function () {
    //menu bar
    $("a.ega-menu-right-down-ico").click(function (e) {
        e.stopImmediatePropagation();
        e.stopPropagation();
        $(this).parent().parent().toggleClass('open');

    });
    $("#ega-btn-menu-hambuger").click(function () {

        if ($(this).attr('aria-expanded') === 'false') {
            $(this).html('<span class="glyphicon glyphicon-remove" style="font-size: 18px;color: #fff; display: block; height: 15px;"></span>');
            $(this).attr('aria-expanded', 'true');
            $($(this).data('target')).slideDown();
        }
        else {
            $(this).attr('aria-expanded', 'false');
            $(this).html('<span class="sr-only"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>');
            $($(this).data('target')).slideUp();
        }
    });

    $("#btn-click-search-xs").click(function () {
        if ($(this).find(">span").hasClass('glyphicon-search')) {
            $("#ega-search-xs-form").slideDown();
            $(this).find(">span").removeClass('glyphicon-search').addClass('glyphicon-remove');
        }
        else {
            $("#ega-search-xs-form").slideUp();
            $(this).find(">span").removeClass('glyphicon-remove').addClass('glyphicon-search');
        }

    });

    $(".ega-ft-toggle-xs").click(function () {
        var show = $(this).data('show');
        if ($(this).find('span.glyphicon-plus').length > 0) {
            $(this).find('span.glyphicon-plus').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            $("ul[data-show='" + show + "']").removeClass('hidden-xs').show();
        }
        else {
            $(this).find('span.glyphicon-minus').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            $("ul[data-show='" + show + "']").hide();
        }
    });
    //end menu bar

    //img lazy loading
    $('img.lazy').lazy();

    var owl_1 = $('.owl-carousel');
    owl_1.owlCarousel({
        lazyLoad:true,
        margin:2,
        autoplay:true,
        autoplaySpeed:3000,
        autoplayHoverPause:true,
        nav: true,
        loop: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    owl_1.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl_1.trigger('next.owl');
        } else {
            owl_1.trigger('prev.owl');
        }
        e.preventDefault();
    });
    owl_1.find('.owl-nav').hide();

    var owl_2 = $('.my-carousel-2');
    owl_2.owlCarousel({
        lazyLoad:true,
        margin:2,
        autoplay:true,
        autoplaySpeed:3000,
        autoplayHoverPause:true,
        nav: true,
        loop: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    owl_2.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl_2.trigger('next.owl');
        } else {
            owl_2.trigger('prev.owl');
        }
        e.preventDefault();
    });

    owl_2.find('.owl-nav').hide();
});