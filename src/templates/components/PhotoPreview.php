<a
  class="link link--on-light space-y-1 text-align-center"
  href="<?php echo get_post_permalink(); ?>"
>
  <figure class="image-wrapper square">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'xsmall'); ?>" alt="<?php the_title(); ?>">
  </figure>
  <h3 class="heading h5">
    <?php the_title(); ?>
  </h3>
</a>
