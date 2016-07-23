// initialized in smooth.js under SmoothState.onAfter()
// jQuery(document).foundation();

// Launch reveal modal when wp-media link is clicked
var ghostModalImage = jQuery('#ghostModal img');

jQuery( 'a' ).on('click', function() {

    if ( this.href.indexOf('/wp-content/uploads/') !== -1 && this.href.indexOf('.jpg') !== -1 || this.href.indexOf('.png') !== -1 || this.href.indexOf('.gif') !== -1 ) {
        event.preventDefault();
        var imageUrl = this.href;
        jQuery.ajax(imageUrl)
            .done(function(resp) {
                ghostModalImage.attr('src', imageUrl);
                jQuery('#ghostModal').foundation('open');
            });
    }
});

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

/*
These functions make sure WordPress
and Foundation play nice together.
*/

jQuery(document).ready(function() {
    // initialize Foundation
    jQuery(document).foundation();
    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();

     // Makes sure last grid item floats left
    jQuery('.archive-grid .columns').last().addClass( 'end' );

	// Adds Flex Video to YouTube and Vimeo Embeds
    jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
        if ( jQuery(this).innerWidth() / jQuery(this).innerHeight() > 1.5 ) {
            jQuery(this).wrap("<div class='widescreen flex-video'/>");
        } else {
            jQuery(this).wrap("<div class='flex-video'/>");
        }
    });

});
