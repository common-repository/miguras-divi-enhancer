<?php

class DIVIENHANCER_imagecomparison extends ET_Builder_Module {

	public $slug       = 'divienhancer_image_comparison';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/team-member',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Image Comparison', 'divienhancer' );
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
			'before_upload' => array(
				'label'              => esc_html__( 'Before Image', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
			),
			'before_text' => array(
				'label'           => esc_html__( 'Before Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Set a custom before label', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'after_upload' => array(
				'label'              => esc_html__( 'After Image', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
			),
			'after_text' => array(
				'label'           => esc_html__( 'After Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Set a custom after label', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'orientation' => array(
				'label'           => esc_html__( 'Orientation', 'divienhancer' ),
				'default'					=> 'horizontal',
				'type'            => 'select',
				'options'         => array(
					'horizontal' => esc_html__( 'Horizontal', 'divienhancer' ),
					'vertical'  => esc_html__( 'Vertical', 'divienhancer' ),
				),
				'description'			=> esc_html__('Orientation of the before and after images ', 'divienhancer'),
				'toggle_slug'     => 'main_content',
			),
			'visible' => array(
				'label'           => esc_html__( 'Before Visible Percent', 'divienhancer' ),
				'default'					=> '0.5',
				'type'            => 'select',
				'options'         => array(
					'0' => esc_html__( '0%', 'divienhancer' ),
					'0.1' => esc_html__( '10%', 'divienhancer' ),
					'0.2' => esc_html__( '20%', 'divienhancer' ),
					'0.3' => esc_html__( '30%', 'divienhancer' ),
					'0.4' => esc_html__( '40%', 'divienhancer' ),
					'0.5' => esc_html__( '50%', 'divienhancer' ),
					'0.6' => esc_html__( '6%', 'divienhancer' ),
					'0.7' => esc_html__( '70%', 'divienhancer' ),
					'0.8' => esc_html__( '80%', 'divienhancer' ),
					'0.9' => esc_html__( '90%', 'divienhancer' ),
					'1' => esc_html__( '100%', 'divienhancer' ),
				),
				'description'			=> esc_html__('', 'divienhancer'),
				'toggle_slug'     => 'main_content',
			),
			'overlay' => array(
				'label'           => esc_html__( 'Overlay', 'divienhancer' ),
				'default'					=> 'true',
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'description'			=> esc_html__('Do not show the overlay with before and after', 'divienhancer'),
				'toggle_slug'     => 'main_content',
			),
			'slideronhover' => array(
				'label'           => esc_html__( 'Slider on hover', 'divienhancer' ),
				'default'					=> 'true',
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'description'			=> esc_html__(' Move slider on mouse hover', 'divienhancer'),
				'toggle_slug'     => 'main_content',
			),
			'withhandle' => array(
				'label'           => esc_html__( 'Move only with handle', 'divienhancer' ),
				'default'					=> 'true',
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'description'			=> esc_html__('Allow a user to swipe anywhere on the image to control slider movement.', 'divienhancer'),
				'toggle_slug'     => 'main_content',
			),
			'clicktomove' => array(
				'label'           => esc_html__( 'Click to move', 'divienhancer' ),
				'default'					=> 'false',
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'description'			=> esc_html__('Allow a user to click (or tap) anywhere on the image to move the slider to that location.', 'divienhancer'),
				'toggle_slug'     => 'main_content',
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		wp_enqueue_style( 'divienhancer-twentytwenty');
		wp_enqueue_script( 'divienhancer-twentytwenty');
		wp_enqueue_script( 'divienhancer-imagecomparison-trigger');
		$output = sprintf(
		'
		<div data-clicktomove="%10$s" data-withhandle="%9$s" data-slideronhover="%8$s" data-overlay="%7$s" data-visible="%6$s" data-orientation="%5$s" data-before="%3$s" data-after="%4$s" class="divienhancer_image_comparison_container">
			<img class="divienhancer_image_comparison_before" src="%1$s" />
			<img class="divienhancer_image_comparison_after" src="%2$s" />
		</div>
		',
		$this->props['before_upload'],
		$this->props['after_upload'],
		$this->props['before_text'],
		$this->props['after_text'],
		$this->props['orientation'],
		$this->props['visible'],
		$this->props['overlay'],
		$this->props['slideronhover'],
		$this->props['withhandle'],
		$this->props['clicktomove']

		);


		return $output;
	}

}

new DIVIENHANCER_imagecomparison;
