<?php
/**
 * Show stock counts on single product page
 */
function scfwc_show_stock_single_product() {
	$admin_enaled = get_option( 'toggle_stock_single' );
	if ( $admin_enaled == 'no' ) {
		return;
	}

	global $product;
	global $post;
	$manage_stock = get_post_meta( $post->ID, '_manage_stock', true );

	if ( is_product() && $product->is_type( 'simple' ) && $manage_stock == 'yes' ) {

		$stock           = get_post_meta( $post->ID, '_stock', true );
		$scfwcSale       = $product->get_total_sales();
		$scfwcTotalStock = intval( $stock ) + intval( $scfwcSale );
		// require stock counts view file
		require_once plugin_dir_path( __DIR__ ) . 'public/stock-view.php';
	}

}
add_action( 'woocommerce_before_add_to_cart_form', 'scfwc_show_stock_single_product', 10 );

/**
 * Show stock counts on shop page
 */
function scfwc_show_stock_shop_page() {
	// disable stock counts on shop page
	$admin_enaled = get_option( 'toggle_stock_shop' );
	if ( $admin_enaled == 'no' ) {
		return;
	}

	global $product;
	global $post;
	$manage_stock = get_post_meta( $post->ID, '_manage_stock', true );
	if ( ( is_shop() || is_product_category() ) && $product->is_type( 'simple' ) && $manage_stock == 'yes' ) {

		$stock           = get_post_meta( $post->ID, '_stock', true );
		$scfwcSale       = $product->get_total_sales();
		$scfwcTotalStock = intval( $stock ) + intval( $scfwcSale );
		// require stock counts view file
		require_once plugin_dir_path( __DIR__ ) . 'public/stock-view.php';
	}

}

add_action( 'woocommerce_shop_loop_item_title', 'scfwc_show_stock_shop_page', 10 );
return;
// phpcs:ignore

/**
 * Show stock counts on single variation product page
 */
// function scfwc_show_stock_single_variation_product() {

// 	$admin_enaled = get_option( 'toggle_stock_single' );

// 	if ( $admin_enaled == 'no' ) {
// 		return;
// 	}

// 	global $product,  $post;
// 	$manage_stock    = get_post_meta( $post->ID, '_manage_stock', true );
// 	$stock           = get_post_meta( $post->ID, '_stock', true );
// 	$scfwcSale       = $product->get_total_sales();
// 	$scfwcTotalStock = intval( $stock ) + intval( $scfwcSale );

// 	if ( $product->get_type() == 'variable' ) {
// 		foreach ( $product->get_available_variations() as $key ) {
// 			// print_r($key);
// 			$variation    = wc_get_product( $key['variation_id'] );
// 			$stock        = $variation->get_availability();
// 			$stock_string = $stock['availability'] ? $stock['availability'] : __( 'In stock', 'woocommerce' );
// 			print_r( $stock );
// 			$attr_string = array();
// 			foreach ( $key['attributes'] as $attr_name => $attr_value ) {
// 				$attr_string[] = $attr_value;
// 				// echo $attr_name.'<br/>';
// 				// echo $attr_value.'<br/>';
// 			}
// 			// echo '<br/>' . implode( ', ', $attr_string ) . ': ' . $stock_string;

// 		}
// 	}

// 	$data = array(
// 		'stock'        => $stock,
// 		'manage_stock' => $manage_stock,
// 	);

// 	if ( is_product() && $product->is_type( 'variable' ) ) {
		?>
	<script type="text/javascript">
// 			(function($){
// 				var myData = <?php //echo json_encode( $data ); ?>;
// 				//console.log(myData);
// 				$('form.variations_form').on('show_variation', function(event, data){
// 					//console.log( data);      // The variation Id  <===  <===
// 				});
// 				// $( ".variations_form" ).on( "woocommerce_variation_select_change", function (e) {
// 				//     console.log(e);
// 				// } );
// 			})(jQuery);
// 		</script>
	
		<?php
// 			require_once plugin_dir_path( __DIR__ ) . 'public/variable-stock-view.php';
// 	}
// }
// add_action( 'woocommerce_before_single_variation', 'scfwc_show_stock_single_variation_product', 10 );

