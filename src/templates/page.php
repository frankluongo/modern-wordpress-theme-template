<?php
  get_header();
  $post = get_post( $post );
  $title = $post->post_title;
  include(locate_template('components/HeroShort.php'));
  if (have_posts()): while (have_posts()) : the_post();
?>
<section class="container my-3 lg:my-6">
  <?php the_content(); ?>
</section>
<?php endwhile; endif; get_footer(); ?>
