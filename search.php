<?php

get_header();

get_template_part( 'template-parts/header-intro' );

?>

    <main class="mt-5 mb-4">
        <div class="container">
            <!--Section: Posts-->
            <section>
                <!-- Post -->
                <div class="row">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-ripple-color="light">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid w-100 rounded" />
                                <a href="<?php the_permalink(); ?>">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 mb-4">
                            <h5><?php the_title(); ?></h5>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    <?php endwhile; else: ?>
                        <h3>No posts found</h3>
                    <?php endif; ?>
                </div>
            </section>
            <!--Section: Posts-->
        </div>
    </main>

<?php

get_footer();
