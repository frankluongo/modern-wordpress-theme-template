<?php
  get_header();
  $post = get_post( $post );
  $title = $post->post_title;
  include(locate_template('components/HeroShort.php'));
?>
<section class="container my-3 lg:my-6 dgrid gap-1 lg:grid-cols-3">
  <div class="lg:col-span-2">
    <?php echo do_shortcode(get_field('contact_form')); ?>
  </div>
  <aside class="box p-1">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </aside>
</section>
<?php get_footer(); ?>
