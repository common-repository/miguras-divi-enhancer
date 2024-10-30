<?php

class DIVIENHANCER_bingmap extends ET_Builder_Module {

	public $slug       = 'divienhancer_bingMap';
	public $vb_support = 'on';
	public $child_slug = 'divienhancer_bingMapChild';




	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/bingmap',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Bing Map', 'divienhancer' );
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
								'name' => 'H1',
								'icon' => 'text-h1',
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
								'name' => 'H4',
								'icon' => 'text-h4',
							),
							'h5' => array(
								'name' => 'H5',
								'icon' => 'text-h5',
							),
							'h6' => array(
								'name' => 'H6',
								'icon' => 'text-h6',
							),

						),
					),
				),
			),
		);

		$this->advanced_fields = array(
			'height'                => array(
				'css' => array(
					'main'    => '%%order_class%%',
				),
				'options' => array(
					'height' => array(
						'default'         => '440px',
						'default_tablet'  => '350px',
						'default_phone'   => '200px',
					),
				),
			),
			'fonts'                 => array(
				'main_text'   => array(
					'label'    => esc_html__( 'Content', 'divienhancer' ),
					'css'      => array(
						'main' => "{$this->main_css_element}",
					),
					'font_size' => array(
						'default' => absint( '12' ) . 'px',
					),
					'text_align' => array(
						'default' => 'center',
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
						'default' => '60px',
					),
					'text_align' => array(
						'default' => 'center',
					),
					'color' => array(
						'default' => '#ffffff',
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
						'default' => '15px',
					),
					'color' => array(
						'default' => '#00f2e2',
					),
					'text_align' => array(
						'default' => 'center',
					),
					'font_weight' => array(
						'default' => 'Bold',
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
						'default' => '19px',
					),
					'text_align' => array(
						'default' => 'left',
					),
					'color' => array(
						'default' => '#ffffff',
					),
					'font_weight' => array(
						'default' => 'Bold',
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
					'color' => array(
						'default' => '#d1d1d1',
					),
					'text_align' => array(
						'default'	=> 'center',
					),
					'font_size' => array(
						'default' => '11px',
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
						'default' => '11px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'color' => array(
						'default' => '#ffffff',
					),
					'text_align' => array(
						'default' => 'center',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h6',
				),
			),
		);



	}

	public function get_fields() {
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

		$fields = array(
			'coordinates' => array(
				'label'           => esc_html__( 'Map Center Address or Coordinates (Latitude, Longitude)', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> 'london',
				'description'			=> ''
			),
			'zoom' => array(
				'label'           => esc_html__( 'Map Zoom', 'divienhancer' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> '16',
				'default_unit'		=> '',
				'validate_unit'	=> false,
				'description'			=> '',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '21',
					'step' => '1',
				),
			),
			'maptype' => array(
				'default'         => 'road',
				'label'           => esc_html__( 'Map Type', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'road' => esc_html__( 'Road', 'divienhancer' ),
					'aerial' => esc_html__( 'Aerial', 'divienhancer' ),
					'canvasDark' => esc_html__( 'Canvas Dark', 'divienhancer' ),
					'canvasLight' => esc_html__( 'Canvas Light', 'divienhancer' ),
					'grayscale' => esc_html__( 'Gray Scale', 'divienhancer' ),
					'birdseye' => esc_html__( 'Birds Eye', 'divienhancer' ),
					'streetside' => esc_html__( 'Streetside', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'more info: https://msdn.microsoft.com/en-us/library/mt712700.aspx', 'divienhancer' ),
			),
		

		);
		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		wp_enqueue_script( 'divienhancer-bingmap');
		wp_enqueue_script( 'divienhancer-bingmap-trigger');

		/*
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .divienhancer_pricebox_head',
			'declaration' => sprintf(
				'background-color:%1$s;',
				 esc_attr($this->props['headerbackground'])
			),
		) );
		*/

		return sprintf('
			<div data-id="%1$s" data-address="%6$s"  data-zoom="%2$s" data-type="%3$s" class="divienhancer_bing_map" style="position:relative; width:%4$s; height:%5$s;">
			<div class="divienhancer_bing_map_load"></div>	
			%7$s
			</div>
			',
			'',
			esc_html($this->props['zoom']),
			esc_html($this->props['maptype']),
			esc_html($this->props['width']),
			esc_html($this->props['height']),
			esc_html($this->props['coordinates']),
			et_sanitized_previously( $this->content )
		);

	}

}

new DIVIENHANCER_bingmap;
