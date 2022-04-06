<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search d-flex input-group w-auto my-auto" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="d-flex">
    <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
    <input autocomplete="off"
           id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"
           type="search"
           class="form-control rounded me-1 search-field"
           placeholder="<?php echo esc_attr__( 'Search', 'woocommerce' ); ?>"
           value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit"
            role="button"
            class="btn btn-link btn-floating text-reset overflow-visible">
        <i class="fas fa-search"></i>
    </button>
    <input type="hidden" name="post_type" value="product" />
    </div>
</form>
