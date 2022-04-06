<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );

if ( $total <= 1 ) {
    return;
}
?>

<div class="col-lg-3 d-none d-lg-flex justify-content-center justify-content-lg-end ">
    <nav class="woocommerce-pagination" aria-label="...">
        <?php
        $links = paginate_links( array(
            'prev_next'          => false,
            'type'               => 'array'
        ) );

        if ( $links ) :

            echo '<ul class="page-numbers pagination pagination-circle mb-0">';

            if ( $prev_posts_link = get_previous_posts_link( __( 'Previous', 'mdb_theme' ) ) ) :
                echo '<li class="prev-list-item page-item">';
                echo str_replace('<a ', '<a class="page-link" ', $prev_posts_link);
                echo '</li>';
            endif;

            foreach ( $links as $link ) {

                $active = strpos( $link, 'current' ) !== false ? 'active' : '';
                $link = $active === 'active' ? str_replace('class="page-numbers current"', 'class="page-numbers current page-link"', $link) : str_replace('class="page-numbers"', 'class="page-numbers page-link"', $link);

                echo '<li class="page-item ' . $active . '">';
                echo $link;
                echo '</li>';
            }

            if ( $next_posts_link = get_next_posts_link( __( 'Next', 'mdb_theme' ) ) ) :
                echo '<li class="next-list-item page-item">';
                echo str_replace('<a ', '<a class="page-link" ', $next_posts_link);
                echo '</li>';
            endif;

            echo '</ul>';
        endif;
        ?>
    </nav>
</div>
