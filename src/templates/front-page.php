<?php
  get_header();
  $heroes = get_field('homepage_hero_images');
  $ladies = new Events('ladies');
  $officers = new Events('officers');
?>
<section class="hero hero--tall dgrid md:grid-cols-2">
  <section class="has-bg dflex flex-column align-items-center justify-center" style="background-image: url(<?php echo $heroes['ladies_hero_image']; ?>)">
    <?php next_event($ladies->get_next_event(), 'Ladies'); ?>
    <a href="/ladies" class="mt-1 button button--filled-in" aria-label="Learn More About The Ladies For The Union">
      Learn More
    </a>
  </section>
  <section class="has-bg dflex flex-column align-items-center justify-center" style="background-image: url(<?php echo $heroes['officers_hero_image']; ?>)">
    <?php next_event($officers->get_next_event(), 'Officers'); ?>
    <a href="/officers" class="mt-1 button button--filled-in" aria-label="Learn More About The Officers For The Union">
      Learn More
    </a>
  </section>
</section>
<?php get_footer(); ?>
