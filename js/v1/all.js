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
})