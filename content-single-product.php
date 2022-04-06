
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

get_template_part( 'template-parts/header-intro' );

?>

<!--Main layout-->
<main class="mb-6">
    <div class="container">

        <?php do_action( 'woocommerce_before_single_product' ); ?>

        <!--Section: Product intro-->
        <section class="mb-9">

            <div class="row gx-lg-5">
                <div class="col-md-6 mb-4 mb-md-0">

                    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>

                </div>

                <div class="col-md-6 mb-4 mb-md-0">

                    <div>

                        <?php do_action( 'woocommerce_single_product_summary' ); ?>

                        <?php do_action( 'woocommerce_after_single_product_summary' ); ?>

                        <?php do_action( 'woocommerce_after_single_product' ); ?>

                    </div>

                </div>
            </div>

        </section>
        <!--Section: Product intro-->
    </div>
</main>
