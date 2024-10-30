<?php
/*
Plugin Name: DIVI Enhancer
Plugin URI: https://pagebuildercode.com/divi-enhancer
Description: Add custom modules and options to DIVI
Version: 5.0.9
Author: Miguras
Author URI: https://pagebuildercode.com
License: GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: divienhancer
Domain Path: /languages
*/

// Create a helper function for easy SDK access.
function demg($gumroad = null) {
    global $demg;

    if ( ! isset( $demg ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $menu = array(
            'slug'           => 'divienhancerdashboard',
            'first-path'     => 'admin.php?page=divienhancerdashboard',
            'support'        => false,
        );

        if($gumroad === 'true'){
          $menu = false;
        }

        $demg = fs_dynamic_init( array(
            'id'                  => '2539',
            'slug'                => 'miguras-divi-enhancer',
            'type'                => 'plugin',
            'public_key'          => 'pk_38e4349d274180e479a9982a0aef2',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => $menu,
        ) );
    }

    return $demg;
}


$gumlicense = 'false';
$gum = get_option( 'divienhancer_settings' );
if(isset($gum) && !empty($gum)) {
  if(!empty($gum['divienhancer_text_field_0'])){
    $gumlicense = 'true';
  }
}
// Init Freemius.
demg($gumlicense);
// Signal that SDK was initiated.
do_action( 'demg_loaded' );

//plugin starts

function divienhancer_freemius_message(
    $message,
    $user_first_name,
    $product_title,
    $user_login,
    $site_link,
    $freemius_link
)
{
      return sprintf(
        __( 'Hey %1$s', 'divienhancer' ) . ',<br>' .
        __( 'Help me improve %2$s to provide you more and better features on next update - opt in to our security & feature updates notifications, and non-sensitive diagnostic tracking with %5$s', 'divienhancer' ),
        $user_first_name,
        '<b>' . $product_title . '</b>',
        '<b>' . $user_login . '</b>',
        $site_link,
        $freemius_link
      );
}


demg()->add_filter('connect_message_on_update', 'divienhancer_freemius_message', 10, 6);
demg()->add_filter('connect_message', 'divienhancer_freemius_message', 10, 6);


// send plugin kind to visual builder
function divienhancer_send_license_to_vb($classes){

  if(function_exists('de_pro')){
    if ( de_pro()->is_paying() ) {
      $classes[] = 'divienhancer-pro';
    }
    else {
      $classes[] = 'divienhancer-free';
    }
  }
  else {
    $classes[] = 'divienhancer-free';
  }

  return $classes;
}



add_filter( 'body_class','divienhancer_send_license_to_vb' );



if ( ! function_exists( 'divienhancer_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function divienhancer_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviEnhancer.php';
}
add_action( 'divi_extensions_init', 'divienhancer_initialize_extension' );
endif;


/*================= required files ============================*/
/*=============================================================*/

    if (file_exists(plugin_dir_path( __FILE__ ) . 'custom/theme-customizer.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'custom/theme-customizer.php');
    }
    if (file_exists(plugin_dir_path( __FILE__ ) . 'custom/dynamic-styles.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'custom/dynamic-styles.php');
    }

    if (file_exists(plugin_dir_path( __FILE__ ) . 'custom/modules-mod.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'custom/modules-mod.php');
    }

    if (file_exists(plugin_dir_path( __FILE__ ) . 'functions/functions.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'functions/functions.php');
    }




//dashboard page
function divienhancer_admin_menu($gumroad = null) {
	add_menu_page('Divi Enhancer', 'Divi Enhancer', 'manage_options', 'divienhancerdashboard');
  add_submenu_page('divienhancerdashboard', 'Guide', 'Guide', 'manage_options', 'divienhancerdashboard', 'divienhancer_guide_func');
  add_submenu_page('divienhancerdashboard', 'Divi_Market', 'Divi Market', 'manage_options', 'divi_enhancer_market', 'pagebuildercode_market');
}
add_action('admin_menu', 'divienhancer_admin_menu');


function divienhancer_guide_func(){
  $content = '<div style="display: inline-block; margin: 0 auto; float: left; width: 100%; text-align: center;">';
  $content .= '<iframe src="https://pagebuildercode.com/guide/" width="90%" height="600px" scrolling="yes" frameborder="0"></iframe>';
  $content .= '</div>';
  echo $content;
}

function pagebuildercode_market(){
  $content = '<iframe src="https://pagebuildercode.com/marketplace/" width="90%" height="600px" scrolling="yes" frameborder="0"></iframe>';

  echo $content;
}





