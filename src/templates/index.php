<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <section class="container py-3 lg:py-6 content">
      <?php the_content(); ?>
    </section>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
