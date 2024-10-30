<?php

class DIVIENHANCER_timelineChild extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'divienhancer_timeLineChild';

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

		$this->main_css_element = '%%order_class%%';
		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'divienhancer' ),
					'main_styles' => esc_html__( 'Styles', 'divienhancer' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => array(
						'title'    => esc_html__( 'Text', 'divienhancer' ),
						'priority' => 45,
						'bb_icons_support' => true,
					),
					'header' => array(
						'title'    => esc_html__( 'Heading Text', 'divienhancer' ),
						'priority' => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles' => array(
							'h2' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h3' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),


						),
					),
				),
			),
		);
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
			'title' => array(
				'label'           => esc_html__( 'Title', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as title.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'date' => array(
				'label'           => esc_html__( 'Date', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as date.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'icon' => array(
				'label'               => esc_html__( 'Select Icon', 'divienhancer' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Main Content', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'icon_size' => array(
				'default'         => 'medium',
				'label'           => esc_html__( 'Icon Size', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'small' => esc_html__( 'Small', 'divienhancer' ),
					'medium'  => esc_html__( 'Medium', 'divienhancer' ),
					'large'  => esc_html__( 'Large', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_styles',
			),
			'icon_color' => array(
				'label'           => esc_html__( 'Icon Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'main_styles',
			),
			'icon_background' => array(
				'label'           => esc_html__( 'Icon Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'main_styles',
			),
		);


	}
	public function get_advanced_fields_config() {
		$advanced_fields = $this->advanced_tab_options;

		$advanced_fields['background'] = array(
			'css' => array(
				'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner",
			)
		);
		$advanced_fields['margin_padding'] = array(
			'css' => array(
				'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner",
			),
		);

		$advanced_fields['fonts']  = array(
			'main_text'   => array(
				'label'    => esc_html__( 'Content', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner",
				),
				'font_size' => array(
					'default' => absint( '14' ) . 'px',
				),
				'line_height' => array(
					'default' => '1.4em',
				),
				'letter_spacing' => array(
					'default' => '0px',
				),
				'toggle_slug' => 'text',
			),
			'header'   => array(
				'label'    => esc_html__( 'Heading', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner h1",
				),
				'font_size' => array(
					'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
				),
				'toggle_slug' => 'header',
				'sub_toggle'  => 'h1',
			),
			'header_2'   => array(
				'label'    => esc_html__( 'Heading 2', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner h2",
				),
				'font_size' => array(
					'default' => '26px',
				),
				'line_height' => array(
					'default' => '1em',
				),
				'toggle_slug' => 'header',
				'sub_toggle'  => 'h2',
			),
			'header_3'   => array(
				'label'    => esc_html__( 'Heading 3', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} .divienhancer_timeline_date h3",
				),
				'font_size' => array(
					'default' => '22px',
				),
				'line_height' => array(
					'default' => '1em',
				),
				'toggle_slug' => 'header',
				'sub_toggle'  => 'h3',
			),
			'header_4'   => array(
				'label'    => esc_html__( 'Heading 4', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} h4",
				),
				'font_size' => array(
					'default' => '18px',
				),
				'line_height' => array(
					'default' => '1em',
				),
				'toggle_slug' => 'header',
				'sub_toggle'  => 'h4',
			),
			'header_5'   => array(
				'label'    => esc_html__( 'Heading 5', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} h5",
				),
				'font_size' => array(
					'default' => '16px',
				),
				'line_height' => array(
					'default' => '1em',
				),
				'toggle_slug' => 'header',
				'sub_toggle'  => 'h5',
			),
			'header_6'   => array(
				'label'    => esc_html__( 'Heading 6', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} h6",
				),
				'font_size' => array(
					'default' => '14px',
				),
				'line_height' => array(
					'default' => '1em',
				),
				'toggle_slug' => 'header',
				'sub_toggle'  => 'h6',
			),
		);



		return $advanced_fields;
	}

	function render( $attrs, $content = null, $render_slug ) {

		return sprintf(
			'
			<h3 class="divienhancer_timeline_date">%2$s</h3>
			<div class="divienhancer_timeline_icon_wrapper"><div class="divienhancer_timeline_icon divienhancer_iconsize_%4$s" style="color:%6$s; background-color:%7$s; font-family: ETmodules;">%3$s</div></div>
			<div class="divienhancer_timeline_child_inner">
				<h2 class="divienhancer_timeline_title">%1$s</h2>
				<div class="divienhancer_timeline_content">%5$s</div>
			</div>
			',
			esc_html($this->props['title']),
			esc_html($this->props['date']),
			esc_html(et_pb_process_font_icon($this->props['icon'])),
			esc_html($this->props['icon_size']),
			et_sanitized_previously( $this->content ),
			esc_html($this->props['icon_color']),
			esc_html($this->props['icon_background'])
		);
	}
}

new DIVIENHANCER_timelineChild;
