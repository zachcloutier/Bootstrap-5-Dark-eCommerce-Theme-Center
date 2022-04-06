<header class="mb-7">

    <?php require_once 'header-part.php'; ?>

    <?php
        $mdb_homepage_image = get_theme_mod( 'mdb_homepage_image' ) ? get_theme_mod( 'mdb_homepage_image' ) : 'https://mdbootstrap.com/img/new/slides/310.jpg';
        $mdb_homepage_title = get_theme_mod( 'mdb_homepage_title' ) ? get_theme_mod( 'mdb_homepage_title' ) : 'Example title';
        $mdb_homepage_subtitle = get_theme_mod( 'mdb_homepage_subtitle' ) ? get_theme_mod( 'mdb_homepage_subtitle' ) : 'Example subtitle';
    ?>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-4" style="
      background-image: url(<?= $mdb_homepage_image; ?>);
      height: 500px;
    ">
        <div class="mask text-white" style="background-color: hsla(0, 0%, 0%, 0.6)">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white">
                    <?php 
                    
                    if($mdb_homepage_title){
                        ?>
                        <h1 class="mb-3"><?= $mdb_homepage_title; ?></h1>
                    <?php
                    }
                    if($$mdb_homepage_subtitle){
                        ?>
                        <h4 class="mb-4"><?= $mdb_homepage_subtitle; ?></h4>
                    <?php
                    }

                    
                    ?>
                    
                    <?php if ( get_theme_mod( 'mdb_homepage_show_button' ) ) { ?>
                        <a class="btn btn-outline-light btn-lg mb-3" href="<?= get_theme_mod( 'mdb_homepage_button_url' ); ?>" role="button">
                            <?= get_theme_mod( 'mdb_homepage_button' ); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->

</header>
