<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>






  <div class="col-3">
    <!-- Tab navs -->
    <div
      class="nav flex-column nav-tabs text-center"
      id="v-tabs-tab"
      aria-orientation="vertical"
    >


	<?php
	

	
	
	foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
	  
		
	
	?>
				<a 
        class="nav-link <?php echo zc_wc_get_account_menu_item_classes( $endpoint ); ?>"
        id="v-tabs-profile-tab"
        aria-controls="v-tabs-profile"
		<?php if($current = true){
			echo'aria-selected="true"';

		}else{
			echo'aria-selected="false"';

		}?>
		href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?>
	</a>
		<?php endforeach; ?>
    </div>
    <!-- Tab navs -->
  </div>


<?php do_action( 'woocommerce_after_account_navigation' ); ?>

<?php

