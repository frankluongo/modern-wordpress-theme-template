<h2 class="heading h4">Check Out Our Photos</h2>
<ul class="dgrid grid-cols-3 gap-1">
<?php if( count($photos->posts) > 0 ): while( $photos->have_posts() ): $photos->the_post(); ?>
  <a
    class="dblock has-bg"
    href="<?php echo get_post_permalink(); ?>"
    style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'xsmall'); ?>);padding-top:100%;"
  >
    <span class="visually-hidden"><?php the_title(); ?></span>
  </a>
<?php endwhile; wp_reset_postdata(); endif; ?>
</ul>
<a class="dinline-block my-1 button button--block button--outline" href="/photos">
  View All Photos
</a>

