<?php


if ( $this->legacy_mode ) {
	// Blog
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon'       => 'Simple-Line-Icons-docs',
			'icon_class' => '',
			'title'      => __( 'Post', 'porto' ),
			'fields'     => array(
				array(
					'id'       => 'post-format',
					'type'     => 'switch',
					'title'    => __( 'Show Post Format', 'porto' ),
					'subtitle' => __( 'Turn on to show post format.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'hot-label',
					'type'     => 'text',
					'title'    => __( '"HOT" Text', 'porto' ),
					'subtitle' => __( 'Sticky post label to show after date on each post.', 'porto' ),
					'default'  => '',
				),
				array(
					'id'       => 'post-zoom',
					'type'     => 'switch',
					'title'    => __( 'Image Lightbox', 'porto' ),
					'subtitle' => __( 'If you use single & type builder, you should consider the options of builder widgets.', 'porto' ),
					'desc'     => __( 'Turn on to enable the lightbox on single and archive page for the main featured images.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Enable', 'porto' ),
					'off'      => __( 'Disable', 'porto' ),
				),
				array(
					'id'      => 'post-metas',
					'type'    => 'button_set',
					'title'   => __( 'Post Meta', 'porto' ),
					'subtitle'    => __( 'Determines which metas to show', 'porto' ),
					'multi'   => true,
					'options' => array(
						'like'     => __( 'Like', 'porto' ),
						'date'     => __( 'Date', 'porto' ),
						'author'   => __( 'Author', 'porto' ),
						'cats'     => __( 'Categories', 'porto' ),
						'tags'     => __( 'Tags', 'porto' ),
						'comments' => __( 'Comments', 'porto' ),
						'-'        => 'None',
					),
					'default' => array( 'date', 'author', 'cats', 'tags', 'comments', '-' ),
				),
				array(
					'id'      => 'post-meta-position',
					'type'    => 'button_set',
					'title'   => __( 'Meta Position', 'porto' ),
					'subtitle'    => __( 'This doesn\'t work for some single post layouts including "Full Alt" and "Woocommerce".', 'porto' ),
					'options' => array(
						''       => __( 'Default', 'porto' ),
						'after'  => __( 'After content', 'porto' ),
						'before' => __( 'Before content', 'porto' ),
					),
					'default' => '',
				),
			),
		),
		$options_style
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Blog & Post Archives', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_post_archive',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $archive_url, $type_url ),
					array(
						'strong' => array(),
						'b'      => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'      => 'desc_info_blog_sidebar',
				'type'    => 'info',
				'desc'    => wp_kses(
					sprintf(
						/* translators: %s: widgets url */
						__( 'You can control the blog sidebar and secondary sidebar in <a href="%s" target="_blank">here</a>.', 'porto' ),
						esc_url( admin_url( 'widgets.php' ) )
					),
					array(
						'a' => array(
							'href'   => array(),
							'target' => array(),
						),
					)
				),
			),
			array(
				'id'      => 'post-archive-layout',
				'type'    => 'image_select',
				'title'   => __( 'Page Layout', 'porto' ),
				'options' => $page_layouts,
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'post-layout',
				'type'    => 'image_select',
				'title'   => __( 'Archive Layout', 'porto' ),
				'options' => array(
					'full'        => array(
						'title' => __( 'Full', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_full.svg',
					),
					'large'       => array(
						'title' => __( 'Large', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_full.svg',
					),
					'large-alt'   => array(
						'title' => __( 'Large Alt', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_large_alt.svg',
					),
					'medium'      => array(
						'title' => __( 'Medium', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_medium.svg',
					),
					'grid'        => array(
						'title' => __( 'Grid', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_grid.svg',
					),
					'masonry'     => array(
						'title' => __( 'Masonry', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_masonry.svg',
					),
					'timeline'    => array(
						'title' => __( 'Timeline', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_timeline.svg',
					),
					'medium-alt'  => array(
						'title' => __( 'Medium Alternate', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_medium_alt.svg',
					),
					'woocommerce' => array(
						'title' => __( 'Woocommerce', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_woocommerce.svg',
					),
					'modern'      => array(
						'title' => __( 'Modern', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_modern.svg',
					),
				),
				'default' => 'full',
			),
			array(
				'id'       => 'post-style',
				'type'     => 'button_set',
				'title'    => __( 'Post Style', 'porto' ),
				'required' => array( 'post-layout', 'equals', array( 'grid', 'timeline', 'masonry' ) ),
				'options'  => array(
					'default'    => __( 'Default', 'porto' ),
					'date'       => __( 'Default - Date on Image', 'porto' ),
					'author'     => __( 'Default - Author Picture', 'porto' ),
					'related'    => __( 'Post Carousel Style', 'porto' ),
					'hover_info' => __( 'Hover Info', 'porto' ),
					'no_margin'  => __( 'No Margin & Hover Info', 'porto' ),
					'padding'    => __( 'With Borders', 'porto' ),
				),
				'default'  => 'border',
			),
			array(
				'id'       => 'grid-columns',
				'type'     => 'button_set',
				'title'    => __( 'Grid Columns', 'porto' ),
				'required' => array( 'post-layout', 'equals', array( 'grid', 'masonry' ) ),
				'options'  => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'default'  => '3',
			),
			array(
				'id'       => 'post-link',
				'type'     => 'switch',
				'title'    => __( 'Apply Post Link to Content', 'porto' ),
				'required' => array( 'post-style', 'equals', '' ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'blog-infinite',
				'type'     => 'button_set',
				'title'    => __( 'Pagination Style', 'porto' ),
				'subtitle' => __( 'Controls the pagination type for post archive page.', 'porto' ),
				'desc'     => wp_kses(
					__( '<b style="color: red">It is overrided by \'Change Archive Options\' & \'Disable infinite scroll\' of Blog Category Meta Box.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
				'options'  => array(
					''         => __( 'Default', 'porto' ),
					'ajax'     => __( 'Ajax Pagination', 'porto' ),
					'infinite' => __( 'Infinite Scroll', 'porto' ),
				),
				'default'  => 'infinite',
			),
			array(
				'id'      => 'blog-date-format',
				'type'    => 'text',
				'title'   => __( 'Date Format', 'porto' ),
				'subtitle'    => __( 'j = 1-31, F = January-December, M = Jan-Dec, m = 01-12, n = 1-12', 'porto' ) . '<br />' .
				__( 'For more, please visit ', 'porto' ) . '<a href="https://codex.wordpress.org/Formatting_Date_and_Time">https://codex.wordpress.org/Formatting_Date_and_Time</a>',
				'default' => '',
			),
			array(
				'id'       => 'desc_info_post_share',
				'type'     => 'info',
				'desc'     => wp_kses(
					__( '<b>Post Share:</b> If you use <span>type builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice'   => false,
				'class'    => 'porto-redux-section',
				'required' => array( 'post-layout', 'equals', array( 'grid', 'timeline', 'masonry', 'large-alt' ) ),
			),
			array(
				'id'       => 'blog-post-share',
				'type'     => 'switch',
				'title'    => __( 'Show Social Share Links', 'porto' ),
				'required' => array( 'post-layout', 'equals', array( 'grid', 'timeline', 'masonry', 'large-alt' ) ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),

			array(
				'id'       => 'blog-post-share-position',
				'type'     => 'button_set',
				'required' => array( 'blog-post-share', 'equals', true ),
				'title'    => __( 'Social Share Links Style', 'porto' ),
				'default'  => '',
				'options'  => array(
					''        => __( 'Default', 'porto' ),
					'advance' => __( 'Advance', 'porto' ),
				),
			),
			array(
				'id'     => 'desc_info_post_excerpt',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( '<b>Post Excerpt:</b> If you use <span>type builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'      => 'blog-excerpt',
				'type'    => 'switch',
				'title'   => __( 'Show Excerpt', 'porto' ),
				'default' => true,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'blog-excerpt-length',
				'type'     => 'text',
				'required' => array( 'blog-excerpt', 'equals', true ),
				'title'    => __( 'Excerpt Length', 'porto' ),
				'default'  => '50',
			),
			array(
				'id'       => 'blog-excerpt-base',
				'type'     => 'button_set',
				'required' => array( 'blog-excerpt', 'equals', true ),
				'title'    => __( 'Basis for Excerpt Length', 'porto' ),
				'subtitle' => __( 'Excerpt length is based on words or characters?', 'porto' ),
				'desc'     => __( 'This works for other post types too.', 'porto' ),
				'options'  => array(
					'words'      => __( 'Words', 'porto' ),
					'characters' => __( 'Characters', 'porto' ),
				),
				'default'  => 'words',
			),
			array(
				'id'       => 'blog-excerpt-type',
				'type'     => 'button_set',
				'required' => array( 'blog-excerpt', 'equals', true ),
				'title'    => __( 'Excerpt Type', 'porto' ),
				'subtitle'     => __( 'This works for other post types too.', 'porto' ),
				'options'  => array(
					'text' => __( 'Text', 'porto' ),
					'html' => __( 'HTML', 'porto' ),
				),
				'default'  => 'text',
			),
		),
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Blog', 'porto' ),
		'fields'     => array(
			array(
				'id'        => 'blog-title',
				'type'      => 'text',
				'title'     => __( 'Page Title', 'porto' ),
				'default'   => 'Blog',
				'transport' => 'postMessage',
			),
			array(
				'id'      => 'blog-banner_pos',
				'type'    => 'select',
				'title'   => __( 'Blog Banner Position', 'porto' ),
				'options' => $porto_banner_pos,
				'default' => '',
			),
			array(
				'id'        => 'blog-footer_view',
				'type'      => 'select',
				'title'     => __( 'Blog Footer View', 'porto' ),
				'options'   => $porto_footer_view,
				'default'   => '',
				'transport' => 'postMessage',
			),
			array(
				'id'      => 'blog-banner_type',
				'type'    => 'select',
				'title'   => __( 'Blog Banner Type', 'porto' ),
				'options' => $porto_banner_type,
				'default' => '',
			),
			array(
				'id'       => 'blog-master_slider',
				'type'     => 'select',
				'required' => array( 'blog-banner_type', 'equals', 'master_slider' ),
				'title'    => __( 'Master Slider', 'porto' ),
				'options'  => $porto_master_sliders,
				'default'  => '',
			),
			array(
				'id'       => 'blog-rev_slider',
				'type'     => 'select',
				'required' => array( 'blog-banner_type', 'equals', 'rev_slider' ),
				'title'    => __( 'Revolution Slider', 'porto' ),
				'options'  => $porto_rev_sliders,
				'default'  => '',
			),
			array(
				'id'       => 'blog-banner_block',
				'type'     => 'text',
				'required' => array( 'blog-banner_type', 'equals', 'banner_block' ),
				'title'    => __( 'Banner Block', 'porto' ),
				'subtitle'     => __( 'Please input block slug name. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
			),
			array(
				'id'        => 'blog-content_top',
				'type'      => 'text',
				'title'     => __( 'Content Top', 'porto' ),
				'subtitle'  => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'        => 'blog-content_inner_top',
				'type'      => 'text',
				'title'     => __( 'Content Inner Top', 'porto' ),
				'subtitle'      => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'        => 'blog-content_inner_bottom',
				'type'      => 'text',
				'title'     => __( 'Content Inner Bottom', 'porto' ),
				'subtitle'      => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'        => 'blog-content_bottom',
				'type'      => 'text',
				'title'     => __( 'Content Bottom', 'porto' ),
				'subtitle'      => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				'transport' => 'postMessage',
			),
		),
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Single Post', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_single_post',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $single_url, $type_url ),
					array(
						'strong' => array(),
						'b'      => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'      => 'desc_info_single_post_sidebar',
				'type'    => 'info',
				'desc'    => wp_kses(
					sprintf(
						/* translators: %s: widgets url */
						__( 'You can control the blog sidebar and secondary sidebar in <a href="%s" target="_blank">here</a>.', 'porto' ),
						esc_url( admin_url( 'widgets.php' ) )
					),
					array(
						'a' => array(
							'href'   => array(),
							'target' => array(),
						),
					)
				),
			),
			array(
				'id'      => 'post-single-layout',
				'type'    => 'image_select',
				'title'   => __( 'Page Layout', 'porto' ),
				'options' => $page_layouts,
				'default' => 'right-sidebar',
			),
			array(
				'id'    => 'post-banner-block',
				'type'  => 'text',
				'title' => __( 'Global Banner Block', 'porto' ),
				'subtitle'  => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
			),
			array(
				'id'        => 'post-content_bottom',
				'type'      => 'text',
				'title'     => __( 'Content Bottom Block', 'porto' ),
				'subtitle'      => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				'transport' => 'refresh',
			),
			array(
				'id'     => 'desc_info_single_post_warn',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( 'If you use <span>single builder</span>, the below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'      => 'post-content-layout',
				'type'    => 'image_select',
				'title'   => __( 'Post Layout', 'porto' ),
				'options' => array(
					'full'        => array(
						'title' => __( 'Full', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_full.svg',
					),
					'large'       => array(
						'title' => __( 'Large', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_full.svg',
					),
					'large-alt'   => array(
						'title' => __( 'Large Alt', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_large_alt.svg',
					),
					'medium'      => array(
						'title' => __( 'Medium', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_medium.svg',
					),
					'full-alt'    => array(
						'title' => __( 'Full Alt', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_full_alt.svg',
					),
					'woocommerce' => array(
						'title' => __( 'Woocommerce', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_woocommerce.svg',
					),
					'modern'      => array(
						'title' => __( 'Modern', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/blog_modern.svg',
					),
				),
				'default' => 'full',
			),
			array(
				'id'        => 'post-replace-pos',
				'type'      => 'switch',
				'title'     => __( 'Replace the position of title and meta', 'porto' ),
				'default'   => false,
				'required'  => array( 'post-content-layout', 'equals', array( 'large-alt', 'full-alt' ) ),
				'transport' => 'postMessage',
			),
			array(
				'id'      => 'post-title-style',
				'type'    => 'button_set',
				'title'   => __( 'Post Section Title Style', 'porto' ),
				'subtitle'    => __( 'Select title style of author, comment, etc.', 'porto' ),
				'options' => array(
					''             => __( 'With Icon', 'porto' ),
					'without-icon' => __( 'Without Icon', 'porto' ),
				),
				'default' => 'without-icon',
			),
			// array(
			// 	'id'        => 'post-slideshow',
			// 	'type'      => 'switch',
			// 	'title'     => __( 'Show Slideshow', 'porto' ),
			// 	'default'   => true,
			// 	'on'        => __( 'Yes', 'porto' ),
			// 	'off'       => __( 'No', 'porto' ),
			// 	'transport' => 'postMessage',
			// ),
			array(
				'id'        => 'post-title',
				'type'      => 'switch',
				'title'     => __( 'Show Title', 'porto' ),
				'subtitle'  => __( 'Turn on to show the title', 'porto' ),
				'default'   => true,
				'on'        => __( 'Yes', 'porto' ),
				'off'       => __( 'No', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'        => 'post-share',
				'type'      => 'switch',
				'title'     => __( 'Show Social Share Links', 'porto' ),
				'subtitle'  => __( 'Turn on to show the social share links.', 'porto' ),
				'default'   => true,
				'on'        => __( 'Yes', 'porto' ),
				'off'       => __( 'No', 'porto' ),
				'transport' => 'postMessage',
			),

			array(
				'id'        => 'post-share-position',
				'type'      => 'button_set',
				'required'  => array( 'post-share', 'equals', true ),
				'title'     => __( 'Social Share Links Style', 'porto' ),
				'subtitle'  => __( 'Controls the social share links style.', 'porto' ),
				'default'   => '',
				'options'   => array(
					''        => __( 'Default', 'porto' ),
					'advance' => __( 'Advance', 'porto' ),
				),
				'transport' => 'postMessage',
			),
			array(
				'id'        => 'post-author',
				'type'      => 'switch',
				'title'     => __( 'Show Author Info', 'porto' ),
				'subtitle'  => __( 'Turn on to show the author information.', 'porto' ),
				'default'   => true,
				'on'        => __( 'Yes', 'porto' ),
				'off'       => __( 'No', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'        => 'post-comments',
				'type'      => 'switch',
				'title'     => __( 'Show Comments', 'porto' ),
				'subtitle'  => __( 'Turn on to show the comments.', 'porto' ),
				'default'   => true,
				'on'        => __( 'Yes', 'porto' ),
				'off'       => __( 'No', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'       => 'post-backto-blog',
				'type'     => 'switch',
				'title'    => __( 'Show Back to Blog Link', 'porto' ),
				'subtitle' => __( 'Turn on to show \'Back Icon\' to Blog Page Link.', 'porto' ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'     => 'desc_info_related_post',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( '<b>Related Posts:</b> If you use <span>single builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'      => 'post-related',
				'type'    => 'switch',
				'title'   => __( 'Show Related Posts', 'porto' ),
				'default' => true,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'post-related-count',
				'type'     => 'text',
				'required' => array( 'post-related', 'equals', true ),
				'title'    => __( 'Related Posts Count', 'porto' ),
				'subtitle'     => __( 'If you want to show all the related posts, please input "-1".', 'porto' ),
				'default'  => '10',
			),
			array(
				'id'       => 'post-related-orderby',
				'type'     => 'button_set',
				'required' => array( 'post-related', 'equals', true ),
				'title'    => __( 'Related Posts Order by', 'porto' ),
				'options'  => array(
					'none'          => __( 'None', 'porto' ),
					'rand'          => __( 'Random', 'porto' ),
					'date'          => __( 'Date', 'porto' ),
					'ID'            => __( 'ID', 'porto' ),
					'modified'      => __( 'Modified Date', 'porto' ),
					'comment_count' => __( 'Comment Count', 'porto' ),
				),
				'default'  => 'rand',
			),
			array(
				'id'       => 'post-related-cols',
				'type'     => 'button_set',
				'required' => array( 'post-related', 'equals', true ),
				'title'    => __( 'Related Posts Columns', 'porto' ),
				'subtitle'     => __( 'reduce one column in left or right sidebar layout', 'porto' ),
				'options'  => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
				'default'  => '4',
			),
		),
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Related Posts Carousel', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_single_post_carousel',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $single_url, $type_url ),
					array(
						'strong' => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'       => 'post-related-image-size',
				'type'     => 'dimensions',
				'title'    => __( 'Post Image Size', 'porto' ),
				'subtitle' => __( 'Please regenerate all the thumbnails in <strong>Tools > Regen.Thumbnails</strong> after save changes.', 'porto' ),
				'default'  => array(
					'width'  => '450',
					'height' => '231',
				),
			),
			array(
				'id'      => 'post-related-style',
				'type'    => 'image_select',
				'title'   => __( 'Post Style', 'porto' ),
				'options' => array(
					''        => array(
						'title' => __( 'With Read More Link', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_style_1.svg',
					),
					'style-2' => array(
						'title' => __( 'With Post Meta', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_style_2.svg',
					),
					'style-3' => array(
						'title' => __( 'With Read More Button', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_style_3.svg',
					),
					'style-4' => array(
						'title' => __( 'With Side Image', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_style_4.svg',
					),
					'style-5' => array(
						'title' => __( 'With Categories', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_style_5.svg',
					),
					'style-6' => array(
						'title' => __( 'Simple', 'porto' ),
						'img'   => PORTO_OPTIONS_URI . '/images/post_style_6.svg',
					),
				),
				'default' => '',
			),
			array(
				'id'       => 'post-related-excerpt-length',
				'type'     => 'text',
				'title'    => __( 'Excerpt Length', 'porto' ),
				'subtitle' => __( 'The number of words', 'porto' ),
				'default'  => '20',
			),
			array(
				'id'       => 'post-related-thumb-bg',
				'type'     => 'button_set',
				'title'    => __( 'Image Overlay Background', 'porto' ),
				'subtitle' => __( 'Controls the overlay background of featured image.', 'porto' ),
				'options'  => array(
					''                => __( 'Darken', 'porto' ),
					'lighten'         => __( 'Lighten', 'porto' ),
					'hide-wrapper-bg' => __( 'Transparent', 'porto' ),
				),
				'default'  => 'hide-wrapper-bg',
			),
			array(
				'id'       => 'post-related-thumb-image',
				'type'     => 'button_set',
				'title'    => __( 'Hover Image Effect', 'porto' ),
				'subtitle' => __( 'Controls the hover effect of image.', 'porto' ),
				'options'  => array(
					''        => __( 'Zoom', 'porto' ),
					'no-zoom' => __( 'No Zoom', 'porto' ),
				),
				'default'  => '',
			),
			array(
				'id'       => 'post-related-thumb-borders',
				'type'     => 'button_set',
				'title'    => __( 'Image Borders', 'porto' ),
				'desc'     => __( 'This works for only related post carousel when "Skin -> Layout -> Thumbnail Padding" is enabled.', 'porto' ),
				'options'  => array(
					''           => __( 'With Borders', 'porto' ),
					'no-borders' => __( 'Without Borders', 'porto' ),
				),
				'default'  => '',
				'required' => array( 'thumb-padding', 'equals', true ),
			),
			array(
				'id'       => 'post-related-author',
				'type'     => 'switch',
				'title'    => __( 'Author Name', 'porto' ),
				'subtitle' => __( 'Show author name.', 'porto' ),
				'required' => array( 'post-related-style', 'equals', array( '', 'style-3' ) ),
				'default'  => false,
				'on'       => __( 'Show', 'porto' ),
				'off'      => __( 'Hide', 'porto' ),
			),
			array(
				'id'       => 'desc_info_related_post_button',
				'type'     => 'info',
				'desc'     => __( 'Read More Button', 'porto' ),
				'required' => array( 'post-related-style', 'equals', 'style-3' ),
				'notice'   => false,
			),
			array(
				'id'       => 'post-related-btn-style',
				'type'     => 'button_set',
				'title'    => __( 'Button Style', 'porto' ),
				'subtitle' => __( 'Controls the style of button.', 'porto' ),
				'required' => array( 'post-related-style', 'equals', 'style-3' ),
				'options'  => array(
					''            => __( 'Normal', 'porto' ),
					'btn-borders' => __( 'Borders', 'porto' ),
				),
				'default'  => '',
			),
			array(
				'id'       => 'post-related-btn-size',
				'type'     => 'button_set',
				'title'    => __( 'Button Size', 'porto' ),
				'subtitle' => __( 'Controls the size of the button.', 'porto' ),
				'required' => array( 'post-related-style', 'equals', 'style-3' ),
				'options'  => array(
					''       => __( 'Normal', 'porto' ),
					'btn-sm' => __( 'Small', 'porto' ),
					'btn-xs' => __( 'Extra Small', 'porto' ),
				),
				'default'  => '',
			),
			array(
				'id'       => 'post-related-btn-color',
				'type'     => 'button_set',
				'title'    => __( 'Button Color', 'porto' ),
				'subtitle' => __( 'Controls the skin of button.', 'porto' ),
				'required' => array( 'post-related-style', 'equals', 'style-3' ),
				'options'  => array(
					'btn-default'    => __( 'Default', 'porto' ),
					'btn-primary'    => __( 'Primary', 'porto' ),
					'btn-secondary'  => __( 'Secondary', 'porto' ),
					'btn-tertiary'   => __( 'Tertiary', 'porto' ),
					'btn-quaternary' => __( 'Quaternary', 'porto' ),
					'btn-dark'       => __( 'Dark', 'porto' ),
					'btn-light'      => __( 'Light', 'porto' ),
				),
				'default'  => 'btn-default',
			),
		),
	);
	// Portfolio
	$portfolio_options = array(
		'icon'       => 'Simple-Line-Icons-picture',
		'icon_class' => '',
		'title'      => __( 'Portfolio', 'porto' ),
		'customizer' => false,
		'fields'     => array(
			array(
				'id'       => 'enable-portfolio',
				'type'     => 'switch',
				'title'    => __( 'Portfolio Content Type', 'porto' ),
				'subtitle' => __( 'Enable to provide Portfolio type.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Enable', 'porto' ),
				'off'      => __( 'Disable', 'porto' ),
			),
			array(
				'id'          => 'portfolio-slug-name',
				'type'        => 'text',
				'title'       => __( 'Slug Name', 'porto' ),
				'subtitle'    => __( 'This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'porto' ),
				'placeholder' => 'portfolio',
			),
			array(
				'id'          => 'portfolio-name',
				'type'        => 'text',
				'title'       => __( 'Name', 'porto' ),
				'subtitle'    => __( 'A plural descriptive name for the post type marked for translation.', 'porto' ),
				'placeholder' => __( 'Portfolios', 'porto' ),
			),
			array(
				'id'          => 'portfolio-singular-name',
				'type'        => 'text',
				'title'       => __( 'Singular Name', 'porto' ),
				'subtitle'    => __( 'Name for one object of this post type.', 'porto' ),
				'placeholder' => __( 'Portfolio', 'porto' ),
			),
			array(
				'id'          => 'portfolio-cat-slug-name',
				'type'        => 'text',
				'title'       => __( 'Category Slug Name', 'porto' ),
				'subtitle'    => __( 'The slug name of the taxonomy: category.', 'porto' ),
				'placeholder' => 'portfolio_cat',
			),
			array(
				'id'          => 'portfolio-skill-slug-name',
				'type'        => 'text',
				'title'       => __( 'Skill Slug Name', 'porto' ),
				'subtitle'    => __( 'The slug name of the taxonomy: skill.', 'porto' ),
				'placeholder' => 'portfolio_skill',
			),
		),
	);
	if ( $options_style ) {
		$this->sections[] = $portfolio_options;
	}
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon'       => 'Simple-Line-Icons-picture',
			'icon_class' => '',
			'title'      => __( 'Portfolio', 'porto' ),
			'fields'     => array(
				array(
					'id'       => 'portfolio-archive-page',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => __( 'Portfolios Page', 'porto' ),
					'subtitle' => __( 'Select a portfolio archive page.', 'porto' ),
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the archive page.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'       => 'portfolio-zoom',
					'type'     => 'switch',
					'title'    => __( 'Image Lightbox', 'porto' ),
					'subtitle' => __( 'If you use single & type builder, you should consider the options of builder widgets.', 'porto' ),
					'desc'     => __( 'Turn on to enable the lightbox on single and archive page for the main featured images.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Enable', 'porto' ),
					'off'      => __( 'Disable', 'porto' ),
				),
				array(
					'id'       => 'portfolio-metas',
					'type'     => 'button_set',
					'title'    => __( 'Portfolio Meta', 'porto' ),
					'subtitle' => __( 'If you use single & type builder, you should consider the options of builder widgets.', 'porto' ),
					'desc'     => __( 'Determines which metas to show.', 'porto' ),
					'multi'    => true,
					'options'  => array(
						'like'     => __( 'Like', 'porto' ),
						'date'     => __( 'Date', 'porto' ),
						'cats'     => __( 'Categories', 'porto' ),
						'skills'   => __( 'Skills', 'porto' ),
						'location' => __( 'Location', 'porto' ),
						'client'   => __( 'Client', 'porto' ),
						'quote'    => __( 'Author', 'porto' ),
						'link'     => __( 'Link', 'porto' ),
						'-'        => 'None',
					),
					'default'  => array( 'like', 'date', 'cats', 'skills', 'location', 'client', 'quote', '-', 'link' ),
				),
				array(
					'id'      => 'portfolio-subtitle',
					'type'    => 'button_set',
					'title'   => __( 'Portfolio Sub Title', 'porto' ),
					'subtitle'    => __( 'Use this value in portfolio archives (grid, masonry, timeline layouts) and portfolio carousel.', 'porto' ),
					'options' => array(
						'none'        => __( 'None', 'porto' ),
						'like'        => __( 'Like', 'porto' ),
						'date'        => __( 'Date', 'porto' ),
						'cats'        => __( 'Categories', 'porto' ),
						'skills'      => __( 'Skills', 'porto' ),
						'location'    => __( 'Location', 'porto' ),
						'client_name' => __( 'Client Name', 'porto' ),
						'client_link' => __( 'Client URL(Link)', 'porto' ),
						'author_name' => __( 'Author Name', 'porto' ),
						'author_role' => __( 'Author Role', 'porto' ),
						'excerpt'     => __( 'Excerpt', 'porto' ),
					),
					'default' => 'cats',
				),
			),
		),
		$options_style,
		$portfolio_options
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Portfolio Archives', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_portfolio_archive',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $archive_url, $type_url ),
					array(
						'strong' => array(),
						'b'      => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'        => 'portfolio-title',
				'type'      => 'text',
				'title'     => __( 'Page Title', 'porto' ),
				'default'   => 'Our <strong>Projects</strong>',
				'transport' => 'postMessage',
			),
			array(
				'id'      => 'portfolio-archive-layout',
				'type'    => 'image_select',
				'title'   => __( 'Page Layout', 'porto' ),
				'options' => $page_layouts,
				'default' => 'fullwidth',
			),
			array(
				'id'      => 'portfolio-archive-ajax',
				'type'    => 'switch',
				'title'   => __( 'Show portfolio content on an archive page with ajax loading or modal windows', 'porto' ),
				'subtitle'    => __( 'If enabled, portfolio content should be displayed above the portfolios or on modal when you click portfolio item in the list.', 'porto' ),
				'default' => false,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-archive-ajax-modal',
				'type'     => 'switch',
				'title'    => __( 'Ajax Load on Modal', 'porto' ),
				'desc'     => __( 'If enabled, portfolio content should be displayed on modal when you click portfolio item in the list.', 'porto' ),
				'required' => array( 'portfolio-archive-ajax', 'equals', true ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-archive-sidebar',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar', 'porto' ),
				'required' => array( 'portfolio-archive-layout', 'equals', $sidebars ),
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
				'data'     => 'sidebars',
			),
			array(
				'id'       => 'portfolio-archive-sidebar2',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar 2', 'porto' ),
				'required' => array( 'portfolio-archive-layout', 'equals', $both_sidebars ),
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
				'data'     => 'sidebars',
			),
			array(
				'id'       => 'portfolio-infinite',
				'type'     => 'button_set',
				'title'    => __( 'Pagination Style', 'porto' ),
				'subtitle' => __( 'Controls the pagination type for portfolio archive page.', 'porto' ),
				'desc'     => wp_kses(
					__( '<b style="color: red">It is overrided by \'Change Archive Options\' & \'Disable infinite scroll\' of Portfolio Category Meta Box.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
				'options'  => array(
					''         => __( 'Default', 'porto' ),
					'ajax'     => __( 'Ajax Pagination', 'porto' ),
					'infinite' => __( 'Infinite Scroll', 'porto' ),
				),
				'default'  => 'infinite',
			),
			array(
				'id'     => 'desc_info_category_portfolio_archive',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( '<b>Category Filter in Portfolio Page:</b> If you use <span>archive builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'      => 'portfolio-cat-sort-pos',
				'type'    => 'image_select',
				'title'   => __( 'Categories Filter Position', 'porto' ),
				'options' => $porto_categories_sort_pos,
				'default' => 'content',
			),
			array(
				'id'       => 'portfolio-cat-sort-style',
				'type'     => 'image_select',
				'title'    => __( 'Filter Style', 'porto' ),
				'options'  => array(
					''        => array(
						'title' => __( 'Style 1', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/filter-style1.svg',
					),
					'style-2' => array(
						'title' => __( 'Style 2', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/filter-style2.svg',
					),
					'style-3' => array(
						'title' => __( 'Style 3', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/filter-style3.svg',
					),
				),
				'required' => array( 'portfolio-cat-sort-pos', 'equals', array( 'content' ) ),
				'default'  => '',
			),
			array(
				'id'       => 'portfolio-cat-ft',
				'type'     => 'image_select',
				'title'    => __( 'Filter Type', 'porto' ),
				'options'  => array(
					''     => array(
						'title' => __( 'Filter using Javascript/CSS', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/filter-css.svg',
					),
					'ajax' => array(
						'title' => __( 'Ajax Loading', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/filter-ajax.svg',
					),
				),
				'default'  => '',
				'required' => array(
					array( 'portfolio-infinite', '!=', '' ),
					array( 'portfolio-cat-sort-pos', '!=', 'hide' ),
				),
			),
			array(
				'id'       => 'portfolio-cat-orderby',
				'type'     => 'button_set',
				'title'    => __( 'Sort Categories Order By', 'porto' ),
				'options'  => $porto_categories_orderby,
				'default'  => 'name',
				'required' => array( 'portfolio-cat-sort-pos', '!=', 'hide' ),
			),
			array(
				'id'       => 'portfolio-cat-order',
				'type'     => 'button_set',
				'title'    => __( 'Sort Order for Categories', 'porto' ),
				'options'  => $porto_categories_order,
				'default'  => 'asc',
				'required' => array( 'portfolio-cat-sort-pos', '!=', 'hide' ),
			),
			array(
				'id'      => 'portfolio-layout',
				'type'    => 'image_select',
				'title'   => __( 'Archive Layout', 'porto' ),
				'options' => array(
					'grid'     => array(
						'alt' => __( 'Grid', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_style_1.jpg',
					),
					'masonry'  => array(
						'alt' => __( 'Masonry', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_style_2.jpg',
					),
					'timeline' => array(
						'alt' => __( 'Timeline', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_style_3.jpg',
					),
					'medium'   => array(
						'alt' => __( 'Medium', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_style_4.jpg',
					),
					'large'    => array(
						'alt' => __( 'Large', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_style_5.jpg',
					),
					'full'     => array(
						'alt' => __( 'Full', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_style_6.jpg',
					),
				),
				'default' => 'grid',
			),
			array(
				'id'       => 'portfolio-archive-masonry-ratio',
				'type'     => 'text',
				'title'    => __( 'Masonry Image Aspect Ratio', 'porto' ),
				'required' => array( 'portfolio-layout', 'equals', array( 'masonry' ) ),
				'desc'     => __( 'ratio = width / height. if ratio is large than this value, will take more space.', 'porto' ),
				'default'  => '2.4',
			),
			array(
				'id'       => 'portfolio-grid-columns',
				'type'     => 'button_set',
				'title'    => __( 'Columns', 'porto' ),
				'required' => array( 'portfolio-layout', 'equals', array( 'grid', 'masonry' ) ),
				'options'  => array(
					'1' => __( '1 Column', 'porto' ),
					'2' => __( '2 Columns', 'porto' ),
					'3' => __( '3 Columns', 'porto' ),
					'4' => __( '4 Columns', 'porto' ),
					'5' => __( '5 Columns', 'porto' ),
					'6' => __( '6 Columns', 'porto' ),
				),
				'default'  => '4',
			),
			array(
				'id'       => 'portfolio-grid-view',
				'type'     => 'image_select',
				'title'    => __( 'View Type', 'porto' ),
				'required' => array( 'portfolio-layout', 'equals', array( 'grid', 'masonry' ) ),
				'options'  => array(
					'default'  => array(
						'alt' => __( 'Default', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_view_1.jpg',
					),
					'full'     => array(
						'alt' => __( 'No Margin', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_view_2.jpg',
					),
					'outimage' => array(
						'alt' => __( 'Out of Image', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_view_3.jpg',
					),
				),
				'default'  => 'default',
			),

			array(
				'id'       => 'portfolio-archive-thumb',
				'type'     => 'image_select',
				'title'    => __( 'Info View Type', 'porto' ),
				'required' => array(
					array( 'portfolio-layout', 'equals', array( 'grid', 'masonry', 'timeline' ) ),
					array( 'portfolio-grid-view', '!=', 'outimage' ),
				),
				'options'  => array(
					''                 => array(
						'alt' => __( 'Left Info', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_1.jpg',
					),
					'centered-info'    => array(
						'alt' => __( 'Centered Info', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_2.jpg',
					),
					'bottom-info'      => array(
						'alt' => __( 'Bottom Info', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_3.jpg',
					),
					'bottom-info-dark' => array(
						'alt' => __( 'Bottom Info Dark', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_4.jpg',
					),
					'hide-info-hover'  => array(
						'alt' => __( 'Hide Info Hover', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_5.jpg',
					),
					'plus-icon'        => array(
						'alt' => __( 'Plus Icon', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_6.jpg',
					),
				),
				'default'  => '',
			),
			array(
				'id'       => 'portfolio-archive-thumb-style',
				'type'     => 'button_set',
				'title'    => __( 'Info View Type Style', 'porto' ),
				'subtitle' => __( 'Do not show meta or show a plus icon on even(2,4,6,8...) portfolios.', 'porto' ),
				'options'  => array(
					''                    => __( 'None', 'porto' ),
					'alternate-info'      => __( 'Do not show meta', 'porto' ),
					'alternate-with-plus' => __( 'Show plus icon instead of meta', 'porto' ),
				),
				'desc'     => __( 'It doesn\'t work on the \'Out of Image\' portfolio view type.', 'porto' ),
				'default'  => '',
				'required' => array( 'portfolio-layout', 'equals', array( 'grid', 'masonry', 'timeline' ) ),
			),
			array(
				'id'       => 'portfolio-archive-thumb-bg',
				'type'     => 'button_set',
				'title'    => __( 'Image Overlay Background', 'porto' ),
				'subtitle' => __( 'Controls the overlay background of featured image.', 'porto' ),
				'options'  => array(
					''                => __( 'Darken', 'porto' ),
					'lighten'         => __( 'Lighten', 'porto' ),
					'hide-wrapper-bg' => __( 'Transparent', 'porto' ),
				),
				'default'  => 'lighten',
			),
			array(
				'id'       => 'portfolio-archive-thumb-image',
				'type'     => 'button_set',
				'title'    => __( 'Hover Image Effect', 'porto' ),
				'subtitle' => __( 'Controls the hover effect of image.', 'porto' ),
				'options'  => array(
					''          => __( 'Zoom', 'porto' ),
					'slow-zoom' => __( 'Slow Zoom', 'porto' ),
					'no-zoom'   => __( 'No Zoom', 'porto' ),
				),
				'default'  => '',
			),
			array(
				'id'       => 'portfolio-archive-image-counter',
				'type'     => 'switch',
				'title'    => __( 'Image Counter', 'porto' ),
				'subtitle' => __( 'Show the featured image count.', 'porto' ),
				'default'  => false,
				'on'       => __( 'Show', 'porto' ),
				'off'      => __( 'Hide', 'porto' ),
			),

			array(
				'id'       => 'portfolio-archive-all-images',
				'type'     => 'switch',
				'title'    => __( 'Show More Featured Images in Slideshow', 'porto' ),
				'required' => array( 
					array( 'portfolio-external-link', 'equals', true ),
					array( 'portfolio-archive-link-zoom', 'equals', false ),
					array( 'portfolio-archive-ajax', 'equals', false ),
				),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-archive-images-count',
				'type'     => 'text',
				'title'    => __( 'Featured Images Count', 'porto' ),
				'required' => array( 'portfolio-archive-all-images', 'equals', true ),
				'default'  => '2',
			),

			array(
				'id'     => 'desc_info_portfolio_content',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( '<b>View Info:</b> If you use <span>type builder</span>, below options <span>aren\'t</span> necessary. It only shows on the \'out of image\' portfolio type.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
				'required' => array( 'portfolio-layout', '!=', 'timeline' ),
			),

			array(
				'id'       => 'portfolio-show-testimonial',
				'type'     => 'switch',
				'title'    => __( 'Show Author Testimonial', 'porto' ),
				'subtitle' => __( 'It only shows on the \'out of image\' portfolio type.', 'porto' ),
				'desc'     => __( 'If yes, it will show the testimonial after meta section if it exists.', 'porto' ),
				'required' => array( 'portfolio-layout', '!=', 'timeline' ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),

			array(
				'id'      => 'portfolio-show-content',
				'type'    => 'switch',
				'title'   => __( 'Show Content Section', 'porto' ),
				'subtitle'    => __( 'If yes, it will show the portfolio content in archive layout. If no, it will not show the content.', 'porto' ),
				'default' => true,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
				'required' => array( 'portfolio-layout', '!=', 'timeline' ),
			),

			array(
				'id'       => 'portfolio-excerpt',
				'type'     => 'switch',
				'title'    => __( 'Show Excerpt', 'porto' ),
				'subtitle'     => __( 'If yes, it will show the excerpt in "Medium", "Large", "Full" archive layout. If no, will show the content.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
				'required' => array( 'portfolio-show-content', 'equals', true ),
			),
			array(
				'id'       => 'portfolio-excerpt-length',
				'type'     => 'text',
				'required' => array( 'portfolio-excerpt', 'equals', true ),
				'title'    => __( 'Excerpt Length', 'porto' ),
				'subtitle' => __( 'The number of words', 'porto' ),
				'default'  => '80',
			),

			array(
				'id'       => 'portfolio-archive-readmore',
				'type'     => 'switch',
				'title'    => __( 'Show "Read More" Link', 'porto' ),
				'desc'     => __( 'Show "Read More" link in "Out of Image" view type.', 'porto' ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
				'required' => array( 'portfolio-grid-view', 'equals', 'outimage' ),
			),
			array(
				'id'          => 'portfolio-archive-readmore-label',
				'type'        => 'text',
				'title'       => __( '"Read More" Label', 'porto' ),
				'required'    => array( 'portfolio-archive-readmore', 'equals', true ),
				'placeholder' => __( 'View Project...', 'porto' ),
			),
			array(
				'id'     => 'desc_info_portfolio_link',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( '<b>Link & Lightbox Icon:</b> If you use <span>type builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'       => 'portfolio-archive-link-zoom',
				'type'     => 'switch',
				'title'    => __( 'Enable Image Lightbox instead of Portfolio Link', 'porto' ),
				'subtitle' => __( 'Turn on to enable the image lightbox instead of link.', 'porto' ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-archive-img-lightbox-thumb',
				'type'     => 'button_set',
				'title'    => __( 'Select Style', 'porto' ),
				'required' => array( 'portfolio-archive-link-zoom', 'equals', true ),
				'options'  => array(
					''           => __( 'Without Thumbs', 'porto' ),
					'with-thumb' => __( 'With Thumbs', 'porto' ),
				),
				'default'  => '',
			),
			array(
				'id'       => 'portfolio-archive-link',
				'type'     => 'switch',
				'title'    => __( 'Show Link Icon', 'porto' ),
				'subtitle' => __( 'Turn on to show link icon in portfolio type.', 'porto' ),
				'required' => array( 'portfolio-archive-link-zoom', 'equals', false ),
				'default'  => true,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),

			array(
				'id'       => 'portfolio-archive-zoom',
				'type'     => 'switch',
				'title'    => __( 'Show Image Lightbox Icon', 'porto' ),
				'subtitle' => __( 'Turn on to show lightbox icon in portfolio type.', 'porto' ),
				'required' => array( 'portfolio-archive-link-zoom', 'equals', false ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-external-link',
				'type'     => 'switch',
				'title'    => __( 'Show External Link instead of Portfolio Link', 'porto' ),
				'subtitle' => __( 'Determines the permalink with meta box portfolio link.', 'porto' ),
				'required' => array( 'portfolio-archive-link-zoom', 'equals', false ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
		),
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Single Portfolio', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_single_portfolio',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $single_url, $type_url ),
					array(
						'strong' => array(),
						'b'      => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'      => 'portfolio-single-layout',
				'type'    => 'image_select',
				'title'   => __( 'Page Layout', 'porto' ),
				'options' => $page_layouts,
				'default' => 'fullwidth',
			),
			array(
				'id'       => 'portfolio-single-sidebar',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar', 'porto' ),
				'required' => array( 'portfolio-single-layout', 'equals', $sidebars ),
				'data'     => 'sidebars',
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
			),
			array(
				'id'       => 'portfolio-single-sidebar2',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar 2', 'porto' ),
				'required' => array( 'portfolio-single-layout', 'equals', $both_sidebars ),
				'data'     => 'sidebars',
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
			),
			array(
				'id'    => 'portfolio-banner-block',
				'type'  => 'text',
				'title' => __( 'Global Banner Block', 'porto' ),
				'subtitle'  => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
			),
			array(
				'id'        => 'portfolio-content_bottom',
				'type'      => 'text',
				'title'     => __( 'Content Bottom Block', 'porto' ),
				'subtitle'      => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				'transport' => 'refresh',
			),
			array(
				'id'     => 'desc_info_single_portfolio_warn',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( 'If you use <span>single builder</span>, the below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'      => 'portfolio-content-layout',
				'type'    => 'image_select',
				'title'   => __( 'Portfolio Layout', 'porto' ),
				'options' => array(
					'medium'      => array(
						'alt' => __( 'Medium Slider', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_1.jpg',
					),
					'large'       => array(
						'alt' => __( 'Large Slider', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_2.jpg',
					),
					'full'        => array(
						'alt' => __( 'Full Slider', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_3.jpg',
					),
					'gallery'     => array(
						'alt' => __( 'Gallery', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_4.jpg',
					),
					'carousel'    => array(
						'alt' => __( 'Carousel', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_5.jpg',
					),
					'medias'      => array(
						'alt' => __( 'Medias', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_6.jpg',
					),
					'full-video'  => array(
						'alt' => __( 'Full Width Video', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_7.jpg',
					),
					'masonry'     => array(
						'alt' => __( 'Masonry Images', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_8.jpg',
					),
					'full-images' => array(
						'alt' => __( 'Full Images', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_9.jpg',
					),
					'extended'    => array(
						'alt' => __( 'Extended', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_single_style_10.jpg',
					),
				),
				'default' => 'medium',
			),
			array(
				'id'       => 'desc_info_rs_carousel',
				'type'     => 'info',
				'required' => array( 'portfolio-content-layout', 'equals', 'carousel' ),
				'desc'     => wp_kses(
					__( 'Please install the <a href="https://www.sliderrevolution.com/" target="_blank">Slider Revolution</a>.', 'porto' ),
					array(
						'a' => array(
							'href'   => array(),
							'target' => array(),
						),
					)
				),
			),
			array(
				'id'       => 'portfolio-slider',
				'type'     => 'image_select',
				'title'    => __( 'Slider Type', 'porto' ),
				'required' => array( 'portfolio-content-layout', 'equals', array( 'medium', 'large', 'full' ) ),
				'options'  => array(
					'without-thumbs' => array(
						'alt' => __( 'Without Thumbs', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_slideshow_1.jpg',
					),
					'with-thumbs'    => array(
						'alt' => __( 'With Thumbs', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_slideshow_2.jpg',
					),
				),
				'default'  => 'without-thumbs',
			),
			array(
				'id'       => 'portfolio-slider-thumbs-count',
				'type'     => 'text',
				'title'    => __( 'Slider Thumbs Count', 'porto' ),
				'required' => array( 'portfolio-slider', 'equals', array( 'with-thumbs' ) ),
				'default'  => '4',
			),
			array(
				'id'      => 'portfolio-share',
				'type'    => 'switch',
				'title'   => __( 'Show Social Share Links', 'porto' ),
				'subtitle'    => __( 'Turn on to show social share links.', 'porto' ),
				'default' => true,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'      => 'portfolio-author',
				'type'    => 'switch',
				'title'   => __( 'Show Author Info', 'porto' ),
				'subtitle'    => __( 'Turn on to show author info.', 'porto' ),
				'default' => false,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'      => 'portfolio-comments',
				'type'    => 'switch',
				'title'   => __( 'Show Comments', 'porto' ),
				'subtitle'    => __( 'Turn on to show comments.', 'porto' ),
				'default' => false,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'        => 'portfolio-page-nav',
				'type'      => 'switch',
				'title'     => __( 'Show Navigation', 'porto' ),
				'subtitle'      => __( 'Show list and title, next/prev links.', 'porto' ),
				'default'   => true,
				'on'        => __( 'Yes', 'porto' ),
				'off'       => __( 'No', 'porto' ),
				'transport' => 'postMessage',
			),
			array(
				'id'       => 'portfolio-image-count',
				'type'     => 'switch',
				'title'    => __( 'Show Image Count', 'porto' ),
				'subtitle' => __( 'Show count when the single layout is full or full images. And also metabox option "Change Featured Image" is set.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'     => 'desc_info_related_portfolio',
				'type'   => 'info',
				'desc'   => wp_kses(
					__( '<b>Related Portfolios:</b> If you use <span>single builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
					array(
						'span' => array(),
						'b'    => array(),
					)
				),
				'notice' => false,
				'class'  => 'porto-redux-section',
			),
			array(
				'id'      => 'portfolio-related',
				'type'    => 'switch',
				'title'   => __( 'Show Related Portfolios', 'porto' ),
				'default' => true,
				'on'      => __( 'Yes', 'porto' ),
				'off'     => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-related-count',
				'type'     => 'text',
				'required' => array( 'portfolio-related', 'equals', true ),
				'title'    => __( 'Related Portfolios Count', 'porto' ),
				'subtitle'     => __( 'If you want to show all the related portfolios, please input "-1".', 'porto' ),
				'default'  => '10',
			),
			array(
				'id'       => 'portfolio-related-orderby',
				'type'     => 'button_set',
				'required' => array( 'portfolio-related', 'equals', true ),
				'title'    => __( 'Related Portfolios Order by', 'porto' ),
				'options'  => array(
					'none'          => __( 'None', 'porto' ),
					'rand'          => __( 'Random', 'porto' ),
					'date'          => __( 'Date', 'porto' ),
					'ID'            => __( 'ID', 'porto' ),
					'modified'      => __( 'Modified Date', 'porto' ),
					'comment_count' => __( 'Comment Count', 'porto' ),
				),
				'default'  => 'rand',
			),
			array(
				'id'       => 'portfolio-related-cols',
				'type'     => 'button_set',
				'required' => array( 'portfolio-related', 'equals', true ),
				'title'    => __( 'Related Portfolios Columns', 'porto' ),
				'subtitle'     => __( 'reduce one column in left or right sidebar layout', 'porto' ),
				'options'  => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
				),
				'default'  => '4',
			),

		),
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Related Portfolio Carousel', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_single_portfolio_carousel',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $single_url, $type_url ),
					array(
						'strong' => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'      => 'portfolio-related-style',
				'type'    => 'image_select',
				'title'   => __( 'Portfolio Style', 'porto' ),
				'options' => array(
					''         => array(
						'alt' => __( 'Default', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_view_1.jpg',
					),
					'full'     => array(
						'alt' => __( 'No Margin', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_view_2.jpg',
					),
					'outimage' => array(
						'alt' => __( 'Out of Image', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_archive_view_3.jpg',
					),
				),
				'default' => '',
			),
			array(
				'id'       => 'portfolio-related-thumb',
				'type'     => 'image_select',
				'title'    => __( 'Info View Type', 'porto' ),
				'required' => array( 'portfolio-related-style', '!=', 'outimage' ),
				'options'  => array(
					''                 => array(
						'alt' => __( 'Left Info', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_1.jpg',
					),
					'centered-info'    => array(
						'alt' => __( 'Centered Info', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_2.jpg',
					),
					'bottom-info'      => array(
						'alt' => __( 'Bottom Info', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_3.jpg',
					),
					'bottom-info-dark' => array(
						'alt' => __( 'Bottom Info Dark', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_4.jpg',
					),
					'hide-info-hover'  => array(
						'alt' => __( 'Hide Info Hover', 'porto' ),
						'img' => PORTO_OPTIONS_URI . '/images/portfolio_info_view_5.jpg',
					),
				),
				'default'  => '',
			),
			array(
				'id'       => 'portfolio-related-thumb-bg',
				'type'     => 'button_set',
				'title'    => __( 'Image Overlay Background', 'porto' ),
				'subtitle' => __( 'Controls the overlay background of featured image.', 'porto' ),
				'options'  => array(
					''                => __( 'Darken', 'porto' ),
					'lighten'         => __( 'Lighten', 'porto' ),
					'hide-wrapper-bg' => __( 'Transparent', 'porto' ),
				),
				'default'  => 'lighten',
			),
			array(
				'id'       => 'portfolio-related-thumb-image',
				'type'     => 'button_set',
				'title'    => __( 'Hover Image Effect', 'porto' ),
				'subtitle' => __( 'Controls the hover effect of image.', 'porto' ),
				'options'  => array(
					''        => __( 'Zoom', 'porto' ),
					'no-zoom' => __( 'No Zoom', 'porto' ),
				),
				'default'  => '',
			),
			array(
				'id'       => 'portfolio-related-link',
				'type'     => 'switch',
				'title'    => __( 'Show Link Icon', 'porto' ),
				'subtitle' => __( 'Turn on to show link icon in related portfolio.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
			),
			array(
				'id'       => 'portfolio-related-show-content',
				'type'     => 'switch',
				'title'    => __( 'Show Excerpt Content', 'porto' ),
				'default'  => false,
				'on'       => __( 'Yes', 'porto' ),
				'off'      => __( 'No', 'porto' ),
				'required' => array( 'portfolio-related-style', 'equals', 'outimage' ),
			),
		),
	);

	// Event
	$event_options = array(
		'id'         => 'event-settings',
		'icon'       => 'Simple-Line-Icons-event',
		'icon_class' => '',
		'title'      => __( 'Event', 'porto' ),
		'customizer' => false,
		'fields'     => array(
			array(
				'id'       => 'enable-event',
				'type'     => 'switch',
				'title'    => __( 'Event Content Type', 'porto' ),
				'subtitle' => __( 'Enable to provide Event type.', 'porto' ),
				'default'  => false,
				'on'       => __( 'Enable', 'porto' ),
				'off'      => __( 'Disable', 'porto' ),
			),
			array(
				'id'          => 'event-slug-name',
				'type'        => 'text',
				'title'       => __( 'Slug Name', 'porto' ),
				'subtitle'    => __( 'This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'porto' ),
				'placeholder' => 'event',
			),
			array(
				'id'          => 'event-name',
				'type'        => 'text',
				'title'       => __( 'Name', 'porto' ),
				'subtitle'    => __( 'A plural descriptive name for the post type marked for translation.', 'porto' ),
				'placeholder' => __( 'Events', 'porto' ),
			),
			array(
				'id'          => 'event-singular-name',
				'type'        => 'text',
				'title'       => __( 'Singular Name', 'porto' ),
				'subtitle'    => __( 'Name for one object of this post type.', 'porto' ),
				'placeholder' => __( 'Event', 'porto' ),
			),
		),
	);
	if ( $options_style ) {
		$this->sections[] = $event_options;
	}
	$this->sections[] = $this->add_customizer_field(
		array(
			'id'         => 'customizer-event-settings',
			'title'      => __( 'Event', 'porto' ),
			'icon_class' => '',
			'icon'       => 'Simple-Line-Icons-event',
		),
		$options_style,
		$event_options
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'Event Archives', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_event_archive',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $archive_url, $type_url ),
						array(
							'strong' => array(),
							'b'      => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'       => 'event-archive-page',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => __( 'Events Page', 'porto' ),
					'subtitle' => __( 'Select a event archive page.', 'porto' ),
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the archive page.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'      => 'event-title',
					'type'    => 'text',
					'title'   => __( 'Page Title', 'porto' ),
					'default' => 'Our <strong>Events</strong>',
				),
				array(
					'id'      => 'event-sub-title',
					'type'    => 'textarea',
					'title'   => __( 'Page Sub Title', 'porto' ),
					'default' => '',
				),
				array(
					'id'      => 'event-archive-layout',
					'type'    => 'button_set',
					'title'   => __( 'Page Layout', 'porto' ),
					'options' => array(
						'list' => __( 'List', 'porto' ),
						'grid' => __( 'Grid', 'porto' ),
					),
					'default' => 'list',
				),

				array(
					'id'       => 'event-archive-countdown',
					'type'     => 'switch',
					'title'    => __( 'Show Event Countdown', 'porto' ),
					'required' => array( 'event-archive-layout', 'equals', 'grid' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),

				array(
					'id'      => 'event-excerpt',
					'type'    => 'switch',
					'title'   => __( 'Show Excerpt', 'porto' ),
					'subtitle'    => __( 'If yes, will show the excerpt in archive layout. If no, it will show the content.', 'porto' ),
					'default' => true,
					'on'      => __( 'Yes', 'porto' ),
					'off'     => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'event-excerpt-length',
					'type'     => 'text',
					'required' => array( 'event-excerpt', 'equals', true ),
					'title'    => __( 'Excerpt Length', 'porto' ),
					'subtitle' => __( 'The number of words', 'porto' ),
					'default'  => '80',
				),
				array(
					'id'      => 'event-readmore',
					'type'    => 'switch',
					'title'   => __( 'Show Read More button', 'porto' ),
					'default' => false,
					'on'      => __( 'Yes', 'porto' ),
					'off'     => __( 'No', 'porto' ),
				),
			),
		),
		$options_style
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'Single Event', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_single_event',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $single_url, $type_url ),
						array(
							'strong' => array(),
							'b'      => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'    => 'event-banner-block',
					'type'  => 'text',
					'title' => __( 'Global Banner Block', 'porto' ),
					'subtitle'  => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				),
				array(
					'id'      => 'event-single-countdown',
					'type'    => 'switch',
					'title'   => __( 'Show Event Countdown', 'porto' ),
					'default' => true,
					'on'      => __( 'Yes', 'porto' ),
					'off'     => __( 'No', 'porto' ),
				),

			),
		),
		$options_style
	);

	// Member
	$member_options = array(
		'icon'       => 'Simple-Line-Icons-people',
		'icon_class' => '',
		'title'      => __( 'Member', 'porto' ),
		'customizer' => false,
		'fields'     => array(
			array(
				'id'       => 'enable-member',
				'type'     => 'switch',
				'title'    => __( 'Member Content Type', 'porto' ),
				'subtitle' => __( 'Enable to provide Member type.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Enable', 'porto' ),
				'off'      => __( 'Disable', 'porto' ),
			),
			array(
				'id'          => 'member-slug-name',
				'type'        => 'text',
				'title'       => __( 'Slug Name', 'porto' ),
				'subtitle'    => __( 'This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'porto' ),
				'placeholder' => 'member',
			),
			array(
				'id'          => 'member-name',
				'type'        => 'text',
				'title'       => __( 'Name', 'porto' ),
				'subtitle'    => __( 'A plural descriptive name for the post type marked for translation.', 'porto' ),
				'placeholder' => __( 'Members', 'porto' ),
			),
			array(
				'id'          => 'member-singular-name',
				'type'        => 'text',
				'title'       => __( 'Singular Name', 'porto' ),
				'subtitle'    => __( 'Name for one object of this post type.', 'porto' ),
				'placeholder' => __( 'Member', 'porto' ),
			),
			array(
				'id'          => 'member-cat-slug-name',
				'type'        => 'text',
				'title'       => __( 'Category Slug Name', 'porto' ),
				'subtitle'    => __( 'The slug name of the taxonomy.', 'porto' ),
				'placeholder' => 'member_cat',
			),
		),
	);
	if ( $options_style ) {
		$this->sections[] = $member_options;
	}
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon'       => 'Simple-Line-Icons-people',
			'icon_class' => '',
			'id'         => 'customizer-member-settings',
			'title'      => __( 'Member', 'porto' ),
		),
		$options_style
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'General', 'porto' ),
			'id'         => 'memeber-general',
			'fields'     => array(
				array(
					'id'       => 'member-archive-page',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => __( 'Members Page', 'porto' ),
					'subtitle' => __( 'Select a member archive page.', 'porto' ),
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the archive page.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'       => 'member-zoom',
					'type'     => 'switch',
					'title'    => __( 'Image Lightbox', 'porto' ),
					'subtitle' => __( 'If you use single & type builder, you should consider the options of builder widgets.', 'porto' ),
					'desc'     => __( 'Turn on to enable the lightbox on single and archive page for the main featured images.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Enable', 'porto' ),
					'off'      => __( 'Disable', 'porto' ),
				),
				array(
					'id'       => 'member-social-target',
					'type'     => 'switch',
					'title'    => __( 'Show Social Link as target="_blank"', 'porto' ),
					'subtitle' => __( 'If you use single & type builder, you should consider the options of builder widgets.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'member-social-nofollow',
					'type'     => 'switch',
					'title'    => __( 'Add rel="nofollow" to social links', 'porto' ),
					'subtitle' => __( 'If you use single & type builder, you should consider the options of builder widgets.', 'porto' ),
					'desc'     => __( 'Turn on to add "nofollow" attribute to member social links.', 'porto' ),
					'default'  => false,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
			),
		),
		$options_style,
		$member_options
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'Member Archives', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_member_archive',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $archive_url, $type_url ),
						array(
							'strong' => array(),
							'b'      => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'      => 'member-title',
					'type'    => 'text',
					'title'   => __( 'Page Title', 'porto' ),
					'default' => 'Meet the <strong>Team</strong>',
				),
				array(
					'id'      => 'member-sub-title',
					'type'    => 'textarea',
					'title'   => __( 'Page Sub Title', 'porto' ),
					'default' => '',
				),
				array(
					'id'      => 'member-archive-layout',
					'type'    => 'image_select',
					'title'   => __( 'Page Layout', 'porto' ),
					'options' => $page_layouts,
					'default' => 'fullwidth',
				),
				array(
					'id'       => 'member-archive-sidebar',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar', 'porto' ),
					'required' => array( 'member-archive-layout', 'equals', $sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'       => 'member-archive-sidebar2',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar 2', 'porto' ),
					'required' => array( 'member-archive-layout', 'equals', $both_sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'      => 'member-archive-ajax',
					'type'    => 'switch',
					'title'   => __( 'Show member content on an archive page with ajax loading or modal windows', 'porto' ),
					'subtitle'    => __( 'If enabled, member content should be displayed above the members or on modal when you click member item in the list.', 'porto' ),
					'default' => false,
					'on'      => __( 'Yes', 'porto' ),
					'off'     => __( 'No', 'porto' ),
				),

				array(
					'id'       => 'member-archive-ajax-modal',
					'type'     => 'switch',
					'title'    => __( 'Ajax Load on Modal', 'porto' ),
					'desc'     => __( 'If enabled, member content should be displayed on modal when you click member item in the list.', 'porto' ),
					'required' => array( 'member-archive-ajax', 'equals', true ),
					'default'  => false,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'member-infinite',
					'type'     => 'button_set',
					'title'    => __( 'Pagination Style', 'porto' ),
					'subtitle' => __( 'If you use Archive builder, you should consider the options of archive post grid widget.', 'porto' ),
					'desc'     => wp_kses(
						__( 'Controls the pagination type for member archive page. <br/><b style="color: red">It is overrided by \'Change Archive Options\' & \'Disable infinite scroll\' of Member Category Meta Box.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
							'br' => array(),
						)
					),
					'options'  => array(
						''         => __( 'Default', 'porto' ),
						'ajax'     => __( 'Ajax Pagination', 'porto' ),
						'infinite' => __( 'Infinite Scroll', 'porto' ),
					),
					'default'  => 'infinite',
				),
				array(
					'id'     => 'desc_info_category_member_archive',
					'type'   => 'info',
					'desc'   => wp_kses(
						__( '<b>Category Filter in Member Page:</b> If you use <span>archive builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
						array(
							'span' => array(),
							'b'    => array(),
						)
					),
					'notice' => false,
					'class'  => 'porto-redux-section',
				),
				array(
					'id'       => 'member-cat-sort-pos',
					'type'     => 'image_select',
					'title'    => __( 'Categories Filter Position', 'porto' ),
					'subtitle' => __( 'If you use Archive builder, you should consider the options of archive post grid widget.', 'porto' ),
					'options'  => $porto_categories_sort_pos,
					'default'  => 'content',
				),
				array(
					'id'       => 'member-cat-sort-style',
					'type'     => 'image_select',
					'title'    => __( 'Filter Style', 'porto' ),
					'subtitle' => __( 'If you use Archive builder, you should consider the options of archive post grid widget.', 'porto' ),
					'options'  => array(
						''        => array(
							'title' => __( 'Style 1', 'porto' ),
							'img' => PORTO_OPTIONS_URI . '/images/filter-style1.svg',
						),
						'style-2' => array(
							'title' => __( 'Style 2', 'porto' ),
							'img' => PORTO_OPTIONS_URI . '/images/filter-style2.svg',
						),
						'style-3' => array(
							'title' => __( 'Style 3', 'porto' ),
							'img' => PORTO_OPTIONS_URI . '/images/filter-style3.svg',
						),
					),
					'required' => array( 'member-cat-sort-pos', 'equals', array( 'content' ) ),
					'default'  => '',
				),
				array(
					'id'       => 'member-cat-ft',
					'type'     => 'image_select',
					'title'    => __( 'Filter Type', 'porto' ),
					'subtitle' => __( 'If you use Archive builder, you should consider the options of archive post grid widget.', 'porto' ),
					'options'  => array(
						''     => array(
							'title' => __( 'Filter using Javascript/CSS', 'porto' ),
							'img' => PORTO_OPTIONS_URI . '/images/filter-css.svg',
						),
						'ajax' => array(
							'title' => __( 'Ajax Loading', 'porto' ),
							'img' => PORTO_OPTIONS_URI . '/images/filter-ajax.svg',
						),
					),
					'default'  => '',
					'required' => array(
						array( 'member-infinite', '!=', '' ),
						array( 'member-cat-sort-pos', '!=', 'hide' ),
					),
				),
				array(
					'id'       => 'member-cat-orderby',
					'type'     => 'button_set',
					'title'    => __( 'Sort Categories Order By', 'porto' ),
					'subtitle'     => __( 'Defines how categories should be ordered.', 'porto' ),
					'options'  => $porto_categories_orderby,
					'default'  => 'name',
					'required' => array( 'member-cat-sort-pos', '!=', 'hide' ),
				),
				array(
					'id'       => 'member-cat-order',
					'type'     => 'button_set',
					'title'    => __( 'Sort Order for Categories', 'porto' ),
					'subtitle'     => __( 'Defines the sorting order of categories.', 'porto' ),
					'options'  => $porto_categories_order,
					'default'  => 'asc',
					'required' => array( 'member-cat-sort-pos', '!=', 'hide' ),
				),
				array(
					'id'     => 'desc_info_member_type',
					'type'   => 'info',
					'desc'   => wp_kses(
						__( '<b>Member Type:</b> If you use <span>type builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
						array(
							'span' => array(),
							'b'    => array(),
						)
					),
					'notice' => false,
					'class'  => 'porto-redux-section',
				),
				array(
					'id'       => 'member-view-type',
					'type'     => 'image_select',
					'title'    => __( 'View Type', 'porto' ),
					'subtitle' => __( 'Controls the member type.', 'porto' ),
					'default'  => '',
					'options'  => array(
						''         => array(
							'title' => __( 'Type 1', 'porto' ),
							'img'   => PORTO_OPTIONS_URI . '/images/member_archive_view_1.jpg',
						),
						'2'        => array(
							'title' => __( 'Type 2', 'porto' ),
							'img'   => PORTO_OPTIONS_URI . '/images/member_archive_view_2.jpg',
						),
						'3'        => array(
							'title' => __( 'Type 3', 'porto' ),
							'img'   => PORTO_OPTIONS_URI . '/images/member_archive_view_3.jpg',
						),
						'advanced' => array(
							'title' => __( 'Advanced Type', 'porto' ),
							'img'   => PORTO_OPTIONS_URI . '/images/member_advanced.svg',
						),
					),
				),
				array(
					'id'       => 'member-columns',
					'type'     => 'button_set',
					'title'    => __( 'Member Columns', 'porto' ),
					'subtitle' => __( 'Controls the number of columns in the archive page.', 'porto' ),
					'options'  => array(
						'2' => __( '2 Columns', 'porto' ),
						'3' => __( '3 Columns', 'porto' ),
						'4' => __( '4 Columns', 'porto' ),
						'5' => __( '5 Columns', 'porto' ),
						'6' => __( '6 Columns', 'porto' ),
					),
					'default'  => '4',
					'required' => array( 'member-view-type', '!=', 'advanced' ),
				),
				array(
					'id'       => 'custom-member-zoom',
					'type'     => 'button_set',
					'title'    => __( 'Hover Image Effect', 'porto' ),
					'subtitle' => __( 'Select the hover effect type.', 'porto' ),
					'options'  => array(
						''        => __( 'Zoom', 'porto' ),
						'no_zoom' => __( 'No_Zoom', 'porto' ),
					),
					'default'  => '',
				),
				array(
					'id'      => 'member-image-size',
					'type'    => 'button_set',
					'title'   => __( 'Member Image Size', 'porto' ),
					'options' => array(
						''     => __( 'Static', 'porto' ),
						'full' => __( 'Full', 'porto' ),
					),
					'default' => '',
				),
				array(
					'id'       => 'member-archive-readmore',
					'type'     => 'switch',
					'title'    => __( 'Show "Read More" Link', 'porto' ),
					'subtitle' => __( 'Turn on to display the read more link.', 'porto' ),
					'desc'     => __( 'Show "Read More" link in "Type 2" view type.', 'porto' ),
					'default'  => false,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
					'required' => array( 'member-view-type', 'equals', 2 ),
				),
				array(
					'id'          => 'member-archive-readmore-label',
					'type'        => 'text',
					'title'       => __( '"Read More" Label', 'porto' ),
					'required'    => array( 'member-archive-readmore', 'equals', true ),
					'placeholder' => __( 'View More...', 'porto' ),
				),
				array(
					'id'       => 'member-external-link',
					'type'     => 'switch',
					'title'    => __( 'Show External Link instead of Member Link', 'porto' ),
					'subtitle' => __( 'Determines the permalink with meta box member link.', 'porto' ),
					'default'  => false,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'member-overview',
					'type'     => 'switch',
					'title'    => __( 'Show Overview', 'porto' ),
					'subtitle' => __( 'Turn on to display the overview.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'member-excerpt',
					'type'     => 'switch',
					'title'    => __( 'Show Overview Excerpt', 'porto' ),
					'subtitle' => __( 'Turn on to display the overview excerpt.', 'porto' ),
					'required' => array( 'member-overview', 'equals', true ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'member-excerpt-length',
					'type'     => 'text',
					'required' => array( 'member-excerpt', 'equals', true ),
					'title'    => __( 'Excerpt Length', 'porto' ),
					'subtitle' => __( 'The number of words', 'porto' ),
					'default'  => '15',
				),
				array(
					'id'       => 'member-socials',
					'type'     => 'switch',
					'title'    => __( 'Show Social Links', 'porto' ),
					'subtitle' => __( 'Turn on to display the social links.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),

				array(
					'id'       => 'member-social-link-style',
					'type'     => 'button_set',
					'required' => array( 'member-socials', 'equals', true ),
					'title'    => __( 'Social Links Style', 'porto' ),
					'subtitle' => __( 'Controls the social link style.', 'porto' ),
					'default'  => '',
					'options'  => array(
						''        => __( 'Default', 'porto' ),
						'advance' => __( 'Advance', 'porto' ),
					),
				),
			),
		),
		$options_style
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'Single Member', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_single_member',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily. Some below options might be overrided because the priority of the builder widget option is <b>higher</b>.', 'porto' ), $single_url, $type_url ),
						array(
							'strong' => array(),
							'b'      => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'      => 'member-single-layout',
					'type'    => 'image_select',
					'title'   => __( 'Page Layout', 'porto' ),
					'options' => $page_layouts,
					'default' => 'fullwidth',
				),
				array(
					'id'       => 'member-single-sidebar',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar', 'porto' ),
					'required' => array( 'member-single-layout', 'equals', $sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'       => 'member-single-sidebar2',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar 2', 'porto' ),
					'required' => array( 'member-single-layout', 'equals', $both_sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'    => 'member-banner-block',
					'type'  => 'text',
					'title' => __( 'Global Banner Block', 'porto' ),
					'subtitle'  => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
				),
				array(
					'id'        => 'member-content_bottom',
					'type'      => 'text',
					'title'     => __( 'Content Bottom Block', 'porto' ),
					'subtitle'      => __( 'Please input comma separated block slug names. You can create a block in <strong>Porto / Templates Builder / Block / Add New</strong>.', 'porto' ),
					'transport' => 'refresh',
				),
				array(
					'id'     => 'desc_info_single_member_warn',
					'type'   => 'info',
					'desc'   => wp_kses(
						__( '<b>Page Layout & Social Links:</b> If you use <span>single builder</span>, the below options <span>aren\'t</span> necessary.', 'porto' ),
						array(
							'span' => array(),
							'b'    => array(),
						)
					),
					'notice' => false,
					'class'  => 'porto-redux-section',
				),
				array(
					'id'      => 'member-page-style',
					'type'    => 'switch',
					'title'   => __( 'Page Style', 'porto' ),
					'subtitle'    => __( 'Controls the style of page layout.', 'porto' ),
					'default' => false,
					'on'      => __( 'Advance', 'porto' ),
					'off'     => __( 'Default', 'porto' ),
				),
				array(
					'id'       => 'single-member-socials',
					'type'     => 'switch',
					'title'    => __( 'Show Social Links', 'porto' ),
					'subtitle' => __( 'Turn on to display social links in single member page.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'single-member-social-link-style',
					'type'     => 'button_set',
					'required' => array( 'single-member-socials', 'equals', true ),
					'title'    => __( 'Social Links Style', 'porto' ),
					'subtitle' => __( 'Controls the style of social links.', 'porto' ),
					'default'  => '',
					'options'  => array(
						''        => __( 'Default', 'porto' ),
						'advance' => __( 'Advance', 'porto' ),
					),
				),
				array(
					'id'       => 'member-socials-pos',
					'type'     => 'button_set',
					'required' => array( 'single-member-social-link-style', 'equals', '' ),
					'title'    => __( 'Social Links Position', 'porto' ),
					'subtitle' => __( 'Controls the position of social links in single member page.', 'porto' ),
					'options'  => array(
						'before'      => __( 'Before Overview', 'porto' ),
						''            => __( 'After Overview', 'porto' ),
						'below_thumb' => __( 'Below Member Image', 'porto' ),
					),
					'default'  => '',
				),
				array(
					'id'     => 'desc_info_related_member',
					'type'   => 'info',
					'desc'   => wp_kses(
						__( '<b>Related Members:</b> If you use <span>single builder</span>, below options <span>aren\'t</span> necessary.', 'porto' ),
						array(
							'span' => array(),
							'b'    => array(),
						)
					),
					'notice' => false,
					'class'  => 'porto-redux-section',
				),
				array(
					'id'       => 'member-related',
					'type'     => 'switch',
					'title'    => __( 'Show Related Members', 'porto' ),
					'subtitle' => __( 'Turn on to show related members.', 'porto' ),
					'default'  => true,
					'on'       => __( 'Yes', 'porto' ),
					'off'      => __( 'No', 'porto' ),
				),
				array(
					'id'       => 'member-related-count',
					'type'     => 'text',
					'required' => array( 'member-related', 'equals', true ),
					'title'    => __( 'Related Members Count', 'porto' ),
					'subtitle'     => __( 'If you want to show all the related members, please input "-1".', 'porto' ),
					'default'  => '10',
				),
				array(
					'id'       => 'member-related-orderby',
					'type'     => 'button_set',
					'required' => array( 'member-related', 'equals', true ),
					'title'    => __( 'Related Members Order by', 'porto' ),
					'subtitle'     => __( 'Defines how members should be ordered.', 'porto' ),
					'options'  => array(
						'none'     => __( 'None', 'porto' ),
						'rand'     => __( 'Random', 'porto' ),
						'date'     => __( 'Date', 'porto' ),
						'ID'       => __( 'ID', 'porto' ),
						'modified' => __( 'Modified Date', 'porto' ),
					),
					'default'  => 'rand',
				),
				array(
					'id'       => 'member-related-cols',
					'type'     => 'button_set',
					'required' => array( 'member-related', 'equals', true ),
					'title'    => __( 'Related Members Columns', 'porto' ),
					'subtitle'     => __( 'reduce one column in left or right sidebar layout.', 'porto' ),
					'options'  => array(
						'4' => '4',
						'3' => '3',
						'2' => '2',
					),
					'default'  => '4',
				),
			),
		),
		$options_style
	);
} else {
	// Blog
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon'       => 'Simple-Line-Icons-docs',
			'icon_class' => '',
			'title'      => __( 'Post', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_post',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a>, <a href="%2$s" target="_blank">Single</a> & <a href="%3$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $archive_url, $single_url, $type_url ),
						array(
							'strong' => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'      => 'desc_info_blog_sidebar',
					'type'    => 'info',
					'desc'    => wp_kses(
						sprintf(
							/* translators: %s: widgets url */
							__( 'You can control the blog sidebar and secondary sidebar in <a href="%s" target="_blank">here</a>.', 'porto' ),
							esc_url( admin_url( 'widgets.php' ) )
						),
						array(
							'a' => array(
								'href'   => array(),
								'target' => array(),
							),
						)
					),
				),
				array(
					'id'      => 'post-archive-layout',
					'type'    => 'image_select',
					'title'   => __( 'Post Archive Layout', 'porto' ),
					'options' => $page_layouts,
					'default' => 'right-sidebar',
				),
				array(
					'id'      => 'post-single-layout',
					'type'    => 'image_select',
					'title'   => __( 'Single Post Layout', 'porto' ),
					'options' => $page_layouts,
					'default' => 'right-sidebar',
				),
				array(
					'id'       => 'post-related-image-size',
					'type'     => 'dimensions',
					'title'    => __( 'Post Image Size', 'porto' ),
					'subtitle' => __( 'Please regenerate all the thumbnails in <strong>Tools > Regen.Thumbnails</strong> after save changes.', 'porto' ),
					'default'  => array(
						'width'  => '450',
						'height' => '231',
					),
				),
				array(
					'id'       => 'hot-label',
					'type'     => 'text',
					'title'    => __( '"HOT" Text', 'porto' ),
					'subtitle' => __( 'Sticky post label to show after date on each post.', 'porto' ),
					'default'  => '',
				),
			),
		),
		$options_style
	);
	// Portfolio
	$portfolio_options = array(
		'icon'       => 'Simple-Line-Icons-picture',
		'icon_class' => '',
		'title'      => __( 'Portfolio', 'porto' ),
		'customizer' => false,
		'fields'     => array(
			array(
				'id'       => 'enable-portfolio',
				'type'     => 'switch',
				'title'    => __( 'Portfolio Content Type', 'porto' ),
				'subtitle' => __( 'Enable to provide Portfolio type.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Enable', 'porto' ),
				'off'      => __( 'Disable', 'porto' ),
			),
			array(
				'id'          => 'portfolio-slug-name',
				'type'        => 'text',
				'title'       => __( 'Slug Name', 'porto' ),
				'subtitle'    => __( 'This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'porto' ),
				'placeholder' => 'portfolio',
			),
			array(
				'id'          => 'portfolio-name',
				'type'        => 'text',
				'title'       => __( 'Name', 'porto' ),
				'subtitle'    => __( 'A plural descriptive name for the post type marked for translation.', 'porto' ),
				'placeholder' => __( 'Portfolios', 'porto' ),
			),
			array(
				'id'          => 'portfolio-singular-name',
				'type'        => 'text',
				'title'       => __( 'Singular Name', 'porto' ),
				'subtitle'    => __( 'Name for one object of this post type.', 'porto' ),
				'placeholder' => __( 'Portfolio', 'porto' ),
			),
			array(
				'id'          => 'portfolio-cat-slug-name',
				'type'        => 'text',
				'title'       => __( 'Category Slug Name', 'porto' ),
				'subtitle'    => __( 'The slug name of the taxonomy.', 'porto' ),
				'placeholder' => 'portfolio_cat',
			),
			array(
				'id'          => 'portfolio-skill-slug-name',
				'type'        => 'text',
				'title'       => __( 'Skill Slug Name', 'porto' ),
				'subtitle'    => __( 'The slug name of the taxonomy: skill.', 'porto' ),
				'placeholder' => 'portfolio_skill',
			),
		),
	);

	$this->sections[] = $this->add_customizer_field(
		array(
			'icon'       => 'Simple-Line-Icons-picture',
			'icon_class' => '',
			'title'      => __( 'Portfolio', 'porto' ),
			'fields'     => array(
				array(
					'id'       => 'portfolio-archive-page',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => __( 'Portfolios Page', 'porto' ),
					'subtitle' => __( 'Select a portfolio archive page.', 'porto' ),
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the archive page.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
			),
		),
		$options_style,
		$portfolio_options
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Portfolio Archives', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_portfolio_archive',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $archive_url, $type_url ),
					array(
						'strong' => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'      => 'portfolio-archive-layout',
				'type'    => 'image_select',
				'title'   => __( 'Page Layout', 'porto' ),
				'options' => $page_layouts,
				'default' => 'fullwidth',
			),
			array(
				'id'       => 'portfolio-archive-sidebar',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar', 'porto' ),
				'required' => array( 'portfolio-archive-layout', 'equals', $sidebars ),
				'data'     => 'sidebars',
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
			),
			array(
				'id'       => 'portfolio-archive-sidebar2',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar 2', 'porto' ),
				'required' => array( 'portfolio-archive-layout', 'equals', $both_sidebars ),
				'data'     => 'sidebars',
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
			),
		),
	);
	$this->sections[] = array(
		'icon_class' => 'icon',
		'subsection' => true,
		'title'      => __( 'Single Portfolio', 'porto' ),
		'fields'     => array(
			array(
				'id'    => 'desc_info_single_portfolio',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $single_url, $type_url ),
					array(
						'strong' => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'      => 'portfolio-single-layout',
				'type'    => 'image_select',
				'title'   => __( 'Page Layout', 'porto' ),
				'options' => $page_layouts,
				'default' => 'fullwidth',
			),
			array(
				'id'       => 'portfolio-single-sidebar',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar', 'porto' ),
				'required' => array( 'portfolio-single-layout', 'equals', $sidebars ),
				'data'     => 'sidebars',
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
			),
			array(
				'id'       => 'portfolio-single-sidebar2',
				'type'     => 'select',
				'title'    => __( 'Select Sidebar 2', 'porto' ),
				'required' => array( 'portfolio-single-layout', 'equals', $both_sidebars ),
				'data'     => 'sidebars',
				'desc'     => wp_kses(
					__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
					array(
						'b' => array(
							'style' => array(),
						),
					)
				),
			),
		),
	);

	// Event
	$event_options = array(
		'id'         => 'event-settings',
		'icon'       => 'Simple-Line-Icons-event',
		'icon_class' => '',
		'title'      => __( 'Event', 'porto' ),
		'customizer' => false,
		'fields'     => array(
			array(
				'id'    => 'desc_info_event',
				'type'  => 'info',
				'desc'  => wp_kses(
					/* translators: %s: Builder url */
					sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a>, <a href="%2$s" target="_blank">Single</a> & <a href="%3$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $archive_url, $single_url, $type_url ),
					array(
						'strong' => array(),
						'a'      => array(
							'href'   => array(),
							'target' => array(),
							'class'  => array(),
						),
					)
				),
				'class' => 'porto-important-note',
			),
			array(
				'id'       => 'enable-event',
				'type'     => 'switch',
				'title'    => __( 'Event Content Type', 'porto' ),
				'subtitle' => __( 'Enable to provide Event type.', 'porto' ),
				'default'  => false,
				'on'       => __( 'Enable', 'porto' ),
				'off'      => __( 'Disable', 'porto' ),
			),
			array(
				'id'          => 'event-slug-name',
				'type'        => 'text',
				'title'       => __( 'Slug Name', 'porto' ),
				'subtitle'    => __( 'This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'porto' ),
				'placeholder' => 'event',
			),
			array(
				'id'          => 'event-name',
				'type'        => 'text',
				'title'       => __( 'Name', 'porto' ),
				'subtitle'    => __( 'A plural descriptive name for the post type marked for translation.', 'porto' ),
				'placeholder' => __( 'Events', 'porto' ),
			),
			array(
				'id'          => 'event-singular-name',
				'type'        => 'text',
				'title'       => __( 'Singular Name', 'porto' ),
				'subtitle'    => __( 'Name for one object of this post type.', 'porto' ),
				'placeholder' => __( 'Event', 'porto' ),
			),
		),
	);

	$this->sections[] = $this->add_customizer_field(
		array(
			'id'         => 'customizer-event-settings',
			'title'      => __( 'Event', 'porto' ),
			'icon_class' => '',
			'icon'       => 'Simple-Line-Icons-event',
			'fields'     => array(
				array(
					'id'       => 'event-archive-page',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => __( 'Events Page', 'porto' ),
					'subtitle' => __( 'Select a event archive page.', 'porto' ),
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the archive page.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
			),
		),
		$options_style,
		$event_options
	);
	// Member
	$member_options = array(
		'icon'       => 'Simple-Line-Icons-people',
		'icon_class' => '',
		'title'      => __( 'Member', 'porto' ),
		'customizer' => false,
		'fields'     => array(
			array(
				'id'       => 'enable-member',
				'type'     => 'switch',
				'title'    => __( 'Member Content Type', 'porto' ),
				'subtitle' => __( 'Enable to provide Member type.', 'porto' ),
				'default'  => true,
				'on'       => __( 'Enable', 'porto' ),
				'off'      => __( 'Disable', 'porto' ),
			),
			array(
				'id'          => 'member-slug-name',
				'type'        => 'text',
				'title'       => __( 'Slug Name', 'porto' ),
				'subtitle'    => __( 'This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks.', 'porto' ),
				'placeholder' => 'member',
			),
			array(
				'id'          => 'member-name',
				'type'        => 'text',
				'title'       => __( 'Name', 'porto' ),
				'subtitle'    => __( 'A plural descriptive name for the post type marked for translation.', 'porto' ),
				'placeholder' => __( 'Members', 'porto' ),
			),
			array(
				'id'          => 'member-singular-name',
				'type'        => 'text',
				'title'       => __( 'Singular Name', 'porto' ),
				'subtitle'    => __( 'Name for one object of this post type.', 'porto' ),
				'placeholder' => __( 'Member', 'porto' ),
			),
			array(
				'id'          => 'member-cat-slug-name',
				'type'        => 'text',
				'title'       => __( 'Category Slug Name', 'porto' ),
				'subtitle'    => __( 'The slug name of the taxonomy.', 'porto' ),
				'placeholder' => 'member_cat',
			),
		),
	);

	$this->sections[] = $this->add_customizer_field(
		array(
			'icon'       => 'Simple-Line-Icons-people',
			'icon_class' => '',
			'id'         => 'customizer-member-settings',
			'title'      => __( 'Member', 'porto' ),
			'fields'     => array(
				array(
					'id'       => 'member-archive-page',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => __( 'Members Page', 'porto' ),
					'subtitle' => __( 'Select a member archive page.', 'porto' ),
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the archive page.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
			),
		),
		$options_style,
		$member_options
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'Member Archives', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_member_archive',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Archive</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $archive_url, $type_url ),
						array(
							'strong' => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'      => 'member-archive-layout',
					'type'    => 'image_select',
					'title'   => __( 'Page Layout', 'porto' ),
					'options' => $page_layouts,
					'default' => 'fullwidth',
				),
				array(
					'id'       => 'member-archive-sidebar',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar', 'porto' ),
					'required' => array( 'member-archive-layout', 'equals', $sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'       => 'member-archive-sidebar2',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar 2', 'porto' ),
					'required' => array( 'member-archive-layout', 'equals', $both_sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
			),
		),
		$options_style
	);
	$this->sections[] = $this->add_customizer_field(
		array(
			'icon_class' => 'icon',
			'subsection' => true,
			'title'      => __( 'Single Member', 'porto' ),
			'fields'     => array(
				array(
					'id'    => 'desc_info_single_member',
					'type'  => 'info',
					'desc'  => wp_kses(
						/* translators: %s: Builder url */
						sprintf( __( '<strong>Important Note:</strong> <a href="%1$s" target="_blank">Single</a> & <a href="%2$s" target="_blank">Type</a> Builders help you to develop your site easily.', 'porto' ), $single_url, $type_url ),
						array(
							'strong' => array(),
							'a'      => array(
								'href'   => array(),
								'target' => array(),
								'class'  => array(),
							),
						)
					),
					'class' => 'porto-important-note',
				),
				array(
					'id'      => 'member-single-layout',
					'type'    => 'image_select',
					'title'   => __( 'Page Layout', 'porto' ),
					'options' => $page_layouts,
					'default' => 'fullwidth',
				),
				array(
					'id'       => 'member-single-sidebar',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar', 'porto' ),
					'required' => array( 'member-single-layout', 'equals', $sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
				array(
					'id'       => 'member-single-sidebar2',
					'type'     => 'select',
					'title'    => __( 'Select Sidebar 2', 'porto' ),
					'required' => array( 'member-single-layout', 'equals', $both_sidebars ),
					'data'     => 'sidebars',
					'desc'     => wp_kses(
						__( '<b style="color: red">You should set up the sidebar.</b>', 'porto' ),
						array(
							'b' => array(
								'style' => array(),
							),
						)
					),
				),
			),
		),
		$options_style
	);
}
