<?php

get_header();

get_template_part('template-parts/header-intro');

?>

<main class="mb-6">
    <div class="container">

    <?php

        if ( have_posts() ) {

            while ( have_posts() ) {

                the_post();

                if ( has_post_thumbnail() && ! post_password_required() ) {

                    $featured_media_inner_classes = '';

                    // Make the featured media thinner on archive pages.
                    if ( ! is_singular() ) {
                        $featured_media_inner_classes .= ' medium';
                    }
                    ?>

                    <?php
                    the_post_thumbnail();
                }

                the_content();

            }
        }
    ?>
    </div>
</main>

<?php

get_footer();
