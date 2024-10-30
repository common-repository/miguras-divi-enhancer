<?php

class DIVIENHANCER_timeline extends ET_Builder_Module {

	public $slug       = 'divienhancer_timeLine';
	public $vb_support = 'on';
	public $child_slug = 'divienhancer_timeLineChild';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/timeline',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Timeline', 'divienhancer' );
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
						'main' => "{$this->main_css_element} .divienhancer_timeLine",
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
			'timeline_color' => array(
				'label'           => esc_html__( 'Timeline Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'main_content',
			),
			'timeline_size' => array(
				'default'         => 'medium',
				'label'           => esc_html__( 'Timeline Size', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'thin' => esc_html__( 'Thin', 'divienhancer' ),
					'medium'  => esc_html__( 'Medium', 'divienhancer' ),
					'bold'  => esc_html__( 'Bold', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug ) {
		wp_enqueue_script( 'divienhancer-timeline-trigger');
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .divienhancer_timeline_inner:after',
			'declaration' => sprintf(
				'background-color:%1$s;',
				 esc_attr($this->props['timeline_color'])
			),
		) );

		return sprintf(
			'
			<div class="divienhancer_timeline_inner divienhancer_timeline_after_%2$s">
				<div>%1$s</div>
			</div>
			',
			$this->props['content'],
			$this->props['timeline_size']
		);


	}

}

new DIVIENHANCER_timeline;
