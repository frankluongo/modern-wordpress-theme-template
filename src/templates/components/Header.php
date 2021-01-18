<header class="header py-1">
  <section class="container dflex align-items-center">
    <?php the_custom_logo() ?>
    <nav class="nav pfixed lg:pstatic" id="nav" aria-hidden="true">
      <section class="inner-header lg:dnone p-1 dflex align-items-center">
        <?php the_custom_logo() ?>
        <span class="ml-1">
          <?php bloginfo('name'); ?>
        </span>
        <button class="toggle" data-toggle data-ctrl="nav">
        <span class="visually-hidden">Hide Menu</span>
        <?php include(locate_template('icons/times.php')); ?>
        </button>
      </section>
      <?php
        wp_nav_menu(array ('theme_location' => 'header_nav', 'container' => false));
      ?>
    </nav>
    <button class="toggle lg:dnone" data-toggle data-ctrl="nav">
      <span class="visually-hidden">Show Menu</span>
      <?php include(locate_template('icons/bars.php')); ?>
    </button>
  </section>
</header>
