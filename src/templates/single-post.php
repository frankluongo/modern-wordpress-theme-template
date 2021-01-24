<?php
  get_header();
  if (have_posts()): while (have_posts()) : the_post();
  $title = get_the_title();
  include(locate_template('components/HeroShort.php'));
?>
  <section class="container container--slim content my-3 lg:my-6">
    <?php the_content(); ?>
  </section>
<?php
  endwhile; endif;
  get_footer();
?>
