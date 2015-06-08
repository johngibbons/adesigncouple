<?php get_header(); ?>

  <main role="main">
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <!-- post thumbnail -->
      <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
      <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <!-- post featured header -->
        <div class="post-header hero">
          <!-- post featured image -->
          <div class="image parallax" style="background-image: url(<?php echo $url ?>)">
          </div>
          <div class="overlay">
          </div>
          <div class="content">
            <div class="post-title-container">
              <h1>
                <?php the_title(); ?>
              </h1>
              <p class="excerpt">
                <?php the_excerpt(); ?>
              </p>
            </div>
            <div class="post-details-container">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 128 ); ?>
              <div class="meta">
                <p class="author-name">
                  <?php _e( 'Written by:', 'html5blank' ); ?> <?php the_author_posts_link(); ?>
                </p>
                <p class="date">
                  <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
                    <?php the_date(); ?>
                  </time>
                </p>
                <p class="categories">
                  <?php _e( 'Categorised in: ', 'html5blank' ); the_category(' / '); // Separated by slashes ?>
                </p>
                <p class="comments">
                  <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /post featured header -->
      <?php endif; ?>
      <!-- /post thumbnail -->

      <section class="post-content">
        <?php the_content(); // Dynamic Content ?>
        <?php get_template_part("flexible-content"); ?>

        <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>


        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
      </section>

      <?php comments_template(); ?>

    </article>
    <!-- /article -->

  <?php endwhile; ?>

  <?php else: ?>

    <!-- article -->
    <article>

      <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

    </article>
    <!-- /article -->

  <?php endif; ?>

  </main>

<?php get_footer(); ?>
