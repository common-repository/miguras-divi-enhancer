<?php

class DIVIENHANCER_tagProducts extends Et_Builder_Module {

	public $slug       = 'divienhancer_tagProducts';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/woocommerce-tagcloud',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE 3D Cloud Products', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main', 'divienhancer' ),
					'options' => esc_html__( 'Options', 'divienhancer' ),
				),
			),
		);

		$this->advanced_fields = array(

			'fonts' => false,

		);

	}
	public function get_html($args = array(), $conditional_tags = array(), $current_page = array() ){
		$self = new self();
		$self->props = $args;
		$output = $self->render('', '', '', 'front');

		return $output;
	}

	public function get_fields() {
		$fields = array(
			/*
			'render_front' => array(
				'type'              => 'computed',
				'computed_callback' => array( 'DIVIENHANCER_tagProducts', 'get_html' ),
				'computed_depends_on' => array(
					'type',
					'posts_number',
					'include_categories',
					'width',
					'height',
					'imageheight',
					'imagewidth',
					'speed',
					'tooltipsource',
					'tooltipsize',
					'tooltipcolor',
				),
			),
			*/
			'type' => array(
				'label'           => esc_html__( 'Type', 'divienhancer' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'default'	=> esc_html('Default', 'divienhancer'),
					'featured' => esc_html__( 'Featured Products', 'divienhancer' ),
					'sale' => esc_html__( 'Sale Products', 'divienhancer' ),
					'product_category' => esc_html__( 'Product Category', 'divienhancer' ),
				),
				'default' => 'default',
				'affects'        => array(
					'include_categories',
				),
				'description'      => esc_html__( 'Choose which type of products you would like to display.', 'divienhancer' ),
				'toggle_slug'      => 'main_content',
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'posts_number' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Product Count', 'divienhancer' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the number of products that should be displayed per page.', 'divienhancer' ),
				//'computed_affects' => array(
				//	'render_front',
				//),
				'toggle_slug'       => 'main_content',
			),

			'include_categories'   => array(
				'label'            => esc_html__( 'Include Categories', 'divienhancer' ),
				'type'             => 'categories',
				'renderer_options' => array(
					'use_terms'    => true,
					'term_name'    => 'product_cat',
				),
				'depends_show_if'  => 'product_category',
				'description'      => esc_html__( 'Choose which categories you would like to include.', 'divienhancer' ),
				'taxonomy_name'    => 'product_cat',
				'toggle_slug'      => 'main_content',
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'width' => array(
				'default'           => '100%',
				'label'             => esc_html__( 'Container Width', 'divienhancer' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( '', 'divienhancer' ),
				//'computed_affects' => array(
				//	'render_front',
				//),
				'toggle_slug'       => 'options',
			),
			'height' => array(
				'default'           => '100%',
				'label'             => esc_html__( 'Container Height', 'divienhancer' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( '', 'divienhancer' ),
				//'computed_affects' => array(
				//	'render_front',
				//),
				'toggle_slug'       => 'options',
			),
			'imageheight' => array(
				'label'           => esc_html__( 'Image Height', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '80',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'options',
				'range_settings'   => array(
					'min'  => '5',
					'max'  => '200',
					'step' => '1',
				),
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'imagewidth' => array(
				'label'           => esc_html__( 'Image Width', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '80',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'options',
				'range_settings'   => array(
					'min'  => '5',
					'max'  => '200',
					'step' => '1',
				),
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'speed' => array(
				'label'           => esc_html__( 'Items Speed', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '1',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'options',
				'range_settings'   => array(
					'min'  => '0.1',
					'max'  => '5',
					'step' => '0.1',
				),
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'tooltipsource' => array(
				'default'         => 'title',
				'label'           => esc_html__( 'Tooltip Content', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'title' => esc_html__( 'Title', 'divienhancer' ),
					//'price'  => esc_html__( 'Price', 'divienhancer' ),
					'none'  => esc_html__( 'None', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'divienhancer' ),
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'tooltipsize' => array(
				'label'           => esc_html__( 'Tooltip Text Size', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '12',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'options',
				'range_settings'   => array(
					'min'  => '5',
					'max'  => '100',
					'step' => '1',
				),
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
			'tooltipcolor' => array(
				'default'           => '#000000',
				'label'             => esc_html__( 'Tooltip Text Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'toggle_slug'       => 'options',
				//'computed_affects' => array(
				//	'render_front',
				//),
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug, $isfront = null ) {


		if(function_exists('de_pro') && function_exists('divienhancer_pro_tagcloud_products')){
			return divienhancer_pro_tagcloud_products($this, $render_slug);

		}
		else {
			$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';
	    return $output;
		}



	}

}

new DIVIENHANCER_tagProducts;
