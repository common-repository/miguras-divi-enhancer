<?php

class DIVIENHANCER_pricebox extends ET_Builder_Module {

	public $slug       = 'divienhancer_priceBox';
	public $vb_support = 'on';




	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/pricebox',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Price Box', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Settings', 'divienhancer' ),
					'priceboxlink' => esc_html__( 'Price Box Link', 'divienhancer' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => array(
						'title'    => esc_html__( 'Text', 'divienhancer' ),
						'priority' => 45,
						'bb_icons_support' => true,
					),
					'priceboxheader' => array('title'	=> esc_html__( 'Price Box Header', 'divienhancer' ),),
					'priceboxprice'	=> array('title'	=> esc_html__( 'PriceBox Price', 'divienhancer' ),),
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
			'style' => array(
				'default'         => 'style_1',
				'label'           => esc_html__( 'Style', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'style_1' => esc_html__( 'Style 1', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
			),
			'divi_se_vimeobg_width' => array(
		      'mobile_options'  => true,
		      'default'         => 'height',
		      'default_tablet'  => 'height',
		      'default_phone'  => 'height',
					'label'           => esc_html__( 'Video Width & Height', 'divi_sections_enhancer' ),
					'type'            => 'select',
					'options'         => array(
						'height' => esc_html__( 'Adjust to Section Height', 'divi_sections_enhancer' ),
		        'width'  => esc_html__( 'Use default Size', 'divi_sections_enhancer' ),
		        'screen'  => esc_html__( 'Adjust Video height as Screen Height', 'divi_sections_enhancer' ),
		        'parallax'  => esc_html__( 'Adjust Video height as Screen Height with parallax', 'divi_sections_enhancer' ),
					),
					'tab_slug'				=> 'custom_css',
					'toggle_slug'			=> 'custom_css',
					'description'     => esc_html__( '', 'divi_sections_enhancer' ),
					'divi_se_vimeobg_width_tablet'      => array(
							'type'        => 'skip',
							'toggle_slug' => 'custom_css',
						),
					'divi_se_vimeobg_width_phone'      => array(
						'type'        => 'skip',
						'toggle_slug' => 'custom_css',
					),


			),
			'title' => array(
				'label'           => esc_html__( 'Title', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> 'PriceBox Title (h4)'
			),
			'icontitle' => array(
				'label'               => esc_html__( 'Select Icon', 'divienhancer' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'toggle_slug'     => 'main_content',
			),
			'intro' => array(
				'label'           => esc_html__( 'Intro Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> 'PriceBox Intro (h5)'
			),
			'price' => array(
				'label'           => esc_html__( 'Price', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> '29.90 (h2)'
			),
			'currency' => array(
				'label'           => esc_html__( 'Currency Symbol', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> '$'
			),
			'pricesubtitle' => array(
				'label'           => esc_html__( 'Price Subtitle', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> 'PriceBox Subtitle (h3)'
			),
			'description' => array(
				'label'           => esc_html__( 'Price Description', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'default'					=> 'PriceBox Description (h6)'
			),
			'content' => array(
				'label'           => esc_html__( 'Features', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'style' => array( 'style_1'),
				),
				'default_on_front'	=> '<ul><li>This Feature is <strong>Included</strong></li><li>This Feature is <strong>Included</strong></li><li>This Feature is <strong>Included</strong></li><li>This Feature is <strong>NOT</strong> Included</li><li>This Feature is <strong>NOT</strong> Included</li></ul>',
				'default'	=> '<ul><li>This Feature is <strong>Included</strong></li><li>This Feature is <strong>Included</strong></li><li>This Feature is <strong>Included</strong></li><li>This Feature is <strong>NOT</strong> Included</li><li>This Feature is <strong>NOT</strong> Included</li></ul>'
			),
			'featured' => array(
				'default'         => 'no',
				'label'           => esc_html__( 'Featured Box', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'no' => esc_html__( 'No', 'divienhancer' ),
					'yes' => esc_html__( 'Yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
			'headerbackground' => array(
				'default'           => '#111111',
				'label'             => esc_html__( 'Main Title Background Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'priceboxheader',
			),
			'pricebackground' => array(
				'default'           => '#222222',
				'label'             => esc_html__( 'Price Background Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'priceboxprice',
			),
			'ctalink' => array(
				'label'           => esc_html__( 'PriceBox Link', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'priceboxlink',
				'default'					=> '#'
			),
			'ctatext' => array(
				'label'           => esc_html__( 'PriceBox Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'priceboxlink',
				'default'					=> 'Go to service'
			),
			'ctacolor' => array(
				'default'           => '#ffffff',
				'label'             => esc_html__( 'Text Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'toggle_slug'       => 'priceboxlink',
			),
			'ctabackground' => array(
				'default'           => '#008a81',
				'label'             => esc_html__( 'Background Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'toggle_slug'       => 'priceboxlink',
			),
			'ctasize' => array(
				'label'           => esc_html__( 'Text Size', 'divienhancer' ),
				'default'           => '16px',
				'type'            => 'range',
				'toggle_slug'     => 'priceboxlink',
			),

		);
		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .divienhancer_pricebox_head',
			'declaration' => sprintf(
				'background-color:%1$s;',
				 esc_attr($this->props['headerbackground'])
			),
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .divienhancer_pricebox_head_two',
			'declaration' => sprintf(
				'background-color:%1$s;',
				 esc_attr($this->props['pricebackground'])
			),
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .divienhancer_pricebox_link',
			'declaration' => sprintf(
				'background-color:%1$s; color:%2$s; font-size:%3$s;',
				 esc_attr($this->props['ctabackground']),
				 esc_attr($this->props['ctacolor']),
				 esc_attr($this->props['ctasize'])
			),
		) );


		$headicon = '<span class="divienhancer_pricebox_icon" style="font-Family: ETmodules;">'.esc_attr( et_pb_process_font_icon( $this->props["icontitle"])).'</span>';

		return sprintf('
			<div class="divienhancer_pricebox_container divienhancer_pricebox_featured_%1$s"}>
				<div class="divienhancer_pricebox_head">
					<h4 class="divienhancer_pricebox_title">
						%2$s
						<span>%10$s</span>
					</h4>
				</div>

				<div class="divienhancer_pricebox_head_two">
					<h5 class="divienhancer_pricebox_intro">%3$s</h5>
					<h2 class="divienhancer_pricebox_price">
						<span class="divienhancer_pricebox_currency">%4$s</span><span>%11$s</span>
					</h2>
					<h3 class="divienhancer_pricebox_subtitle">%5$s</h3>
					<h6 class="divienhancer_pricebox_description">%6$s</h6>
				</div>

				<div class="divienhancer_pricebox_list">
					%7$s
				</div>
				<a class="divienhancer_pricebox_link" href="%8$s">%9$s</a>

			</div>
			',
			esc_html($this->props['featured']),
			$headicon,
			esc_html($this->props['intro']),
			esc_html($this->props['currency']),
			esc_html($this->props['pricesubtitle']),
			esc_html($this->props['description']),
			et_sanitized_previously( $this->content ),
			esc_html($this->props['ctalink']),
			esc_html($this->props['ctatext']),
			esc_html($this->props['title']),
			esc_html($this->props['price'])
		);

	}

}

new DIVIENHANCER_pricebox;
