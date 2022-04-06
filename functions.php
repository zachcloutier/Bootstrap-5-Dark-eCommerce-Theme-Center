<?php

require_once 'inc/assets.php';
require_once 'inc/woocommerce.php';
require_once 'inc/theme-config.php';
//require_once 'inc/nav-menu.php';
require_once 'inc/class-wp-bootstrap-navwalker.php';
require_once 'inc/widget-areas.php';
require_once 'inc/register-widgets.php';


add_filter( 'woocommerce_return_to_shop_redirect', 'st_woocommerce_shop_url' );
/**
 * Redirect WooCommerce Shop URL
 */

function st_woocommerce_shop_url(){

return site_url() . '/shop';

}

// add the code to your theme function.php
//for logout redirection
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
wp_redirect( home_url() );
exit();
}
//for login redirection
add_action('wp_login','auto_redirect_after_login');
function auto_redirect_after_login(){
wp_redirect( home_url() );
exit();
}

function replace_wc_img(){
    $product_img = wp_get_attachment_url( $_product->get_image_id() );
    if($product_img){
        $product_img = $product_img;
    }else{
        $product_img = "/wp-content/uploads/woocommerce-placeholder.png";
    }
    exit();
}

                              


function zc_wc_get_account_menu_item_classes( $endpoint ) {
    global $wp;
  
    $classes = array(
      'woocommerce-MyAccount-navigation-link',
      'woocommerce-MyAccount-navigation-link--' . $endpoint,
    );
  
    // Set current item class.
    $current = isset( $wp->query_vars[ $endpoint ] );
    if ( 'dashboard' === $endpoint && ( isset( $wp->query_vars['page'] ) || empty( $wp->query_vars ) ) ) {
      $current = true; // Dashboard is not an endpoint, so needs a custom check.
    } elseif ( 'orders' === $endpoint && isset( $wp->query_vars['view-order'] ) ) {
      $current = true; // When looking at individual order, highlight Orders list item (to signify where in the menu the user currently is).
    } elseif ( 'payment-methods' === $endpoint && isset( $wp->query_vars['add-payment-method'] ) ) {
      $current = true;
    }
  
    if ( $current ) {
      $classes[] = 'active';
    }
  
    $classes = apply_filters( 'woocommerce_account_menu_item_classes', $classes, $endpoint );
  
    return implode( ' ', array_map( 'sanitize_html_class', $classes ) );
  }