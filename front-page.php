<?php

get_header();

get_template_part('template-parts/header-full');

?>

<!--Main layout-->
<main class="mb-6">
    <div class="container">
        <?php if ( is_active_sidebar( 'homepage-widget' ) ) : ?>
            <?php dynamic_sidebar( 'homepage-widget' ); ?>
        <?php endif; ?>
    </div>
</main>
<!--Main layout-->

<?php

get_footer();
