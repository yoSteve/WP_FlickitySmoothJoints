// blacklist appropriate a tags:
addBlacklistClass();

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
            addBlacklistClass();
            scrollToHash();
        }
    },
    smoothState = jQuery('#smoothBody').smoothState(options).data('smoothState');
});

// add .notSmooth to all WP-links that shouldn't be smooth
function addBlacklistClass() {
    jQuery( 'a' ).each( function() {
        if ( this.href.indexOf('/wp-admin/') !== -1 ||
            this.href.indexOf('/wp-login.php') !== -1 ||
            this.href.indexOf('/wp-content/uploads/') !== -1 ) {
            jQuery( this ).addClass( 'notSmooth' );
        }
    });
}

// if there is a # in the address bar url, scroll to its place on the page (replicates expected behavior)

function scrollToHash() {
    var theHash = jQuery(window.location.hash);
    if ( theHash.length !== 0 ) {
        var topOffset = theHash.offset().top;
        jQuery('body, html').animate({
            scrollTop: (topOffset - 60 ),
        }, {
            duration: 250
        });
    }
}
