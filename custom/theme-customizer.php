<?php

/*=================== NEW OPTIONS ======================*/
function mig_theme_customizer_controls($wp_customize){
    $theme = wp_get_theme(); // gets the current theme


    //Bing Key
    $wp_customize->add_setting( 'divienhancer_bing_key', array(
      'default'		=> '',
      'type'			=> 'option',
      'capability'	=> 'edit_theme_options',
      'transport'		=> 'refresh',
    ) );

    $wp_customize->add_control( 'divienhancer_bing_key', array(
      'label'		=> esc_html__( 'Divi Enhancer Bing Key', 'divienhancer' ),
      'section'	=> 'title_tagline',
      'type'		=> 'textarea',
      'settings'	=> 'divienhancer_bing_key',
    ) );

    if ( 'Divi' == $theme->name || 'Divi' == $theme->parent_theme ) {
     //////////////////////// Dropdown Font Size
     $wp_customize->add_setting( 'divienhancer_dropdown_font_size', array(
  			'default'       => '',
  			'type'          => 'option',
  			'capability'    => 'edit_theme_options',
  			'transport'     => 'refresh',
  			'sanitize_callback' => 'absint',
  		) );

  	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'divienhancer_dropdown_font_size', array(
  		'label'	      => esc_html__( 'Dropdown Text Size', 'divienhancer' ),
  		'section'     => 'et_divi_header_primary',
  		'type'        => 'range',
  		'input_attrs' => array(
  			'min'  => 5,
  			'max'  => 40,
  			'step' => 1
  		),
  	) ) );
  }

  if ( 'Divi' == $theme->name || 'Divi' == $theme->parent_theme ) {
    //footer display
    $wp_customize->add_setting( 'divienhancer_footer_display', array(
      'default'		=> 'both',
      'type'			=> 'option',
      'capability'	=> 'edit_theme_options',
      'transport'		=> 'refresh',
    ) );

    $wp_customize->add_control( 'divienhancer_footer_display', array(
      'label'		=> esc_html__( 'Footer Visibility', 'divienhancer' ),
      'section'	=> 'et_divi_footer_layout',
      'type'		=> 'select',
      'settings'	=> 'divienhancer_footer_display',
      'choices'	=> array(
        'both' => 'Both(Widgets & Bar)',
        'footer_widgets' => 'Only Widgets Area',
        'footer_bottom' => 'Only Bottom Bar',
        'none' => 'None',
      ),
    ) );
  }

  if ( 'Divi' == $theme->name || 'Divi' == $theme->parent_theme ) {
      // Mobile Logo size
      //////////////////////// Dropdown Font Size
      $wp_customize->add_setting( 'divienhancer_mobile_logosize', array(
         'default'       => '',
         'type'          => 'option',
         'capability'    => 'edit_theme_options',
         'transport'     => 'refresh',
         'sanitize_callback' => 'absint',
       ) );

     $wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'divienhancer_mobile_logosize', array(
       'label'	      => esc_html__( 'Logo Size (px)', 'divienhancer' ),
       'section'     => 'et_divi_mobile_menu',
       'type'        => 'range',
       'input_attrs' => array(
         'min'  => 0,
         'max'  => 100,
         'step' => 1
       ),
     ) ) );
  }

}

add_action('customize_register', 'mig_theme_customizer_controls', 999);



?>
