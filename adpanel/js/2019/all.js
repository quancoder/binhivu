/**
 * Created by VCCORP on 12/16/2019.
 */
$(document).ready(function() {


    //quanlt model file manager
    var openButton = $(".quanlt-open-modal-filemanager");
    var model = $('.quanlt-modal-filemanager');
    var iframe = $('.quanlt-iframe-filemanager');

    openButton.click(function(e)
    {
        //
        var src = $(this) .data("src");
        iframe.prop("src", src);

        //
        model.find('.overlay').css('display', 'flex');
        model.modal('show');

        //
        iframe.on('load', function ()
        {
            model.find('.overlay').css('display', 'none');
        });
    });

});
