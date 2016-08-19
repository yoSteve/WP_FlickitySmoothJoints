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
