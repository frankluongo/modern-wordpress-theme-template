<?php
  get_header();
  $post = get_post( $post );
  $title = $post->post_title;
  $events = new Events('both');
  $all_events = $events->get_all_events();
  $events_title = "All Events";
  $show_link = false;
  include(locate_template('components/HeroShort.php'));
?>
<section class="container my-3 lg:my-6">
  <div class="all-events-list">
    <?php include(locate_template('components/EventsList.php')); ?>
  </div>
</section>
<?php get_footer(); ?>



