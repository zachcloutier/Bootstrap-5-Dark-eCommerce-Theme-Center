<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>

<style>
    .woocommerce form .form-row label {
        line-height: 1.6;
    }
</style>

    <?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

        <h5 class="mb-4"><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h5>

    <?php else : ?>

        <h5 class="mb-4"><?php esc_html_e( 'Billing details', 'woocommerce' ); ?></h5>

    <?php endif; ?>

    <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

    <?php $fields = $checkout->get_checkout_fields( 'billing' ); ?>

        <div class="row">
            <div class="col">
                <?php woocommerce_form_field( 'billing_first_name', $fields['billing_first_name'], $checkout->get_value( 'billing_first_name' ) ); ?>
            </div>
            <div class="col">
                <?php woocommerce_form_field( 'billing_last_name', $fields['billing_last_name'], $checkout->get_value( 'billing_last_name' ) ); ?>
            </div>
        </div>

        <!-- Email address -->
        <?php woocommerce_form_field( 'billing_email', $fields['billing_email'], $checkout->get_value( 'billing_email' ) ); ?>

        <!-- Company name -->
        <?php woocommerce_form_field( 'billing_company', $fields['billing_company'], $checkout->get_value( 'billing_company' ) ); ?>

        <!-- Country -->
        <div class="select-outline position-relative w-100">
            <?php woocommerce_form_field( 'billing_country', $fields['billing_country'], $checkout->get_value( 'billing_country' ) ); ?>
        </div>

        <!-- Address Part 1 -->
        <?php woocommerce_form_field( 'billing_address_1', $fields['billing_address_1'], $checkout->get_value( 'billing_address_1' ) ); ?>

        <!-- Address Part 2 -->
        <?php woocommerce_form_field( 'billing_address_2', $fields['billing_address_2'], $checkout->get_value( 'billing_address_2' ) ); ?>

        <!-- Postcode / ZIP -->
        <?php woocommerce_form_field( 'billing_postcode', $fields['billing_postcode'], $checkout->get_value( 'billing_postcode' ) ); ?>

        <!-- Town / City -->
        <?php woocommerce_form_field( 'billing_city', $fields['billing_city'], $checkout->get_value( 'billing_city' ) ); ?>

      <!-- State -->
      <div class="select-outline position-relative w-100">
            <?php woocommerce_form_field( 'billing_state', $fields['billing_state'], $checkout->get_value( 'billing_state' ) ); ?>
            <br>
        </div>

        <!-- Phone -->
        <?php woocommerce_form_field( 'billing_phone', $fields['billing_phone'], $checkout->get_value( 'billing_phone' ) ); ?>

        <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>

        <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
            <div class="woocommerce-account-fields">
                <?php if ( ! $checkout->is_registration_required() ) : ?>

                    <div class="form-check d-flex justify-content-center my-2">
                        <input type="checkbox"
                               class="form-check-input mr-2 filled-in"
                               id="createaccount"
                               name="createaccount"
                               value="1"
                            <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?>>
                        <label class="form-check-label" for="createaccount"><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></label>
                    </div>

                <?php endif; ?>

                <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

                <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

                    <div class="create-account">
                        <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                            <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                        <?php endforeach; ?>
                        <div class="clear"></div>
                    </div>

                <?php endif; ?>

                <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
            </div>
        <?php endif; ?>
