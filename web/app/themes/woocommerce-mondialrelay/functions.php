<?php

// Load WooCommerce Mondial Relay style
add_action( 'wp_enqueue_scripts', 'mondialrelay_style' );
function mondialrelay_style()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

// Load Google Analytics
// /!\ Replace the ID with your own
add_action('wp_head', 'google_analytics');
function google_analytics()
{
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61358360-4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-61358360-4');
    </script>
    <?php
}