<?php

class DIVIENHANCER_iHover extends ET_Builder_Module {

	public $slug       = 'divienhancer_ihover';
	public $vb_support = 'on';


	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/ihover',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE iHover', 'divienhancer' );
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

						),
					),
				),
			),
		);
		$this->advanced_fields = array(
			/*
			'max_width'                => array(
				'options' => array(
					'width' => array(
						'default'         => '220px',
					),
				),
			),
			*/
			
			'fonts'                 => array(
				'main_text'   => array(
					'label'    => esc_html__( 'Content', 'divienhancer' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .divienhancer_ihover .info",
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
			
			'content' => array(
				'label'           => esc_html__( 'Content', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'upload' => array(
				'label'              => esc_html__( 'Upload', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
			),
			'shape' => array(
				'default'         => 'circle',
				'label'           => esc_html__( 'Shape', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'circle' => esc_html__( 'Circle', 'divienhancer' ),
					'square' => esc_html__( 'Square'.$onlypro, 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
			),
			'style' => array(
				'default'         => 'effect1',
				'label'           => esc_html__( 'Effect Style', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'effect1' => esc_html__( 'Effect 1', 'divienhancer' ),
					'effect2' => esc_html__( 'Effect 2', 'divienhancer' ),
					'effect3' => esc_html__( 'Effect 3', 'divienhancer' ),
					'effect4'.$onlypro => esc_html__( 'Effect 4'.$onlypro, 'divienhancer' ),
					'effect5'.$onlypro => esc_html__( 'Effect 5'.$onlypro, 'divienhancer' ),
					'effect6'.$onlypro => esc_html__( 'Effect 6'.$onlypro, 'divienhancer' ),
					'effect7'.$onlypro => esc_html__( 'Effect 7'.$onlypro, 'divienhancer' ),
					'effect8'.$onlypro => esc_html__( 'Effect 8'.$onlypro, 'divienhancer' ),
					'effect9'.$onlypro => esc_html__( 'Effect 9'.$onlypro, 'divienhancer' ),
					'effect10'.$onlypro => esc_html__( 'Effect 10'.$onlypro, 'divienhancer' ),
					'effect11'.$onlypro => esc_html__( 'Effect 11'.$onlypro, 'divienhancer' ),
					'effect12'.$onlypro => esc_html__( 'Effect 12'.$onlypro, 'divienhancer' ),
					'effect13'.$onlypro => esc_html__( 'Effect 13'.$onlypro, 'divienhancer' ),
					'effect14'.$onlypro => esc_html__( 'Effect 14'.$onlypro, 'divienhancer' ),
					'effect15'.$onlypro => esc_html__( 'Effect 15'.$onlypro, 'divienhancer' ),
					'effect16'.$onlypro => esc_html__( 'Effect 16'.$onlypro, 'divienhancer' ),
					'effect17'.$onlypro => esc_html__( 'Effect 17'.$onlypro, 'divienhancer' ),
					'effect18'.$onlypro => esc_html__( 'Effect 18'.$onlypro, 'divienhancer' ),
					'effect19'.$onlypro => esc_html__( 'Effect 19'.$onlypro, 'divienhancer' ),
					'effect20'.$onlypro => esc_html__( 'Effect 20'.$onlypro, 'divienhancer' ),


				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
				'show_if'         => array(
					'shape' => 'circle',
				),
			),
			'squarestyle' => array(
				'default'         => 'effect1',
				'label'           => esc_html__( 'Effect Style', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'effect1'.$onlypro => esc_html__( 'Effect 1'.$onlypro, 'divienhancer' ),
					'effect2'.$onlypro => esc_html__( 'Effect 2'.$onlypro, 'divienhancer' ),
					'effect3'.$onlypro => esc_html__( 'Effect 3'.$onlypro, 'divienhancer' ),
					'effect4'.$onlypro => esc_html__( 'Effect 4'.$onlypro, 'divienhancer' ),
					'effect5'.$onlypro => esc_html__( 'Effect 5'.$onlypro, 'divienhancer' ),
					'effect6'.$onlypro => esc_html__( 'Effect 6'.$onlypro, 'divienhancer' ),
					'effect7'.$onlypro => esc_html__( 'Effect 7'.$onlypro, 'divienhancer' ),
					'effect8'.$onlypro => esc_html__( 'Effect 8'.$onlypro, 'divienhancer' ),
					'effect9'.$onlypro => esc_html__( 'Effect 9'.$onlypro, 'divienhancer' ),
					'effect10'.$onlypro => esc_html__( 'Effect 10'.$onlypro, 'divienhancer' ),
					'effect11'.$onlypro => esc_html__( 'Effect 11'.$onlypro, 'divienhancer' ),
					'effect12'.$onlypro => esc_html__( 'Effect 12'.$onlypro, 'divienhancer' ),
					'effect13'.$onlypro => esc_html__( 'Effect 13'.$onlypro, 'divienhancer' ),
					'effect14'.$onlypro => esc_html__( 'Effect 14'.$onlypro, 'divienhancer' ),
					'effect15'.$onlypro => esc_html__( 'Effect 15'.$onlypro, 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
				'show_if'         => array(
					'shape' => 'square',
				),
			),
			'main_color' => array(
				'label'           => esc_html__( 'Main Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'main_content',
			),
			'link' => array(
				'label'           => esc_html__( 'link (Optional, you can use the module link)', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'link', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		wp_enqueue_script( 'divienhancer-ihover-trigger');

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .divienhancer_ihover a',
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $this->props['main_color'] )
				),
			) );


		if(function_exists('de_pro') && function_exists('divienhancer_pro_ihover_content')){
			return divienhancer_pro_ihover_content($this);
		}

		else {
			if($this->props['style'] === 'effect1' || $this->props['style'] === 'effect2' || $this->props['style'] === 'effect3'){
				return sprintf('
				<div class="ih-item divienhancer_ihover circle left_to_right  %1$s"><a href="%2$s">
					<div class="img"><img src="%3$s" alt="img"/></div>
					<div class="info" style="background-color:%4$s;">
						%5$s
				</div></a></div>
					',

					esc_html($this->props['style']),
					esc_html($this->props['link']),
					esc_html($this->props['upload']),
					esc_html($this->props['main_color']),
					$this->props['content']
				);
			}
			else {
				$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';
				return $output;
			}
		}

	}

}

new DIVIENHANCER_iHover;
