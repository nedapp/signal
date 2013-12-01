// custom script for signal.rs
$(document).ready(function () {

    Signal.init();
    //Signal.headerPositioning();
    Signal.searchForm();
    Signal.topNewsLink();
    Signal.topNewsPosts();

});

var Signal = {
    settings: {
        enableAnimations: {
            headerPopup: true,
            searchForm: true,
            topNewsPage: true,
            topNewsPosts: true
        },
        animationDuration: 300,
        animateDurationSlow: 600
    },
    init: function () {

        var self = this;

        this.elements = {
            document: $(document),
            window: $(window),
            htmlBody: $('html, body')
        };

        $.fn.signalAnimate = function (animation, animate, slow) {
            var duration = animate? (!!slow? self.settings.animateDurationSlow : self.settings.animationDuration) : 1;
            this.animate(
                animation,
                duration
            );
        };
    },
    headerPositioning: function () {
        var header = $('.site-header'),
            headerHeight = header.height(),
            animationEnabled = this.settings.enableAnimations.headerPopup,
            $window = $(window),
            positionedBottom = false,
            timeoutId = 0;

        $window.scroll(function(){
            if (timeoutId == 0) {
                timeoutId = setTimeout(function () {
                    if ($window.scrollTop() > headerHeight) {
                        //position header to bottom
                        if (!positionedBottom) {
                            header.removeClass(animationEnabled?'top-animated' : 'top');
                            header.addClass(animationEnabled?'bottom-animated' : 'bottom');
                            positionedBottom = true;
                        }
                    } else {
                        //position header to top
                        if (positionedBottom) {
                            header.removeClass(animationEnabled?'bottom-animated' : 'bottom');
                            header.addClass(animationEnabled?'top-animated' : 'top');
                            positionedBottom = false;
                        }
                    }
                    timeoutId = 0;
                }, 500);
            }
        });
    },
    searchForm: function () {

        var self = this,
            animationEnabled = self.settings.enableAnimations.searchForm,
            docEl = $(document),
            searchForm = $('.signal-search'),
            navigationBottom = $('.signal-bottom-nav'),
            searchToggleButton = $('.signal-nav-search'),
            searchToggleListItem = searchToggleButton.parent();

        var showSearchForm = function (e) {
            e.stopPropagation();
            searchForm.show();
            var diff = 100;//searchForm.height() -  docEl.scrollTop();
            //if document is scrolled less than 100px move bottom navigation to see whole search form
            if (diff > 0) {
                navigationBottom.signalAnimate({
                    bottom: diff
                }, animationEnabled);
            }
            docEl.one('click.search', function (e) {
                hideSearchForm();
            });
            searchToggleListItem.addClass('hover');
        };

        var hideSearchForm = function () {
            searchForm.hide();
            navigationBottom.signalAnimate({
                bottom: 0
            }, animationEnabled);
            docEl.off('click.search');
            searchToggleListItem.removeClass('hover');
        };

        searchToggleButton.on('click', function (e) {
            e.preventDefault();
            if (searchForm.is(':visible')) {
                hideSearchForm(e);
            } else {
                showSearchForm(e);
            }

        });

        //search form events
        //needed for click outside the form, so can click on form without closing it
        searchForm.on('click.search', function (e) {
            e.stopPropagation();
        });

        searchForm.find('.search-cancel').on('click', function () {
            hideSearchForm();
        });
    },
    topNewsLink: function () {

        var self = this,
            animationEnabled = self.settings.enableAnimations.topNewsPage;
        $('.signal-nav-top-news').on('click', function () {
            self.elements.htmlBody.signalAnimate({
                scrollTop: self.elements.window.height()
            }, animationEnabled, true);
        });
    },
    topNewsPosts: function () {

        var posts = $('.top-news-single'),
            previews = $('.top-news-preview'),
            animationEnabled = this.settings.enableAnimations.topNewsPosts;

        var openPost = function (postId) {
            var post = posts.filter('[data-id="' + postId + '"]'),
                preview = previews.filter('[data-id="' + postId + '"]');

            closePosts(function () {
                post.addClass('active');
                if (animationEnabled) {
                    preview.fadeIn();
                } else {
                    preview.addClass('active');
                }
            });
        };

        var closePosts = function (callback) {
            if (animationEnabled) {
                var visible = previews.filter(':visible');
                if (visible.length) {
                    visible.fadeOut(function () {
                        posts.removeClass('active');
                        callback();
                    });
                    return;
                }
            }
            posts.removeClass('active');
            previews.removeClass('active');
            callback();
        };

        posts.on('click', function(){
            var post = $(this),
                postId = post.data('id');

            if (post.hasClass('active')) {
                closePosts($.noop);
            } else {
                openPost(postId);
            }

        });
    }
}
