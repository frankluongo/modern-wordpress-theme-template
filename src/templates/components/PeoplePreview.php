<?php if( $people->have_posts() ) :
  $i = 1;
  while( $people->have_posts() ) :
    $people->the_post();
    $person = get_post();
    $id = $person->ID;
?>
<article
  class="dgrid grid-cols-3 align-items-start lg:align-items-center gap-1 p-1 lg:p-4"
  data-js="<?php echo $person->post_name; ?>"
  id="<?php echo $person->post_name; ?>"
>
  <figure class="image-wrapper square w-full <?php if ($i % 2 == 0) { echo 'lg:order-1'; }; ?>">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
  </figure>
  <div class="col-span-2 space-y-1">
    <h3 class="heading h4">
      <?php echo get_the_title(); ?><br>
    </h3>
    <p class="small">
      Portrayed by <?php echo get_field('real_name', $id); ?>
    </p>
    <p class="paragraph"><?php render_excerpt(); ?></p>
    <a class="dinline-block mt-2 link link--on-light" href="<?php echo get_permalink(); ?>"> Read More</a>
  </div>
</article>
<?php
  $i++;
  endwhile;
  wp_reset_postdata();
  endif;
?>
