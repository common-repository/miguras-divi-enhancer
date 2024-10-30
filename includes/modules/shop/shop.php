<?php

class DIVIENHANCER_shop extends Et_Builder_Module {

	public $slug       = 'divienhancer_shop';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/woocommerce-carousel',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Shop Carousel', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main', 'divienhancer' ),
					'carousel_options' => esc_html__( 'Carousel Options', 'divienhancer' ),
					'elements' => esc_html__( 'Elements', 'divienhancer' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => array(
						'title'    => esc_html__( 'Text', 'divienhancer' ),
						'priority' => 45,
						'bb_icons_support' => true,
					),
					'product' => esc_html__( 'Column', 'divienhancer' ),
					'header' => array(
						'title'    => esc_html__( 'Title & Price', 'divienhancer' ),
						'priority' => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles' => array(
							'h2' => array(
								'name' => 'Title',
							),
							'h4' => array(
								'name' => 'Price',
							),

						),
					),
					'badge' => esc_html__( 'Badge', 'divienhancer' ),
					'add_to_cart' => esc_html__( 'Add to Cart', 'divienhancer' ),
					'carousel' => esc_html__( 'Carousel', 'divienhancer' ),

				),
			),
		);

		$this->advanced_fields = array(
			'background' => array(
				'css' => array(
					'main' => "{$this->main_css_element}",
				)
			),
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

		$this->custom_css_fields = array(
			'button' => array(
				'label'    => esc_html__( 'Add to Cart', 'divienhancer' ),
				'selector' => '.divienhancer-shop-carousel-addtocart',
			),
			'title' => array(
				'label'    => esc_html__( 'Product Title', 'divienhancer' ),
				'selector' => '.divienhancer-shop-carousel-title',
			),
			'price' => array(
				'label'    => esc_html__( 'Product Price', 'divienhancer' ),
				'selector' => '.divienhancer-shop-carousel-price',
			),
			'image' => array(
				'label'    => esc_html__( 'Product Image', 'divienhancer' ),
				'selector' => '.divienhancer-shop-carousel-image a img',
			),
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
			'render_front' => array(
				'type'              => 'computed',
				'computed_callback' => array( 'DIVIENHANCER_shop', 'get_html' ),
				'computed_depends_on' => array(
					'type',
					'posts_number',
					'show_pagination',
					'include_categories',
					'columns_number',
					'orderby',
					'style',
					'slides_to_show',
					'slides_to_show_tablet',
					'slides_to_show_phone',
					'slides_to_scroll',
					'slides_to_scroll_tablet',
					'slides_to_scroll_phone',
					'autoplay',
					'speed',
					'infinite',
					'arrows',
					'dots',
					'dots_size',
					'onsale_text',
					'custom_badge',
					'display_title',
					'display_price',
					'display_image',
					'display_addtocart',
					'display_badge',
					'equalize',
					'backward_arrow',
					'forward_arrow'
				),
			),
			'style' => array(
				'label'           => esc_html__( 'Style', 'divienhancer' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'deshopcarousel-style1' => esc_html__( 'Style One', 'divienhancer' ),
					//'deshopcarousel-style2' => esc_html__( 'Style Two', 'divienhancer' ),
				),
				'default' => 'deshopcarousel-style1',
				'description'      => esc_html__( 'Choose which style you would like to display.', 'divienhancer' ),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'render_front',
				),
			),
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
				'computed_affects' => array(
					'render_front',
				),
			),
			'posts_number' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Product Count', 'divienhancer' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the number of products that should be displayed per page.', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'main_content',
			),
			'display_image' => array(
				'label'            => esc_html__( 'Display Image', 'divienhancer' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divienhancer' ),
					'off' => esc_html__( 'No', 'divienhancer' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'divienhancer' ),
				'computed_affects' => array(
					'render_front',
				),
				'toggle_slug'      => 'elements',
			),
			'display_badge' => array(
				'label'            => esc_html__( 'Display Badge', 'divienhancer' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divienhancer' ),
					'off' => esc_html__( 'No', 'divienhancer' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'divienhancer' ),
				'computed_affects' => array(
					'render_front',
				),
				'toggle_slug'      => 'elements',
			),
			'display_title' => array(
				'label'            => esc_html__( 'Display Title', 'divienhancer' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divienhancer' ),
					'off' => esc_html__( 'No', 'divienhancer' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'divienhancer' ),
				'computed_affects' => array(
					'render_front',
				),
				'toggle_slug'      => 'elements',
			),
			'display_price' => array(
				'label'            => esc_html__( 'Display Price', 'divienhancer' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divienhancer' ),
					'off' => esc_html__( 'No', 'divienhancer' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'divienhancer' ),
				'computed_affects' => array(
					'render_front',
				),
				'toggle_slug'      => 'elements',
			),
			'display_addtocart' => array(
				'label'            => esc_html__( 'Display Add to Cart Button', 'divienhancer' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divienhancer' ),
					'off' => esc_html__( 'No', 'divienhancer' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'divienhancer' ),
				'computed_affects' => array(
					'render_front',
				),
				'toggle_slug'      => 'elements',
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
				'computed_affects' => array(
					'render_front',
				),
			),
			'orderby' => array(
				'label'             => esc_html__( 'Order By', 'divienhancer' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'default'  => esc_html__( 'Default', 'divienhancer' ),
					'oldest_to_newest'  => esc_html__( 'Sort by Date: Oldest to Newest', 'divienhancer' ),
					'newest_to_oldest'  => esc_html__( 'Sort by Date: Newest to Oldest', 'divienhancer' ),
					'low_to_high'  => esc_html__( 'Sort by Price: Low to High', 'divienhancer' ),
					'high_to_low'  => esc_html__( 'Sort by Price: High to Low', 'divienhancer' ),
					'menu_order_asc'  => esc_html__( 'A to Z', 'divienhancer' ),
					'menu_order_desc' => esc_html__( 'Z to A', 'divienhancer' ),
					'total_sales' => esc_html__( 'Popularity', 'divienhancer' ),
					'rating' => esc_html__( 'Rating', 'divienhancer' ),

				),
				'default' => 'menu_order_desc',
				'description'       => esc_html__( 'Choose how your products should be ordered.', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'main_content',
			),
			'slides_to_show' => array(
				'label'           => esc_html__( 'Columns', 'divienhancer' ),
				'type'            => 'range',
				'mobile_options'  => true,
				'default'         => '3',
				'default_tablet'  => '1',
				'default_phone'  => '1',
				'validate_unit'    => false,
				'toggle_slug'     => 'carousel_options',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
				'computed_affects'  => array(
					'render_front',
				),
			),
			'slides_to_show_tablet'      => array(
					'type'        => 'skip',
					'toggle_slug' => 'carousel_options',
					'computed_affects'  => array(
						'render_front',
					),
				),
			'slides_to_show_phone'      => array(
				'type'        => 'skip',
				'toggle_slug' => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'slides_to_scroll' => array(
				'label'           => esc_html__( 'Slides to Scroll', 'divienhancer' ),
				'type'            => 'range',
				'mobile_options'  => true,
				'default'         => '3',
				'default_tablet'  => '1',
				'default_phone'  => '1',
				'default_unit'    => '',
				'toggle_slug'     => 'carousel_options',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
				'validate_unit'    => false,
				'computed_affects'  => array(
					'render_front',
				),
			),
			'slides_to_scroll_tablet'      => array(
					'type'        => 'skip',
					'toggle_slug' => 'carousel_options',
					'computed_affects'  => array(
						'render_front',
					),
				),
			'slides_to_scroll_phone'      => array(
				'type'        => 'skip',
				'toggle_slug' => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'autoplay' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Autoplay', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'speed' => array(
				'default'         => '3000',
				'label'           => esc_html__( 'Speed', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'1000' => esc_html__( '1s', 'divienhancer' ),
					'2000'  => esc_html__( '2s', 'divienhancer' ),
					'3000'  => esc_html__( '3s', 'divienhancer' ),
					'4000'  => esc_html__( '4s', 'divienhancer' ),
					'5000'  => esc_html__( '5s', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'infinite' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Infinite Scroll', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'arrows' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Show Arrows', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'custom_icons' => array(
				'default'         => 'no',
				'label'           => esc_html__( 'Use Custom Icons', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'no' => esc_html__( 'no', 'divienhancer' ),
					'yes'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
			),
			'backward_arrow' => array(
				'label'               => esc_html__( 'Custom Backward Icon', 'divienhancer' ),
				'type'                => 'select_icon',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'carousel_options',
				'description'     => esc_html__( '', 'divienhancer' ),
				'show_if'         => array('custom_icons' => 'yes'),
				'computed_affects'  => array(
					'render_front',
				),
			),
			'forward_arrow' => array(
				'label'               => esc_html__( 'Custom Forward Icon', 'divienhancer' ),
				'type'                => 'select_icon',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'carousel_options',
				'description'     => esc_html__( '', 'divienhancer' ),
				'show_if'         => array('custom_icons' => 'yes'),
				'computed_affects'  => array(
					'render_front',
				),
			),
			'dots' => array(
				'default'         => 'true',
				'label'           => esc_html__( 'Show Dots', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'false' => esc_html__( 'no', 'divienhancer' ),
					'true'  => esc_html__( 'yes', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'equalize' => array(
				'label'             => esc_html__( 'Equalize content height', 'divienhancer' ),
				'type'              => 'yes_no_button',
				'options'           => array(
					'on'  => esc_html__( 'On', 'divienhancer' ),
					'off' => esc_html__( 'Off', 'divienhancer' ),
				),
				'toggle_slug'     => 'carousel_options',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'arrows_color' => array(
				'label'           => esc_html__( 'Arrows Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'carousel',
			),
			'arrows_size' => array(
				'label'           => esc_html__( 'Custom Icons Size', 'divienhancer' ),
				'type'            => 'range',
				'default'         => '15',
				'default_unit'    => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'carousel',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '50',
					'step' => '1',
				),
				'show_if'         => array('custom_icons' => 'yes'),
				'validate_unit'    => false,
			),
			'dots_size' => array(
				'default'         => 'divienhancer-medium-dots-carousel',
				'label'           => esc_html__( 'Dot Size', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'divienhancer-small-dots-carousel' => esc_html__( 'Small', 'divienhancer' ),
					'divienhancer-medium-dots-carousel'  => esc_html__( 'Medium', 'divienhancer' ),
					'divienhancer-big-dots-carousel'  => esc_html__( 'Big', 'divienhancer' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'carousel',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'dots_color' => array(
				'label'           => esc_html__( 'Dots Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'carousel',
			),
			'product_background' => array(
				'label'           => esc_html__( 'Column Content Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'product',
			
			),
			'product_padding' => array(
				'label'           => esc_html__( 'Column Padding', 'divienhancer' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'default'					=> '0px|0px|0px|0px|false|false',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'product',
			),
			'badge_background' => array(
				'label'           => esc_html__( 'Badge Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge',
			),
			'badge_color' => array(
				'label'           => esc_html__( 'Badge Text Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge',
			),
			'cart_background' => array(
				'label'           => esc_html__( 'Add to Cart Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'add_to_cart',
			),
			'cart_color' => array(
				'label'           => esc_html__( 'Add to Cart Text Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'add_to_cart',
			),
			'cart_alignment' => array(
				'default'         => 'center',
				'label'           => esc_html__( 'Add to Cart Alignment', 'divienhancer' ),
				'type'            => 'select',
				'options'         => array(
					'left' => esc_html__( 'Left', 'divienhancer' ),
					'center'  => esc_html__( 'Center', 'divienhancer' ),
					'right'  => esc_html__( 'Right', 'divienhancer' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'add_to_cart',
			),
			'onsale_text' => array(
				'label'           => esc_html__( 'On Sale Text', 'divienhancer' ),
				'type'            => 'text',
				'default'					=> 'Sale!',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text here it will be displayed only inside on sale products', 'divienhancer' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge',
				'computed_affects'  => array(
					'render_front',
				),
			),
			'custom_badge' => array(
				'label'           => esc_html__( 'Custom Badge Text', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'If you write something here, it will be displayed in replace of "on sale badge" and inside all products', 'divienhancer' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge',
				'computed_affects'  => array(
					'render_front',
				),
			),
		);

		$fields = divienhancer_new_options($fields);
		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug, $isfront = null ) {
		if(function_exists('de_pro') && function_exists('divienhancer_pro_shop_carousel')){
			return divienhancer_pro_shop_carousel($this, $render_slug);

		}
		else {
			$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';
	    return $output;
		}


	}

}

new DIVIENHANCER_shop;
