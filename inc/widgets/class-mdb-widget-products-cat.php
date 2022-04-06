<?php

defined( 'ABSPATH' ) || exit;

/**
 * Widget products categories class.
 */
class MDB_Widget_Products_Cat extends WC_Widget {

    public function __construct() {
        $this->widget_description = __( 'Show all products categories', 'mdb_ecommerce' );
        $this->widget_id          = 'mdb_widget_products_cat';
        $this->widget_name        = __( 'MDB - Products categories', 'mdb_ecommerce' );
        $this->settings           = array(
            'title'         => array(
                'type'  => 'text',
                'std'   => __( 'Categories', 'mdb_ecommerce' ),
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
            $instance['title'] = __( 'Categories', 'mdb_ecommerce' );
        }

        if ( ! isset( $instance['max_quantity'] ) ) {
            $instance['max_quantity'] = 6;
        }

        $this->widget_start( $args, $instance );

        $cat_count = 0;
        $query_count = 0;
        $max_quantity = $instance['max_quantity'];
        $product_categories = get_terms( 'product_cat', array() );

        if( ! empty( $product_categories ) ) {

            foreach ( $product_categories as $key => $category ) {

                $query_count++;
                if ( $query_count > $max_quantity ) {
                    break;
                }

                $term_id = $category->term_id;
                $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );

                if ( $cat_count == 0 ) {
                    echo '<div class="row mb-4">';
                }

                ?>

                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple shadow-4 rounded-6">
                        <img src="<?php echo $image; ?>" class="w-100 rounded" />
                        <a href="<?php echo get_term_link($category); ?>">
                            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3)">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5 class="text-white m-4"><?php echo $category->name; ?></h5>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.12)"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php

                if ( $cat_count == 2 ) {
                    echo '</div>';
                    $cat_count = 0;
                } else {
                    $cat_count++;
                }
            }
        }

        $this->widget_end( $args );
    }
}
