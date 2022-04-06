<?php

defined( 'ABSPATH' ) || exit;

/**
 * Widget products categories class.
 */
class MDB_Widget_Products_Discounted extends WC_Widget {

    public function __construct() {
        $this->widget_description = __( 'Show all discounted products', 'mdb_ecommerce' );
        $this->widget_id          = 'mdb_widget_products_discounted';
        $this->widget_name        = __( 'MDB - Products discounted', 'mdb_ecommerce' );
        $this->settings           = array(
            'title'         => array(
                'type'  => 'text',
                'std'   => __( 'Discounted products', 'mdb_ecommerce' ),
                'label' => __( 'Title', 'mdb_ecommerce' ),
            ),
            'max_quantity'         => array(
                'type'  => 'number',
                'std'   => __( '6', 'mdb_ecommerce' ),
                'label' => __( 'Show max.', 'mdb_ecommerce' ),
            )
        );

        parent::__construct();
    }

    public function widget( $args, $instance ) {

        if ( ! isset( $instance['title'] ) ) {
            $instance['title'] = __( 'Discounted products', 'mdb_ecommerce' );
        }

        if ( ! isset( $instance['max_quantity'] ) ) {
            $instance['max_quantity'] = 6;
        }

        $this->widget_start( $args, $instance );

        $query_args = array(
            'posts_per_page'    => 4,
            'no_found_rows'     => 1,
            'post_status'       => 'publish',
            'post_type'         => 'product',
            'meta_query'        => WC()->query->get_meta_query(),
            'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
        );
        $products = new WP_Query( $query_args );
        $product_count = 0;
        $query_count = 0;
        $max_quantity = $instance['max_quantity'];

        while ( $products->have_posts() ) { $products->the_post();

            global $product;

            $query_count++;
            if ( $query_count > $max_quantity ) {
                break;
            }

            if ( $product_count == 0 ) {
                echo '<div class="row gx-xl-5 justify-content-center">';
            }

            ?>

            <div class="col-lg-3 col-6 mb-4 mb-xl-0">
                <div>
                    <div class="bg-image ripple shadow-4 rounded-6 mb-4 overflow-hidden d-block" data-ripple-color="light">
                        <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="w-100 rounded" />
                        <a href="<?php the_permalink(); ?>">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100 p-3">
                                    <span class="badge badge-danger rounded-pill me-2">New</span>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.09)"></div>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 text-reset d-block">
                        <a href="<?php the_permalink(); ?>" class="text-reset">
                            <p class="fw-bold mb-2"><?php the_title(); ?></p>
                        </a>
                        <p class="text-muted mb-2"><?php echo str_replace( '<a ', '<a class="text-reset" ', wc_get_product_category_list( $product->get_id() ) ); ?></p>
                        <?php if ( wc_review_ratings_enabled() ) { ?>
                            <div class="star-rating mb-3" role="img">
                                <?php echo wc_get_star_rating_html( $product->get_average_rating(), $product->get_rating_count() ); ?>
                            </div>
                        <?php } ?>
                        <h5 class="mb-2"><?php echo $product->get_price_html(); ?></h5>
                    </div>
                </div>
            </div>

            <?php

            if ( $product_count == 3 ) {
                echo '</div>';
                $product_count = 0;
            } else {
                $product_count++;
            }
        }

        wp_reset_query();

        $this->widget_end( $args );
    }
}
