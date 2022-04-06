<?php

function mdb_widgets_init() {

    register_sidebar( array(
        'name'          => 'Homepage',
        'id'            => 'homepage-widget',
        'before_widget' => '<section class="mb-6">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="text-center fw-bold mb-6">',
        'after_title'   => '</h5>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer-widget-1',
        'before_widget' => '<div class="footerWidget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="text-uppercase fw-bold mb-4">',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 2',
        'id'            => 'footer-widget-2',
        'before_widget' => '<div class="footerWidget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="text-uppercase fw-bold mb-4">',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 3',
        'id'            => 'footer-widget-3',
        'before_widget' => '<div class="footerWidget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="text-uppercase fw-bold mb-4">',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 4',
        'id'            => 'footer-widget-4',
        'before_widget' => '<div class="footerWidget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="text-uppercase fw-bold mb-4">',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => 'Shop Sidebar',
        'id'            => 'shop-sidebar',
        'before_widget' => '<section class="mb-3 text-muted">',
        'after_widget'  => '</section>',
        'before_title'  => '<p><strong>',
        'after_title'   => '</strong></p>',
    ) );
}

add_action( 'widgets_init', 'mdb_widgets_init' );
