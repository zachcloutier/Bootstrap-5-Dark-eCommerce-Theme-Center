<?php

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 40 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 1 );

add_filter( 'woocommerce_checkout_fields' , 'checkout_fields_settings' );

function checkout_fields_settings( $fields ) {

    $fields['billing']["billing_first_name"] = array(
        'label'       => _x('First name', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_last_name"] = array(
        'label'       => _x('Last name', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_company"] = array(
        'label'       => _x('Company name', 'woocommerce'),
        'required'    => false,
        'class'       => array('w-100', 'form-outline', 'mb-3'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_address_1"] = array(
        'label'       => _x( 'Address', 'woocommerce' ),
        'placeholder' => _x('House number and street name', 'placeholder', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'my-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_address_2"] = array(
        'label'       => _x( 'Address', 'woocommerce' ),
        'placeholder' => _x('Apartment, suite, unit etc. (optional)', 'placeholder', 'woocommerce'),
        'required'    => false,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields["billing"]["billing_postcode"] = array(
        'label'       => _x('Postcode / ZIP', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_city"] = array(
        'label'       => _x('Town / City', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_phone"] = array(
        'label'       => _x('Phone', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['billing']["billing_email"] = array(
        'label'       => _x('Email address', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields["account"]["account_username"] = array(
        'label'       => __('Account username', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields["account"]["account_password"] = array(
        'label'       => __('Account password', 'woocommerce'),
        'type'        => 'password',
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['shipping']["shipping_first_name"] = array(
        'label'       => _x('First name', 'woocommerce'),
        'required'    => true,
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['shipping']["shipping_last_name"] = array(
        'label'       => _x('Last name', 'woocommerce', 'mb-4'),
        'required'    => true,
        'class'       => array('form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['shipping']["shipping_company"] = array(
        'label'       => _x('Company name', 'woocommerce'),
        'class'       => array('w-100', 'form-outline', 'mb-3'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['shipping']["shipping_address_1"] = array(
        'label'       => _x( 'Address', 'woocommerce' ),
        'placeholder' => _x('House number and street name', 'placeholder', 'woocommerce'),
        'class'       => array('w-100', 'form-outline', 'my-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['shipping']["shipping_address_2"] = array(
        'label'       => _x( 'Address', 'woocommerce' ),
        'placeholder' => _x('Apartment, suite, unit etc. (optional)', 'placeholder', 'woocommerce'),
        'class'       => array('w-100', 'form-outline', 'mb-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields["shipping"]["shipping_postcode"] = array(
        'label'       => _x('Postcode / ZIP', 'woocommerce'),
        'class'       => array('w-100', 'form-outline', 'my-4'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['shipping']["shipping_city"] = array(
        'label'       => _x('Town / City', 'woocommerce'),
        'class'       => array('w-100', 'form-outline', 'mb-3'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'clear'       => true
    );

    $fields['order']['order_comments']  = array(
        'type' => 'textarea',
        'class' => array('notes', 'form-outline'),
        'input_class' => array('form-control'),
        'label_class' => array('form-label'),
        'label' => __('Order Notes', 'woocommerce'),
        'placeholder' => _x('Notes about your order, e.g. special notes for delivery.', 'placeholder', 'woocommerce')
    );

return $fields;
}

add_filter( 'woocommerce_get_price_html', 'mdb_customize_price_html', 100, 2 );

function mdb_customize_price_html( $price, $product ){

    $price = preg_replace( '/<ins(.*?)>(.*?)<\/ins>/', '<span class="align-middle">$2</span>', $price );
    $price = preg_replace( '/<del(.*?)>(.*?)<\/del>/', '<s class="text-muted me-2 small align-middle">$2</s>', $price );
    $price = preg_replace( '/<bdi(.*?)>(.*?)<\/bdi>/', '$2', $price );

    return $price;
}

function modify_checkout_input_fields( $field, $key, $args, $value ) {

    $field = preg_replace( '/<span class="woocommerce-input-wrapper">(.*)<\/span>/' , '$1', $field );

    if ( $key != 'shipping_country' && $key != 'shipping_state' && $key != 'billing_country'  && $key != 'billing_state' ) {
        preg_match( "/<label (.*?)>(.*?)<\/label>/", $field, $match );
        $field = preg_replace( '/<label (.*?)>(.*?)<\/label>/', '', $field );
        $field = preg_replace( '/<\/p>/', '<label ' . $match[1] . '>' . $match[2] . '</label></p>', $field );
    }

    if ( $key == 'order_comments' ) {
        $field .= '<div class="form-text">';
        $field .= __('Notes about your order, e.g. special notes for delivery.', 'woocommerce');
        $field .= '</div>';
    }

    return $field;
}

add_filter( 'woocommerce_form_field', 'modify_checkout_input_fields', 10, 4 );
