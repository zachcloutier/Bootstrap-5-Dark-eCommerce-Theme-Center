
<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$product_list_template = isset( $_COOKIE['shop_list_template'] ) ? htmlspecialchars( $_COOKIE['shop_list_template'] ) : '1';

?>

<div class="col-4 col-lg-3 text-center text-lg-start">
    <button class="btn btn-link btn-floating text-reset btn-lg set-shop-template <?= $product_list_template == '2' ? 'active' : ''; ?>" data-shop-template="2">
        <i class="fas fa-th-list fa-lg"></i>
    </button>
    <button class="btn btn-link btn-floating text-reset btn-lg set-shop-template <?= $product_list_template == '2' ? '' : 'active'; ?>" data-shop-template="1">
        <i class="fas fa-th-large fa-lg"></i>
    </button>
</div>

<div class="col-8 col-lg-6 d-flex justify-content-center">
    <form class="woocommerce-ordering" method="get">
        <select name="orderby" class="orderby select" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
            <?php endforeach; ?>
        </select>
        <label class="form-label select-label"><?php echo __( 'Sort', 'mdb_theme' ); ?></label>
        <input type="hidden" name="paged" value="1" />
        <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
    </form>
</div>
