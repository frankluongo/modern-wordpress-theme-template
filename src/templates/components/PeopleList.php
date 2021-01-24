<?php if( $people->have_posts() ) : ?>
<ul class="dflex space-x-1 lg:dgrid lg:space-x-0 lg:grid-cols-4 lg:gap-2">
  <?php while( $people->have_posts() ) :
    $people->the_post();
    $person = get_post();
  ?>
  <li class="people-list__list-item">
    <a
      class="link link--on-light whitespace-nowrap"
      href="#<?php echo $person->post_name; ?>"
    >
      <?php echo get_the_title(); ?>
    </a>
  </li>
  <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php endif; ?>
