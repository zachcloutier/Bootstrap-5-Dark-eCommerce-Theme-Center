<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$rating_enabled = wc_review_ratings_enabled();

if ( $rating_enabled ) {
    global $product;

    $rating_count = $product->get_rating_count();
    $review_count = $product->get_review_count();
    $average = $product->get_average_rating();
}

?>

</div>
</section>

<?php if ( $rating_enabled ) { ?>
<!-- Section: Reviews -->
<section class="text-center">
    <?php comments_template( 'woocommerce/single-product-reviews' ); ?>
</section>
<?php } ?>
