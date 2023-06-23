<!--Footer-->
<footer class="text-center text-lg-start text-muted bg-dark" style="background-color: hsl(213, 44%, 97%)">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom container">
        <?php
        $facebook_link = trim( get_theme_mod('mdb_facebook_link') );
        $tiktok_link = trim( get_theme_mod('mdb_tiktok_link') );
        $twitter_link = trim( get_theme_mod('mdb_twitter_link') );
        $pinterest_link = trim( get_theme_mod('mdb_pinterest_link') );
        $youtube_link = trim( get_theme_mod('mdb_youtube_link') );
        $instagram_link = trim( get_theme_mod('mdb_instagram_link') );
        $linkedin_link = trim( get_theme_mod('mdb_linkedin_link') );

        if ( $facebook_link || $tiktok_link|| $twitter_link || $pinterest_link || $youtube_link || $instagram_link || $linkedin_link ) {
            ?>
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>

            <div class="text-center">
                <?php if ( $facebook_link ) { ?>

                    <!-- Facebook -->
                    <a class="mx-3 text-reset"
                       href="<?php echo $facebook_link; ?>"
                    ><i class="fab fa-facebook-f"></i></a>
                <?php } ?>
                <?php if ( $twitter_link ) { ?>
                    <!-- Twitter -->
                    <a class="mx-3 text-reset"
                       href="<?php echo $twitter_link; ?>"
                    ><i class="fab fa-twitter"></i></a>
                <?php } ?>
                <?php if ( $pinterest_link ) { ?>
                    <!-- Pinterest -->
                    <a class="mx-3 text-reset"
                       href="<?php echo $pinterest_link; ?>"
                    ><i class="fab fa-pinterest"></i></a>
                <?php } ?>
                <?php if ( $youtube_link ) { ?>
                    <!-- Youtube -->
                    <a class="mx-3 text-reset"
                       href="<?php echo $youtube_link; ?>"
                    ><i class="fab fa-youtube"></i></a>
                <?php } ?>
                <?php if ( $instagram_link ) { ?>
                    <!-- Instagram -->
                    <a class="mx-3 text-reset"
                       href="<?php echo $instagram_link; ?>"
                    ><i class="fab fa-instagram"></i></a>
                <?php } ?>
                <?php if ( $linkedin_link ) { ?>
                    <!-- Linkedin -->
                    <a class="mx-3 text-reset"
                       href="<?php echo $linkedin_link; ?>"
                    ><i class="fab fa-linkedin"></i></a>
                <?php } ?>
                <?php if ( $tiktok_link ) { ?>

<!-- TikTok -->
<a class="mx-3 text-reset"
   href="<?php echo $tiktok_link; ?>"
><i class="fab fa-tiktok"></i></a>
<?php } ?>
            </div>
        <?php } ?>

    </section>



        <!-- Section: Links  -->
        <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content 1 -->
                    <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                <?php endif; ?>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Content 2 -->
                    <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                <?php endif; ?>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Content 3 -->
                    <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                <?php endif; ?>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Content 4 -->
                    <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                <?php endif; ?>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © <?php echo date( 'Y' ) . ' '; ?> Copyright:
        <a class="text-reset fw-bold" href="<?php echo get_home_url(); ?>"><?php echo ' ' . bloginfo( 'name' ); ?></a>
    </div>
    <!-- Copyright -->
</footer>
<!--Footer-->

<?php wp_footer(); ?>

</body>

</html>
