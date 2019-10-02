<?php get_header(); ?>
<main class="wrap">



<section class="content-area content-thin">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       <article class="article-loop">        

          <div class="imagen-destacada">
          
          <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail( array(460, 230)); ?>
    </a>
<?php endif; ?>
          </div>
          <div class="destacada-contenido">
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
           <p class="meta-info"> <i class="far fa-clock"> </i> <?php the_date(); ?>
          <i class="far fa-user"> </i> <?php the_author(); ?></p>
        <?php the_excerpt(); ?>
        <p class="leer-mas"><a class="mas" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Leer mas</a></p>
        </div>

      </article>
<?php endwhile; 
          kriesi_pagination();

else : ?>
      <article>
        <p class="not-found">Lo sentimos, no hemos encontrado nada</p>
         <div id="sad"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/elkartepress/images/sad.png" alt="no hemos encontrado nada" /></div>
      </article>
      

<?php endif; ?>
  </section><?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>