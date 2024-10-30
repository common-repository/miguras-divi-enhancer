<?php

class DIVIENHANCER_AnimatedLinks extends ET_Builder_Module {

	public $slug       = 'divienhancer_animated_links';
	public $vb_support = 'on';


	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/animated-links',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->main_css_element = '%%order_class%%';
		$this->name = esc_html__( 'DE Animated Links', 'divienhancer' );

		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'divienhancer' ),
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
}
public function get_advanced_fields_config() {
	$advanced_fields = $this->advanced_tab_options;

	$advanced_fields['background'] = array(
		'css' => array(
			'main' => "{$this->main_css_element} nav a, {$this->main_css_element} nav a .cl-effect-19 span, {$this->main_css_element} .cl-effect-10 span",
		),
		'options' => array(
			'background_color' => array(
				'default' => '#2195de',
			),
		),

	);
	$advanced_fields['margin_padding'] = array(
		'css' => array(
			'main' => "{$this->main_css_element} nav a",
		),
	);

	$advanced_fields['fonts']  = array(
		'main_text'   => array(
			'label'    => esc_html__( 'Content', 'divienhancer' ),
			'css'      => array(
				'main' => "{$this->main_css_element} nav span, {$this->main_css_element} nav a, {$this->main_css_element} nav a:before",
			),
			'font_size' => array(
				'default' => absint( '14' ) . 'px',
			),
			'text_color' => array(
				'default' => '#ffffff',
			),
			'line_height' => array(
				'default' => '1.4em',
			),
			'letter_spacing' => array(
				'default' => '0px',
			),
			'toggle_slug' => 'text',
		),

	);



	return $advanced_fields;
}
	public function get_fields() {
		$fields = array(
			'style' => array(
				'default'         => 'cl-effect-1',
				'label'           => esc_html__( 'Effect Style', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'cl-effect-1' => esc_html__( 'Effect 1', 'divienhancer' ),
					'cl-effect-2' => esc_html__( 'Effect 2', 'divienhancer' ),
					'cl-effect-3' => esc_html__( 'Effect 3', 'divienhancer' ),
					'cl-effect-4' => esc_html__( 'Effect 4', 'divienhancer' ),
					'cl-effect-5' => esc_html__( 'Effect 5', 'divienhancer' ),
					'cl-effect-6' => esc_html__( 'Effect 6', 'divienhancer' ),
					'cl-effect-7' => esc_html__( 'Effect 7', 'divienhancer' ),
					'cl-effect-8' => esc_html__( 'Effect 8', 'divienhancer' ),
					'cl-effect-9' => esc_html__( 'Effect 9', 'divienhancer' ),
					'cl-effect-10' => esc_html__( 'Effect 10', 'divienhancer' ),
					'cl-effect-11' => esc_html__( 'Effect 11', 'divienhancer' ),
					'cl-effect-12' => esc_html__( 'Effect 12', 'divienhancer' ),
					'cl-effect-13' => esc_html__( 'Effect 13', 'divienhancer' ),
					'cl-effect-14' => esc_html__( 'Effect 14', 'divienhancer' ),
					'cl-effect-15' => esc_html__( 'Effect 15', 'divienhancer' ),
					'cl-effect-16' => esc_html__( 'Effect 16', 'divienhancer' ),
					'cl-effect-17' => esc_html__( 'Effect 17', 'divienhancer' ),
					'cl-effect-18' => esc_html__( 'Effect 18', 'divienhancer' ),
					'cl-effect-19' => esc_html__( 'Effect 19', 'divienhancer' ),
					'cl-effect-20' => esc_html__( 'Effect 20', 'divienhancer' ),
					'cl-effect-21' => esc_html__( 'Effect 21', 'divienhancer' ),


				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose the link style', 'divienhancer' ),
			),
			'text' => array(
				'label'           => esc_html__( 'Link Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Link Text', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
				'default' => 'Button',
			),
			'second-link-text' => array(
				'show_if' 				=> array('style' => array('cl-effect-9', 'cl-effect-2', 'cl-effect-5', 'cl-effect-10', 'cl-effect-11', 'cl-effect-15', 'cl-effect-16', 'cl-effect-17', 'cl-effect-18', 'cl-effect-19', 'cl-effect-20')),
				'label'           => esc_html__( 'Second Link Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Second Link Text', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
				'default' => 'Button',
			),
			'secondarycolor' => array(
				'show_if' 				=> array('style' => array('cl-effect-9', 'cl-effect-10', 'cl-effect-11', 'cl-effect-13', 'cl-effect-15', 'cl-effect-16', 'cl-effect-18')),
				'label'           => esc_html__( 'Secondary Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'main_content',
				'default' => '#000000',
			),
			'link' => array(
				'label'           => esc_html__( 'Link URL', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Link URL', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),

		);

		$fields = divienhancer_new_options($fields);
		return $fields;
	}


	public function render( $attrs, $content = null, $render_slug ) {

		wp_enqueue_script( 'divienhancer-modernizr');



		$secondlink = $secondspan = $data = $span = $onlylink = '';

		$secondlink = $this->props['second-link-text'];
		if($secondlink == ''){
			$secondlink = $this->props['text'];
		}

		if($this->props['style'] === 'cl-effect-10' || $this->props['style'] === 'cl-effect-11' || $this->props['style'] === 'cl-effect-15' || $this->props['style'] === 'cl-effect-16' || $this->props['style'] === 'cl-effect-17' || $this->props['style'] === 'cl-effect-18'){
			$data = 'data-hover="'.$secondlink.'"';
		}

		if($this->props['style'] === 'cl-effect-10' || $this->props['style'] === 'cl-effect-19' || $this->props['style'] === 'cl-effect-20' ||
			$this->props['style'] === 'cl-effect-2' || $this->props['style'] === 'cl-effect-5' || $this->props['style'] === 'cl-effect-9'){
			$span = '<span data-hover="'.$secondlink.'">'.$this->props['text'].'</span>';
		}

		if($this->props['style'] === 'cl-effect-16' || $this->props['style'] === 'cl-effect-17' || $this->props['style'] === 'cl-effect-18' || $this->props['style'] === 'cl-effect-21' ||
			$this->props['style'] === 'cl-effect-11' || $this->props['style'] === 'cl-effect-12' || $this->props['style'] === 'cl-effect-13' || $this->props['style'] === 'cl-effect-14' || $this->props['style'] === 'cl-effect-15' ||
			$this->props['style'] === 'cl-effect-1' || $this->props['style'] === 'cl-effect-3' || $this->props['style'] === 'cl-effect-4' || $this->props['style'] === 'cl-effect-6' || $this->props['style'] === 'cl-effect-7' || $this->props['style'] === 'cl-effect-8'){
			$onlylink = $this->props['text'];
		}

		if($this->props['style'] === 'cl-effect-9'){
			$secondspan = '<span class="al-second-span">'.$secondlink.'</span>';
		}

		if(isset($this->props['secondarycolor']) && !empty($this->props['secondarycolor'])){
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .cl-effect-18 a:before, %%order_class%% .cl-effect-18 a:after',
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $this->props['secondarycolor'] )
				),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .cl-effect-9 .al-second-span,  %%order_class%% .cl-effect-15 a, %%order_class%% .cl-effect-16 a::before, %%order_class%% .cl-effect-10 a::before, %%order_class%% .cl-effect-11 a::before, cl-effect-13',
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $this->props['secondarycolor'] )
				),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .cl-effect-11 a::before',
				'declaration' => sprintf(
					'border-bottom-color: %1$s !important; border-bottom: 2px solid; bottom: 0;',
					esc_html( $this->props['secondarycolor'] )
				),
			) );
		}

		return sprintf('
			<nav class="%1$s">
				<a href="%2$s" %4$s>%3$s%6$s%5$s</a>
			</nav>',

			esc_html($this->props['style']),
			esc_html($this->props['link']),
			$onlylink,
			$data,
			$secondspan,
			$span
		);
	}

}

new DIVIENHANCER_AnimatedLinks;
