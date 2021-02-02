<section class="dgrid gap-1 sm:grid-cols-2 lg:gap-2">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="box p-1 lg:p-2 space-y-1" id="post-<?php the_ID(); ?>">
      <header class="dflex space-x-1 align-items-center">
        <?php if ( has_post_thumbnail()) : ?>
          <a
            href="<?php the_permalink(); ?>"
            title="<?php the_title(); ?>"
          >
            <?php the_post_thumbnail(array(120,120)); ?>
          </a>
        <?php endif; ?>
        <strong>
          <a class="heading h4 link link--on-light" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </strong>
      </header>
      <div class="post__content">
        <?php if (has_excerpt()) { ?>
          <p class="paragraph"><?php the_excerpt(); ?></p>
        <?php } else { ?>
          <p class="paragraph">
            <?php echo make_excerpt(get_the_content()); ?>
          </p>
        <?php } ?>
      </div>
    </article>
  <?php endwhile;endif; ?>
</section>
