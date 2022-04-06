<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <section class="">
        <div class="row gx-lg-5">
            <div class="col-lg-8 mb-4 mb-md-0">

            <?php if ( $checkout->get_checkout_fields() ) : ?>

                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                <section class="">

                    <?php do_action( 'woocommerce_checkout_billing' ); ?>

                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>

                    <div class="woocommerce-additional-fields">
                        <?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

                        <?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

                            <?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

                                <h5><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></h5>

                            <?php endif; ?>

                            <div class="woocommerce-additional-fields__field-wrapper">
                                <?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
                                    <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>

                        <?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
                    </div>

                </section>

                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

            <?php endif; ?>
            </div>

            <div class="col-lg-4 mb-4 mb-md-0">
                <section class="shadow-4 p-4 rounded-5 mb-4">
                    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                    <h5 class="mb-5"><?php esc_html_e( 'The total amount of', 'woocommerce' ); ?></h5>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>

                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                <!-- Card tags are closed in 'woocommerce_checkout_order_review' action - review-order.php -->
            </div>
        </div>
    </section>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
