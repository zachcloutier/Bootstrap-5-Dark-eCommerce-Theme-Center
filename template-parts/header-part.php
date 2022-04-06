<!-- Jumbotron -->
<div class="p-3 text-center bg-dark border-bottom shadow-4">
    <div class="container">
        <div class="row">


        <?php
                        $alertHead= trim( get_theme_mod('alert_head') );
                        $alertBody = trim( get_theme_mod('alert_body') );
                        
                        if ( $alertBody ) { ?>
        <div class="col-lg-6 justify-content-center mb-3 mb-md-0">
                
                <div class="alert alert-danger alert-banner text-lg-end">
                    <div class="container-fluid">
                        <?php if ( $alertHead ) { ?>

                        <h4 class="alert-heading">
                            <?php echo $alertHead; ?>
                        </h4>

                        <?php } ?>

                        <?php if ( $alertBody ) { ?>

                        <p class="mb-0">
                            <?php echo $alertBody; ?>
                        </p>

                        <?php } ?>
                    </div>
                </div>
            </div>
                <?php } ?>



            <div
                class="col-lg-6 justify-content-center mb-3 mb-md-0 ">
                <a class="navbar-brand me-2" href="/">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    ?>
                    <img src="<?php echo $image[0]; ?>" class="custom-logo" alt="" loading="lazy" />
                </a>
            </div>
            
        </div>
    </div>
</div>
<!-- Jumbotron -->



<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Container wrapper -->
    <div class="container">



        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Right links -->
        <div class="order-1 order-lg-2  d-flex align-items-center">
            <ul class="navbar-nav flex-row">
                <!--<li class="nav-item">
                        <?php /* aws_get_search_form( true );*/ ?>
                    </li>-->


                <?php

if ( class_exists( 'WooCommerce' ) ) {
    global $woocommerce;
    echo '<li class="nav-item me-3 me-lg-2">
        <a class="nav-link" href="' . wc_get_cart_url() . '">
            <span><i class="fas fa-shopping-cart"></i></span>';

            if ( $woocommerce->cart->cart_contents_count !== 0 )
            echo '<span class="badge rounded-pill badge-notification bg-danger">' . $woocommerce->cart->cart_contents_count . '</span>';

            echo '</a></li>';
}
?>
                <!-- Icon dropdown -->
                <li class="nav-item me-3 me-lg-0 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <?php
                            if ( is_user_logged_in() ) {
                                wp_nav_menu(array(
                                    'menu' => 'Logged-in-menu',
                                    'a_class' => 'dropdown-item',
                                    'menu_class' => 'dropdown-menu dropdown-menu-end text-lg-end',
                                    'container' => '',
                                ));
                            } else {
                                wp_nav_menu(array(
                                    'menu' => 'Logged-out-menu',
                                    'a_class' => 'dropdown-item',
                                    'menu_class' => 'dropdown-menu dropdown-menu-end text-lg-end',
                                    'container' => '',
                                ));
                            }
                            ?>
                </li>
            </ul>
        </div>
        <!-- Right links -->

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php




wp_nav_menu( array(
    'theme_location'  => 'navbar-menu',
    'depth'           => 6, // 1 = no dropdowns, 2 = with dropdowns.
    'container'       => '',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => 'navbar-nav mr-auto',
    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    'walker'          => new WP_Bootstrap_Navwalker(),
) );
              
              ?>
            </ul>
            <!-- Left links -->

        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->