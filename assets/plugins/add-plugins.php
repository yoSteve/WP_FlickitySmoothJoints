<?php
// Use this file to inlcude certain essential WP plugins

// Include ACF (Advanced Custom Fields)
if( !class_exists('Acf') ) {
    define( 'ACF_LITE' , false ); // change this to TRUE to hide ACF from client
    include_once('acf/acf.php' );
}

?>
