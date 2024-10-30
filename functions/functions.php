<?php
define('DIVIENHANCER_VERSION', '5.0.4');


function divienhancer_register_scripts(){
  $bingKey = get_option('divienhancer_bing_key');

  //only front
  wp_register_style( 'divienhancer-hover-effects', plugin_dir_url( __FILE__ ) . 'styles/hover-effects.css', '', DIVIENHANCER_VERSION);
  wp_register_style( 'divienhancer-nifty', plugin_dir_url( __FILE__ ) . 'styles/nifty.css', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-nifty', plugin_dir_url( __FILE__ ) . 'scripts/nifty.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-modal-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-modal-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-sticky', plugin_dir_url( __FILE__ ) . 'scripts/jquery.sticky.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-sticky-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-sticky-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-interactive-bg', plugin_dir_url( __FILE__ ) . 'scripts/jquery.interactive_bg.min.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-interactive-bg-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-interactive-bg-trigger.js', '', DIVIENHANCER_VERSION);



  wp_register_script( 'divienhancer-modernizr', plugin_dir_url( __FILE__ ) . 'scripts/modernizr.custom.js', '', DIVIENHANCER_VERSION );
  wp_register_script( 'divienhancer-flipbox-flip', plugin_dir_url( __FILE__ ) . 'scripts/jquery.flip.min.js', '', DIVIENHANCER_VERSION  );
  wp_register_script( 'divienhancer-flipbox-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-flipbox-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-timeline-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-timeline-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_style( 'divienhancer-twentytwenty', plugin_dir_url( __FILE__ ) . 'styles/twentytwenty.css', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-twentytwenty', plugin_dir_url( __FILE__ ) . 'scripts/jquery.twentytwenty.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-imagecomparison-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-comparison-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-ihover-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-ihover-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-breadcrumb-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-breadcrumb-trigger.js', '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-bingmap', 'https://www.bing.com/api/maps/mapcontrol?key='.$bingKey, '', DIVIENHANCER_VERSION);
  wp_register_script( 'divienhancer-bingmap-trigger', plugin_dir_url( __FILE__ ) . 'scripts/de-bingmap-trigger.js', '', DIVIENHANCER_VERSION);
 
}
add_action('wp_enqueue_scripts', 'divienhancer_register_scripts', 1000);
add_action('admin_enqueue_scripts', 'divienhancer_register_scripts', 1000);

function divienhancer_builder_scripts(){
  if(function_exists('et_fb_is_enabled')){
    if(et_fb_is_enabled()){
      
      wp_enqueue_script( 'divienhancer-modernizr');
      wp_enqueue_script( 'divienhancer-flipbox-flip');
      wp_enqueue_script( 'divienhancer-flipbox-trigger');
      wp_enqueue_script( 'divienhancer-timeline-trigger');
      wp_enqueue_style( 'divienhancer-twentytwenty');
      wp_enqueue_script( 'divienhancer-twentytwenty');
      wp_enqueue_script( 'divienhancer-imagecomparison-trigger');
      wp_enqueue_script( 'divienhancer-ihover-trigger');
      wp_enqueue_script( 'divienhancer-breadcrumb-trigger');
      wp_enqueue_script( 'divienhancer-bingmap');
      wp_enqueue_script( 'divienhancer-bingmap-trigger');

    }
  }
}
add_action('wp_enqueue_scripts', 'divienhancer_builder_scripts', 1000);
add_action('admin_enqueue_scripts', 'divienhancer_builder_scripts', 1000);


function divienhancer_scripts_and_styles(){

  // Carousels
  if(null !== get_option('divienhancer-enable-carousel') || null !== get_option('divienhancer-enable-shop')) {
    if(get_option('divienhancer-enable-carousel') != 'no' || get_option('divienhancer-enable-shop') != 'no' ){

      wp_enqueue_style( 'divienhancer-slick-css',  plugin_dir_url( __FILE__ ) . 'styles/slick.css' );
    	wp_enqueue_style( 'divienhancer-slick-theme',  plugin_dir_url( __FILE__ ) . 'styles/slick-theme.css' );
      wp_enqueue_script( 'divienhancer-slick-js', plugin_dir_url( __FILE__ ) . 'scripts/slick.min.js' );
    }
  }

  //general scripts
	wp_enqueue_style( 'divienhancer-custom',  plugin_dir_url( __FILE__ ) . 'styles/custom.css', '', rand(1, 100) );
  wp_enqueue_script( 'divienhancer-event-move', plugin_dir_url( __FILE__ ) . 'scripts/jquery.event.move.js' );


}
add_action('wp_enqueue_scripts', 'divienhancer_scripts_and_styles', 999);



function divienhancer_admin_styles(){
  wp_enqueue_style( 'divienhancer-admin-css',  plugin_dir_url( __FILE__ ) . 'styles/admin.css', '', rand(1, 100) );
  wp_enqueue_script('divienhancer-admin-js', plugin_dir_url( __FILE__ ) . 'scripts/admin.js');
}
add_action('admin_enqueue_scripts', 'divienhancer_admin_styles', 999);




