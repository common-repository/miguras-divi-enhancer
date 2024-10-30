<?php

class DIVIENHANCER_infiniteProducts extends Et_Builder_Module {

	public $slug       = 'divienhancer_infiniteProducts';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://miguras.com/divi_enhancer/woocommerce-infinite',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://miguras.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Inf Products', 'divienhancer' );
		$this->main_css_element = '%%order_class%% .divienhancer-woocommerce-infinite-product-inner';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main', 'divienhancer' ),
					'infinite_options' => esc_html__( 'infinite Options', 'divienhancer' ),
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
					'infinite' => esc_html__( 'infinite', 'divienhancer' ),

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
				'selector' => '.divienhancer-shop-infinite-addtocart',
			),
			'title' => array(
				'label'    => esc_html__( 'Product Title', 'divienhancer' ),
				'selector' => '.divienhancer-shop-infinite-title',
			),
			'price' => array(
				'label'    => esc_html__( 'Product Price', 'divienhancer' ),
				'selector' => '.divienhancer-shop-infinite-price',
			),
			'image' => array(
				'label'    => esc_html__( 'Product Image', 'divienhancer' ),
				'selector' => '.divienhancer-shop-infinite-image a img',
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
				'computed_callback' => array( 'DIVIENHANCER_infiniteProducts', 'get_html' ),
				'computed_depends_on' => array(
					'type',
					'posts_number',
					'show_pagination',
					'include_categories',
					'columns_number',
					'orderby',
					'style',
					'onsale_text',
					'custom_badge',
					'display_title',
					'display_price',
					'display_image',
					'display_addtocart',
					'display_badge',
					'equalize',
				),
			),
			'style' => array(
				'label'           => esc_html__( 'Style', 'divienhancer' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'deshopinfinite-style1' => esc_html__( 'Style One', 'divienhancer' ),
					//'deshopinfinite-style2' => esc_html__( 'Style Two', 'divienhancer' ),
				),
				'default' => 'deshopinfinite-style1',
				'description'      => esc_html__( 'Choose which style you would like to display.', 'divienhancer' ),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'render_front',
				),
			),
			'columns_number' => array(
				'label'           => esc_html__( 'Columns Number', 'divienhancer' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'divienhancer-woocommerce-infinite-product-size-one' => esc_html__( 'One Column', 'divienhancer' ),
					'divienhancer-woocommerce-infinite-product-size-two' => esc_html__( 'Two Column', 'divienhancer' ),
					'divienhancer-woocommerce-infinite-product-size-three' => esc_html__( 'Three Column', 'divienhancer' ),
					'divienhancer-woocommerce-infinite-product-size-four' => esc_html__( 'Four Column', 'divienhancer' ),
					'divienhancer-woocommerce-infinite-product-size-five' => esc_html__( 'Five Column', 'divienhancer' ),
					'divienhancer-woocommerce-infinite-product-size-six' => esc_html__( 'Six Column', 'divienhancer' ),
				),
				'default' => 'divienhancer-woocommerce-infinite-product-size-four',
				'description'      => esc_html__( 'Columns Number', 'divienhancer' ),
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
		if(function_exists('de_pro') && function_exists('divienhancer_pro_infinite_products')){
			return divienhancer_pro_infinite_products($this, $render_slug);

		}
		else {
			$output = '<a class="divienhancer_advertise_notice" href="https://miguras.com/divi_enhancer/" target="_blank">This Module is available only with Divienhancer Pro Edition</a>';
	    return $output;
		}


	}

}

new DIVIENHANCER_infiniteProducts;
