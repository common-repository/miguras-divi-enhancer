<?php

class DIVIENHANCER_foodmenu extends ET_Builder_Module {

	public $slug       = 'divienhancer_foodmenu';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/food-menu',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Food Menu', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main', 'divienhancer' ),
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
							'h4' => array(
								'name' => 'H4',
								'icon' => 'text-h4',
							),

						),
					),
					'icon_settings' => esc_html__( 'Icon Settings', 'divienhancer' ),
					'main_color' => esc_html__( 'Main Color', 'divienhancer' ),

				),
			),
		);

		$this->advanced_fields = array(
			'background' => array(
				'css' => array(
					'main' => "{$this->main_css_element} .divienhancer_foodmenu_wrapper",
				)
			),
			'fonts'                 => array(
				'main_text'   => array(
					'label'    => esc_html__( 'Content', 'divienhancer' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .divienhancer_foodmenu_content",
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
					'style_2'.$onlypro => esc_html__( 'Style 2'.$onlypro, 'divienhancer' ),
					'style_3'.$onlypro => esc_html__( 'Style 3'.$onlypro, 'divienhancer' ),
					'style_4'.$onlypro => esc_html__( 'Style 4'.$onlypro, 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
			),
			'upload' => array(
				'label'              => esc_html__( 'Image', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
			),
			'title' => array(
				'label'           => esc_html__( 'Title', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
			),
			'subtitle' => array(
				'label'           => esc_html__( 'Subtitle', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'style' => array( 'style_1'),
				),
			),
			'price' => array(
				'label'           => esc_html__( 'Price', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Description', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'style' => array( 'style_1', 'style_3'),
				),
			),
			'main_color' => array(
				'label'           => esc_html__( 'Main Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'main_content',
				'default'					=> '#444444',
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug ) {

		if($this->props['style'] == 'style_1'){
			return sprintf(
				'
				<div class="divienhancer_foodmenu_wrapper divienhancer_menu_%1$s">
					<img class="divienhancer_foodmenu_image" src="%2$s"/>
					<h2 class="divienhancer_foodmenu_title">%3$s</h2>
					<h3 class="divienhancer_foodmenu_subtitle">%4$s</h3>
					<h4 class="divienhancer_foodmenu_price">%5$s</h4>
					<div class="divienhancer_foodmenu_content">%6$s</div>
				</div>
				',
				esc_html($this->props['style']),
				esc_html($this->props['upload']),
				esc_html($this->props['title']),
				esc_html($this->props['subtitle']),
				esc_html($this->props['price']),
				et_sanitized_previously($this->props['content'])

			);
		}
		if($this->props['style'] != 'style_1'){
			if(function_exists('de_pro') && function_exists('divienhancer_food_menu_pro_content')){
				return divienhancer_food_menu_pro_content($this, $render_slug);
			}
			else {
				$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';
				return $output;
			}
		}
	}

}

new DIVIENHANCER_foodmenu;
