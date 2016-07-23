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
