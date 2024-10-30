<?php

class DIVIENHANCER_carousel extends ET_Builder_Module {

	public $slug       = 'divienhancer_carousel';
	public $vb_support = 'on';
	public $child_slug = 'divienhancer_carouselchild';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/carousel',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Carousel', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Settings', 'divienhancer' ),
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
							'h1' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h2' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h3' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h4' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h5' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h6' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),

						),
					),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts'                 => array(
				'main_text'   => array(
					'label'    => esc_html__( 'Content', 'divienhancer' ),
					'css'      => array(
						'main' => "{$this->main_css_element}",
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
						'main' => "{$this->main_css_element} h1",
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
						'main' => "{$this->main_css_element} h2",
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
						'main' => "{$this->main_css_element} h3",
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
			),
		);



	}

	public function get_fields() {
		$fields = array(
			'slides_to_show' => array(
				'label'           => esc_html__( 'Columns', 'divienhancer' ),
				'type'            => 'range',
				'mobile_options'  => true,
				'default'         => '3',
				'default_tablet'  => '1',
				'default_phone'  => '1',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'carousel_options',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
			),
			'slides_to_show_tablet'      => array(
					'type'        => 'skip',
					'toggle_slug' => 'carousel_options',
				),
			'slides_to_show_phone'      => array(
				'type'        => 'skip',
				'toggle_slug' => 'carousel_options',
			),
			'slides_to_scroll' => array(
				'label'           => esc_html__( 'Slides to Scroll', 'divienhancer' ),
				'type'            => 'range',
				'mobile_options'  => true,
				'default'         => '3',
				'default_tablet'  => '1',
				'default_phone'  => '1',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'carousel_options',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
			),
			'slides_to_scroll_tablet'      => array(
					'type'        => 'skip',
					'toggle_slug' => 'carousel_options',
				),
			'slides_to_scroll_phone'      => array(
				'type'        => 'skip',
				'toggle_slug' => 'carousel_options',
			),
			'autoplay' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Autoplay', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
			'speed' => array(
				'default'         => '3000',
				'label'           => esc_html__( 'Speed', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'1000' => esc_html__( '1s', 'divienhancer' ),
					'2000'  => esc_html__( '2s', 'divienhancer' ),
					'3000'  => esc_html__( '3s', 'divienhancer' ),
					'4000'  => esc_html__( '4s', 'divienhancer' ),
					'5000'  => esc_html__( '5s', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
			'infinite' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Infinite Scroll', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
			'arrows' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Show Arrows', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
			'custom_icons' => array(
				'default'         => 'no',
				'label'           => esc_html__( 'Use Custom Icons', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'no' => esc_html__( 'no', 'divienhancer' ),
					'yes'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
			),
			'backward_arrow' => array(
				'label'               => esc_html__( 'Custom Backward Icon', 'divienhancer' ),
				'type'                => 'select_icon',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'carousel_options',
				'description'     => esc_html__( '', 'divienhancer' ),
				'show_if'         => array('custom_icons' => 'yes'),
			),
			'forward_arrow' => array(
				'label'               => esc_html__( 'Custom Forward Icon', 'divienhancer' ),
				'type'                => 'select_icon',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'carousel_options',
				'description'     => esc_html__( '', 'divienhancer' ),
				'show_if'         => array('custom_icons' => 'yes'),
			),
			'dots' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Show Dots', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
			'arrows_color' => array(
				'label'           => esc_html__( 'Arrows Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'carousel',
			),
			'arrows_size' => array(
				'label'           => esc_html__( 'Custom Icons Size', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '15',
				'default_unit'    => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'carousel',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
				'show_if'         => array('custom_icons' => 'yes'),
				'validate_unit'    => false,
			),
			'dots_size' => array(
				'default'         => 'divienhancer-medium-dots-carousel',
				'label'           => esc_html__( 'Dot Size', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'divienhancer-small-dots-carousel' => esc_html__( 'Small', 'divienhancer' ),
					'divienhancer-medium-dots-carousel'  => esc_html__( 'Medium', 'divienhancer' ),
					'divienhancer-big-dots-carousel'  => esc_html__( 'Big', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),

		);

		//$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {

			if ( '' !== $this->props['arrows_color']  ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .slick-arrow:before, %%order_class%% .slick-arrow',
					'declaration' => sprintf(
						'color: %1$s !important;',
						esc_html( $this->props['arrows_color'] )
					),
				) );
			}


			$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';

			if(function_exists('de_pro') && function_exists('divienhancer_pro_content_carousel')){
				$output =	divienhancer_pro_content_carousel($this);
			}

			return $output;


	}

}

new DIVIENHANCER_carousel;
