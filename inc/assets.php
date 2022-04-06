<?php

add_action( 'wp_enqueue_scripts', 'load_enqueue_script', 1 );

function load_enqueue_script() {

    wp_register_script( 'mdb.min.js', get_template_directory_uri() . '/assets/js/mdb.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mdb.min.js' );
    /*Font Awesome*/
    wp_register_script( 'fa.js', 'https://kit.fontawesome.com/5572d1b0ff.js', '', '', false );
    wp_enqueue_script( 'fa.js' );

    
}

add_action( 'wp_enqueue_scripts', 'load_all_stylesheets' );

function load_all_stylesheets() {

    wp_enqueue_style( 'mdb.css', get_template_directory_uri() . '/assets/css/mdb.dark.min.css', '', '1.0.0' );

    wp_enqueue_style( 'style.css', get_template_directory_uri() . '/style.css', '', '1.0.0'  );
}
