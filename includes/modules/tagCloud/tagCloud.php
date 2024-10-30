<?php

class DIVIENHANCER_tagCloud extends ET_Builder_Module {

	public $slug       = 'divienhancer_tagCloud';
	public $vb_support = 'on';
	public $child_slug = 'divienhancer_tagCloudchild';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/carousel',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE 3D Tag Cloud', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Settings', 'divienhancer' ),
					'options' => esc_html__( 'Options', 'divienhancer' ),
				),
			),
		);

		$this->advanced_fields = array(

			'fonts' => false,

		);

	}

	public function get_fields() {
		$fields = array(
			'width' => array(
				'label'           => esc_html__( 'Container Width', 'divienhancer' ),
				'type'            => 'text',
				'default'					=> '100%',
				'description'     => esc_html__( '', 'divienhancer' ),
				'toggle_slug'     => 'options',
			),
			'height' => array(
				'label'           => esc_html__( 'Container Height', 'divienhancer' ),
				'type'            => 'text',
				'default'					=> '100%',
				'description'     => esc_html__( '', 'divienhancer' ),
				'toggle_slug'     => 'options',
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
			),
			'fontsize' => array(
				'label'           => esc_html__( 'Item Text Size', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '18',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'options',
				'range_settings'   => array(
					'min'  => '5',
					'max'  => '100',
					'step' => '1',
				),
			),
			'fontcolor' => array(
				'default'           => '#000000',
				'label'             => esc_html__( 'Item Text Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'toggle_slug'       => 'options',
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
			),
			'tooltipcolor' => array(
				'default'           => '#000000',
				'label'             => esc_html__( 'Tooltip Text Color', 'divienhancer' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color.', 'divienhancer' ),
				'toggle_slug'       => 'options',
			),
		);

		//$fields = divienhancer_new_options($fields);
		return $fields;
	}



	public function render( $attrs, $content = null, $render_slug ) {

			$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';


			if(function_exists('de_pro') && function_exists('divienhancer_tag_cloud_pro_function')){
				$output =	divienhancer_tag_cloud_pro_function($this);
			}


			return $output;


	}

}

new DIVIENHANCER_tagCloud;
