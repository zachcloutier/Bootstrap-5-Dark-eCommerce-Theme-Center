<?php
/**
 * The template for displaying product price filter widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-price-filter.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.1
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'woocommerce_widget_price_filter_start', $args ); ?>

<form method="get" action="<?php echo esc_url( $form_action ); ?>">
    <div class="price_slider_wrapper">
        <div class="price_slider_amount d-flex align-items-center mt-4 pb-1" data-step="<?php echo esc_attr( $step ); ?>">
            <div class="form-outline my-0">
                <input type="text" id="min-price" class="form-control mb-0" name="min_price" value="<?php echo esc_attr( $current_min_price ); ?>" data-min="<?php echo esc_attr( $min_price ); ?>" placeholder="<?php echo esc_attr__( 'Min price', 'woocommerce' ); ?>" />
                <label class="form-label" for="min-price">$ Min</label>
            </div>
            <p class="px-2 mb-0 text-muted"> - </p>
            <div class="form-outline my-0">
                <input type="text" id="max-price" class="form-control mb-0" name="max_price" value="<?php echo esc_attr( $current_max_price ); ?>" data-max="<?php echo esc_attr( $max_price ); ?>" placeholder="<?php echo esc_attr__( 'Max price', 'woocommerce' ); ?>" />
                <label class="form-label" for="max-price">$ Max</label>
            </div>

            <?php echo wc_query_string_form_fields( null, array( 'min_price', 'max_price', 'paged' ), '', true ); ?>
            <div class="clear"></div>
        </div>

        <button type="submit" class="button btn btn-sm btn-primary mt-3"><?php echo esc_html__( 'Filter', 'woocommerce' ); ?></button>
    </div>
</form>

<?php do_action( 'woocommerce_widget_price_filter_end', $args ); ?>
