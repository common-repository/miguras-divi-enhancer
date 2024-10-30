<?php

class DIVIENHANCER_tagCloudChild extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'divienhancer_tagCloudchild';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'identifier';

	// Full Visual Builder support
	public $vb_support = 'on';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 *
	 * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
	 */
	function init() {

		$this->advanced_setting_title_text = esc_html__( 'Item', 'divienhancer' );
		$this->settings_text               = esc_html__( 'Item Settings', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		// Toggle settings
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
	}

	public function get_fields() {
		return array(
			'identifier' => array(
				'label'           => esc_html__( 'Item Identifier', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This lets you identify each item on modal settings', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'source' => array(
				'default'         => 'image',
				'label'           => esc_html__( 'Item Source ', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'text' => esc_html__( 'Text', 'divienhancer' ),
					'image'  => esc_html__( 'Image', 'divienhancer' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'divienhancer' ),
			),
			'image' => array(
				'label'              => esc_html__( 'Image', 'divienhancer' ),
				'type'               => 'upload',
				'upload_button_text' => esc_attr__( 'Upload an image', 'divienhancer' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'divienhancer' ),
				'update_text'        => esc_attr__( 'Set As Image', 'divienhancer' ),
				'toggle_slug'        => 'main_content',
				'show_if' => array(
					'source' => 'image'
				),
			),
			'imageheight' => array(
				'label'           => esc_html__( 'Image Height', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '50',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'main_content',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '300',
					'step' => '1',
				),
				'show_if' => array(
					'source' => 'image'
				),
			),
			'imagewidth' => array(
				'label'           => esc_html__( 'Image Width', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '50',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'main_content',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '300',
					'step' => '1',
				),
				'show_if' => array(
					'source' => 'image'
				),
			),
			'text' => array(
				'label'           => esc_html__( 'Text', 'divienhancer' ),
				'type'            => 'text',
				'default' => 'Go To a Site',
				'description'     => esc_html__( 'Item Text', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
				'show_if' => array(
					'source' => 'text'
				),
			),
			'url' => array(
				'label'           => esc_html__( 'URL', 'divienhancer' ),
				'type'            => 'text',
				'description'     => esc_html__( 'When clicked the item will open the link', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'tooltip' => array(
				'label'           => esc_html__( 'Tooltip', 'divienhancer' ),
				'type'            => 'text',
				'description'     => esc_html__( 'When mouse pass over this info will appear over the item', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
		);


	}
	public function get_advanced_fields_config() {
		$advanced_fields = $this->advanced_tab_options;

		$advanced_fields['fonts']  = array(
			'main_text'   => array(
				'label'    => esc_html__( 'Content', 'divienhancer' ),
				'css'      => array(
					'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner",
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
					'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner h1",
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
					'main' => "{$this->main_css_element} .divienhancer_timeline_child_inner h2",
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
					'main' => "{$this->main_css_element} .divienhancer_timeline_date h3",
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
		);



		return $advanced_fields;
	}

	function render( $attrs, $content = null, $render_slug ) {

		return sprintf(
			'
			<span class="divienhancer_tag_cloud_item"
			data-source="%1$s"
			data-image="%2$s"
			data-imageheight="%3$s"
			data-imagewidth="%4$s"
			data-url="%5$s"
			data-tooltip="%6$s"
			data-text="%7$s"
			</span>
			',
			esc_html( $this->props['source'] ),
			esc_html( $this->props['image'] ),
			esc_html( $this->props['imageheight'] ),
			esc_html( $this->props['imagewidth'] ),
			esc_html( $this->props['url'] ),
			esc_html( $this->props['tooltip'] ),
			esc_html( $this->props['text'] )
		);
	}
}

new DIVIENHANCER_tagCloudChild;
