<?php

include_once( 'inc/customizer.php' );

load_theme_textdomain('elkartepress', get_template_directory() . '/languages');

function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('elkartepress', get_template_directory() . '/languages');
}

add_action( 'after_setup_theme', 'wpse_theme_setup' );


add_theme_support( 'automatic-feed-links' );



function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
   add_theme_support( 'title-tag' );
}

function elkartepress_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'elkartepress_enqueue_comments_reply' );


if ( ! isset( $content_width ) ) {
	$content_width = 600;
}



function elkartepress_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}


function elkartepress_customizer_styles() { ?>
	<style>
		#accordion-section-colors{

display: none !important;

}

	</style>
<?php

}
add_action( 'customize_controls_print_styles', 'elkartepress_customizer_styles', 999 );




add_theme_support( 'custom-header' );

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

$defaults = array( 'default-image' => '', 'random-default' => false, 'width' => 0, 'height' => 0, 'flex-height' => false, 'flex-width' => false, 'default-text-color' => '', 'header-text' => true, 'uploads' => true, 'wp-head-callback' => '', 'admin-head-callback' => '', 'admin-preview-callback' => '', ); add_theme_support( 'custom-header', $defaults );


add_theme_support( 'custom-logo', array(
	    'height'      => 100,
	    'width'       => 400,
	    'flex-height' => true,
	    'flex-width'  => true,
	    'header-text' => array( 'site-title', 'site-description' ),
        ) );



// Register a new sidebar simply named 'sidebar'
function add_widget_Support() {
                register_sidebar( array(
                                'name'          => 'Sidebar',
                                'id'            => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget'  => '</div>',
                                'before_title'  => '<h2>',
                                'after_title'   => '</h2>',
                ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_Widget_Support' );


function nueva_zona_widgets_pie() {


		register_sidebar(array(
								'name' => 'Footer Left',
								'id'  => 'footer-left',
								'before_widget' =>'<div>' ,
								'after_widget' =>'</div>' ,
								'before_title' => '<h3>',
								'after_title' => '</h3>',
						));
						
		register_sidebar(array(
	 							'name' => 'Footer Center 1',
	 							'id' => 'footer-center-1',
	 							'before_widget' => '<div>',
	 							'after_widget' => '</div>',
	 							'before_title' => '<h3>',
	 							'after_title' => '</h3>',
	 					));
	 					
		register_sidebar(array(
								'name' => 'Footer Center 2',
								'id' => 'footer-center-2',
								'before_widget' => '<div>',
								'after_widget' => '</div>',
								'before_title' => '<h3>',
								'after_title' => '</h3>',
						));
						
		register_sidebar(array(
								'name' => 'Footer Right',
								'id' => 'footer-right',
								'before_widget' => '<div>',
								'after_widget' => '</div>',
								'before_title' => '<h3>',
								'after_title' => '</h3>',
						));
						
}
add_action( 'widgets_init', 'nueva_zona_widgets_pie' );


// Register a new navigation menu
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );


//Shortcodes en widgets de texto
add_filter('widget_text', 'do_shortcode');

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Inicio</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}









