<?php if (have_posts()): while (have_posts()) : the_post(); ?>


  <!-- article -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Get the Markers for the Google Map -->
    <?php $location = get_field("location"); ?>
    <?php if ( !empty($location) ): ?>
      <div class="marker" data-lat="<?php echo $location["lat"]; ?>" data-lng="<?php echo $location["lng"]; ?>" >
        <a href="<?php the_permalink(); ?>">
          <h3 class="marker-title"><?php the_title(); ?></h3>
          <div class="date">
            <time datetime="<?php the_time("Y-m-d"); ?>">
              <?php the_date(); ?>
            </time>
          </div>
          <div class="marker-thumb">
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <?php the_post_thumbnail("small"); // Declare pixel size you need inside the array ?>
            <?php endif; ?>
          </div>
        </a>
      </div>
    <?php endif; ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="timeline-post">
    <div class="timeline-entry meta">
      <!-- post title -->
      <h2>
        <?php the_title(); ?>
      </h2>
      <!-- /post title -->
      <div class="timeline-dot">
      </div>
      <span class="date">
        <time datetime="<?php the_time("Y-m-d"); ?>">
          <?php the_time("F j, Y"); ?>
        </time>
      </span>
    </div>

    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
        <?php the_post_thumbnail("large"); // Declare pixel size you need inside the array ?>
    <?php endif; ?>
    <!-- /post thumbnail -->
  </a>
  </article>
  <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

  <!-- article -->
  <article>
    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
  </article>
  <!-- /article -->

<?php endif; ?>
