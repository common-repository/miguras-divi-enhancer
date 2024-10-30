<?php

class DIVIENHANCER_breadcrumb extends ET_Builder_Module {

	public $slug       = 'divienhancer_breadcrumb';
	public $vb_support = 'on';



	protected $module_credits = array(
		'module_uri' => 'https://pagebuildercode.com/divi-enhancer/breadcrumb',
		'author'     => 'Miguras: Pro Version Home',
		'author_uri' => 'https://pagebuildercode.com',
	);

	public function init() {
		$this->name = esc_html__( 'DE Breadcrumb', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main', 'divienhancer' ),
					'fields_text' => esc_html__( 'Fields Text', 'divienhancer' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 45,
						'tabbed_subtoggles' => true,
						'bb_icons_support' => true,
						'sub_toggles' => array(
							'p'     => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a'     => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
						),
					),

				),
			),
		);

		$this->advanced_fields = array(
			'fonts'                 => array(
				'text'   => array(
					'label'           => esc_html__( 'Text', 'et_builder' ),
					'css'             => array(
						'line_height' => "{$this->main_css_element}",
						'color'       => "{$this->main_css_element}",
					),
					'line_height'     => array(
						'default' => floatval( et_get_option( 'body_font_height', '1.7' ) ) . 'em',
					),
					'font_size'       => array(
						'default' =>  '14px',
					),
					'font_color'       => array(
						'default' => '#333333',
					),
					'toggle_slug'     => 'text',
					'sub_toggle'      => 'p',
					'hide_text_align' => true,
				),
				'link'   => array(
					'label'    => esc_html__( 'Link', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} a",
						'color' => "{$this->main_css_element} a",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'a',
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
			/*
			'render_front' => array(
				'type'              => 'computed',
				'computed_callback' => array( 'DIVIENHANCER_breadcrumb', 'get_html' ),
				'computed_depends_on' => array(
					//'home_text',
					//'delimiter',
					//'style',
				),
			),
			*/
			'style' => array(
				'label'             => esc_html__( 'Style', 'divienhancer' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'de-crumb-basic'  => esc_html__( 'Basic', 'divienhancer' ),
					'de-crumb-styleone'  => esc_html__( 'Style One', 'divienhancer' ),
				),
				'default' => 'de-crumb-basic',
				'description'       => esc_html__( '', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'main_content',
			),
			'home_text' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Home Text', 'divienhancer' ),
				'type'              => 'text',
				'default'						=> 'Home',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the text to display in the proper link', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'main_content',
			),
			'home_url' => array(
				'label'           => esc_html__( 'Home Url(Optional)', 'flexstyle' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'flexstyle' ),
				'toggle_slug'     => 'main_content',
				'default'		  => '',
				'dynamic_content'  => 'url',
			),
			'delimiter' => array(
				'label'               => esc_html__( 'Delimiter Icon', 'divienhancer' ),
				'type'                => 'select_icon',
				'class'               => array( 'et-pb-font-icon' ),
				'default'							=> '9',
				'tab_slug'				=> 'general',
				'toggle_slug'			=> 'main_content',
				'description'     => esc_html__( 'Choose an icon to separate items.', 'divienhancer' ),
				'computed_affects' => array(
					'render_front',
				),
				'show_if'         => array(
					'style' => 'de-crumb-basic',
				),
			),
			'item_backgroundcolor' => array(
				'label'           => esc_html__( 'Item Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'default'					=> '#efefef',
				'show_if'         => array(
					'style' => 'de-crumb-styleone',
				),
			),
			'number_color' => array(
				'label'           => esc_html__( 'Number Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'default'					=> '#222222',
				'show_if'         => array(
					'style' => 'de-crumb-styleone',
				),
			),
			'active_item_backgroundcolor' => array(
				'label'           => esc_html__( 'Active Item Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'default'					=> '#00ff9d',
				'show_if'         => array(
					'style' => 'de-crumb-styleone',
				),
			),
			'category_text' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Archive by Category Text', 'divienhancer' ),
				'type'              => 'text',
				'default'						=> 'Archive by category &#39;',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the text to display in the proper link', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'fields_text',
			),
			'search_text' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Search results Text', 'divienhancer' ),
				'type'              => 'text',
				'default'						=> 'Search results for &#39;',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the text to display in the proper link', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'fields_text',
			),
			'tagged_text' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Posts tagged Text', 'divienhancer' ),
				'type'              => 'text',
				'default'						=> 'Posts tagged &#39;',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the text to display in the proper link', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'fields_text',
			),
			'articles_text' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Articles posted by Text', 'divienhancer' ),
				'type'              => 'text',
				'default'						=> 'Articles posted by ',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the text to display in the proper link', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'fields_text',
			),
			'error_text' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Error 404 Text', 'divienhancer' ),
				'type'              => 'text',
				'default'						=> 'Error 404 ',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the text to display in the proper link', 'divienhancer' ),
				'computed_affects'  => array(
					'render_front',
				),
				'toggle_slug'       => 'fields_text',
			),

		);

		$fields = divienhancer_new_options($fields);
		return $fields;
	}

	public function get_html($args = array(), $conditional_tags = array(), $current_page = array() ){
		$self = new self();
		$self->props = $args;
		$output = $self->render('', '', '', 'front');

		return $output;
	}

	public function render( $attrs, $content = null, $render_slug, $isfront = null  ) {
		$output = '';
		wp_enqueue_style( 'divienhancer-breadcrumb-css', plugin_dir_url( __FILE__ ) . 'breadcrumb/style.css' );
		wp_enqueue_script( 'divienhancer-breadcrumb-trigger');


			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .de-crumb-styleone .de-crumb-item',
				'declaration' => sprintf(
					'background-color:%1$s;',
					 esc_attr($this->props['item_backgroundcolor'])
				),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .de-crumb-styleone span.de-crumb-item, %%order_class%% .de-crumb-styleone .de-crumb-item:hover',
				'declaration' => sprintf(
					'background-color:%1$s;',
					 esc_attr($this->props['active_item_backgroundcolor'])
				),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .de-crumb-styleone .de-crumb-item:before',
				'declaration' => sprintf(
					'color:%1$s;',
					 esc_attr($this->props['number_color'])
				),
			) );


			ob_start();
			$delimiter = '<span class="divienhancer-crumb-delimiter et-pb-icon">'.esc_attr( et_pb_process_font_icon( $this->props['delimiter'] ) ).'</span>';
			if($this->props['style'] === 'de-crumb-styleone'){
				$delimiter = '';
			}
		  $name = $this->props['home_text']; //text for the 'Home' link
		  $currentBefore = '<span class="de-crumb-item  divienhancer-current-crumb">';
		  $currentAfter = '</span>';
			$archiveByCategory = $this->props['category_text'];
			$searchresults = $this->props['search_text'];
			$postsTagged = $this->props['tagged_text'];
			$articlespostedby = $this->props['articles_text'];
			$error404 = $this->props['error_text'];
			$orderclass = ET_Builder_Element::get_module_order_class( $render_slug );

			$woocommerce = 'isntwoo';
			if(function_exists('is_woocommerce')){
				if(is_woocommerce()){
					$woocommerce = 'iswoo';
				}
			}

		  if ( !is_home() && !is_front_page() && $woocommerce === 'isntwoo' || is_paged() ) {

		    echo '<div class="de-breadcrumb '.$this->props['style'].'" data-order="'.$orderclass.'" data-background="'.$this->props['item_backgroundcolor'].'" data-backgroundhover="'.$this->props['active_item_backgroundcolor'].'">';

		    global $post;
			$home = get_bloginfo('url');
			
			if(isset($this->props['home_url'])){
				if('' != $this->props['home_url']){
					$home = $this->props['home_url'];
				}
			}

		    echo '<a class="de-crumb-item" href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

		    if ( is_category() ) {
		      global $wp_query;
		      $cat_obj = $wp_query->get_queried_object();
		      $thisCat = $cat_obj->term_id;
		      $thisCat = get_category($thisCat);
		      $parentCat = get_category($thisCat->parent);
		      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		      echo $currentBefore . $archiveByCategory;
		      single_cat_title();
		      echo '&#39;' . $currentAfter;

		    } elseif ( is_day() ) {
		      echo '<a class="de-crumb-item" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		      echo '<a class="de-crumb-item" href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		      echo $currentBefore . get_the_time('d') . $currentAfter;

		    } elseif ( is_month() ) {
		      echo '<a class="de-crumb-item" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		      echo $currentBefore . get_the_time('F') . $currentAfter;

		    } elseif ( is_year() ) {
		      echo $currentBefore . get_the_time('Y') . $currentAfter;

		    } elseif ( is_single() && !is_attachment() ) {
		      $cat = get_the_category(); $cat = $cat[0];
		      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		      echo $currentBefore;
		      the_title();
		      echo $currentAfter;

		    } elseif ( is_attachment() ) {
		      $parent = get_post($post->post_parent);
		      $cat = get_the_category($parent->ID); $cat = $cat[0];
		      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		      echo '<a class="de-crumb-item" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
		      echo $currentBefore;
		      the_title();
		      echo $currentAfter;

		    } elseif ( is_page() && !$post->post_parent ) {
		      echo $currentBefore;
		      the_title();
		      echo $currentAfter;

		    } elseif ( is_page() && $post->post_parent ) {
		      $parent_id  = $post->post_parent;
		      $breadcrumbs = array();
		      while ($parent_id) {
		        $page = get_page($parent_id);
		        $breadcrumbs[] = '<a class="de-crumb-item" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		        $parent_id  = $page->post_parent;
		      }
		      $breadcrumbs = array_reverse($breadcrumbs);
		      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
		      echo $currentBefore;
		      the_title();
		      echo $currentAfter;

		    } elseif ( is_search() ) {
		      echo $currentBefore . $searchresults . get_search_query() . '&#39;' . $currentAfter;

		    } elseif ( is_tag() ) {
		      echo $currentBefore . $postsTagged;
		      single_tag_title();
		      echo '&#39;' . $currentAfter;

		    } elseif ( is_author() ) {
		       global $author;
		      $userdata = get_userdata($author);
		      echo $currentBefore . $articlespostedby . $userdata->display_name . $currentAfter;

		    } elseif ( is_404() ) {
		      echo $currentBefore . $error404 . $currentAfter;
		    }

		    if ( get_query_var('paged') ) {
		      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		      echo __('Page') . ' ' . get_query_var('paged');
		      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		    }

		    echo '</div>';

		  }

			$output .= ob_get_contents();
			ob_end_clean();



		return $output;
	}

}

new DIVIENHANCER_breadcrumb;
