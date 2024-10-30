<?php
function divienhancer_accepted_modules(){
	//Accepted modules
	$divienhancer_generaloptions = array('et_pb_blurb', 'et_pb_accordion', 'et_pb_audio', 'et_pb_counters', 'et_pb_blurb',
	'et_pb_button', 'et_pb_circle_counter', 'et_pb_code', 'et_pb_contact_form', 'et_pb_countdown_timer', 'et_pb_cta',
	'et_pb_divider', 'et_pb_filterable_portfolio', 'et_pb_fullwidth_code', 'et_pb_fullwidth_header',  'et_pb_fullwidth_image',
	'et_pb_fullwidth_map', 'et_pb_fullwidth_menu', 'et_pb_fullwidth_portfolio', 'et_pb_fullwidth_post_slider',
	'et_pb_fullwidth_post_title', 'et_pb_fullwidth_slider', 'et_pb_gallery', 'et_pb_image', 'et_pb_blog', 'et_pb_comments',
	'et_pb_login', 'et_pb_map', 'et_pb_number_counter', 'et_pb_portfolio', 'et_pb_post_slider', 'et_pb_post_nav', 'et_pb_post_title',
	'et_pb_pricing_tables', 'et_pb_search', 'et_pb_shop', 'et_pb_sidebar', 'et_pb_signup',
	'et_pb_slider', 'et_pb_social_media_follow', 'et_pb_tabs', 'et_pb_team_member', 'et_pb_testimonial',
	'et_pb_text', 'et_pb_toggle', 'et_pb_video', 'et_pb_video_slider');

	
	$divienhancer_modules = array('divienhancer_animated_links', 'divienhancer_flipBox', 'divienhancer_foodmenu',
	'divienhancer_ihover', 'divienhancer_team_member', 'divienhancer_timeLine', 'divienhancer_shop', 'divienhancer_infiniteProducts',
	'divienhancer_image_comparison', 'divienhancer_bingMap', 'divienhancer_breadcrumb', 'divienhancer_priceBox', 'divienhancer_tagCloud',
	'divienhancer_tagProducts', 
	);
	

	$divienhancer_generaloptions = array_merge($divienhancer_generaloptions, $divienhancer_modules);
	
	return $divienhancer_generaloptions;
}


function divienhancer_main_tab( $tabs ) {
	$tabs['divienhancer'] = esc_html__( 'Divi Enhancer', 'divienhancer' );


	return $tabs;
}
add_filter('et_builder_main_tabs','divienhancer_main_tab');


function divienhancer_toggles( $parent_modules, $post_type ) {

 
  $allModules = get_option('divienhancer_all_modules');
  if(isset($allModules) && is_array($allModules)){
    foreach($allModules as $module){
		
		if(isset($parent_modules[$module])){
			$parent_modules[$module]->settings_modal_toggles['divienhancer'] = [
			'toggles' => [
				'de_interactive_bg'    => [
				'title'    => __( 'Interactive Background', 'divienhancer' ),
				'priority' => 10,
				],
				'de_hover_effect'    => [
					'title'    => __( 'Hover Effects', 'divienhancer' ),
					'priority' => 10,
				],
				'de_sticky'    => [
					'title'    => __( 'Sticky', 'divienhancer' ),
					'priority' => 10,
				],
				'de_caption'    => [
					'title'    => __( 'Caption', 'divienhancer' ),
					'priority' => 10,
				],
				'de_modal'    => [
					'title'    => __( 'Modal Popup', 'divienhancer' ),
					'priority' => 10,
				],
				'de_module_menu'    => [
					'title'    => __( 'Module Menu', 'divienhancer' ),
					'priority' => 10,
				],
			],
			];
		}
     
    }
  }

  
  

return $parent_modules;
}

add_filter('et_builder_get_parent_modules', 'divienhancer_toggles', 10, 2);


//add_filter('et_builder_module_general_fields', 'eleganttooltip_new_options');

function divienhancer_all_modules_list(){
    if ( ! class_exists( 'ET_Builder_Element' ) ) {
      return;
    } 
	 $allParents = ET_Builder_Element::get_parent_modules();
   
   $divienhancer_all_modules = array(); 
   foreach($allParents['et_pb_layout'] as $moduleKey => $moduleContent){
	   if($moduleKey !== 'et_pb_section' && $moduleKey !== 'et_pb_row' && $moduleKey !== 'et_pb_row_inner'){
			$divienhancer_all_modules[] = $moduleKey;
	   }
   }

   if(!empty($divienhancer_all_modules)){
   		update_option('divienhancer_all_modules', $divienhancer_all_modules);
   }
   
}
add_action('wp_footer', 'divienhancer_all_modules_list');





function divienhancer_add_options_to_modules(){
  $allModules = get_option('divienhancer_all_modules');
  if(isset($allModules) && is_array($allModules)){
    foreach($allModules as $module){
      if($module !== 'et_pb_section' && $module !== 'et_pb_row' && $module !== 'et_pb_row_inner'){
        $filter = 'et_pb_all_fields_unprocessed_'.$module.'';
        add_filter($filter, 'divienhancer_new_options');
      }
    }
  }
}
divienhancer_add_options_to_modules();




// new options
////////////////////////////////////////////////
function divienhancer_new_options($fields_unprocessed){
	//Checf if pro add on is installed and has active license
	if(function_exists('de_pro')){
		if(de_pro()->is_paying()){
			$onlypro = '';
		}
		else {
			$onlypro = '(Only PRO)';
		}
	}
	else {
		$onlypro = '(Only PRO)';
	}


	$newfields = [];

	// INTERACTIVE Background
	///////////////////////////////

	$newfields['divienhancer_interactive_bg_transform'] = array(
			'default'         => 'none',
			'label'           => esc_html__( 'Activate Interactive Background Image', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'none' => esc_html__( 'No', 'divienhancer' ),
				'divienhancer-interactive_bg'  => esc_html__( 'Yes', 'divienhancer' ),
			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_interactive_bg',
			'description'     => esc_html__( 'Moves Background Image on mouse over', 'divienhancer' ),
	

	);
	$newfields['divienhancer_interactive_bg_strength'] = array(
		'label'           => esc_html__( 'Strength', 'divienhancer' ),
		'type'            => 'range',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_interactive_bg',
		'default'					=> '25',
		'range_settings'   => array(
			'min'  => '5',
			'max'  => '50',
			'step' => '1',
    	),
		'description'			=> esc_html__('Movement Strength when the cursor is moved. The higher, the faster it will reacts to your cursor. The default value is 25.'),
		
	);
	$newfields['divienhancer_interactive_bg_scale'] = array(
		'label'           => esc_html__( 'Scale', 'divienhancer' ),
		'type'            => 'range',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_interactive_bg',
		'default'					=> '5',
		'range_settings'   => array(
			'min'  => '1',
			'max'  => '9',
			'step' => '1',
		),
		'description'			=> esc_html__('The scale in which the background will be zoomed when hovering.'),
	);
	$newfields['divienhancer_interactive_bg_animationspeed'] = array(
		'label'           => esc_html__( 'Speed', 'divienhancer' ),
		'type'            => 'range',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_interactive_bg',
		'default'					=> '100',
		'range_settings'   => array(
			'min'  => '50',
			'max'  => '1000',
			'step' => '50',
   		 ),
		'description'			=> esc_html__(''),
	
	);

	// Hover Effects
	$newfields['divienhancer_hover_effect'] = array(
			'default'         => 'none',
			'label'           => esc_html__( 'Hover Effect', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'none' => esc_html__( 'None', 'divienhancer' ),
				'divienhancer-grow'  => esc_html__( 'Grow', 'divienhancer' ),
				'divienhancer-shrink'  => esc_html__( 'Shrink', 'divienhancer' ),
				'divienhancer-pulse'  => esc_html__( 'Pulse', 'divienhancer' ),
				'divienhancer-pulse-grow'  => esc_html__( 'Pulse Grow', 'divienhancer' ),
				'divienhancer-pulse-shrink '  => esc_html__( 'Pulse Shrink ', 'divienhancer' ),
				'divienhancer-push'  => esc_html__( 'Push', 'divienhancer' ),
				'divienhancer-pop'  => esc_html__( 'Pop', 'divienhancer' ),
				'divienhancer-rotate'  => esc_html__( 'Rotate', 'divienhancer' ),
				'divienhancer-grow-rotate '  => esc_html__( 'Grow Rotate', 'divienhancer' ),
				'divienhancer-float '  => esc_html__( 'Float', 'divienhancer' ),
				'divienhancer-bounce-in'  => esc_html__( 'Bounce In', 'divienhancer' ),
				'divienhancer-bounce-out '  => esc_html__( 'Bounce Out', 'divienhancer' ),
				'divienhancer-sink'  => esc_html__( 'Sink', 'divienhancer' ),
				'divienhancer-bob'  => esc_html__( 'Bob', 'divienhancer' ),
				'divienhancer-hang'  => esc_html__( 'Hang', 'divienhancer' ),
				'divienhancer-skew'  => esc_html__( 'Skew', 'divienhancer' ),
				'divienhancer-wobble-vertical'  => esc_html__( 'Vertical Wobble', 'divienhancer' ),
				'divienhancer-wobble-horizontal'  => esc_html__( 'Horizontal Wobble', 'divienhancer' ),
				'divienhancer-skew-backward'  => esc_html__( 'Skew Backward', 'divienhancer' ),
				'divienhancer-skew-forward'  => esc_html__( 'Skew Forward', 'divienhancer' ),
				'divienhancer-wobble-to-bottom-right'  => esc_html__( 'Wobble to Bottom Right', 'divienhancer' ),
				'divienhancer-wobble-to-top-right'  => esc_html__( 'Wobble to Top Right', 'divienhancer' ),
				'divienhancer-wobble-top'  => esc_html__( 'Top Wobble', 'divienhancer' ),
				'divienhancer-wobble-bottom'  => esc_html__( 'Bottom Wobble', 'divienhancer' ),
				'divienhancer-wobble-skew'  => esc_html__( 'Wobble Skew', 'divienhancer' ),
				'divienhancer-buzz'  => esc_html__( 'Buzz', 'divienhancer' ),
				'divienhancer-buzz-out'  => esc_html__( 'Buzz Out', 'divienhancer' ),
				'divienhancer-forward'  => esc_html__( 'Forward', 'divienhancer' ),
				'divienhancer-backward'  => esc_html__( 'Backward', 'divienhancer' ),

			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_hover_effect',
			'description'     => esc_html__( 'CSS effects when mouse pass over the module', 'divienhancer' ),
	

	);
	// sticky module
	$newfields['divienhancer_sticky_module'] = array(
			'default'         => 'none',
			'label'           => esc_html__( 'Sticky Module', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'none' => esc_html__( 'No', 'divienhancer' ),
				'divienhancer-sticky'  => esc_html__( 'Yes', 'divienhancer' ),
			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_sticky',
			'description'     => esc_html__( 'Keeps modules attached at top when scrolling', 'divienhancer' ),
			
	);
	$newfields['divienhancer_sticky_module_top'] = array(
		'label'           => esc_html__( 'Distance From Top', 'divienhancer' ),
		'default'					=> '0',
		'type'            => 'text',
		'description'     => esc_html__( 'Distance from top', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_sticky',
	
	);
	$newfields['divienhancer_sticky_module_bottom'] = array(
		'label'           => esc_html__( 'Bottom Detachment', 'divienhancer' ),
		'default'					=> '0',
		'type'            => 'text',
		'description'     => esc_html__( 'The module it will be detached when the page scroll reach a distance from bottom equal to value.', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_sticky',

	);


	$newfields['divienhancer_activate_caption'] = array(
		'label'             => esc_html__( 'Toggle', 'divienhancer' ),
		'type'              => 'yes_no_button',
		'default' 			=> 'on',
		'options'           => array(
			'on'  => esc_html__( 'On', 'et_builder' ),
			'off' => esc_html__( 'Off', 'et_builder' ),
		),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_caption',
	);
	$newfields['divienhancer_caption'] = array(
			'default'         => '',
			'label'           => esc_html__( 'Caption'.$onlypro, 'divienhancer' ),
			'type'            => 'textarea',
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_caption',
			'description'     => esc_html__( 'Insert caption content here', 'divienhancer' ),
		

	);
	$newfields['divienhancer_caption_position'] = array(
		'default'         => 'de-caption-right',
		'label'           => esc_html__( 'Caption Position'.$onlypro, 'divienhancer' ),
		'type'            => 'select',
		'options'         => array(
			'de-caption-left' => esc_html__( 'Left', 'divienhancer' ),
			'de-caption-right'  => esc_html__( 'Right', 'divienhancer' ),
		),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_caption',
		'description'     => esc_html__( 'Keeps modules attached at top when scrolling', 'divienhancer' ),


	);
	$newfields['divienhancer_caption_background'] = array(
		'label'             => esc_html__( 'Caption Background'.$onlypro, 'divienhancer' ),
		'type'              => 'color-alpha',
		'custom_color'      => true,
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_caption',

	);
	$newfields['divienhancer_caption_color'] = array(
		'label'             => esc_html__( 'Caption Text Color'.$onlypro, 'divienhancer' ),
		'type'              => 'color-alpha',
		'custom_color'      => true,
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_caption',
	

	);
	$newfields['divienhancer_caption_size'] = array(
		'label'           => esc_html__( 'Caption Text Sixe'.$onlypro, 'divienhancer' ),
		'type'            => 'range',
		'tab_slug'				=> 'custom_css',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_caption',

	);
	$newfields['divienhancer_modal_popup'] = array(
			'default'         => 'none',
			'label'           => esc_html__( 'Modal Pop Up', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'none' => esc_html__( 'No', 'divienhancer' ),
				'divienhancer-modalpopup'  => esc_html__( 'Yes', 'divienhancer' ),
			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_modal',
			'description'     => esc_html__( 'Transform this in a modal pop up, hiding it and then showing it when uses triggers different events', 'divienhancer' ),


	);
	$newfields['divienhancer_modal_effect'] = array(
			'default'         => 'fade-in-scale',
			'label'           => esc_html__( 'Modal Effect', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'fade-in-scale'  => esc_html__( 'Fade In and Scale Up', 'divienhancer' ),
				'slide-in-right'  => esc_html__( 'Slide from the Right', 'divienhancer' ),
				'slide-in-bottom'  => esc_html__( 'Slide from the Bottom', 'divienhancer' ),
				'newspaper'  => esc_html__( 'Newspaper', 'divienhancer' ),
				'fall'  => esc_html__( 'Fall In', 'divienhancer' ),
				'slide-fall-in'  => esc_html__( 'Slide Fall In', 'divienhancer' ),
				'slide-in-top'  => esc_html__( 'Slide in and Stick to Top', 'divienhancer' ),
				//'3d-flip-horizontal'  => esc_html__( '3D Flip Horizontal', 'divienhancer' ),
				//'3d-flip-vertical'  => esc_html__( '3D Flip Veritcal', 'divienhancer' ),
				//'3d-sign'  => esc_html__( '3D Sign', 'divienhancer' ),
				//'3d-slit'  => esc_html__( '3D Slit', 'divienhancer' ),
				//'3d-rotate-bottom'  => esc_html__( '3D Rotate from Bottom', 'divienhancer' ),
				//'3d-rotate-in-left'  => esc_html__( '3D Rotate in from Left', 'divienhancer' ),
				'super-scaled'  => esc_html__( 'Super Scaled', 'divienhancer' ),
				'just-me'  => esc_html__( 'Just Me', 'divienhancer' ),
				//'slide-in-bottom-perspective'  => esc_html__( 'Slide in from Bottom(w/Perspective)', 'divienhancer' ),
				//'slide-in-right-prespective'  => esc_html__( 'Slide from Right(w/Perspective)', 'divienhancer' ),
				//'slip-in-top-perspective'  => esc_html__( 'Slip in from Top(w/Perspective)', 'divienhancer' ),
			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_modal',
			'description'     => esc_html__( '', 'divienhancer' ),


	);
	$newfields['divienhancer_modal_overlay'] = array(
		'label'             => esc_html__( 'Modal Overlay Background Color', 'divienhancer' ),
		'default'						=> '#333333',
		'type'              => 'color-alpha',
		'custom_color'      => true,
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',


	);
  $newfields['divienhancer_modal_trigger'] = array(
			'default'         => 'button',
			'label'           => esc_html__( 'Trigger', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'auto' => esc_html__( 'Time Delay', 'divienhancer' ),
				'button'  => esc_html__( 'Button', 'divienhancer' ),
				'image'  => esc_html__( 'Image', 'divienhancer' ),
				'position'  => esc_html__( 'Position', 'divienhancer' ),
			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_modal',
			'description'     => esc_html__( '', 'divienhancer' ),


	);
	$newfields['divienhancer_modal_css_class'] = array(
		'label'           => esc_html__( 'CSS Class (Optional)', 'divienhancer' ),
		'default'					=> '',
		'type'            => 'text',
		'description'     => esc_html__( 'This may help you to stylize the trigger through CSS', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => array('button', 'image')
		),
	);
  	$newfields['divienhancer_modal_image'] = array(
		'label'              => esc_html__( 'Trigger Image', 'divienhancer' ),
		'type'               => 'upload',
		'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
		'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
		'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => 'image'
		),
	);
	$newfields['divienhancer_modal_image_alignment'] = array(
		'label'              => esc_html__( 'Trigger Image', 'divienhancer' ),
		'type'               => 'select',
		'options'         	 =>array(
			'left' => 'Left',
			'center' => 'Center',
			'right' => 'Right',
		),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => 'image'
		),
	);
	$newfields['divienhancer_modal_image_css'] = array(
		'label'           => esc_html__( 'Custom Image CSS', 'divienhancer' ),
		'type'            => 'codemirror',
		'default'	=>	'width: 100%;',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => 'image'
		),
	);
	
  $newfields['divienhancer_modal_auto'] = array(
		'label'           => esc_html__( 'Time delay in miliseconds', 'divienhancer' ),
		'default'            => '2000',
    	'range_settings'   => array(
			'min'  => '500',
			'max'  => '10000',
			'step' => '500',
    	),
		'type'            => 'range',
		'validate_unit'            => false,
		'default_unit'            => ' ',
		'description'     => esc_html__( '1000ms = 1s', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => 'auto'
		),
	);
	$newfields['divienhancer_modal_button_text'] = array(
		'label'           => esc_html__( 'Button Text', 'divienhancer' ),
		'default'					=> 'Launch Modal',
		'type'            => 'text',
		'description'     => esc_html__( 'Text entered here will appear as button text.', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => 'button'
		),
	);
	$newfields['divienhancer_modal_button_alignment'] = array(
			'default'         => 'left',
			'label'           => esc_html__( 'Button Alignment', 'divienhancer' ),
			'type'            => 'select',
			'options'         => array(
				'left'  => esc_html__( 'Left', 'divienhancer' ),
				'center'  => esc_html__( 'Center', 'divienhancer' ),
				'right'  => esc_html__( 'Right', 'divienhancer' ),
			),
			'tab_slug'				=> 'divienhancer',
			'toggle_slug'			=> 'de_modal',
			'description'     => esc_html__( '', 'divienhancer' ),
			'show_if'         => array(
				'divienhancer_modal_trigger' => 'button'
			),

	);
	$newfields['divienhancer_modal_button_css'] = array(
		'label'           => esc_html__( 'Custom Button CSS', 'divienhancer' ),
		'type'            => 'codemirror',
		'default'	=>	'background-color:#ff0052; color:#fff; font-size: 16px;',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
		'show_if'         => array(
			'divienhancer_modal_trigger' => 'button'
		),
	);
	$newfields['divienhancer_modal_box_css'] = array(
		'label'           => esc_html__( 'Box CSS', 'divienhancer' ),
		'type'            => 'codemirror',
		'default'					=>	'top: 50%; left: 50%; width: 50%; max-width: 630px; min-width: 320px; height: auto; ',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_modal',
	
	);
	$newfields['divienhancer_module_menu'] = array(
		'default'         => 'none',
		'label'           => esc_html__( 'Transform Module'.$onlypro, 'divienhancer' ),
		'type'            => 'select',
		'options'         => array(
			'none' => esc_html__( 'No', 'divienhancer' ),
			'divienhancer-module-as-menu'  => esc_html__( 'Yes', 'divienhancer' ),
		),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
		'description'     => esc_html__( 'Transform Module in a floating menu item with icon as button', 'divienhancer' ),
	

	);
	$newfields['divienhancer_module_menu_x'] = array(
		'default'         => 'module_as_menu_left',
		'label'           => esc_html__( 'Module Position'.$onlypro, 'divienhancer' ),
		'type'            => 'select',
		'options'         => array(
			'module_as_menu_left' => esc_html__( 'Left', 'divienhancer' ),
			'module_as_menu_right'  => esc_html__( 'Right', 'divienhancer' ),
		),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
		'description'     => esc_html__( 'Transform Module in a floating menu item with icon as button', 'divienhancer' ),
	

	);
	$newfields['divienhancer_module_menu_icon'] = array(
		'label'               => esc_html__( 'Select Icon'.$onlypro, 'divienhancer' ),
		'type'                => 'select_icon',
		'class'               => array( 'et-pb-font-icon' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
		'description'     => esc_html__( 'Choose an icon to display inside the button.', 'divienhancer' ),
	
	);
	$newfields['divienhancer_module_menu_icon_size'] = array(
		'label'           => esc_html__( 'Icon & Text Size'.$onlypro, 'divienhancer' ),
		'default'					=> '20px',
		'type'            => 'range',
		'class'           => array( 'divienhancer-range' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
	

	);
	$newfields['divienhancer_module_menu_launch_text'] = array(
		'label'           => esc_html__( 'Button Text'.$onlypro, 'divienhancer' ),
		'type'            => 'text',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
	
	);
	$newfields['divienhancer_module_menu_icon_close'] = array(
		'label'               => esc_html__( 'Select Icon for close modal'.$onlypro, 'divienhancer' ),
		'type'                => 'select_icon',
		'class'               => array( 'et-pb-font-icon' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
		'description'     => esc_html__( 'Choose an icon to close the button.', 'divienhancer' ),

	);
	$newfields['divienhancer_module_menu_button_background'] = array(
		'label'             => esc_html__( 'Button Background Color'.$onlypro, 'divienhancer' ),
		'default'						=> '#333333',
		'type'              => 'color-alpha',
		'custom_color'      => true,
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
		

	);
	$newfields['divienhancer_module_menu_button_color'] = array(
		'label'             => esc_html__( 'Button Text&Icon Color'.$onlypro, 'divienhancer' ),
		'default'						=> '#ffffff',
		'type'              => 'color-alpha',
		'custom_color'      => true,
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',


	);
	$newfields['divienhancer_module_menu_margin'] = array(
		'label'           => esc_html__( 'Menu Bottom Margin'.$onlypro, 'divienhancer' ),
		'default'            => '1',
		'type'            => 'range',
		'validate_unit'            => false,
		'default_unit'            => ' ',
		'description'     => esc_html__( 'Do not use px or em, just number', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',

	);
	$newfields['divienhancer_module_menu_button_css'] = array(
		'label'           => esc_html__( 'Button CSS'.$onlypro, 'divienhancer' ),
		'type'            => 'codemirror',
		'default'					=>	'font-weight: 600;',
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',
	
	);
	$newfields['divienhancer_module_menu_distance'] = array(
		'label'           => esc_html__( 'Menu Distance from Top'.$onlypro, 'divienhancer' ),
		'default'            => '20%',
		'type'            => 'text',
		'description'     => esc_html__( 'Last module added it is mandatory and it will define the menu distance from top', 'divienhancer' ),
		'tab_slug'				=> 'divienhancer',
		'toggle_slug'			=> 'de_module_menu',

	);


	return array_merge($fields_unprocessed, $newfields);
}







function divienhancer_modified_output($output, $render_slug, $module){
		$divienhancer_generaloptions = divienhancer_accepted_modules();
		
		if(!empty(get_option('divienhancer_all_modules'))){
			$divienhancer_generaloptions = get_option('divienhancer_all_modules');
		}
		
		
		$divienhancer_all = array_combine($divienhancer_generaloptions, $divienhancer_generaloptions);

		$accepted_modules = array_search($render_slug, $divienhancer_all);
		$excludedsticky = 'divienhancer_carousel';

		$removechilds = array('divienhancer_timeLineChild', 'divienhancer_carouselchild',
		'divienhancer_flipBoxChild'
		);
		$removed = in_array($render_slug, $removechilds);


		if($accepted_modules === $render_slug ){
			$hovereffect = $module->props['divienhancer_hover_effect'];
			if(isset($hovereffect) && !empty($hovereffect)){
				$hovereffect .= ' divienhancer-hover-effect';
			}
			if($accepted_modules !== $excludedsticky){
				$sticky = $module->props['divienhancer_sticky_module'];
				$stickytop = $module->props['divienhancer_sticky_module_top'];
				$stickybottom =	$module->props['divienhancer_sticky_module_bottom'];
			}
			$modal_popup = $module->props['divienhancer_modal_popup'];
			$modal_overlay = $module->props['divienhancer_modal_overlay'];
			$modal_button_text = $module->props['divienhancer_modal_button_text'];
			$modal_button_alignment = $module->props['divienhancer_modal_button_alignment'];
			$modal_button_css = $module->props['divienhancer_modal_button_css'];
			$modal_effect = $module->props['divienhancer_modal_effect'];
			$modal_css = $module->props['divienhancer_modal_box_css'];
      		$modal_trigger = $module->props['divienhancer_modal_trigger'];
      		$modal_autotime = $module->props['divienhancer_modal_auto'];
			$modal_image = $module->props['divienhancer_modal_image'];
			$modal_image_alignment = $module->props['divienhancer_modal_image_alignment'];
			$modal_image_css = $module->props['divienhancer_modal_image_css'];
			$modal_css_class = $module->props['divienhancer_modal_css_class'];


			$modulemenu = $module->props['divienhancer_module_menu'];
			$modulemenuattr = array();
			$modulemenuattr['icon'] = $module->props['divienhancer_module_menu_icon'];
			$modulemenuattr['position'] = $module->props['divienhancer_module_menu_x'];
			$modulemenuattr['iconclose'] = $module->props['divienhancer_module_menu_icon_close'];
			$modulemenuattr['iconsize'] = $module->props['divienhancer_module_menu_icon_size'];
			$modulemenuattr['launchtext'] = $module->props['divienhancer_module_menu_launch_text'];
			$modulemenuattr['buttonbackground'] = $module->props['divienhancer_module_menu_button_background'];
			$modulemenuattr['buttoncolor'] = $module->props['divienhancer_module_menu_button_color'];
			$modulemenuattr['buttoncss'] = $module->props['divienhancer_module_menu_button_css'];
			$modulemenuattr['distance'] = $module->props['divienhancer_module_menu_distance'];
			$modulemenuattr['margin'] = $module->props['divienhancer_module_menu_margin'];

			$captionActivation = (isset($module->props['divienhancer_activate_caption']))? $module->props['divienhancer_activate_caption'] : 'on';
			$caption = $module->props['divienhancer_caption'];
			$captionPosition = $module->props['divienhancer_caption_position'];
			$captionbackground = $module->props['divienhancer_caption_background'];
			$captioncolor = $module->props['divienhancer_caption_color'];
			$captionsize = $module->props['divienhancer_caption_size'];

			$interactivebg = $module->props['divienhancer_interactive_bg_transform'];
			$interactivebgstrength = $module->props['divienhancer_interactive_bg_strength'];
			$interactivebgscale = $module->props['divienhancer_interactive_bg_scale'];
			$interactivebganimationspeed = $module->props['divienhancer_interactive_bg_animationspeed'];
		}

		//VB mods
		if ( is_array( $output ) ) {

			return $output;
	  	}

		if(true === $removed){
			$output = str_replace('class="et_pb_with_border et_pb_module ', 'class="divienhancer_child_element et_pb_with_border et_pb_module ', $output);
			$output = str_replace('class="et_pb_module ', 'class="divienhancer_child_element et_pb_module ', $output);

		}

		/*
		Interactive Bg
		*/
		if(isset($interactivebg) && $interactivebg !== 'none'){
				$data = sprintf('
				data-interactivebgstrength="%1$s"
				data-interactivebgscale="%2$s"
				data-interactivebganimationspeed="%3$s"
				',
				$interactivebgstrength,
				$interactivebgscale,
				$interactivebganimationspeed
				);

				$output = str_replace('class="et_pb_with_border et_pb_module ', $data.' class="et_pb_with_border et_pb_module '.$interactivebg.' ', $output);
				$output = str_replace('class="et_pb_module ', $data.' class="et_pb_module '.$interactivebg.' ', $output);
		}



		/*
		Hover Effects
		*/
		if(isset($hovereffect) && $hovereffect !== 'none'){

				$output = str_replace('class="et_pb_with_border et_pb_module ', 'class="et_pb_with_border et_pb_module '.$hovereffect.' ', $output);
				$output = str_replace('class="et_pb_module ', 'class="et_pb_module '.$hovereffect.' ', $output);
		}

		/*
		Modal PopUp
		*/
		if(isset($modal_popup) && $modal_popup !== 'none'){
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'class="et_pb_with_border et_pb_module '.$modal_popup.' ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-overlay="'.esc_html($modal_overlay).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-effect="'.esc_html($modal_effect).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-button-text="'.esc_html($modal_button_text).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-button-alignment="'.esc_html($modal_button_alignment).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-button-css="'.esc_html($modal_button_css).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-css="'.esc_html($modal_css).'" class="et_pb_with_border et_pb_module ', $output);
        		$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-trigger="'.esc_html($modal_trigger).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-autotime="'.esc_html($modal_autotime).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-image="'.esc_html($modal_image).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-image-alignment="'.esc_html($modal_image).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-css-class="'.esc_html($modal_css_class).'" class="et_pb_with_border et_pb_module ', $output);
				$output = str_replace('class="et_pb_with_border et_pb_module ', 'data-image-css="'.esc_html($modal_image_css).'" class="et_pb_with_border et_pb_module ', $output);



				$output = str_replace('class="et_pb_module ', 'class="et_pb_module '.$modal_popup.' ', $output);
				$output = str_replace('class="et_pb_module ', 'data-overlay="'.esc_html($modal_overlay).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-effect="'.esc_html($modal_effect).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-button-text="'.esc_html($modal_button_text).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-button-alignment="'.esc_html($modal_button_alignment).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-button-css="'.esc_html($modal_button_css).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-css="'.esc_html($modal_css).'" class="et_pb_module ', $output);
        		$output = str_replace('class="et_pb_module ', 'data-trigger="'.esc_html($modal_trigger).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-autotime="'.esc_html($modal_autotime).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-image="'.esc_html($modal_image).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-image-alignment="'.esc_html($modal_image_alignment).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-css-class="'.esc_html($modal_css_class).'" class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'data-image-css="'.esc_html($modal_image_css).'" class="et_pb_module ', $output);
		}

		// Module as Menu function added by pro version
		if(function_exists('divienhancer_add_module_as_menu_option')){
				if(isset($modulemenu) && $modulemenu !== 'none'){
					$output = divienhancer_add_module_as_menu_option($modulemenu, $accepted_modules, $modulemenuattr, $output);
				}
		}


    // sticky modules
    if(isset($sticky) && $sticky !== 'none' && $accepted_modules !== $excludedsticky){
        $output = str_replace('class="et_pb_module ', 'data-destickytop="'.$stickytop.' " class="et_pb_module ', $output);
        $output = str_replace('class="et_pb_module ', 'data-destickybottom="'.$stickybottom.' " class="et_pb_module ', $output);
				$output = str_replace('class="et_pb_module ', 'class="et_pb_module '.$sticky.' ', $output);
		}



		// Caption function added by pro version
		if(function_exists('divienhancer_add_caption_option')){
			if(isset($caption) && $caption !== '' && isset($captionActivation) && $captionActivation === 'on'){
				$output = divienhancer_add_caption_option($caption, $captionbackground, $captioncolor, $captionsize, $captionPosition, $output);
			}
		}


	return $output;
}
add_filter( 'et_module_shortcode_output', 'divienhancer_modified_output', 10, 3 );

function divienhancer_load_scripts_dynamically($output, $render_slug, $module){

	$divienhancer_generaloptions = divienhancer_accepted_modules();
		
		if(!empty(get_option('divienhancer_all_modules'))){
			$divienhancer_generaloptions = get_option('divienhancer_all_modules');
		}
		
		
		$divienhancer_all = array_combine($divienhancer_generaloptions, $divienhancer_generaloptions);

		$accepted_modules = array_search($render_slug, $divienhancer_all);
		$excludedsticky = 'divienhancer_carousel';

		$removechilds = array('divienhancer_timeLineChild', 'divienhancer_carouselchild',
		'divienhancer_flipBoxChild'
		);
		$removed = in_array($render_slug, $removechilds);


		if($accepted_modules === $render_slug ){
			if($module->props['divienhancer_hover_effect'] !== 'none'){
				wp_enqueue_style( 'divienhancer-hover-effects');
			}
	
			if($module->props['divienhancer_modal_popup'] !== 'none'){
				wp_enqueue_style( 'divienhancer-nifty');
				wp_enqueue_script( 'divienhancer-nifty');
				wp_enqueue_script( 'divienhancer-modal-trigger');
			}
	
			if($module->props['divienhancer_sticky_module'] !== 'none'){
				wp_enqueue_script( 'divienhancer-sticky');
				wp_enqueue_script( 'divienhancer-sticky-trigger');
			}
	
			if($module->props['divienhancer_interactive_bg_transform'] !== 'none'){
				wp_enqueue_script( 'divienhancer-interactive-bg');
				wp_enqueue_script( 'divienhancer-interactive-bg-trigger');
			}
		}
	


		

		


	

	return $output;
}
add_filter( 'et_module_shortcode_output', 'divienhancer_load_scripts_dynamically', 10, 3 );