<?php
function scfwc_scripts_register() {

  wp_enqueue_style( 'scfwc_custom_css', plugins_url('scripts/wpbs-style.css', __FILE__) );
  wp_enqueue_script( 'scfwc_jqmeter', plugins_url('scripts/jqmeter.min.js', __FILE__), array('jquery'), null , true );
  wp_enqueue_script( 'scfwc_custom_script', plugins_url('scripts/custom.js', __FILE__), array('jquery'), null, true );
  //localize stock counts settings options to custom.js
  $progessbar_bg_color = get_option('progressbar_bg_color');
  $progessbar_fg_color = get_option('progressbar_fg_color');
  $progressbar_height = get_option('progressbar_height');
  wp_localize_script( 'scfwc_custom_script', 'progressbarOptions', 
    array( 
    'progressbar_bg_color' => $progessbar_bg_color,
    'progessbar_fg_color'=> $progessbar_fg_color,
    'progressbar_height'=>$progressbar_height 
    ) );

}
add_action('wp_enqueue_scripts','scfwc_scripts_register');