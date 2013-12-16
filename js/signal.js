// custom script for signal.rs

$(document).ready(function () {

    Signal.init();
    //Signal.headerPositioning();
    Signal.searchForm();
    Signal.topNewsLink();
    Signal.topNewsPosts();
    Signal.player();

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
        var header = $('.menu-main'),
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
            searchForm = $('.search-form'),
            navigationBottom = $('.menu-bottom-wrapper'),
            searchToggleButton = $('.nav-search'),
            searchToggleListItem = searchToggleButton.parent();

        var showSearchForm = function (e) {
            e.stopPropagation();
            searchForm.show();
            var diff = 80;//searchForm.height() -  docEl.scrollTop();
            //if document is scrolled less than 80px move bottom navigation to see whole search form
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
            searchForm.find('.search-field').val('');
        });
    },
    topNewsLink: function () {

        var self = this,
            animationEnabled = self.settings.enableAnimations.topNewsPage;
        $('.nav-news').on('click', function () {
            self.elements.htmlBody.signalAnimate({
                scrollTop: self.elements.window.height()
            }, animationEnabled, true);
        });
    },
    topNewsPosts: function () {

        var posts = $('.news .post-image'),
            previews = $('.news .post-preview'),
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
    },
    player: function () {

        //on regular page, not player page
        $('.signal-stream-popups, .signal-icon-popups').on('click', function () {
            var options = {
                width: 420,
                height: 650,
                directories: 0,
                location: 0,
                menubar: 0,
                scrollbars: 1,
                resizable: 1,
                status: 0,
                toolbar: 0,
                top: 0,
                left: 0,
                screenx: 0,
                screeny: 0
            };

            var optionsBrowser = $.map(options, function (value, key) {
                return key + '=' + value;
            });

            var playerWindow = window.open(homeUrl + '/player', '_blank', optionsBrowser.join(','));
        });

        var $feeds = $('.player .feeds');

        $('.header .icon-comments').on('click', function () {
            var height = window.outerHeight,
                widthMargin = window.outerWidth - window.innerWidth;
            if (window.innerWidth > 500) {
                $feeds.hide();
                window.resizeTo(420 + widthMargin, height);
            } else {
                window.resizeTo(840 + widthMargin, height);
                $feeds.show();
            }
        });
    }

}
