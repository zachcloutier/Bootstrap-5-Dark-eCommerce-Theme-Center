<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

    <div id="comment-<?php comment_ID(); ?>" class="comment_container media shadow-4 p-4 rounded-5 mb-5">

        <img class="shadow-1-strong rounded-circle mb-3"
            style="width: 40px"
            src="<?= get_avatar_url( get_comment_author_email() ); ?>"
            alt="Sample" />
        <p class="mb-3 fw-bold"><?php comment_author(); ?></p>
        <?php if ( wc_review_ratings_enabled() ) { ?>
            <div class="star-rating mb-3" style="margin-left: auto !important; margin-right: auto !important;" role="img">
                <?php echo wc_get_star_rating_html( intval( get_comment_meta( get_comment_ID(), 'rating', true ) ) ); ?>
            </div>
        <?php } ?>
        <p class="mb-0">
            <i class="fas fa-quote-left pe-2"></i><?= get_comment_text(); ?>
        </p>

    </div>

</div>
