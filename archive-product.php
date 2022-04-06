<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

get_template_part( 'template-parts/header-intro' );

?>

<main class="mb-6">
    <div class="container">

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <div class="row gx-lg-5">
            <!--Grid column-->
            <!--Grid column-->
            <div>

                <?php

                if ( woocommerce_product_loop() ) { ?>

                  <!-- Section: Block Content -->
            

                <section>

                    <?php

                    $product_list_template = isset( $_COOKIE['shop_list_template'] ) ? htmlspecialchars( $_COOKIE['shop_list_template'] ) : '1';
                    $shop_listing_class = $product_list_template === '2' ? 'row' : 'col-lg-4 col-md-6 mb-4';

                    woocommerce_product_loop_start();

                    if (wc_get_loop_prop('total')) {
                        while (have_posts()) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action('woocommerce_shop_loop');

                            ?>

                            <div class="<?= $shop_listing_class; ?>">
                                <?php wc_get_template_part('content', 'product'); ?>
                            </div>

                            <?php
                        }
                    }

                    woocommerce_product_loop_end();

                    ?>
                    </section>
                    <script>
                        const shopTemplateButtons = document.querySelectorAll('.set-shop-template');
                        shopTemplateButtons.forEach( function (btn) {
                            btn.addEventListener('click', function(e) {
                                e.preventDefault();
                                const templateType = this.getAttribute('data-shop-template');
                                let date = new Date();
                                date.setTime(date.getTime() + (7*24*60*60*1000));
                                const expires = "; expires=" + date.toUTCString();
                                document.cookie = "shop_list_template=" + templateType + expires + "; path=/";
                                location.reload();
                            });
                        })
                    </script>

                    <?php

                } else {

                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }

                ?>

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

    </div>
</main>

<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
