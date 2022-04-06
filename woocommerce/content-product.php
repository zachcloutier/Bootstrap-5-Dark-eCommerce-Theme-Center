
<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

$product_list_template = isset( $_COOKIE['shop_list_template'] ) ? htmlspecialchars( $_COOKIE['shop_list_template'] ) : '1';
$product_img = wp_get_attachment_url( $product->get_image_id() );
    if($product_img){
        $product_img = $product_img;
    }else{
        $product_img = "/wp-content/uploads/woocommerce-placeholder.png";
    }

if ( is_shop() && $product_list_template === '2' ) { ?>
<div class="col-md-4 mb-4">
    <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-ripple-color="light">
        <img src="<?= $product_img; ?>" class="w-100 rounded" />
        <a href="<?= get_permalink(); ?>">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
        </a>
    </div>
</div>
<div class="col-md-8 mb-4">
    <a href="<?= get_permalink(); ?>" class="text-reset">
        <h5 class="card-title mb-3"><?php the_title(); ?></h5>
    </a>
    <?= str_replace( '<a ', '<a class="text-reset" ', wc_get_product_category_list( $product->get_id(), ', ', '<p class="posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</p>' ) ); ?>
    <h6 class="mb-3"><?= $product->get_price_html(); ?></h6>
</div>
<hr>
<?php } else { ?>
<div>
    <div class="bg-image ripple shadow-4-soft rounded-6 mb-4 overflow-hidden d-block" data-ripple-color="light">
        <img src="<?=  $product_img; ?>" class="w-100 rounded" />
        <a href="<?= get_permalink(); ?>">
            <div class="hover-overlay">
                <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.09)"></div>
            </div>
        </a>
    </div>
    <div class="px-3 text-reset d-block">
        <a href="<?= get_permalink(); ?>" class="text-reset">
            <p class="fw-bold mb-2"><?php the_title(); ?></p>
        </a>
        <p class="text-muted mb-2"><?php echo str_replace( '<a ', '<a class="text-reset" ', wc_get_product_category_list( $product->get_id() ) ); ?></p>
        <?php if ( wc_review_ratings_enabled() ) { ?>
            <div class="star-rating mb-3" <?= is_product() ? 'style="margin-left: auto !important; margin-right: auto !important;"' : ''; ?> role="img">
                <?php echo wc_get_star_rating_html( $product->get_average_rating(), $product->get_rating_count() ); ?>
            </div>
        <?php } ?>
        <h5 class="mb-2"><?= $product->get_price_html(); ?></h5>
    </div>
    
</div>
<?php } ?>
