<?php
  get_header();
    if (have_posts()):
      while (have_posts()) :
        the_post();
        echo '<section class="container container--slim my-3 lg:my-6 content">';
          the_content();
        echo '</section>';
      endwhile;
    endif;
  get_footer();
?>
