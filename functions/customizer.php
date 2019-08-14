<?php 

function app_customizer_settings($wp_customize) {
    
    /********************************
    **                             **
    *********     Logo        *******
    **                             **
    ********************************/

    $wp_customize->add_setting('app_logo');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'app_logo',
    array(
        'label' => 'Upload Logo',
        'description' => 'Best logo size is 250x46px',
        'section' => 'title_tagline',
        'settings' => 'app_logo',
    ) ) );
    
    /********************************
    **                             **
    ****     Theme settings      ****
    **                             **
    ********************************/
    
    
    $wp_customize->add_panel( 'app_panel_config', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Theme Configuration', 'app' ),
    ) );
    
    $wp_customize->add_section( 'app_config_blogs', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Blogs', 'app' ),
        'description' => '',
        'panel' => 'app_panel_config',
    ) );
    
    $wp_customize->add_section( 'app_config_landing', array(
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Landing Page', 'app' ),
        'description' => '',
        'panel' => 'app_panel_config',
    ) );
    
    $wp_customize->add_section( 'app_config_layout', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Layout', 'app' ),
        'description' => '',
        'panel' => 'app_panel_config',
    ) );
    
    $wp_customize->add_setting( 'app_sidebar_size', array(
	    'default' => '4',
	    'type' => 'theme_mod',
	    'capability' => 'edit_theme_options',
	) );
	 
	$wp_customize->add_control( 'app_sidebar_size', array(
	    'type' => 'select',
	    'priority' => 10,
	    'section' => 'app_config_layout',
	    'label' => __( 'Sidebar Size', 'app' ),
	    'description' => '',
        'choices' => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
	    ),
	) );
    
    
    
    
    
    $wp_customize->add_setting( 'app_landing_id', array(
	    'default' => '',
	    'type' => 'theme_mod',
	    'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'app_landing_id', array(
	    'type' => 'dropdown-pages',
	    'priority' => 10,
	    'section' => 'app_config_landing',
	    'label' => __( 'Select Landing Page', 'app' ),
	    'description' => '',
	) );
    
    $wp_customize->add_setting( 'app_redirect', array(
	    'default' => '0',
	    'type' => 'theme_mod',
	    'capability' => 'edit_theme_options',
	) );
    
    $wp_customize->add_control( 'app_redirect', array(
	    'type' => 'radio',
	    'priority' => 11,
	    'section' => 'app_config_landing',
	    'label' => __( 'Redirect guests to landing page', 'app' ),
	    'description' => '',
        'choices' => array (
            '1' => 'Yes',
            '0' => 'No',
    ) ) );
    
    
    // Slide Titles
    $slideTitles[] = array(
        'slug'=>'app_landing_slide_title_1', 
        'default' => '',
        'label' => __( 'Slide 1 Title', 'app' ),
        'priority' => 13,
    );
    
    $slideTitles[] = array(
        'slug'=>'app_landing_slide_title_2', 
        'default' => '',
        'label' => __( 'Slide 2 Title', 'app' ),
        'priority' => 16,
    );
    
    $slideTitles[] = array(
        'slug'=>'app_landing_slide_title_3', 
        'default' => '',
        'label' => __( 'Slide 3 Title', 'app' ),
        'priority' => 20,
    );
    
    // Add Setings and Control for each slide title
    foreach( $slideTitles as $title ) {
 
        // SETTINGS
        $wp_customize->add_setting(
            $title['slug'], array(
                'default' => $title['default'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
                $title['slug'],
                array(
                    'type' => 'text',
                    'label' => $title['label'], 
                    'section' => 'app_config_landing',
                    'priority' => $title['priority'],)
            );
        }
    
    // Slide Text
    $slideTexts[] = array(
        'slug'=>'app_landing_slide_text_1', 
        'default' => '',
        'label' => __( 'Slide 1 Text', 'app' ),
        'priority' => 14,
    );
    
    $slideTexts[] = array(
        'slug'=>'app_landing_slide_text_2', 
        'default' => '',
        'label' => __( 'Slide 2 Text', 'app' ),
        'priority' => 17,
    );
    
    $slideTexts[] = array(
        'slug'=>'app_landing_slide_text_3', 
        'default' => '',
        'label' => __( 'Slide 3 Text', 'app' ),
        'priority' => 21,
    );
    
    // Add Setings and Control for each slide title
    foreach( $slideTexts as $slideText ) {
 
        // SETTINGS
        $wp_customize->add_setting(
            $slideText['slug'], array(
                'default' => $slideText['default'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
                $slideText['slug'],
                array(
                    'type' => 'textarea',
                    'label' => $slideText['label'], 
                    'section' => 'app_config_landing',
                    'priority' => $slideText['priority'],)
            );
        }
    
    
    $wp_customize->add_setting('app_landing_slide_1');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'app_landing_slide_1',
    array(
        'label' => __( 'Landing Page Slide 1 -required-', 'app' ),
        'priority' => 12,
        'description' => '',
        'section' => 'app_config_landing',
        'settings' => 'app_landing_slide_1',
    ) ) );
    
    $wp_customize->add_setting( 'app_landing_slide_switch_2', array(
	    'default' => '0',
	    'type' => 'theme_mod',
	    'capability' => 'edit_theme_options',
	) );
    
    $wp_customize->add_control( 'app_landing_slide_switch_2', array(
	    'type' => 'radio',
	    'priority' => 14,
	    'section' => 'app_config_landing',
	    'label' => __( 'Enable Second Slide', 'app' ),
	    'description' => '',
        'choices' => array (
            '1' => 'Yes',
            '0' => 'No',
    ) ) );
    
    $wp_customize->add_setting('app_landing_slide_2');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'app_landing_slide_2',
    array(
        'label' => __( 'Landing Page Slide 2', 'app' ),
        'description' => '',
        'priority' => 15,
        'section' => 'app_config_landing',
        'settings' => 'app_landing_slide_2',
    ) ) );
    
    $wp_customize->add_setting( 'app_landing_slide_switch_3', array(
	    'default' => '0',
	    'type' => 'theme_mod',
	    'capability' => 'edit_theme_options',
	) );
    
    $wp_customize->add_control( 'app_landing_slide_switch_3', array(
	    'type' => 'radio',
	    'priority' => 18,
	    'section' => 'app_config_landing',
	    'label' => __( 'Enable Third Slide', 'app' ),
	    'description' => '',
        'choices' => array (
            '1' => 'Yes',
            '0' => 'No',
    ) ) );
    
    $wp_customize->add_setting('app_landing_slide_3');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'app_landing_slide_3',
    array(
        'label' => __( 'Landing Page Slide 3', 'app' ),
        'description' => '',
        'priority' => 19,
        'section' => 'app_config_landing',
        'settings' => 'app_landing_slide_3',
    ) ) );
    
    
    $wp_customize->add_setting( 'app_blogs_author', array(
	    'default' => '1',
	    'type' => 'theme_mod',
	    'capability' => 'edit_theme_options',
	) );
    
    $wp_customize->add_control( 'app_blogs_author', array(
	    'type' => 'radio',
	    'priority' => 10,
	    'section' => 'app_config_blogs',
	    'label' => __( 'Show Author Box', 'app' ),
	    'description' => '',
        'choices' => array (
            '1' => 'Yes',
            '0' => 'No',
    ) ) );
    
    /********************************
    **                             **
    *********     Colors      *******
    **                             **
    ********************************/
    
    // navbar background
    $colors[] = array(
        'slug'=>'navbar_color', 
        'default' => '#5c4186',
        'label' => __( 'Navbar Color', 'app' )
    );
    
    // sidebar background
    $colors[] = array(
        'slug'=>'sidebar_color', 
        'default' => '#5c4186',
        'label' => __( 'Sidebar Color', 'app' )
    );
 
    // footer background
    $colors[] = array(
        'slug'=>'footer_color', 
        'default' => '#5c4186',
        'label' => __( 'Footer Color', 'app' )
    );
 
    /* link color 
    $colors[] = array(
        'slug'=>'link_color', 
        'default' => '#15179f',
        'label' => __( 'Link Color', 'app' )
    );
 
    // link color ( hover, active )
    $colors[] = array(
        'slug'=>'hover_link_color', 
        'default' => '#485b9f',
        'label' => __( 'Hover Link Color', 'app' )
    );
    */
    
    
    // add the settings and controls for each color
    foreach( $colors as $color ) {
 
        // SETTINGS
        $wp_customize->add_setting(
            $color['slug'], array(
                'default' => $color['default'],
                'type' => 'option', 
                'capability' => 
                'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $color['slug'], 
                array('label' => $color['label'], 
                'section' => 'colors',
                'priority' => 40,
                'settings' => $color['slug'])
            )
        );
    }


    /********************************
    **                             **
    *********     Accents     *******
    **                             **
    ********************************/

    $wp_customize->add_setting( 'app_navbar_accent', 
    array(
        'default'    => 'dark',
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) );


    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize, 'app_navbar_accent',
    array(
        'label'      => __( 'Navbar Accent', 'app' ), 
        'description' => __( 'Change the navbar accent color' ),
        'settings'   => 'app_navbar_accent', 
        'priority'   => 10,
        'section'    => 'colors',
        'type'    => 'select',
        'choices' => array(
            'light' => 'Dark',
            'dark' => 'Light',
    ) ) ) );


    $wp_customize->add_setting( 'app_sidebar_accent', 
    array(
        'default'    => 'dark',
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) );


    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize, 'app_sidebar_accent',
    array(
        'label'      => __( 'Sidebar Accent', 'app' ), 
        'description' => __( 'Change the navbar accent color' ),
        'settings'   => 'app_sidebar_accent', 
        'priority'   => 20,
        'section'    => 'colors',
        'type'    => 'select',
        'choices' => array(
            'light' => 'Dark',
            'dark' => 'Light',
    ) ) ) );

    $wp_customize->add_setting( 'app_footer_accent', 
    array(
        'default'    => 'dark',
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) );


    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize, 'app_footer_accent',
    array(
        'label'      => __( 'Footer Accent', 'app' ), 
        'description' => __( 'Change the navbar accent color' ),
        'settings'   => 'app_footer_accent', 
        'priority'   => 30,
        'section'    => 'colors',
        'type'    => 'select',
        'choices' => array(
            'light' => 'Dark',
            'dark' => 'Light',
    ) ) ) );
}

add_action('customize_register', 'app_customizer_settings');

function app_custom_colors() {
    $navbar_color = get_option( 'navbar_color', '#5c4186' );
    $sidebar_color = get_option( 'sidebar_color', '#5c4186' );
    $footer_color = get_option( 'footer_color', '#5c4186' );
    $link_color = get_option( 'link_color', '#15179f' );
    $hover_link_color = get_option( 'hover_link_color', '#485b9f' );
    
    /****************************************
    styling
    ****************************************/
    ?>
    <style>
        /* Navbar Background */
        .navbar-background {
            background-color: <?php echo $navbar_color; ?>; 
        }
        /* Sidebar Background */
        .sidebar-background {
            background-color: <?php echo $sidebar_color; ?>; 
        }
        /* Footer Background */
        .footer-background {
            background-color: <?php echo $footer_color; ?>; 
        }
        /* links color
        a:link, a:visited { 
            color:  <?php echo $link_color; ?>; 
        }
        */
        /* hover links color
        a:hover, a:active {
            color:  <?php echo $hover_link_color; ?>; 
        }
        */
        
    </style>
     
<?php
 
}
add_action( 'wp_head', 'app_custom_colors' );