<?php

get_header();

get_template_part('template-parts/header-intro');

?>

<main>
    <div class="container text-center">

        <div class="section-inner thin error404-content my-5">

            <h1 class="entry-title"><?php _e( 'Page Not Found', 'mdb_theme' ); ?></h1>

            <div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'mdb_theme' ); ?></p></div>

            <?php
            get_search_form(
                array(
                    'label' => __( '404 not found', 'mdb_theme' ),
                )
            );
            ?>

        </div><!-- .section-inner -->

    </div>

</main><!-- #site-content -->

<?php get_footer();
