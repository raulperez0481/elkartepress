<?php 
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
$theme_name = get_template();
if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'polylang/polylang.php' ) )
 $currentlang =pll_current_language() ;
 
    if (empty($currentlang)) 
    { $currentlang = "es";} 
    
    
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>
 <head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
  <script src="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/inc/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/inc/responsiveslides.min.js"></script>
		 <link rel="stylesheet" href="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/inc/responsiveslides.css">


  
   <script>
    // You can also use "$(window).load(function() {"
    $(function () {

     

      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
   <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?>>
   <header class="header-wrapper">
   <?php
if ( function_exists( 'the_custom_logo' ) ) {?>
    <div id="logo-header"><h1><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>">
	<?php the_custom_logo();?>
</a></h1></div><?php }
?>

<div class="titulo-blog">
<h2><?php bloginfo('name'); ?></h2>
</div>


<div id="redes-sociales">

<?php 
$facebook= get_option('my_facebook_url');
$twitter= get_option('my_twitter_url');
$instagram= get_option('my_instagram_url');
$youtube= get_option('my_youtube_url');
$link_slide_1=get_option('first_slide_link_'.$currentlang);
$link_slide_2=get_option('second_slide_link_'.$currentlang);
$link_slide_3=get_option('third_slide_link_'.$currentlang);

if (isset($facebook) && !empty($facebook)) {
  ?> <div id="icono-social"><a href="<?php echo get_option('my_facebook_url');?>" target="_blank"><img src="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/images/facebook-grey.png" alt="Facebook"></a></div>
<?php } ?>

<?php if (isset($twitter) && !empty($twitter)) {
  ?> <div id="icono-social"><a href="<?php echo get_option('my_twitter_url');?>" target="_blank"><img src="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/images/twitter-grey.png" alt="Twitter"></a></div>
<?php } ?>

<?php if (isset($youtube) && !empty($youtube)) {
  ?> <div id="icono-social"><a href="<?php echo get_option('my_youtube_url');?>" target="_blank"><img src="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/images/youtube-grey.png" alt="Youtube"></a></div>
<?php } ?>

<?php if (isset($instagram) && !empty($instagram)) {
  ?> <div id="icono-social"><a href="<?php echo get_option('my_instagram_url');?>" target="_blank"><img src="<?php echo $protocol.$_SERVER['SERVER_NAME']; ?>/wp-content/themes/<?php echo $theme_name; ?>/images/instagram-grey.png" alt="Instagram"></a></div>
<?php } ?>
</div>
<nav id="site-navigation" class="main-navigation">


 <?php wp_nav_menu( array( 'header-menu' => 'header-menu',
 'container' => '',    // para que no tenga contenedor
'menu_id' => 'topMenu',    // id del menu 
)) ?>
 
</nav>
	
 </header>
          <?php if (is_front_page() ) {?>
   <img class="header-img" alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
   		<?php }else{?>
   		   <img class="header-img-page" alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
   		
   		   		<?php }?>
         <?php if ( is_home() || is_front_page() ) {
         	if ( is_home()){ ?>
					<div id="slidehome" class="callbacks_container"> 
			<?php }else{?>
					<div id="slide" class="callbacks_container"> 
					<?php }?>
  <ul class="rslides" id="slider4">
      <?php  if(get_option('first_slide')  != '') {?>
    <li>
    		<img src="<?php echo get_option('first_slide') ?>" height="" width=""/>
    		<?php if (isset($link_slide_1 ) && !empty($link_slide_1 )) {
  ?>
    		<a href="<?php echo $link_slide_1;?>"><h1><?php echo get_option(__('first_slide_text_'.$currentlang,'elkartepress')); ?></h1></a>
    		<?php } else { ?>
    		
    				<h1><?php echo get_option(__('first_slide_text_'.$currentlang,'elkartepress')); ?></h1>
    		<?php } ?>
    		<p class="caption"><?php echo get_option(__('first_slide_area_'.$currentlang,'elkartepress')); ?></p>
    </li>
    <?php }?>
    <?php  if(get_option('second_slide')  != '') {?>
    <li>
    		<img src="<?php echo get_option('second_slide') ?>" height="" width="">
    		<?php if (isset($link_slide_2 ) && !empty($link_slide_2 )) {
  ?>
    		<a href="<?php echo $link_slide_2; ?>"><h1><?php echo get_option(__('second_slide_text_'.$currentlang,'elkartepress')); ?></h1></a>
        		<?php } else { ?>
        		<h1><?php echo get_option(__('second_slide_text_'.$currentlang,'elkartepress')); ?></h1>
        	<?php } ?>	
    		<p class="caption"><?php echo get_option(__('second_slide_area_'.$currentlang,'elkartepress')); ?></p>
    </li>
    <?php } ?>
    <?php  if(get_option('third_slide')  != '') {?>
    <li>
    		<img src="<?php echo get_option('third_slide') ?>" height="" width="">
    		<?php if (isset($link_slide_3 ) && !empty($link_slide_3 )) {
  ?>
    			<a href="<?php echo $link_slide_3; ?>"><h1><?php echo get_option(__('third_slide_text_'.$currentlang,'elkartepress')); ?></h1></a>
	<?php } else { ?>
		<h1><?php echo get_option(__('third_slide_text_'.$currentlang,'elkartepress')); ?></h1>
		<?php } ?>	
    		
    		<p class="caption"><?php echo get_option(__('third_slide_area_'.$currentlang,'elkartepress')); ?></p>
    </li>
    <?php }?>
  </ul>
</div>

<?php }?>
