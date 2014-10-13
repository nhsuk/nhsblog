<?php 
/* Template name: Homepage */

the_post(); 

?>

<div class="row">

  <div class="large-12 column">

    <?php
      $content = get_the_content();
      if(!empty($content)) { ?>

      <section class="page-element">
        
        <?php the_content(); ?>

        <?php if (get_field('main_button_url')) { ?>
          <a href="<?php the_field('main_button_url'); ?>" title="<?php the_field('main_button_description'); ?>" class="button"><?php the_field('main_button_description'); ?></a>
        <?php } ?>

      </section>

    <?php } ?>

    <?php if (get_field('image_1')) {

      $size = 'medium';

    ?>

      <section class="page-element">

        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">

          <li>
            <?php
              $image1 = get_field('image_1');
              $thumb1 = $image1['sizes'][ $size ];
            ?>
            <a class="image" href="<?php the_field('url_1'); ?>"><img class="th" src="<?php echo $thumb1; ?>" alt="<?php echo $image1['alt']; ?>"></a>
            <p><?php the_field('title_1'); ?> <a href="<?php the_field('url_1'); ?>">Read more &raquo;</a></p>
          </li>

          <li>
            <?php
              $image2 = get_field('image_2');
              $thumb2 = $image2['sizes'][ $size ];
            ?>
            <a class="image" href="<?php the_field('url_2'); ?>"><img class="th" src="<?php echo $thumb2; ?>" alt="<?php echo $image2['alt']; ?>"></a>
            <p><?php the_field('title_2'); ?> <a href="<?php the_field('url_2'); ?>">Read more &raquo;</a></p>
          </li>

          <li>
            <?php
              $image3 = get_field('image_3');
              $thumb3 = $image3['sizes'][ $size ];
            ?>
            <a class="image" href="<?php the_field('url_3'); ?>"><img class="th" src="<?php echo $thumb3; ?>" alt="<?php echo $image3['alt']; ?>"></a>
            <p><?php the_field('title_3'); ?> <a href="<?php the_field('url_3'); ?>">Read more &raquo;</a></p>
          </li>

        </ul>

      </section>

    <?php } ?>

    <section class="page-element">

      <header>
        <h1>News</h1>
      </header>

      <div class="row">

        <div class="medium-8 column">
      
          <?php query_posts( array ( 'posts_per_page' => 4 ) ); ?>
            <?php while (have_posts()) : the_post() ?>
              
              <article>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                <?php get_template_part('partials/entry-meta'); ?>

                <?php if ( has_post_thumbnail() ) { ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                <?php } ?>

                <?php if (has_excerpt()) { 
                  the_excerpt();
                } else { ?>
                  <p><?php trim_content(25); ?></p>
                <?php } ?>
              </article>
              
            <?php endwhile; ?>
          <?php wp_reset_query(); ?>

          <?php if (get_field('news_page_url')) { ?>
            <a href="<?php the_field('news_page_url'); ?>" class="button">More news</a>
          <?php } ?>

        </div>

        <div class="medium-4 column">
          
          <aside class="sidebar banner">

            <h4><?php the_field('banner_title'); ?></h4>

          </aside>

        </div>

      </div>

    </section>

  </div>

</div>