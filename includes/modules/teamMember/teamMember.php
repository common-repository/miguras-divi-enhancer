<?php

class DIVIENHANCER_teammember extends ET_Builder_Module {

	public $slug       = 'divienhancer_team_member';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/team-member',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Team Member', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Member Main Info', 'divienhancer' ),
					'networks' => esc_html__( 'Networks', 'divienhancer' ),
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
					'icon_settings' => esc_html__( 'Icon Settings', 'divienhancer' ),
					'main_color' => esc_html__( 'Main Color', 'divienhancer' ),

				),
			),
		);

		$this->advanced_fields = array(
			'fonts'                 => array(
				'main_text'   => array(
					'label'    => esc_html__( 'Content', 'divienhancer' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .divienhancer_team_member_description",
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
			'upload' => array(
				'label'              => esc_html__( 'Member Image', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
			),
			'name' => array(
				'label'           => esc_html__( 'Member Name', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Member Name', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'position' => array(
				'label'           => esc_html__( 'Position', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Position', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Description', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Member Description', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'style' => array(
				'default'         => 'effect_1',
				'label'           => esc_html__( 'Member Style', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'effect_1' => esc_html__( 'Style 1', 'divienhancer' ),
					'effect_2'.$onlypro => esc_html__( 'Style 2'.$onlypro, 'divienhancer' ),
					'effect_3'.$onlypro => esc_html__( 'Style 3'.$onlypro, 'divienhancer' ),
					'effect_4'.$onlypro => esc_html__( 'Style 4'.$onlypro, 'divienhancer' ),
					'effect_5'.$onlypro => esc_html__( 'Style 5'.$onlypro, 'divienhancer' ),
					'effect_6'.$onlypro => esc_html__( 'Style 6'.$onlypro, 'divienhancer' ),
					'effect_7'.$onlypro => esc_html__( 'Style 7'.$onlypro, 'divienhancer' ),
					'effect_8'.$onlypro => esc_html__( 'Style 8'.$onlypro, 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
			),
			'first_icon_type' => array(
				'default'         => '%%291%%',
				'label'           => esc_html__( 'First Network Icon', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'none' => esc_html__( 'None', 'divienhancer' ),
					'%%291%%' => esc_html__( 'Facebook', 'divienhancer' ),
					'%%292%%' => esc_html__( 'Twitter', 'divienhancer' ),
					'%%293%%' => esc_html__( 'Pinterest', 'divienhancer' ),
					'%%294%%' => esc_html__( 'Google', 'divienhancer' ),
					'%%295%%' => esc_html__( 'Tumblr', 'divienhancer' ),
					'%%298%%' => esc_html__( 'Instagram', 'divienhancer' ),
					'%%299%%' => esc_html__( 'Dribbble', 'divienhancer' ),
					'%%300%%' => esc_html__( 'Vimeo', 'divienhancer' ),
					'%%301%%' => esc_html__( 'Linkedin', 'divienhancer' ),
					'%%306%%' => esc_html__( 'Skype', 'divienhancer' ),
					'%%307%%' => esc_html__( 'Youtube', 'divienhancer' ),

				),
				'toggle_slug'     => 'networks',
				'description'     => esc_html__( 'Choose the network icon', 'divienhancer' ),
			),
			'first_icon_link' => array(
				'label'           => esc_html__( 'First Network link ', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'First Link Icon', 'divienhancer' ),
				'toggle_slug'     => 'networks',
			),
			'second_icon_type' => array(
				'default'         => '%%291%%',
				'label'           => esc_html__( 'Second Network Icon', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'none' => esc_html__( 'None', 'divienhancer' ),
					'%%291%%' => esc_html__( 'Facebook', 'divienhancer' ),
					'%%292%%' => esc_html__( 'Twitter', 'divienhancer' ),
					'%%293%%' => esc_html__( 'Pinterest', 'divienhancer' ),
					'%%294%%' => esc_html__( 'Google', 'divienhancer' ),
					'%%295%%' => esc_html__( 'Tumblr', 'divienhancer' ),
					'%%298%%' => esc_html__( 'Instagram', 'divienhancer' ),
					'%%299%%' => esc_html__( 'Dribbble', 'divienhancer' ),
					'%%300%%' => esc_html__( 'Vimeo', 'divienhancer' ),
					'%%301%%' => esc_html__( 'Linkedin', 'divienhancer' ),
					'%%306%%' => esc_html__( 'Skype', 'divienhancer' ),
					'%%307%%' => esc_html__( 'Youtube', 'divienhancer' ),

				),
				'toggle_slug'     => 'networks',
				'description'     => esc_html__( 'Choose the network icon', 'divienhancer' ),
			),
			'second_icon_link' => array(
				'label'           => esc_html__( 'Second Network link ', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Second Link Icon', 'divienhancer' ),
				'toggle_slug'     => 'networks',
			),
			'third_icon_type' => array(
				'default'         => '%%291%%',
				'label'           => esc_html__( 'Third Network Icon', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'none' => esc_html__( 'None', 'divienhancer' ),
					'%%291%%' => esc_html__( 'Facebook', 'divienhancer' ),
					'%%292%%' => esc_html__( 'Twitter', 'divienhancer' ),
					'%%293%%' => esc_html__( 'Pinterest', 'divienhancer' ),
					'%%294%%' => esc_html__( 'Google', 'divienhancer' ),
					'%%295%%' => esc_html__( 'Tumblr', 'divienhancer' ),
					'%%298%%' => esc_html__( 'Instagram', 'divienhancer' ),
					'%%299%%' => esc_html__( 'Dribbble', 'divienhancer' ),
					'%%300%%' => esc_html__( 'Vimeo', 'divienhancer' ),
					'%%301%%' => esc_html__( 'Linkedin', 'divienhancer' ),
					'%%306%%' => esc_html__( 'Skype', 'divienhancer' ),
					'%%307%%' => esc_html__( 'Youtube', 'divienhancer' ),

				),
				'toggle_slug'     => 'networks',
				'description'     => esc_html__( 'Choose the network icon', 'divienhancer' ),
			),
			'third_icon_link' => array(
				'label'           => esc_html__( 'Third Network link ', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Third Link Icon', 'divienhancer' ),
				'toggle_slug'     => 'networks',
			),
			'icons_color' => array(
				'default'           => '#d3d3d3',
				'label'             => esc_html__( 'Icons Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color for your icons.', 'divienhancer' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
			),
			'icons_size' => array(
				'label'           => esc_html__( 'Icons Size', 'divienhancer' ),
				'default'           => '20px',
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'icons_alignment' => array(
				'default'         => 'center',
				'label'           => esc_html__( 'Icons Alignment', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'left' => esc_html__( 'Left', 'divienhancer' ),
					'center' => esc_html__( 'Center', 'divienhancer' ),
					'right' => esc_html__( 'Right', 'divienhancer' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'description'     => esc_html__( 'Icon Alignment', 'divienhancer' ),
			),
			'main_color' => array(
				'default'           => '#333333',
				'label'             => esc_html__( 'Main Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'this color will be used in different ways, effect deppends.', 'divienhancer' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'main_color',
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .divienhancer_team_member_networks, %%order_class%% .divienhancer_team_member_networks a',
			'declaration' => sprintf(
				'border-color:%1$s; color:%1$s;',
				 esc_attr($this->props['icons_color'])
			),
		) );

		$iconone = $icontwo = $iconthree = '';

		if(isset($this->props["first_icon_type"]) && $this->props["first_icon_type"] != 'none' ){
			$iconone = '<a href="'.esc_attr($this->props["first_icon_link"]).'"><span style="font-Family: ETmodules; font-Size:'.esc_attr($this->props["icons_size"]).';">'.esc_attr( et_pb_process_font_icon( $this->props["first_icon_type"])).'</span></a>';
		}
		if(isset($this->props["second_icon_type"]) && $this->props["second_icon_type"] != 'none' ){
			$icontwo = '<a href="'.esc_attr($this->props["second_icon_link"]).'"><span style="font-Family: ETmodules; font-Size:'.esc_attr($this->props["icons_size"]).';">'.esc_attr( et_pb_process_font_icon( $this->props["second_icon_type"])).'</span></a>';
		}
		if(isset($this->props["third_icon_type"]) && $this->props["third_icon_type"] != 'none' ){
			$iconthree = '<a href="'.esc_attr($this->props["third_icon_link"]).'"><span style="font-Family: ETmodules; font-Size:'.esc_attr($this->props["icons_size"]).';">'.esc_attr( et_pb_process_font_icon( $this->props["third_icon_type"])).'</span></a>';
		}

		if(function_exists('de_pro') && function_exists('divienhancer_pro_team_member_content')){
				return divienhancer_pro_team_member_content($this, $iconone, $icontwo, $iconthree);
		}
		else {
			if($this->props['style'] === 'effect_1'){

				return sprintf('
				<div data-color="%9$s" class="divienhancer_module divienhancer_team_member %1$s">
					<img class="divienhancer_team_member_image" src="%2$s"/>

				<div class="divienhancer_team_member_content">
						<div class="divienhancer_team_member_maininfo">
							<h2 class="divienhancer_team_member_name">
								%3$s
							</h2>
							<h3 class="divienhancer_team_member_position">
								%4$s
							</h3>
						</div>
						<div class="divienhancer_team_member_description">
							%5$s
						</div>
						<div class="divienhancer_team_member_networks divienhancer_member_icons_%10$s">
									%6$s
									%7$s
									%8$s
						</div>
					</div>

				</div>
				',

					esc_html($this->props['style']),
					esc_html($this->props['upload']),
					esc_html($this->props['name']),
					esc_html($this->props['position']),
					$this->props['content'],
					$iconone,
					$icontwo,
					$iconthree,
					esc_html($this->props['main_color']),
					esc_html($this->props['icons_alignment'])

				);
			}
			else {
				$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';
				return $output;
			}
		}



	}

}

new DIVIENHANCER_teammember;
