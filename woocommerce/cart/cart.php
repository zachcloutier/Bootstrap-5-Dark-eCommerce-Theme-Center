<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<section>
    <div class="row gx-lg-5">
        <div class="col-lg-8 mb-4 mb-md-0">
            <section class="mb-5">
                <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <?php do_action( 'woocommerce_before_cart_table' ); ?>

                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            ?>
                    <!-- Single item -->
                    <div
                        class="row border-bottom mb-4 woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <div class="col-md-2 mb-4 mb-md-0">
                            <!-- Image -->
                            <div class="product-thumbnail bg-image ripple rounded-5 mb-4 overflow-hidden d-block"
                                data-ripple-color="light">
                                <?php
                                        $product_img = wp_get_attachment_url( $_product->get_image_id() );
                                        if($product_img){
                                            $product_img = $product_img;
                                        }else{
                                            $product_img = "/wp-content/uploads/woocommerce-placeholder.png";
                                        }

                                        ?>
                                <img src="<?php echo $product_img; ?>" class="w-100 rounded" />
                                <a href="<?php echo $product_permalink; ?>">
                                    <div class="mask" style="background-color:  hsla(0, 0%, 98.4%, 0.2)"></div>
                                </a>
                            </div>
                            <!-- Image -->
                        </div>

                        <div class="col-md-8 mb-4 mb-md-0">
                            <div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                <!-- Data -->
                                <p class="fw-bold">
                                    <?php
                                                if ( ! $product_permalink ) {
                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                } else {
                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="text-reset">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                }
                                            ?>
                                </p>
                                <?php do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key ); ?>
                            </div>
                            <?php

                                    // Meta data.
                                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                    // Backorder notification.
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                    }
                                    ?>
                            <p class="mb-4">
                                <?php
                                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="text-muted pe-3 border-end"
                                                aria-label="%s" data-product_id="%s" data-product_sku="%s"><small><i class="fas fa-trash me-2"></i>Remove</small></a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        );
                                        ?>
                                <a href="" class="text-muted ps-3"><small><i class="fas fa-heart me-2"></i>Move to wish
                                        list</small></a>
                            </p>
                        </div>

                        <div class="col-md-2 mb-4 mb-md-0">
                            <div class="product-quantity d-flex mb-4"
                                data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                <div class="form-outline mb-4">
                                    <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input(
                                                array(
                                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                                    'input_value'  => $cart_item['quantity'],
                                                    'max_value'    => $_product->get_max_purchase_quantity(),
                                                    'min_value'    => '0',
                                                    'product_name' => $_product->get_name(),
                                                ),
                                                $_product,
                                                false
                                            );
                                        }

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                        ?>
                                </div>
                            </div>

                            <!-- Price -->
                            <h5 class="product-subtotal mb-2"
                                data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                <?php
                                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                            ?>
                            </h5>
                            <!-- Price -->
                        </div>
                    </div>
                    <!-- Single item -->
                    <?php
                        }
                    }
                    ?>

                    <?php do_action( 'woocommerce_cart_contents' ); ?>

                    <div class="row actions px-2">

                        <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="col-md-8 coupon">
                            <div class="row">
                                <div class="col-7 col-md-8 form-outline">
                                    <input type="text" name="coupon_code" class="input-text form-control"
                                        id="coupon_code" value=""
                                        placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
                                    <label class="form-label"
                                        for="coupon_code"><?php esc_html_e( 'Coupon', 'woocommerce' ); ?></label>
                                </div>
                                <div class="col-5 col-md-4">
                                    <button type="submit" class="button" name="apply_coupon"
                                        value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                </div>
                                <?php do_action( 'woocommerce_cart_coupon' ); ?>


                                
                            </div>
                        </div>
                        <?php } ?>

                        <div class="pt-4 pt-md-0 col-md-4 text-right">
                            <button type="submit" class="button" name="update_cart"
                                value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                        </div>
                        <script>
                            (function () {
                                setTimeout(function () {
                                    document.querySelector('button[name="update_cart"]').disabled = false;
                                }, 2000);
                            })();
                        </script>
                        <?php do_action( 'woocommerce_cart_actions' ); ?>

                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </div>

                    <?php do_action( 'woocommerce_after_cart_contents' ); ?>

                    <?php do_action( 'woocommerce_after_cart_table' ); ?>
                </form>
            </section>

            <!-- Infromation -->
            <section class="">
                <?php 
                            $cartAllert = trim( get_theme_mod('cart_alert_head') );

                            if($cartAllert){
                        ?>

                <div class="text-center text-md-start mt-5">
                    <p class="text-primary">

                        <i class="fas fa-info-circle mr-1"></i>
                        <?php echo $cartAllert?>
                    </p>
                </div>
                <?php }?>

                <?php
                            $ShippingAlertHead = trim( get_theme_mod('shipping_alert_head') );
                            $ShippingAlertBody = trim( get_theme_mod('shipping_alert_body') );
                
                if($ShippingAlertHead || $ShippingAlertBody){
                ?>
                <div class="text-center text-md-start mt-5">
                    <h5 class="mb-4"><?php echo $ShippingAlertHead?></h5>

                    <p class="mb-0"><?php echo $ShippingAlertBody?></p>
                </div>
                <?php }?>
                <div class="text-center text-md-start mt-5">
                    <?php
                $titleCards = trim( get_theme_mod('title_cards') );
                $amazonPay = trim( get_theme_mod('amazon_pay_cards') );
                $americanExpress = trim( get_theme_mod('american_express_cards') );
                $applePay = trim( get_theme_mod('apple_pay_cards') );
                $discover = trim( get_theme_mod('discover_cards') );
                $googlePay = trim( get_theme_mod('google_pay_cards') );
                $mastercard = trim( get_theme_mod('mastercard_cards') );
                $payPal = trim( get_theme_mod('paypal_cards') );
                $samsungPay = trim( get_theme_mod('samsung_pay_cards') );
                $visa = trim( get_theme_mod('visa_cards') );
                


                
                
                ?>
                    <?php if($amazonPay || $americanExpress || $applePay || $discover || $googlePay || $mastercard || $payPal || $samsungPay || $visa){ ?>
                    <h5 class="mb-4"><?php echo $titleCards ?></h5>
                    <?php }?>


                    <!-- Amazon Pay -->
                    <?php if ( $amazonPay ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/amazon-pay.svg' ?>"
                        alt="amazon-pay" />
                    <?php }?>


                    <!-- American Express -->
                    <?php if ( $americanExpress ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/american-express.svg' ?>"
                        alt="american-express" />
                    <?php }?>


                    <!-- Apple Pay -->
                    <?php if ( $applePay ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/apple-pay.svg' ?>"
                        alt="apple-pay" />
                    <?php }?>


                    <!-- Discover -->
                    <?php if ( $discover ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/discover.svg' ?>"
                        alt="discover" />
                    <?php }?>


                    <!-- Google Pay -->
                    <?php if ( $googlePay ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/google-pay.svg' ?>"
                        alt="google-pay" />
                    <?php }?>


                    <!-- Mastercard -->
                    <?php if ( $mastercard ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/mastercard-alt.svg' ?>"
                        alt="mastercard" />
                    <?php }?>


                    <!-- PayPal -->
                    <?php if ( $payPal ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/paypal.svg' ?>" alt="paypal" />
                    <?php }?>


                    <!-- Samsung Pay -->
                    <?php if ( $samsungPay ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/samsung-pay.svg' ?>"
                        alt="samsung-pay" />
                    <?php }?>


                    <!-- Visa -->
                    <?php if ( $visa ) { ?>
                    <img class="mr-2" width="45px"
                        src="<?php echo get_template_directory_uri() . '/assets/logos/visa.svg' ?>" alt="Visa" />
                    <?php }?>
                </div>
            </section>
            <!-- Section: Details -->
        </div>

        <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

        <div class="col-lg-4 mb-4 mb-md-0">
            <section class="shadow-4 p-4 rounded-5 mb-4">
                <h5 class="mb-5">The total amount of</h5>
                <div class="cart-collaterals">
                    <?php
                    /**
                     * Cart collaterals hook.
                     *
                     * @hooked woocommerce_cross_sell_display
                     * @hooked woocommerce_cart_totals - 10
                     */
                    do_action( 'woocommerce_cart_collaterals' );
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>

<?php do_action( 'woocommerce_after_cart' ); ?>

<script>
    jQuery('body').on('updated_cart_totals', function () {
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
            new mdb.Input(formOutline).init();
        });
        setTimeout(function () {
            document.querySelector('button[name="update_cart"]').disabled = false;
        }, 2000);
    });
</script>