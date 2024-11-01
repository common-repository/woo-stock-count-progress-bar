<?php

class Stock_Counts_Settings {

    /* 
     * Bootstraps the class and hooks required actions & filters.
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_stock_counts_setting_tab', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_stock_counts_setting_tab', __CLASS__ . '::update_settings' );
    }
    
    
    /* Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['stock_counts_setting_tab'] = __( 'Stock counts settings', 'scfwc' );
        return $settings_tabs;
    }


    /* Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }


    /* Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }


    /* Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {
		//get all product categories
		// $categories=[0=>'Select Category'];
		// $args = array(
		// 	'taxonomy'   => "product_cat",
		// );
		// $product_categories = get_terms($args);
		// foreach($product_categories as $key=>$category){
		// 	$categories[$category->term_id]=$category->name;
		// }
		
        $settings = array(
            'section_title' => array(
                'name'     => __( 'Settings', 'scfwc' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'scfwc_section_title'
            ),
			'toggleStockViewShop' => array(
                'name' => __( 'Show/Hide stock counts in Shop Page', 'scfwc' ),
                'type' => 'checkbox',
                'desc' => __( 'Check the checkbox to enable or uncheck to disable stock counts', 'scfwc' ),
                'id'   => 'toggle_stock_shop'
            ),
            'toggleStockViewSingle' => array(
                'name' => __( 'Show/Hide stock counts in single Page', 'scfwc' ),
                'type' => 'checkbox',
                'desc' => __( 'Check the checkbox to enable or uncheck to disable stock counts', 'scfwc' ),
                'id'   => 'toggle_stock_single'
            ),
            'progressbarBgColor' => array(
                'name' => __( 'Background color', 'scfwc' ),
                'type' => 'color',
                'desc' => __( 'Change progress bar default background color', 'scfwc' ),
                'id'   => 'progressbar_bg_color',
                'default' => '#000000'
            ),
            'progressbarColor' => array(
                'name' => __( 'Foreground color', 'scfwc' ),
                'type' => 'color',
                'desc' => __( 'Change progress bar default foreground color', 'scfwc' ),
                'id'   => 'progressbar_fg_color',
                'default' => '#ff914d'
            ),
            'progressbarHeight' => array(
                'name' => __( 'Progress Bar Height', 'scfwc' ),
                'type' => 'number',
                'desc' => __( 'Change progress bar default height', 'scfwc' ),
                'id'   => 'progressbar_height',
                'default' => '10'
            ),
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'stock_counts_section_end'
            )
        );

        return apply_filters( 'wc_settings_tab_stock_counts', $settings );
    }

}

Stock_Counts_Settings::init();