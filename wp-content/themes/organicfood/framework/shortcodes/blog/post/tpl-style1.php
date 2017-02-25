<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <?php if ($show_title == 1) { ?>
        <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php } ?>
    <?php if ($show_info == 1) { ?>
        <div class="blog-info">
            <time class="publish-date" datetime="<?php echo get_the_date('Y-m-j') . ' ' . get_the_time('H:i:s'); ?>" pubdate="pubdate">
                <?php _e('Published on', 'organicfood'); ?> <?php echo get_the_date('l, j F Y') . ' ' . get_the_time('H:i'); ?>
            </time>
            <span class="category-name"><?php the_terms(get_the_ID(), $taxonomy, __('Category: ', 'organicfood') , ', ' ); ?></span>
        </div>
    <?php } ?>
    <?php if (has_post_thumbnail()) { ?>
        <div class="blog-image">
            <?php
            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large', false);
            echo '<img src="'.esc_url($attachment_image[0]).'">';
            ?>
        </div>
    <?php } ?>
    <?php if ($show_description == 1) { ?>
        <div class="blog-description">
            <?php echo custom_excerpt($excerpt_length, $excerpt_more); ?>
        </div>
    <?php } ?>
    <?php if (!empty($readmore_text)) { ?>
        <a class="readmore" href="<?php the_permalink(); ?>"><?php echo $readmore_text; ?>: <?php the_title(); ?></a>
    <?php } ?>
</article>
