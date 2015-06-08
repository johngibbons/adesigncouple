<?php get_header(); ?>

  <main role="main">
    <section class="hero">
      <div id="map-canvas" class="parallax">
      </div>
    </section>
    <!-- section -->
    <section class="timeline">

      <?php get_template_part('loop'); ?>

      <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
  </main>

<?php get_footer(); ?>
