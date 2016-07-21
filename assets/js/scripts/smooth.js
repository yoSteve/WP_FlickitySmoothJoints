// Activate SmoothState
jQuery(function(){
  'use strict';
    var options = {
        debug : true,
        prefetch: true,
        cacheLength: 2,
        anchors: 'a',
        blacklist: '.notSmooth, .menu-item-has-children>a',
        forms: 'form',
        onStart: {
            duration: 250, // Duration of our animation
            render: function ($container) {
                // Add your CSS animation reversing class
                $container.addClass('is-exiting');
                // Restart your animation
                smoothState.restartCSSAnimations();
                // jQuery('#featured-hero .carousel').hide();
            }
        },
        onReady: {
            duration: 0,
            render: function ($container, $newContent) {
                // Remove your CSS animation reversing class
                $container.removeClass('is-exiting');
                // Inject the new content
                $container.html($newContent);
            }
        },
        onAfter: function(url, $container, $content) {
            // Use this to re-initialize any plugins that aren't working correctly on pageload
            jQuery(document).foundation();
            jQuery('.carousel').flickity();
            // jQuery('#galleryMain.carousel-main').flickity();
            // jQuery('#galleryNav.carousel-nav').flickity();
        }
    },
    smoothState = jQuery('#smoothBody').smoothState(options).data('smoothState');
});
