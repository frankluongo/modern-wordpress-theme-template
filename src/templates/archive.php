<?php
  $title = get_the_title();
  get_header();
  include(locate_template('components/HeroShort.php'));
  echo '<section class="container my-3 lg:my-6">';
  get_template_part('loop');
  echo '</section>';
  get_footer();
?>
