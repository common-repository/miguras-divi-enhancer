<?php  	function divienhancer_dynamic_styles(){

//var

$dropdown_size = get_option('divienhancer_dropdown_font_size');
$footer_visibility = get_option('divienhancer_footer_display');
$mobile_logo_size = get_option('divienhancer_mobile_logosize');
?>



<style type="text/css">

<?php if(isset($dropdown_size)):?>
#main-header .nav li ul a {font-size:<?php echo $dropdown_size; ?>px;}
<?php endif;?>


<?php if(isset($footer_visibility) && $footer_visibility == 'footer_widgets'):?>
#main-footer #footer-bottom {display: none; visibility: hidden;}
<?php elseif(isset($footer_visibility) && $footer_visibility == 'footer_bottom'):?>
#main-footer #footer-widgets {display: none; visibility: hidden;}
<?php elseif(isset($footer_visibility) && $footer_visibility == 'none'):?>
#main-footer {display: none; visibility: hidden;}
<?php endif;?>

<?php if(isset($mobile_logo_size )):?>
@media only screen and (max-width: 980px){
#logo {max-height: <?php echo $mobile_logo_size;?>px;>}
}
<?php endif; ?>

</style>


<?php } ?>
<?php
if(function_exists('wp_register_script')){

  if(function_exists('add_action')){
  add_action('after_setup_theme', 'divienhancer_load_dynamic_styles');
  }


  if(!function_exists('divienhancer_load_dynamic_styles')) {
    function divienhancer_load_dynamic_styles() {
    add_action('wp_head', 'divienhancer_dynamic_styles');
    }
  }
};
?>
