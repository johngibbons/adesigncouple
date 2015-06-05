<?php // check if the flexible content field has rows of data
  if( have_rows('blog_post_content') ): // loop through the rows of data
    $row_num = 0;
    while ( have_rows('blog_post_content') ) : the_row();
      $row_num++;
      switch (get_row_layout()) {
        case "image":
          $image = get_sub_field('image'); ?> 
    <?php $embedded = get_sub_field("embed_code"); ?>
    <?php $caption = get_sub_field("caption"); ?>
          <div class="post-image-container">
            <?php if(!empty($image)): ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <?php elseif(!empty($embedded)): ?>
              <?php the_sub_field("embed_code"); ?>
            <?php endif; ?>
            <?php if($caption): ?>
              <div class="caption"><?php the_sub_field("caption"); ?></div>
            <?php endif; ?>
          </div>
    <?php break;
        case "normal_text_block":?>
          <div class="normal"><?php the_sub_field('normal_text'); ?></div>
          <?php break;
        case "project_testimonial":?>
          <div class="project-testimonial l-content-module l-full-bleed <?php echo "l_" . $width . " " . $last; ?>" data-content-id="<?php echo $row_num ?>">
            <q><?php the_sub_field('st_testimonial'); ?></q>
            <span class="testimonial-source"><?php the_sub_field('st_testimonial_source'); ?></span>
          </div>
    <?php break;
        case "video": ?>
          <div class="video"><?php the_sub_field('video'); ?></div>
    <?php break;
        case "quotation": ?>
          <div class="inline-quotation">
            <?php the_sub_field("inline_quotation"); ?>
            <span class="inline-attribution"> 
              <?php the_sub_field("inline_attribution"); ?>
            </span>
          </div>
    <?php break; ?>
  <?php case "block_quotation": ?>
          <div class="block-quotation">
            <?php the_sub_field("block_quotation"); ?>
            <span class="block-attribution"> 
              <?php the_sub_field("block_attribution"); ?>
            </span>
          </div>
    <?php break; ?>
<?php }
    endwhile;
  else :
    // no layouts found
  endif;
?>
