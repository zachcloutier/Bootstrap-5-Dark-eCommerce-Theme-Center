<header class="mb-7">

    <?php require_once 'header-part.php'; ?>

    <?php if ( is_product() ) { 
        
        $alertProduct= trim( get_theme_mod('alert_product_body') );

        if ( $alertProduct ) { ?>
        
        <!-- Jumbotron -->
        <div class="p-5 text-center alert-warning" role="alert" data-mdb-color="warning">
            <h1 class="mb-0 h3"><i class="fa-regular fa-grid-2-plus"></i> <?php echo $alertProduct; ?></h1>
        </div>
        <!-- Jumbotron -->
        <?php
        }
        ?>
    <?php } else if ( is_shop() ) { ?>
        <!-- Jumbotron -->
        <div class="p-5 text-center bg-dark">
            <h1 class="mb-0 h3"><?php echo __( 'Shop', 'mdb_theme' ); ?></h1>
        </div>
        <!-- Jumbotron -->
    <?php } else { ?>
        <!-- Jumbotron -->
        <div class="p-5 text-center bg-dark">
            <h1 class="mb-0 h3">
                <?php
                    if ( is_search() ) {
                        echo __( 'Search:', 'mdb_theme') . ' ' . $_GET['s'];
                    } else {
                        the_title();
                    }
                ?>
            </h1>
        </div>
        <!-- Jumbotron -->
    <?php } ?>

</header>
