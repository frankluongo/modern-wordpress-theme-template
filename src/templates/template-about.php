<?php
  /* Template Name: About Page */
  get_header();
  $hero = get_field('hero');
  $image = $hero['image'];
  $type = $hero['type'];
  $events = new EventsBuilder($type);
  $all_events = $events->get_events();
  $photos_params = array(
    'post_type'   => 'photos',
    'post_status' => 'publish',
    'category_name' => $type,
    'posts_per_page' => 6
  );
  $people_params = array(
    'post_type'   => $type,
    'post_status' => 'publish',
  );
  $photos = new WP_Query( $photos_params );
  $people = new WP_Query( $people_params );
  $page_id = get_the_ID();
  $events_title = "Upcoming Events";
  $show_link = true;
?>

<section class="hero dflex flex-wrap prelative">
  <div class="hero__background has-bg pabsolute" style="background-image: url(<?php echo $image ?>);"></div>
  <figure class="prelative w-full">
    <img
      class="hero__image mx-auto dblock w-full"
      alt="<?php the_title(); ?>"
      src="<?php echo $image ?>"
    />
  </figure>
  <h2 class="hero__title pabsolute color-white h2 heading italic weight-700">
    <?php the_title(); ?>
  </h2>
</section>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <section class="container my-3 lg:my-6">
    <p class="paragraph">
      <?php echo get_the_content(); ?>
    </p>
  </section>
<?php endwhile; endif; ?>

<section class="container my-3 lg:my-6">
  <div class="box px-1 py-2">
    <h2 class="heading h4">
      Meet The <?php echo get_the_title($page_id); ?>
    </h2>
    <div class="sm:scroller">
      <?php include(locate_template('components/PeopleList.php')); ?>
    </div>
  </div>
</section>

<section class="container dgrid gap-1 lg:grid-cols-3 my-3 lg:my-6">
  <article class="lg:col-span-2">
    <?php include(locate_template('components/EventsList.php')); ?>
  </article>
  <aside>
    <?php include(locate_template('components/SidebarPhotos.php')); ?>
  </aside>
</section>

<section class="container container--slim my-3 lg:my-6">
  <?php include(locate_template('components/PeoplePreview.php')); ?>
</section>




<?php get_footer(); ?>
