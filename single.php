<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-thin">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2><?php the_title(); ?></h2>
         <i class="far fa-clock"> </i> <?php the_date(); ?>
          <i class="far fa-user"> </i> <?php the_author(); ?>
    	<div id="primario">
       <?php the_content(); 
       	the_tags();
			//comment_form();
       if ( comments_open() || get_comments_number() ) :
                comments_template();
                
           wp_list_comments( array( 'avatar_size' => '50' ) ); 
			paginate_comments_links();
            endif;?>
       </div>
       </div>
      </article>
<?php endwhile; else : ?>
      <article>
        <p>Sorry, no post was found!</p>
      </article>
<?php endif; ?>
  </section><?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>