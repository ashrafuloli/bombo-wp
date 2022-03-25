<?php
/** 
 * airvice Customizer data
 */
function _customizer_data( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'airvice',
			'name' => esc_html__('Airvice Customizer','airvice'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'airvice' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name' => esc_html__( 'Topbar Swicher', 'airvice' ),
							'id' => 'airvice_topbar_switch',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),

						array(
							'name' => esc_html__( 'Show Language', 'airvice' ),
							'id' => 'airvice_header_lang',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// topbar left
						array(
							'name' => esc_html__( 'Preloader On/Off', 'airvice' ),
							'id' => 'airvice_preloader',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						// topbar left
						array(
							'name' => esc_html__( 'Mobile Info On/Off', 'airvice' ),
							'id' => 'airvice_address',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						// Mail Id
						array(
							'name' => esc_html__( 'Mail ID', 'airvice' ),
							'id' => 'airvice_mail_id',
							'default' => esc_html__('info@sycho24.com','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Phone 
						array(
							'name' => esc_html__( 'Phone Number', 'airvice' ),
							'id' => 'airvice_phone',
							'default' => esc_html__('02 (555) 520 890','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						// Phone Link 
						array(
							'name' => esc_html__( 'Phone Link', 'airvice' ),
							'id' => 'airvice_phone_link',
							'default' => esc_html__('876864764764','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						// welcome text
						array(
							'name' => esc_html__('Welcome Text','airvice'),
							'id' => 'airvice_welcome_text',
							'default' => esc_html__(' We do not received extra charges','airvice'),
							'type' => 'text',
							'transport' => 'refresh'
						),

						// address
						array(
							'name' => esc_html__('Contact Label','airvice'),
							'id' => 'airvice_contact_label',
							'default' => esc_html__('Contact Info','airvice'),
							'type' => 'textarea',
							'transport' => 'refresh'
						),
						array(
							'name' => esc_html__('Header Address','airvice'),
							'id' => 'airvice_address',
							'default' => esc_html__('28/4 Palmal, London','airvice'),
							'type' => 'textarea',
							'transport' => 'refresh'
						),
						// Open Hour
						array(
							'name' => esc_html__('Open Hour','airvice'),
							'id' => 'airvice_open_hour',
							'default' => esc_html__('Sunday to Thursday','airvice'),
							'type' => 'texta',
							'transport' => 'refresh'
						),
						// cta
						array(
							'name' => esc_html__( 'Header Right', 'airvice' ),
							'id' => 'airvice_header_right',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// Show Button						
						array(
							'name' => esc_html__( 'Show Button', 'airvice' ),
							'id' => 'airvice_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text', 'airvice' ),
							'id' => 'airvice_button_text',
							'default' => esc_html__('Get Quote','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text RTL', 'airvice' ),
							'id' => 'airvice_button_text_rtl',
							'default' => esc_html__('Get A Quote','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'airvice' ),
							'id' => 'airvice_button_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
					) 
				),
				'header_social_setting'=> array(
					'name'=> esc_html__('Header Social','airvice'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'airvice'),
					'fields'=> array(
						/** social profiles **/
						array(
							'name' => esc_html__( 'Facebook Url', 'airvice' ),
							'id' => 'airvice_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'airvice' ),
							'id' => 'airvice_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'airvice' ),
							'id' => 'airvice_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkedin Url', 'airvice' ),
							'id' => 'airvice_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'airvice' ),
							'id' => 'airvice_topbar_youtube_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						
					)
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'airvice' ),
					'priority' => 12,
					'fields' => array(
						array(
							'name' => esc_html__( 'Choose Header Style', 'airvice' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'header-style-1' => esc_html__( 'Header Style 1', 'airvice' ),
								'header-style-2' => esc_html__( 'Header Style 2', 'airvice' ),
								'header-style-3' => esc_html__( 'Header Style 3', 'airvice' ),
								'header-style-4' => esc_html__( 'Header Style 4', 'airvice' ),
							),
							'default' => 'header-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Logo', 'airvice' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header White Logo', 'airvice' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Sticky Logo', 'airvice' ),
							'id' => 'logo_sticky',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo-gradient.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'airvice' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/assets/img/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),							
					) 
				),

				'airvice_side_setting'=> array(
					'name'=> esc_html__('Side Info Setting','airvice'),
					'priority'=> 13,
					'fields'=> array(
						// Show Hamburger
						array(
							'name' => esc_html__( 'Show Hamburger', 'airvice' ),
							'id' => 'airvice_hamburger_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Mobile Info', 'airvice' ),
							'id' => 'airvice_mobile_info',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Logo Side','airvice'),
							'id'=>'airvice_extra_info_logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh'  
						),
						// about info
						array(
							'name' => esc_html__( 'About Us Desc..', 'airvice' ),
							'id' => 'airvice_extra_about_text',
							'default'=> esc_html__('Description Text..','airvice'),
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Button Text', 'airvice' ),
							'id' => 'airvice_extra_button',
							'default'=> esc_html__('Contact Us','airvice'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Button URL', 'airvice' ),
							'id' => 'airvice_extra_button_url',
							'default'=> '#',
							'type' => 'text' 
						),
						// contact info		
						array(
							'name' => esc_html__( 'Office Address', 'airvice' ),
							'id' => 'airvice_extra_address',
							'default'=> esc_html__('123/A, Miranda City Likaoli Prikano, Dope United States','airvice'),
							'type' => 'textarea' 
						),		
						array(
							'name' => esc_html__( 'Phone Number', 'airvice' ),
							'id' => 'airvice_extra_phone',
							'default'=> esc_html__('+0989 7876 9865 9','airvice'),
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Email ID', 'airvice' ),
							'id' => 'airvice_extra_email',
							'default'=> esc_html__('info@basictheme.net','airvice'),
							'type' => 'text' 
						),
					)
				),

				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','airvice'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Breadcrumb Shape On/Off', 'airvice' ),
							'id' => 'breadcrumb_shape_switch',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name'=>esc_html__('Breadcrumb BG Color','airvice'),
							'id'=>'airvice_breadcrumb_bg_color',
							'default'=> esc_html__('#f4f9fc','airvice'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','airvice'),
							'id'=>'airvice_breadcrumb_spacing',
							'default'=> esc_html__('160px','airvice'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','airvice'),
							'id'=>'airvice_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','airvice'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'airvice' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'airvice' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'airvice' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'airvice' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'airvice' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'airvice' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'airvice' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),				
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'airvice' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','airvice'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog BTN', 'airvice' ),
							'id' => 'airvice_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'airvice' ),
							'id' => 'airvice_blog_btn',
							'default' => esc_html__('Read More','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text RTL', 'airvice' ),
							'id' => 'airvice_blog_btn_rtl',
							'default' => esc_html__('Read More','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),													
						array(
							'name' => esc_html__( 'Blog Title', 'airvice' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'airvice' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','airvice'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'airvice_footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','airvice'),
					'priority'=> 16,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Choose Footer Style', 'airvice' ),
							'id' => 'choose_default_footer',
							'type'     => 'select',
							'choices'  => array(
								'footer-style-1' => esc_html__( 'Footer Style 1', 'airvice' ),
								'footer-style-2' => esc_html__( 'Footer Style 2', 'airvice' ),
							),
							'default' => 'footer-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Widget Number', 'airvice' ),
							'id' => 'footer_widget_number',
							'type'     => 'select',
							'choices'  => array(
								'4' => esc_html__( 'Widget Number 4', 'airvice' ),
								'3' => esc_html__( 'Widget Number 3', 'airvice' ),
								'2' => esc_html__( 'Widget Number 2', 'airvice' ),
							),
							'default' => '4',
							'transport'	=> 'refresh'
						),

						array(
							'name'=>esc_html__('Footer Social On/Off','airvice'),
							'id'=>'airvice_footer_social',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						
						array(
							'name' => esc_html__( 'Footer Background Image', 'airvice' ),
							'id' => 'airvice_footer_bg',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),											
						array(
							'name'=>esc_html__('Footer BG Color','airvice'),
							'id'=>'airvice_footer_bg_color',
							'default'=> esc_html__('#f4f9fc','airvice'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right','airvice'),
							'id'=>'airvice_copyright',
							'default'=> esc_html__('Copyright &copy;2021 Theme_Pure. All Rights Reserved','airvice'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),                                
						array(
							'name'=>esc_html__('Footer Style 2 Switch','airvice'),
							'id'=>'footer_style_2_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','airvice'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','airvice'),
							'id'=>'airvice_color_option',
							'default'=> esc_html__('#ff5e14','airvice'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Primary Color','airvice'),
							'id'=>'airvice_primary_color',
							'default'=> esc_html__('#1d284b','airvice'),
							'transport'	=> 'refresh'
						),	
						array(
							'name'=>esc_html__('Secondary Color','airvice'),
							'id'=>'airvice_secondary_color',
							'default'=> esc_html__('#2371ff','airvice'),
							'transport'	=> 'refresh'
						)													
					)
				),
				'typography_setting'=> array(
					'name'=> esc_html__('Typography Setting','airvice'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('Google Font URL','airvice'),
							'id'=>'airvice_fonts_url',
							'description' => esc_html__( 'Example: Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap', 'airvice' ),
							'default'=> esc_html__("Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap",'airvice'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body Font','airvice'),
							'id'=>'airvice_body_font',
							'default'=> esc_html__("'Roboto', sans-serif",'airvice'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading Font','airvice'),
							'id'=>'airvice_heading_font',
							'default'=> esc_html__("'Exo', sans-serif",'airvice'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),	

						array(
							'name'=>esc_html__('Google Font RTL URL ','airvice'),
							'id'=>'airvice_fonts_url_rtl',
							'description' => esc_html__( 'Example: Exo:300,400,400i,500,500i,600,700|Roboto:300,400,500,700,900', 'airvice' ),
							'default'=> esc_html__("Exo:300,400,400i,500,500i,600,700|Roboto:300,400,500,700,900",'airvice'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body RTL Font','airvice'),
							'id'=>'airvice_body_font_rtl',
							'default'=> esc_html__("'Exo', sans-serif",'airvice'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading RTL Font','airvice'),
							'id'=>'airvice_heading_font_rtl',
							'default'=> esc_html__("'Roboto', sans-serif",'airvice'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),												
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','airvice'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','airvice'),
							'id'=>'airvice_error_404_text',
							'default'=> esc_html__('404','airvice'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','airvice'),
							'id'=>'airvice_error_title',
							'default'=> esc_html__('Page not found','airvice'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','airvice'),
							'id'=>'airvice_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','airvice'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','airvice'),
							'id'=>'airvice_error_link_text',
							'default'=> esc_html__('Back To Home','airvice'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
				'slug_setting'=> array(
					'name'=> esc_html__('Post Type Slug','airvice'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('Service Name','airvice'),
							'id'=>'airvice_sv_name',
							'default'=> esc_html__('Services','airvice'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Service Slug','airvice'),
							'id'=>'airvice_sv_slug',
							'default'=> esc_html__('ourservices','airvice'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),

						array(
							'name'=>esc_html__('Cases Name','airvice'),
							'id'=>'airvice_cases_name',
							'default'=> esc_html__('Cases','airvice'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Cases Slug','airvice'),
							'id'=>'airvice_cases_slug',
							'default'=> esc_html__('ourcases','airvice'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
					)
				),
				'rtl_setting'=> array(
					'name'=> esc_html__('RTL Setting','airvice'),
					'priority'=> 20,
					'fields'=> array(
						array(
							'name'=>esc_html__('Switch RTL','airvice'),
							'id'=>'rtl_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						)
					)
				),
			),
		)
	);

}

add_filter('_customizer_data', '_customizer_data');


