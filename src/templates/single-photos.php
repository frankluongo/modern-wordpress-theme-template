<?php
  get_header();
  $post = get_post( $post );
  $title = $post->post_title;
  include(locate_template('components/HeroShort.php'));
?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <section class="container my-3 lg:my-6">
      <?php the_content(); ?>
  </section>
<?php endwhile; endif; ?>

  <section class="container my-3 lg:my-6">
    <?php get_template_part('loop-photos'); ?>
  </section>
<?php get_footer(); ?>
