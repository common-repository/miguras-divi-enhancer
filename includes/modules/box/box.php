<?php

class DIVIENHANCER_box extends ET_Builder_Module {

	public $slug       = 'divienhancer_box';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/team-member',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Box', 'divienhancer' );
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
			'main_style' => array(
				'default'         => 'debox-style-1',
				'label'           => esc_html__( 'Style', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'debox-style-1' => esc_html__( 'Style One', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the style', 'divienhancer' ),
			),
			'upload' => array(
				'show_if' 				=> array('main_style' => array('debox-style-1')),
				'label'              => esc_html__( 'Upload', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
			),
			'title' => array(
				'show_if' 				=> array('main_style' => array('debox-style-1')),
				'label'           => esc_html__( 'Title', 'divienhancer' ),
				'type'            => 'text',
				'description'     => esc_html__( 'Title', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'icon' => array(
				'show_if' 				=> array('main_style' => array('debox-style-1')),
				'label'               => esc_html__( 'Select Icon', 'divienhancer' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'toggle_slug'     => 'main_content',
			),
			'main_color' => array(
				'show_if' 				=> array('main_style' => array('debox-style-1')),
				'label'           => esc_html__( 'Main Color', 'divienhancer' ),
				'type'            => 'color',
				'toggle_slug'     => 'main_content',
			),
			'link' => array(
				'show_if' 				=> array('main_style' => array('debox-style-1')),
				'label'           => esc_html__( 'Link', 'divienhancer' ),
				'type'            => 'text',
				'description'     => esc_html__( 'Link', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'button_text' => array(
				'show_if' 				=> array('main_style' => array('debox-style-1')),
				'label'           => esc_html__( 'Button Text', 'divienhancer' ),
				'type'            => 'text',
				'description'     => esc_html__( 'Button Text', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$output = '';

		if(isset($this->props['main_style']) && $this->props['main_style'] == 'debox-style-1'){
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .divienhancer_premade_box.debox-style-1',
				'declaration' => sprintf(
					'border-color:%1$s;',
					 esc_attr($this->props['main_color'])
				),
			) );
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .divienhancer_premade_box_button',
				'declaration' => sprintf(
					'background-color:%1$s; ',
					 esc_attr($this->props['main_color'])
				),
			) );
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .divienhancer_premade_box_icon',
				'declaration' => sprintf(
					'color:%1$s;',
					 esc_attr($this->props['main_color'])
				),
			) );

			$output = sprintf(
			'
			<div class="divienhancer_premade_box %1$s">
				<img class="divienhancer_premade_box_main_image" src="%6$s"/>
				<div class="divienhancer_premade_box_content_wrapper">
					<span class="divienhancer_premade_box_icon" style="font-Family: ETmodules; ">%4$s</span>
					<h2 class="divienhancer_premade_box_title">%2$s</h2>
					<div class="divienhancer_premade_box_content">%3$s</div>
					<div class="divienhancer_premade_box_button_wrapper">
						<a class="divienhancer_premade_box_button" href="%7$s" target="_self">%8$s</a>
					</div>
				</div>
			</div>
			',
			esc_html($this->props['main_style']),
			esc_html($this->props['title']),
			$this->props['content'],
			esc_attr(et_pb_process_font_icon($this->props["icon"])),
			esc_html($this->props['main_color']),
			esc_html($this->props['upload']),
			esc_html($this->props['link']),
			esc_html($this->props['button_text'])


			);

		}


		return $output;
	}

}

new DIVIENHANCER_box;
