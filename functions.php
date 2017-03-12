<?php

/*
|--------------------------------------------------------------------------
| Enqueue scripts & styles
|--------------------------------------------------------------------------
*/

function sjd_enqueue_scripts_and_styles() {

	// Use our own version of jQuery
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', null, null, false );

    // User script/s
    wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/js/app-min.js', null, null, true );

	// Pass WordPress data into our JS
    $js_data = [
        'siteURL' => get_site_url(),
        'themeURL' => get_stylesheet_directory_uri()
    ];
    wp_localize_script( 'app', 'siteData',  $js_data);

	// User style/s
	wp_enqueue_style('main', get_template_directory_uri() . '/dist/css/main.css?v=' . md5_file(get_template_directory_uri() . '/dist/css/main.css'));

}
add_action( 'wp_enqueue_scripts', 'sjd_enqueue_scripts_and_styles' );


/*
|--------------------------------------------------------------------------
| Basic setup
|--------------------------------------------------------------------------
*/

// Hide admin bar
show_admin_bar(false);

// Clean up header
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// Theme support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );