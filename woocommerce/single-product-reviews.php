<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
    return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
    <p class="woocommerce-Reviews-title my-4">
        <strong>
        <?php
        $count = $product->get_review_count();
        if ( $count && wc_review_ratings_enabled() ) {
            /* translators: 1: reviews count 2: product name */
            $reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<em>' . get_the_title() . '</em>' );
            echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
        } else {
            esc_html_e( 'Reviews', 'woocommerce' );
        }
        ?>
        </strong>
    </p>
    <div class="row">
        <div class="col-md-7 mb-4">
            <div id="comments">
                <?php if ( have_comments() ) : ?>
                    <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
                    <?php
                    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                        echo '<nav class="woocommerce-pagination">';
                        paginate_comments_links(
                            apply_filters(
                                'woocommerce_comment_pagination_args',
                                array(
                                    'prev_text' => '<i class="fas fa-angle-double-left"></i>&nbsp',
                                    'next_text' => '&nbsp<i class="fas fa-angle-double-right"></i>',
                                    'type'      => 'plain',
                                )
                            )
                        );
                        echo '</nav>';
                    endif;
                    ?>
                <?php else : ?>
                    <p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-5 mb-4">
        <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
            <div id="review_form_wrapper">
                <div id="review_form">
                    <?php
                    $commenter = wp_get_current_commenter();
                    $comment_form = array(
                        'submit_button' => '<button type="submit" class="btn btn-primary mb-4">' . __( 'Submit', 'mdb_theme' ) . '</button>',
                        'logged_in_as'        => '',
                        'comment_notes_after' => '',
                        'title_reply'         => '',
                        'title_reply_to'      => '',
                        'title_reply_before'  => '',
                        'title_reply_after'   => '',
                    );
                    ?>

                    <p><?php _e( 'Rate this product', 'mdb_theme' ); ?></p>

                    <?php

                    $name_email_required = (bool) get_option( 'require_name_email', 1 );
                    $fields = array(
                        'author' => array(
                            'label'    => __( 'Name', 'woocommerce' ),
                            'type'     => 'text',
                            'value'    => $commenter['comment_author'],
                            'required' => $name_email_required,
                        ),
                        'email'  => array(
                            'label'    => __( 'Email', 'woocommerce' ),
                            'type'     => 'email',
                            'value'    => $commenter['comment_author_email'],
                            'required' => $name_email_required,
                        ),
                    );

                    $comment_form['fields'] = array();

                    foreach ( $fields as $key => $field ) {
                        $field_html = '<div class="form-outline mb-4 comment-form-' . esc_attr( $key ) . '">';
                        $field_html .= '<input class="form-control" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' />';
                        $field_html .= '<label class="form-label" for="' . esc_attr( $key ) . '">' . ( $field['required'] ? '<span class="required">*</span>&nbsp;' : '' ) . esc_html( $field['label'] );
                        $field_html .= '</div>';
                        $comment_form['fields'][ $key ] = $field_html;
                    }

                    $account_page_url = wc_get_page_permalink( 'myaccount' );
                    if ( $account_page_url ) {
                        /* translators: %s opening and closing link tags respectively */
                        $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
                    }

                    if ( wc_review_ratings_enabled() ) {
                        $comment_form['comment_field'] = '<div class="comment-form-rating">
                        <select name="rating" id="rating" hidden required>
                            <option value="0" selected>' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
                            <option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
                            <option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
                            <option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
                            <option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
                            <option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
                        </select></div>';
                    }

                    $comment_form['comment_field'] .='<div class="form-outline mb-4">
                        <textarea id="comment" name="comment" rows="4" class="form-control" required></textarea>
                        <label for="comment" class="form-label"><span class="required">*</span>&nbsp;' . esc_html__( 'Your review', 'woocommerce' ) . '</label>
                    </div>';

                    comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                    ?>
                </div>
            </div>
        <?php else : ?>
            <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
        <?php endif; ?>

        </div>

        <div class="clear"></div>
    </div>
</div>
