// custom script for signal.rs
$(document).ready(function () {
    $('.top-news-single').click(function(){
        var post_id = $(this).data('id');
        var preview = $('.top-news-single-preview[data-id="' + post_id + '"]');
        if (preview.hasClass('opened')) {
            preview.removeClass('opened');
        } else {
            $('.top-news-single-preview.opened').removeClass('opened');
            preview.addClass('opened');
        }
    });
});



