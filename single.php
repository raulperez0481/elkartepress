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
       <?php 
       		// If comments are open or we have at least one comment, load up the comment template.
 if ( comments_open() || get_comments_number() ) :
     comments_template();
 endif;
          ?>
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