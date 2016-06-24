<?php

// Write a function to return some Cupcake Ipsum:
function lorem_function() {
    return 'Cupcake ipsum dolor sit amet danish donut. Brownie gummies icing caramels cheesecake pudding marshmallow chocolate. Sweet chocolate bar cotton candy bear claw icing carrot cake powder caramels. Halvah cupcake soufflé pudding gummi bears croissant jujubes. Tart oat cake liquorice sugar plum sesame snaps chupa chups muffin. Cookie candy canes dragée cupcake jelly beans candy marzipan. Chocolate bar candy canes ice cream. Chocolate liquorice wafer sesame snaps chocolate fruitcake brownie soufflé sugar plum. Brownie pie macaroon pastry powder chupa chups pastry. Brownie gingerbread croissant. Jelly jelly beans pudding.';
}
// add shortcode to Wordpress.
add_shortcode('lorem', 'lorem_function');
// Now you can use it by typing '[lorem]' in WYSIWYG.


// Write a function that generates a Lorem Pixel image
function random_picture($atts) {
    extract(shortcode_atts(array(
        'width'     =>  400, // default width
        'height'    =>  200, // default height
    ), $atts ));
    return '<img src="http://lorempixel.com/'.$width.'/'.$height.'" />';
}
add_shortcode('picture', 'random_picture');
// You can type [picture width="500" height="500"] to fetch a random image from LoremPixel
