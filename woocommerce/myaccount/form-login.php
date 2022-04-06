<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

    <div class="u-column1 col-1">

        <?php endif; ?>

        <h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

        <form method="post" class="woocommerce-form woocommerce-form-login login">

            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <div class="form-outline mb-4">
                <input type="text" class="form-control" name="username" id="username" autocomplete="username"
                    value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
                <label for="username"
                    class="form-label"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required" title="required">*</span></label>
            </div>
            <div class="form-outline mb-4">
                <input class="form-control" type="password" name="password" id="password"
                    autocomplete="current-password" />
                <label for="password" class="form-label"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" title="required">*</span></label>
            </div>

            <?php do_action( 'woocommerce_login_form' ); ?>


            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme"
                            value="forever"  checked />
                        <label class="form-check-label" for="rememberme"><span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span></label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                </div>
            </div>
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>


            <button type="submit" class="btn btn-primary btn-block"  name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>


            <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>

        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    </div>

    <div class="u-column2 col-2">

        <h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

        <form method="post" class="woocommerce-form woocommerce-form-register register"
            <?php do_action( 'woocommerce_register_form_tag' ); ?>>

            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

            <div  class="form-outline mb-4">
                <input type="text" class="form-control" name="username"
                    id="reg_username" autocomplete="username"
                    value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
                <label class="form-label" for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required" title="required">*</span></label>
            </div>

            <?php endif; ?>

            <div  class="form-outline mb-4">
                <input type="email" class="form-control" name="email"
                    id="reg_email" autocomplete="email"
                    value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
                <label class="form-label" for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" title="required">*</span></label>
            </div>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

            <div  class="form-outline mb-4">
                <input type="password" class="form-control" name="password"
                    id="reg_password" autocomplete="new-password" />
                <label class="form-label" for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" title="required">*</span></label>
            </div>

            <?php else : ?>

            <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?>
            </p>

            <?php endif; ?>

            <?php do_action( 'woocommerce_register_form' ); ?>

            <p class="woocommerce-form-row form-row">
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit"
                class="btn btn-primary btn-block"
                    name="register"
                    value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

    </div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>