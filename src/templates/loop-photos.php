<?php while( have_rows('event') ): the_row(); if( have_rows('event_photos') ): ?>
  <section class="dgrid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 lg:gap-2 my-1 lg:my-3">
    <?php while ( have_rows('event_photos') ): the_row(); ?>
      <button
        class="button-reset"
        data-photo="<?php the_sub_field('event_photo'); ?>"
        data-js="Lightbox.Item"
      >
        <figure class="image-wrapper square">
          <img src="<?php the_sub_field('event_photo'); ?>" alt="View Event Photos">
        </figure>
      </button>
    <?php endwhile; # event_photos row ?>
</section>
<?php  endif; endwhile; # event while ?>
