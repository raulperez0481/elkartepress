<?php




function elkartepress_customize_register( $wp_customize ) {
	
	
/*******************************************
Color scheme
********************************************/
 
// add the section to contain the settings
$wp_customize->add_section( 'textcolors' , array(
    'title' =>  'Color Scheme',
) );

// main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
$txtcolors[] = array(
    'slug'=>'color_scheme_1', 
    'default' => '#000',
    'label' => 'Fondo cabecera'
);
 
// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
$txtcolors[] = array(
    'slug'=>'color_scheme_2', 
    'default' => '#666',
    'label' => 'Fondo pie'
);
 
 //title
 $txtcolors[] = array(
    'slug'=>'color_scheme_3', 
    'default' => '#666',
    'label' => 'Titulos'
);
  
// link color
$txtcolors[] = array(
    'slug'=>'link_color', 
    'default' => '#008AB7',
    'label' => 'Enlaces'
);
 
// link color ( hover, active )
$txtcolors[] = array(
    'slug'=>'hover_link_color', 
    'default' => '#9e4059',
    'label' => 'Enlaces (al pasar por encima)'
);

//fondo seccion servicios
$txtcolors[] = array(
    'slug'=>'bg_services_color', 
    'default' => '#E2E2E2',
    'label' => 'Fondo seccion servicios'
);

// add the settings and controls for each color
foreach( $txtcolors as $txtcolor ) {
 
    // SETTINGS
    $wp_customize->add_setting(
        $txtcolor['slug'], array(
            'default' => $txtcolor['default'],
            'type' => 'option', 
            'capability' =>  'edit_theme_options',
            'sanitize_callback'  => 'esc_attr',
        )
    );
    // CONTROLS
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            $txtcolor['slug'], 
            array('label' => $txtcolor['label'], 
            'section' => 'textcolors',
            'settings' => $txtcolor['slug'])
        )
    );
}


$wp_customize->add_panel( 'my_custom_options', array(
    'title' => __( 'Mis Redes', 'elkartepress' ),
    'priority' => 160,
    'capability' => 'edit_theme_options',
  ));
  
  // Section para Google Analytics
  $wp_customize->add_section( 'google_analytics_section' , array(
    'title' => __( 'Google Analytics', 'elkartepress' ),
    'panel' => 'my_custom_options',
    'priority' => 1,
    'capability' => 'edit_theme_options',
  ));
 
  // Section para Redes Sociales
  $wp_customize->add_section( 'social_section' , array(
    'title' => __( 'Redes Sociales', 'elkartepress' ),
    'panel' => 'my_custom_options',
    'priority' => 2,
    'capability' => 'edit_theme_options',
  ));
  
  //Redes Sociales: Facebook
  $wp_customize->add_setting( 'my_facebook_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('my_facebook_url', array(
    'label' => __( 'Facebook URL', 'elkartepress' ),
    'section' => 'social_section',
    'priority' => 1,
    'type' => 'text',
  ));
 
  //Redes Sociales: Twitter
  $wp_customize->add_setting( 'my_twitter_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('my_twitter_url', array(
    'label' => __( 'Twitter URL', 'elkartepress' ),
    'section' => 'social_section',
    'priority' => 2,
    'type' => 'text',
  ));
  
   //Redes Sociales: Instagram
  $wp_customize->add_setting( 'my_instagram_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('my_instagram_url', array(
    'label' => __( 'Instagram URL', 'elkartepress' ),
    'section' => 'social_section',
    'priority' => 3,
    'type' => 'text',
  ));
  
   //Redes Sociales: Youtube
  $wp_customize->add_setting( 'my_youtube_url', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('my_youtube_url', array(
    'label' => __( 'Youtube URL', 'elkartepress' ),
    'section' => 'social_section',
    'priority' => 4,
    'type' => 'text',
  ));



/**************************************
Solid background colors
***************************************/
// add the section to contain the settings
$wp_customize->add_section( 'background' , array(
    'title' =>  'Solid Backgrounds',
) );
 
 
// add the setting for the header background
$wp_customize->add_setting( 'header-background' ,array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
// add the control for the header background
$wp_customize->add_control( 'header-background', array(
    'label'      => 'Add a solid background to the header?',
    'section'    => 'background',
    'settings'   => 'header-background',
    'type'       => 'radio',
    'choices'    => array(
        'header-background-off'   => 'no',
        'header-background-on'  => 'yes',
) ) );
 
 
// add the setting for the footer background
$wp_customize->add_setting( 'footer-background' ,array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
// add the control for the footer background
$wp_customize->add_control( 'footer-background', array(
    'label'      => 'Add a solid background to the footer?',
    'section'    => 'background',
    'settings'   => 'footer-background',
    'type'       => 'radio',
    'choices'    => array(
        'footer-background-off'   => 'no',
        'footer-background-on'  => 'yes',
        ) 
    ) 
);


/**************************************
Show title and description
***************************************/
// add the section to contain the settings
$wp_customize->add_section( 'title' , array(
    'title' =>  ' Mostrar título y descripcion',
) );
 
 
// add the setting for the header background
$wp_customize->add_setting( 'show-title' );
 
// add the control for the header background
$wp_customize->add_control( 'show-title', array(
    'label'      => 'Mostrar el título?',
    'section'    => 'title',
    'settings'   => 'show-title',
    'type'       => 'radio',
    'choices'    => array(
        'show-title-off'   => 'no',
        'show-title-on'  => 'yes',
) ) );


/**************************************
Show services
***************************************/
// add the section to contain the settings
$wp_customize->add_section( 'shservices' , array(
    'title' =>  ' Mostrar sección servicios',
) );
 
 
// add the setting for the header background
$wp_customize->add_setting( 'show-services' );
 
// add the control for the header background
$wp_customize->add_control( 'show-services', array(
    'label'      => 'Mostrar sección servicios?',
    'section'    => 'shservices',
    'settings'   => 'show-services',
    'type'       => 'radio',
    'choices'    => array(
        'show-services-off'   => 'no',
        'show-services-on'  => 'yes',
) ) );



/**************************************
Show last entries
***************************************/
// add the section to contain the settings
$wp_customize->add_section( 'last-entries' , array(
    'title' =>  ' Mostrar últimas entradas',
) );
 
 
// add the setting for the header background
$wp_customize->add_setting( 'show-lastentries' );
 
// add the control for the header background
$wp_customize->add_control( 'show-lastentries', array(
    'label'      => 'Mostrar sección últimas entradas?',
    'section'    => 'last-entries',
    'settings'   => 'show-lastentries',
    'type'       => 'radio',
    'choices'    => array(
        'show-lastentries-off'   => 'no',
        'show-lastentries-on'  => 'yes',
) ) );



/**************************************
Show header
***************************************/
// add the section to contain the settings
$wp_customize->add_section( 'header-img' , array(
    'title' =>  ' Mostrar imagen de cabecera',
) );
 
 
// add the setting for the header background
$wp_customize->add_setting( 'show-header' ,array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
// add the control for the header background
$wp_customize->add_control( 'show-header', array(
    'label'      => 'Mostrar imagen de cabecera?',
    'section'    => 'header-img',
    'settings'   => 'show-header',
    'type'       => 'radio',
    'choices'    => array(
        'show-header-off'   => 'no',
        'show-header-on'  => 'yes',
) ) );


/*if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'polylang/polylang.php' ) )
 $langs = pll_languages_list();
 
    if (empty($langs)) { $langs = array("es");}
 
    $wp_customize->add_panel( 'claim_panel', array(
        'title' => __( 'Claims', 'elkartepress' ),
        'description' => '',
        'priority' => 160,
    ));
 
    foreach ($langs as $key => $lang) {
        $wp_customize->add_section( 'claim_section_' . $lang , array(
            'title' => __( 'Texto Claim', 'elkartepress' ) . " " . strtoupper($lang),
            'description' => '',
            'panel' => 'claim_panel',
        ));
 
        $wp_customize->add_setting( 'opt_claim_' . $lang, array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ) );
 
        $wp_customize->add_control('opt_claim_' . $lang, array(
            'label' => __( 'Mensaje', 'elkartepress' ) . " " . $lang,
            'section' => 'claim_section_' . $lang,
            'type' => 'textarea',
        ));
    }*/


 
}
add_action( 'customize_register', 'elkartepress_customize_register' );


function elkartepress_theme_customize_register( $wp_customize ) {
  $wp_customize->add_panel( 'servicios', array(
    'title' => __( 'Servicios', 'elkartepress' ),
	'description' => __( 'Aqui podemos mostrar un mensaje', 'elkartepress' ),
    'priority' => 160,
    'capability' => 'edit_theme_options',
  ));

if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
 
if ( is_plugin_active( 'polylang/polylang.php' ) )  
$langs = pll_languages_list();

    if (empty($langs)) { $langs = array("es");}
    
      foreach ($langs as $key => $lang) {
      	
     // Primera seccion 	
    $wp_customize->add_section( 'primera_seccion_' .$lang , array(
            'title' => __( 'Servicio 1', 'elkartepress' ) . " " . strtoupper($lang),
            'description' => '',
				'priority' => 1,
            'panel' => 'servicios',
        ));
 
  
		  // Segunda Seccion
		  $wp_customize->add_section( 'segunda_seccion_' .$lang , array(
		    'title' => __( 'Servicio 2', 'elkartepress' ). " " . strtoupper($lang),
		    'panel' => 'servicios',
		    'priority' => 2,
		    'capability' => 'edit_theme_options',
		  ));
  
	  // Tercera Seccion
	  $wp_customize->add_section( 'tercera_seccion_' .$lang , array(
	    'title' => __( 'Servicio 3', 'elkartepress' ). " " . strtoupper($lang),
	    'panel' => 'servicios',
	    'priority' => 3,
	    'capability' => 'edit_theme_options',
	  ));
  
  		
  		//Campo de texto 1       
        $wp_customize->add_setting( 'campo_texto_'.$lang, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
             'sanitize_callback'  => 'esc_attr',
        ) );
 
        $wp_customize->add_control('campo_texto_'.$lang, array(
            'label' => __( 'Titulo', 'elkartepress' ) . " " .$lang,
            'section' => 'primera_seccion_'.$lang,
            'type' => 'text',
        ));
        
    //Campo de texto  URL 1
  $wp_customize->add_setting( 'campo_texto_url_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_texto_url_'.$lang, array(
    'label' => __( 'URL del enlace', 'elkartepress' ). " " .$lang,
    'section' => 'primera_seccion_'.$lang,
    'priority' => 1,
    'type' => 'text',
  ));
  
  //Campo textarea 1
  $wp_customize->add_setting( 'campo_textarea_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
    
  ));

  $wp_customize->add_control('campo_textarea_'.$lang, array(
    'label' => __( 'Contenido', 'elkartepress' ). " " .$lang,
    'section' => 'primera_seccion_'.$lang,
    'priority' => 1,
    'type' => 'textarea',
  ));
  
    //imagen 1
	 $wp_customize->add_setting('image_control_one_'.$lang, array(
	'default' => '',
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	 'sanitize_callback'  => 'esc_attr',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_one_'.$lang, array(
	'label' => __( 'Featured Home Page Image One', 'theme-slug' ). " " .$lang,
	'section' => 'primera_seccion_'.$lang,
	'settings' => 'image_control_one_'.$lang,
	))
	);
   
    //Campo de texto 2
  $wp_customize->add_setting( 'campo_texto_2_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_texto_2_'.$lang, array(
    'label' => __( 'Titulo', 'elkartepress' ). " " .$lang,
    'section' => 'segunda_seccion_'.$lang,
    'priority' => 1,
    'type' => 'text',
  ));
  
  //Campo de texto  URL 2
  $wp_customize->add_setting( 'campo_texto_url_2_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_texto_url_2_'.$lang, array(
    'label' => __( 'URL del enlace', 'elkartepress' ). " " .$lang,
    'section' => 'segunda_seccion_'.$lang,
    'priority' => 1,
    'type' => 'text',
  ));
  
  
    //Campo textarea 2
  $wp_customize->add_setting( 'campo_textarea_2_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_textarea_2_'.$lang, array(
    'label' => __( 'Contenido', 'elkartepress' ). " " .$lang,
    'section' => 'segunda_seccion_'.$lang,
    'priority' => 1,
    'type' => 'textarea',
  ));
  
   //imagen 2
 $wp_customize->add_setting('image_control_two_'.$lang, array(
'default' => '',
'type' => 'theme_mod',
'capability' => 'edit_theme_options',
 'sanitize_callback'  => 'esc_attr',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_two_'.$lang, array(
'label' => __( 'Featured Home Page Image Two', 'theme-slug' ),
    'section' => 'segunda_seccion_'.$lang,
'settings' => 'image_control_two_'.$lang,
))
); 
  
   //Campo de texto 3
  $wp_customize->add_setting( 'campo_texto_3_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_texto_3_'.$lang, array(
    'label' => __( 'Titulo', 'elkartepress' ). " " .$lang,
    'section' => 'tercera_seccion_'.$lang,
    'priority' => 1,
    'type' => 'text',
  ));
  
 //Campo de texto  URL 3
  $wp_customize->add_setting( 'campo_texto_url_3_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
 'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_texto_url_3_'.$lang, array(
    'label' => __( 'URL del enlace', 'elkartepress' ). " " .$lang,
    'section' => 'tercera_seccion_'.$lang,
    'priority' => 1,
    'type' => 'text',
  ));
  
  
    //Campo textarea 3
  $wp_customize->add_setting( 'campo_textarea_3_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));

  $wp_customize->add_control('campo_textarea_3_'.$lang, array(
    'label' => __( 'Contenido', 'elkartepress' ). " " .$lang,
    'section' => 'tercera_seccion_'.$lang,
    'priority' => 1,
    'type' => 'textarea',
  ));
  
   //imagen 3333
 $wp_customize->add_setting('image_control_third_'.$lang, array(
'default' => '',
'type' => 'theme_mod',
'capability' => 'edit_theme_options',
 'sanitize_callback'  => 'esc_attr',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_third_'.$lang, array(
'label' => __( 'Featured Home Page Image Third', 'theme-slug' ),
    'section' => 'tercera_seccion_'.$lang,
'settings' => 'image_control_third_'.$lang,
))
);     
        
        
	}
}
add_action( 'customize_register', 'elkartepress_theme_customize_register' );

/*ULTIMAS ENTRADAS*/

function last_posts_customize_register($wp_customize) {
	

$wp_customize->add_panel( 'entradas', array(
   'title' => __( 'Entradas', 'elkartepress' ),
	'description' => __( 'Aqui podemos mostrar un mensaje', 'elkartepress' ),
    'priority' => 25,
    'capability' => 'edit_theme_options',
) );

  // Primera seccion 	
    $wp_customize->add_section( 'ultimas_entradas', array(
            'title' => __( 'Ultimas entradas', 'elkartepress' ) ,
            'description' => '',
				'priority' => 1,
            'panel' => 'entradas',
        ));

if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'polylang/polylang.php' ) )  
$langs = pll_languages_list();

    if (empty($langs)) { $langs = array("es");}
    
      foreach ($langs as $key => $lang) {
      	
      	
  
        $wp_customize->add_setting('title_posts_'.$lang, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
 			'sanitize_callback'  => 'esc_attr',
        ) );
 
        $wp_customize->add_control('title_posts_'.$lang, array(
            'label' => __( 'Titulo', 'elkartepress' ) . " " .$lang,
            'section' => 'ultimas_entradas',
            'type' => 'text',
        ));

		$wp_customize->add_setting('bblink_'.$lang, array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
 'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('bblink_'.$lang, array(
    'label' => __( 'Enlace boton "Ver todas"'.$lang, 'elkartepress' ),
     'section' => 'ultimas_entradas',
    'priority' => 3,
    'type' => 'text',
  ));

}


$wp_customize->add_setting( 'number_posts', array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('number_posts', array(
    'label' => __( 'Numero de entradas', 'elkartepress' ),
    'section' => 'ultimas_entradas',
    'priority' => 2,
    'type' => 'text',
  ));
  
 
}

add_action( 'customize_register', 'last_posts_customize_register' );

/* SLIDE */


function slide_customize_register($wp_customize) {  

$wp_customize->add_section( 'slides', array(
    'title'          => 'Slides',
    'priority'       => 25,
) );


// add the setting for the header background
$wp_customize->add_setting( 'mostrar-slide' ,array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));
 
// add the control for the header background
$wp_customize->add_control( 'mostrar-slide', array(
    'label'      => 'Mostrar el Slide?',
     'priority' => 1,
    'section'    => 'slides',
    'settings'   => 'mostrar-slide',
    'type'       => 'radio',
    'choices'    => array(
     'show-slide-off'   => 'no',
     'show-slide-on'  => 'yes',
) ) );


if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'polylang/polylang.php' ) )  
$langs = pll_languages_list();

    if (empty($langs)) { $langs = array("es");}
    
      foreach ($langs as $key => $lang) {


$wp_customize->add_setting( 'first_slide', array(
    'default'        => '',
'type' => 'option',
    'capability' => 'edit_theme_options',
    'sanitize_callback'  => 'esc_attr',
  ));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'first_slide', array(
    'label'   => 'Imagen slide 1',
    'section' => 'slides',
    'priority' => 4,
    'settings'   => 'first_slide',
) ) );


  $wp_customize->add_setting( 'first_slide_text_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('first_slide_text_'.$lang, array(
    'label' => __( 'Texto slide 1', 'elkartepress' ) . " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 1,
    'type' => 'text',
  ));
  
   $wp_customize->add_setting( 'first_slide_link_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
 'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('first_slide_link_'.$lang, array(
    'label' => __( 'Enlace Titulo 1', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 2,
    'type' => 'text',
  ));
  
  
  
  $wp_customize->add_setting( 'first_slide_area_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
  
  $wp_customize->add_control('first_slide_area_'.$lang, array(
    'label' => __( 'Area 1', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 3,
    'type' => 'textarea',
  ));

$wp_customize->add_setting( 'second_slide', array(
    'default'        => '',
		'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
) );



$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'second_slide', array(
    'label'   => 'Imagen slide 2',
    'section' => 'slides',
    'priority' => 8,
    'settings'   => 'second_slide',
) ) );

$wp_customize->add_setting( 'second_slide_text_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('second_slide_text_'.$lang, array(
    'label' => __( 'Texto slide 2', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 5,
    'type' => 'text',
  ));
  
   $wp_customize->add_setting( 'second_slide_link_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
         'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('second_slide_link_'.$lang, array(
    'label' => __( 'Enlace Titulo 2', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 5,
    'type' => 'text',
  ));
  
  $wp_customize->add_setting( 'second_slide_area_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
  
  $wp_customize->add_control('second_slide_area_'.$lang, array(
    'label' => __( 'Area 2', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 7,
    'type' => 'textarea',
  ));


$wp_customize->add_setting( 'third_slide', array(
    'default'        => '',
 		'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'third_slide', array(
    'label'   => 'Imagen slide 3',
    'section' => 'slides',
    'priority' => 12,
    'settings'   => 'third_slide',
) ) );

$wp_customize->add_setting( 'third_slide_text_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('third_slide_text_'.$lang, array(
    'label' => __( 'Texto slide 3', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 9,
    'type' => 'text',
  ));
  
   $wp_customize->add_setting( 'third_slide_link_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
         'sanitize_callback'  => 'esc_attr',
  ));
 
  $wp_customize->add_control('third_slide_link_'.$lang, array(
    'label' => __( 'Enlace Titulo 3', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 10,
    'type' => 'text',
  ));
  
  $wp_customize->add_setting( 'third_slide_area_'.$lang, array(
    'type' => 'option',
    'capability' => 'edit_theme_options',
     'sanitize_callback'  => 'esc_attr',
  ));
  
  $wp_customize->add_control('third_slide_area_'.$lang, array(
    'label' => __( 'Area 3', 'elkartepress' ). " " . strtoupper($lang),
    'section' => 'slides',
    'priority' => 11,
    'type' => 'textarea',
  ));

}
}

add_action( 'customize_register', 'slide_customize_register' );


function wptutsplus_customize_colors() {
	
	/**********************
text colors
**********************/
// main color
$color_scheme_1 = get_option( 'color_scheme_1' );
 
// secondary color
$color_scheme_2 = get_option( 'color_scheme_2' );

// title color
$color_scheme_3 = get_option( 'color_scheme_3' );
 
// link color
$link_color = get_option( 'link_color' );
 
// hover or active link color
$hover_link_color = get_option( 'hover_link_color' );

$fondo_servicios = get_option( 'bg_services_color' );

/****************************************
styling
****************************************/
?>
<style>
 
 
/* color scheme */
 
/* title color */
h1, h2, h2.page-title, h2.post-title,  footer h3{ 
    color:  <?php echo $color_scheme_3; ?>; 
}
 
/* secondary color */
#site-description, .sidebar h3, h3, h5, .menu.main a:active, .menu.main a:hover {
    color:  <?php echo $color_scheme_2; ?>; 
}
.menu.main,
.fatfooter {
    border-top: 1px solid <?php echo $color_scheme_2; ?>;
}
.menu.main {
    border-bottom: 1px solid <?php echo $color_scheme_2; ?>;  
}
.fatfooter {
    border-bottom: 1px solid <?php echo $color_scheme_2; ?>;
}
 
/* links color */
a:link, a:visited, .content-area h1.title_section  { 
    color:  <?php echo $link_color; ?>; 
}

.content-box:hover{

border-bottom-style: solid;
border-bottom-width: 4px;
border-bottom-color: <?php echo $link_color; ?>; 

}

a.mas{

    background-color:  <?php echo $link_color; ?>; 

}
 
/* hover links color */
a:hover, a:active {
    color:  <?php echo $hover_link_color; ?>; 
}

/* background colors */

#info-full{
	
	background-color: <?php echo $fondo_servicios; ?>;
	
}

input[type="reset"], input[type="submit"], input[type="submit"], .pirate-forms-submit-button{

 background-color:  <?php echo $link_color; ?>; 

}
 
/* header */
.header-background-on .header-wrapper {
    background-color: <?php echo $color_scheme_1; ?>;
}
.header-background-on #site-title a, .header-background-on h1, .header-background-on #site-description, .header-background-on address, .header-background-on header a:link, .header-background-on header a:visited, .header-background-on header a:active, .header-background-on header a:hover {
    color: #333;
}
.header-background-on header a:link, .header-background-on header a:visited {
   
}
.header-background-on header a:active, .header-background-on header a:hover {
    text-decoration: none;
}
.header-background-on .menu.main {
    border: none;
}
 
/* footer */
.footer-background-on footer { 
    background-color: <?php echo $color_scheme_2; ?>;
}
.footer-background-on footer, .footer-background-on footer h3, .footer-background-on footer a:link, .footer-background-on footer a:visited, .footer-background-on footer a:active, .footer-background-on footer a:hover {
    color: #fff;
}
.footer-background-on footer a:link, .footer-background-on footer a:visited {
    text-decoration: underline;
}
.footer-background-on footer a:active, .footer-background-on footer a:hover {
    text-decoration: none;          
}
.footer-background-on .fatfooter {
    border: none;
}

.show-title-off  .titulo-blog h2{

display: none;

}

.show-slide-off #slide{

display: none;

}

.show-services-off #info-full{

display: none;

}

.show-lastentries-off #last-entries{

display: none;

}
 
</style>
     
<?php
 
}
add_action( 'wp_head', 'wptutsplus_customize_colors' );

function wptutsplus_show_title( $classes ) {
 
    // set the header background
    $show_title = get_theme_mod( 'show-title' );
    $classes[] = $show_title;
     
   
     
    return $classes;
     
}
add_filter('body_class', 'wptutsplus_show_title');


function wptutsplus_show_services( $classes ) {
 
    // set the header background
    $show_services = get_theme_mod( 'show-services' );
    $classes[] = $show_services;
     
   
     
    return $classes;
     
}
add_filter('body_class', 'wptutsplus_show_services');



function wptutsplus_show_lastentries( $classes ) {
 
    // set the header background
    $show_lastentries = get_theme_mod( 'show-lastentries' );
    $classes[] = $show_lastentries;
     
   
     
    return $classes;
     
}
add_filter('body_class', 'wptutsplus_show_lastentries');



function wpcustom_show_slide( $classes ) {
 
    // set the header background
    $show_slide = get_option( 'mostrar-slide' );
    $classes[] = $show_slide;
     
   
     
    return $classes;
     
}
add_filter('body_class', 'wpcustom_show_slide');

function wpcustom_show_header( $classes ) {
 
    // set the header image
    $show_header = get_option( 'show-header' );
    $classes[] = $show_header;
     
   
     
    return $classes;
     
}
add_filter('body_class', 'wpcustom_show_header');


function wptutsplus_add_background_color_style( $classes ) {
 
    // set the header background
    $header_background = get_option( 'header-background' );
    $classes[] = $header_background;
     
    // set the footer background
    $footer_background = get_option( 'footer-background' );
    $classes[] = $footer_background;    
     
    return $classes;
     
}
add_filter('body_class', 'wptutsplus_add_background_color_style');






