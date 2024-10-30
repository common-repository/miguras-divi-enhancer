<?php

class DIVIENHANCER_flipboxchild extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'divienhancer_flipBoxChild';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'identifier';

	// Full Visual Builder support
	public $vb_support = 'on';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 *
	 * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
	 */
	function init() {


		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'divienhancer' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = $this->advanced_tab_options;

		$advanced_fields = $this->advanced_tab_options;

		$advanced_fields['button']  = array(
			'button' => array(
				'label' => esc_html__( 'Button', 'pbcwm' ),
				'css' => array(
					'main' => "%%order_class%% .de-flipbox-button",
					'limited_main' => "%%order_class%% .de-flipbox-button",
					'alignment'   => "%%order_class%% .et_pb_button_wrapper",
				),
				'use_alignment' => true,
				'box_shadow'    => array(
					'css' => array(
						'main' => '%%order_class%% .de-flipbox-button',
					),
				),
				'margin_padding' => array(
					'css' => array(
						'main'      => "%%order_class%% .de-flipbox-button, %%order_class%% .de-flipbox-button-wrapper",
						'important' => 'all',
					),
				),
			),
		);

		return $advanced_fields;
	}


	

	public function get_fields() {
		return array(
			'identifier' => array(
				'label'           => esc_html__( 'Identifier', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This lets you identify each item at modal', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Box Content', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'displaybutton' => array(
				'default'         => 'no',
				'label'           => esc_html__( 'Display Button', 'pbc_christmas' ),
				'type'            => 'select',
				'options'         => array(
					'no' => esc_html__( 'No', 'divienhancer' ),
					'yes' => esc_html__( 'Yes', 'divienhancer' ),
				
				),
				'toggle_slug'     => 'main_content',
			),
			'button_text' => array(
				'label'           => esc_html__( 'Button Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
				'default'					=> 'Go To Page',
				'show_if'         => array(
					'displaybutton' => array( 'yes'),
				),
			),

			'button_url' => array(
				'label'           => esc_html__( 'Button Url', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
				'default'					=> '',
				'show_if'         => array(
					'displaybutton' => array( 'yes'),
				),
			),

			'button_target'      => array(
				'label'            => esc_html__( 'Link Target', 'pbcwm' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'_self'          => esc_html__( 'Same Window', 'pbcwm' ),
					'_blank'         => esc_html__( 'New Tab', 'pbcwm' ),
				),
				'description'      => esc_html__( 'Choose which type of product view you would like to display', 'pbcwm' ),
				'toggle_slug'      => 'main_content',
				'show_if'         => array(
					'displaybutton' => array( 'yes'),
				),
			),

		);
	}

	function render( $attrs, $content = null, $render_slug ) {

		$buttonRender = "";

		$button_custom                   = $this->props['custom_button'];
		$button_url                      = $this->props['button_url'];
		$button_rel                      = $this->props['button_rel'];
		$button_text                     = $this->_esc_attr( 'button_text', 'limited' );
		$custom_icon_values              = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon                     = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet              = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone               = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';
		$url_new_window                  = $this->props['button_target'];
		$multi_view                      = et_pb_multi_view_options( $this );

		// Render button
		$button = $this->render_button( array(
			'button_classname'    => array( 'de-flipbox-button' ),
			'button_custom'       => $button_custom,
			'button_rel'          => $button_rel,
			'button_text'         => $button_text,
			'button_text_escaped' => true,
			'button_url'          => $button_url,
			'custom_icon'         => $custom_icon,
			'custom_icon_tablet'  => $custom_icon_tablet,
			'custom_icon_phone'   => $custom_icon_phone,
			'url_new_window'      => $url_new_window,
			'display_button'      => ( '' !== $button_url && $multi_view->has_value( 'button_text' ) ),
			'multi_view_data'     => $multi_view->render_attrs( array(
				'content'    => '{{button_text}}',
				'visibility' => array(
					'button_text' => '__not_empty',
					'button_url'  => '__not_empty',
				),
			) ),
		) );
		
		if(isset($button) && !empty($button)){
			$buttonRender = '<div class="de-flipbox-button-wrapper">'.$button.'</div>';
		}

				
		return sprintf('
			<div class="divienhancer_flipbox_box">
				%1$s
				%2$s
			</div>',
			et_sanitized_previously( $this->content ),
			$buttonRender
		);
	}
}

new DIVIENHANCER_flipboxchild;
