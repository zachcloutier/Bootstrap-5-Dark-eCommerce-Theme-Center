<?php

function mdb_add_theme_support() {
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    
    
	add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'mdb_add_theme_support' );

function register_additional_menus() {

    register_nav_menus(
        array(
            'navbar-menu' => __( 'Navbar Menu' ),
            'Logged-in-menu' => __( 'Logged In Menu' ),
                'Logged-out-menu' => __( 'Logged Out Menu' ),
        )
    );
}


function add_class_li($classes,$item,$args){
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }
    if (isset($args->dropdown_class) && in_array('menu-item-has-children',$classes)) {
        $classes[] = $args->dropdown_class;
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_class_li', 10, 3 );

function add_a_class($attr,$item,$args){
 if (isset($args->a_class)) {
     $attr['class'] = $args->a_class;
 }
 return $attr;
}
add_filter( 'nav_menu_link_attributes', 'add_a_class', 10, 3 );

function add_class_sub_menu( $classes ) {
 $classes[] = 'dropdown-menu dropdown-submenu';

 return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'add_class_sub_menu' );

add_action( 'init', 'register_additional_menus' );

function starter_customize_register( $wp_customize ) {
    /**
     * Social Links
     */

    $wp_customize->add_section( 'mdb_social_links' , array(
        'title'    => __( 'Social links', 'mdb_ecommerce' ),
        'priority' => 50
    ) );

    $wp_customize->add_setting( 'mdb_facebook_link' , array(
        'default'   => '',
    ) );

    $wp_customize->add_setting( 'mdb_twitter_link' , array(
        'default'   => '',
    ) );

    $wp_customize->add_setting( 'mdb_pinterest_link' , array(
        'default'   => '',
    ) );

    $wp_customize->add_setting( 'mdb_youtube_link' , array(
        'default'   => '',
    ) );

    $wp_customize->add_setting( 'mdb_instagram_link' , array(
        'default'   => '',
    ) );

    $wp_customize->add_control( 'mdb_facebook_link', array(
        'label'   => 'Facebook',
        'section' => 'mdb_social_links',
        'type'    => 'text',
    ));

    $wp_customize->add_control( 'mdb_twitter_link', array(
        'label'   => 'Twitter',
        'section' => 'mdb_social_links',
        'type'    => 'text',
    ));

    $wp_customize->add_control( 'mdb_pinterest_link', array(
        'label'   => 'Pinterest',
        'section' => 'mdb_social_links',
        'type'    => 'text',
    ));

    $wp_customize->add_control( 'mdb_youtube_link', array(
        'label'   => 'Youtube',
        'section' => 'mdb_social_links',
        'type'    => 'text',
    ));

    $wp_customize->add_control( 'mdb_instagram_link', array(
        'label'   => 'Instagram',
        'section' => 'mdb_social_links',
        'type'    => 'text',
    ));


    /**
     * alert section
     */

    $wp_customize->add_panel( 'banner_alert_p', array(
        'title' => __( 'Alert Settings' ),
        'description' => '<p>Customize Alerts</p>', // Include html tags such as <p>.
        'priority' => 50, // Mixed with top-level-section hierarchy.
      ) );

      $wp_customize->add_section( 'banner_alert' , array(
        'title' => 'Banner Alert',
        'panel' => 'banner_alert_p',
      ) );

    $wp_customize->add_setting( 'alert_head', array(
        'default' => '',
    ) );

    $wp_customize->add_setting( 'alert_body', array(
        'default' => '',
    ) );
    $rows = 11;
    $maxLeingthtHead = 44;  
    $maxLeingtht = 68*$rows;


    $wp_customize->add_control( 'alert_head', array(
        'label'   => 'Alert Header',
        'section' => 'banner_alert',
        'type'    => 'text',
        'input_attrs' => array(
            'maxlength' => $maxLeingthtHead
        )
    ) );



    $wp_customize->add_control( 'alert_body', array(
        'label'   => 'Alert Body',
        'section' => 'banner_alert',
        'type'    => 'textarea',
        'input_attrs' => array(
            'maxlength' => $maxLeingtht,
            'style' => 'height: 360px;'
        )
    ) );

    $wp_customize->add_section( 'products_alert' , array(
      'title' => 'Products Alert',
      'panel' => 'banner_alert_p',
    ) );
    
   

    $wp_customize->add_setting( 'alert_product_body', array(
        'default' => '',
    ) );
    

    $wp_customize->add_control( 'alert_product_body', array(
        'label'   => 'Alert Body',
        'section' => 'products_alert',
        'type'    => 'textarea',
        'input_attrs' => array(
            'maxlength' => $maxLeingtht,
            'placeholder' => 'Alert will be prefixed by &#xF002;',
            'style' => 'height: 360px;'
        )
    ) );
    
    /**
    * MDB Homepage section
    */

   $wp_customize->add_section( 'mdb_homepage_section' , array(
       'title'    => __( 'Homepage Settings', 'mdb_theme' ),
       'priority' => 50
   ) );

    $wp_customize->add_setting( 'mdb_homepage_title', array(
        'default' => 'Example title',
    ) );

    $wp_customize->add_setting( 'mdb_homepage_subtitle', array(
        'default' => 'Example subtitle',
    ) );

    $wp_customize->add_setting( 'mdb_homepage_show_button', array(
        'default' => 0
    ) );

    $wp_customize->add_setting( 'mdb_homepage_button', array(
        'default' => '',
    ) );

    $wp_customize->add_setting( 'mdb_homepage_button_url', array(
        'default' => '',
    ) );

    $wp_customize->add_setting('mdb_homepage_image', array(
        'default' => 'https://mdbootstrap.com/img/new/slides/310.jpg',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
    ) );

    

    $wp_customize->add_control( 'mdb_homepage_title', array(
        'label'   => 'Title',
        'section' => 'mdb_homepage_section',
        'type'    => 'text',
    ) );




    $wp_customize->add_control( 'mdb_homepage_subtitle', array(
        'label'   => 'Subtitle',
        'section' => 'mdb_homepage_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_control( 'mdb_homepage_show_button', array(
        'label'   => 'Show jumbotron button?',
        'section' => 'mdb_homepage_section',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_control( 'mdb_homepage_button', array(
        'label'   => 'Jumbotron button',
        'section' => 'mdb_homepage_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_control( 'mdb_homepage_button_url', array(
        'label'   => 'Jumbotron button URL',
        'section' => 'mdb_homepage_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mdb_homepage_image', array(
            'label' => __( 'Image', 'mdb_theme' ),
            'section' => 'mdb_homepage_section',
            'settings' => 'mdb_homepage_image',
        ))
    );



    /**
     * Cart Page
     */

    $wp_customize->add_panel( 'cart_settings', array(
        'title' => __( 'Cart Settings' ),
        'description' => '<p>Customize Alerts</p>', // Include html tags such as <p>.
        'priority' => 50, // Mixed with top-level-section hierarchy.
      ) );


      
      $wp_customize->add_section( 'cart_alert' , array(
        'title' => 'Cart Alert',
        'panel' => 'cart_settings',
      ) );

    $wp_customize->add_setting( 'cart_alert_head', array(
        'default' => '',
    ) );

    $wp_customize->add_control( 'cart_alert_head', array(
        'label'   => 'Alert Header',
        'section' => 'cart_alert',
        'type'    => 'text',
        'input_attrs' => array(
            'placeholder' => 'Do not delay the purchase, adding items to your cart does not mean booking them.',
        )
    ) );


      $wp_customize->add_section( 'Shipping_alert' , array(
        'title' => 'Shipping Alert',
        'panel' => 'cart_settings',
      ) );

    $wp_customize->add_setting( 'shipping_alert_head', array(
        'default' => '',
    ) );

    $wp_customize->add_setting( 'shipping_alert_body', array(
        'default' => '',
    ) );
    $rows = 10;
    $maxLeingthtHead = 44;  
    $maxLeingtht = 68*$rows;


    $wp_customize->add_control( 'shipping_alert_head', array(
        'label'   => 'Shipping Alert Header',
        'section' => 'Shipping_alert',
        'type'    => 'text',
        'input_attrs' => array(
            'placeholder' => 'Expected shipping delivery',
        )
    ) );



    $wp_customize->add_control( 'shipping_alert_body', array(
        'label'   => 'Shipping Alert Body',
        'section' => 'Shipping_alert',
        'type'    => 'text',
        'input_attrs' => array(
            'placeholder' => 'Thu., 12.03. - Mon, 16.03.',
        )
    ) );

    $wp_customize->add_section( 'accepted_cards' , array(
      'title' => 'Accepted Cards',
      'panel' => 'cart_settings',
    ) );
    
   

    $wp_customize->add_setting( 'title_cards', array(
        'default' => '',
    ) );
    $wp_customize->add_setting( 'amazon_pay_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'american_express_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'apple_pay_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'discover_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'google_pay_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'mastercard_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'paypal_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'samsung_pay_cards', array(
        'default' => false,
    ) );
    $wp_customize->add_setting( 'visa_cards', array(
        'default' => false,
    ) );
    

    $wp_customize->add_control( 'title_cards', array(
        'label'   => 'Label',
        'section' => 'accepted_cards',
        'type'    => 'text',
        'input_attrs' => array(
            'placeholder' => 'We Accept',
        )


    ) );

    $wp_customize->add_control( 'amazon_pay_cards', array(
        'label'   => 'Amazon Pay',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'american_express_cards', array(
        'label'   => 'American Express',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'apple_pay_cards', array(
        'label'   => 'Apple Pay',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'discover_cards', array(
        'label'   => 'Discover',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'google_pay_cards', array(
        'label'   => 'Google Pay',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'mastercard_cards', array(
        'label'   => 'Mastercard',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'paypal_cards', array(
        'label'   => 'PayPal',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'samsung_pay_cards', array(
        'label'   => 'Samsung Pay',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'visa_cards', array(
        'label'   => 'Visa',
        'section' => 'accepted_cards',
        'type'    => 'checkbox',
    ) );
    




    
}
add_action( 'customize_register', 'starter_customize_register');

function mdb_theme_activation_function () {

    $menu_exists = wp_get_nav_menu_object( 'Navbar Menu' );

    if ( ! $menu_exists ) {

        $navbar_menu_id = wp_create_nav_menu( 'Navbar Menu' );

        wp_update_nav_menu_item( $navbar_menu_id, 0, array(
                'menu-item-title' =>  __('Home'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url( '/' ),
                'menu-item-status' => 'publish' )
        );

        wp_update_nav_menu_item( $navbar_menu_id, 0, array(
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => 0,
                'menu-item-object' => 'page',
                'menu-item-object-id' => 2,
                'menu-item-type' => 'post_type' )
        );

        wp_update_nav_menu_item( $navbar_menu_id, 0, array(
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => 0,
                'menu-item-object' => 'post',
                'menu-item-object-id' => 1,
                'menu-item-type' => 'post_type' )
        );

        $locations_menu = get_theme_mod( 'nav_menu_locations' );
        $locations_menu['navbar-menu'] = $navbar_menu_id;
        set_theme_mod ( 'nav_menu_locations', $locations_menu );
    }

    if ( ! has_post_thumbnail( 1 ) ) {

        $upload_dir = wp_upload_dir();
        $image_path = get_template_directory() . '/assets/img/hello-world.jpg';
        $image_data = file_get_contents( $image_path );
        $filename = basename( $image_path );

        if ( wp_mkdir_p($upload_dir['path'] ) )
            $file = $upload_dir['path'] . '/' . $filename;
        else
            $file = $upload_dir['basedir'] . '/' . $filename;

        file_put_contents($file, $image_data);

        $wp_filetype = wp_check_filetype( $filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => 'hello-world-post',
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, $file, 1 );
        set_post_thumbnail( 1, $attach_id );
    }
}

add_action( 'after_switch_theme', 'mdb_theme_activation_function' );
