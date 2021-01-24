</main>
      <footer class="footer <?php is_on_homepage(); ?>">
        <section class="container py-2 lg:py-4">
        <?php wp_nav_menu(array ('theme_location' => 'footer_nav', 'container' => false)); ?>
        </section>
        <section class="footer__copright py-1">
          <div class="container text-align-center fs-xs md:fs-sm">
            &copy; <?php echo date("Y"); ?> Officers &amp; Ladies For The Union | UnionOfficers.Org
          </div>
        </section>
      </footer>
    <?php wp_footer(); ?>
  </body>
</html>
