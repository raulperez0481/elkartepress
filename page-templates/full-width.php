<?php /* Template Name: Anchura completa, sin barra lateral */ ?>

<?php get_header(); ?>
<main class="wrap">



  <section class="content-area content-full-width">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-full">

          <div class="breadcrumb"><?php get_breadcrumb(); ?></div>

        <?php the_content(); ?>
      </article>
<?php endwhile; else : ?>
      <article>
        <p>Sorry, no page was found!</p>
      </article>
<?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>