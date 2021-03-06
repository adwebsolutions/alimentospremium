<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <?php if ($show_title == 1) { ?>
        <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php } ?>
    <?php if ($show_info == 1) { ?>
        <div class="blog-info">
            <time class="publish-date" datetime="<?php echo get_the_date('Y-m-j') . ' ' . get_the_time('H:i:s'); ?>" pubdate="pubdate">
                <?php _e('Published on', 'organicfood'); ?> <?php echo get_the_date('l, j F Y') . ' ' . get_the_time('H:i'); ?>
            </time>
        </div>
    <?php } ?>
    <?php if (has_post_thumbnail()) { ?>
        <div class="blog-image">
            <?php
             
                echo get_the_post_thumbnail(get_the_ID(),'organicfood-crop-750-685');
             
            ?>
        </div>
    <?php } ?>
    <?php if ($show_description == 1) { ?>
        <div class="blog-description">
             <?php echo get_post_meta(get_the_ID(), 'recipe_extra_excerpt', true ); ?> 
        </div>
    <?php } ?>
    <?php if (!empty($readmore_text)) { ?>
        <a class="readmore" href="<?php the_permalink(); ?>"><?php echo $readmore_text; ?>: <?php the_title(); ?></a>
    <?php } ?>
</article>
