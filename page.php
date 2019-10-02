<?php get_header(); ?>
<main class="wrap">

  <section class="content-area content-thin">
  
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-full">
        
          <h2><?php the_title(); ?></h2>
          
        <?php the_content(); ?>
      </article>
<?php endwhile; else : ?>
      <article>
        <p>Sorry, no page was found!</p>
      </article>
<?php endif; ?>
 <?php wp_link_pages( $args ); ?>

  </section><?php //get_sidebar(); ?>
</main>
<?php get_footer(); ?>
