<?php

function mdb_register_widgets() {
    register_widget( 'MDB_Widget_Products_Cat' );
    register_widget( 'MDB_Widget_Bestsellers' );
    register_widget( 'MDB_Widget_Products_Discounted' );
    register_widget( 'MDB_Widget_Products_New' );
    register_widget( 'MDB_Widget_Products_By_Cat' );
    register_widget( 'wpb_widget' );
}

if ( class_exists( 'WooCommerce' ) ) {

    add_action( 'widgets_init', 'mdb_register_widgets' );

    require_once 'widgets/class-mdb-widget-products-cat.php';
    require_once 'widgets/class-mdb-widget-bestsellers.php';
    require_once 'widgets/class-mdb-widget-products-discounted.php';
    require_once 'widgets/class-mdb-widget-products-new.php';
    require_once 'widgets/class-mdb-widget-products-by-cat.php';
    require_once 'widgets/class-widget-company-bio.php';
} else {

    add_action( 'admin_notices', function() {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>Warning! </strong>Please install <strong><a href="https://wordpress.org/plugins/woocommerce/" target="_blank">Woocommerce</a></strong> plugin before start using MDB Ecommerce theme</p>
        </div>
        <?php
    } );
}
