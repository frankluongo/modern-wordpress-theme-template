<?php
  get_header();
  $post = get_post( $post );
  $title = $post->post_title;
  $params = array(
    'post_type'   => 'photos',
    'post_status' => 'publish',
  );
  $photos = new WP_Query( $params );
  include(locate_template('components/HeroShort.php'));
?>
<section class="container my-3 lg:my-6">
  <div class="dgrid gap-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <?php
      if( count($photos->posts) > 0 ):
        while( $photos->have_posts() ):
          $photos->the_post();
          include(locate_template('components/PhotoPreview.php'));
        endwhile;
      endif;
    ?>
  </div>
</section>
<?php get_footer(); ?>
