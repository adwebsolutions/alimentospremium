<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <div class="content center feature-delivery slider-blog">
        <?php if(has_post_thumbnail()){ ?>
            <div class="feature-delivery-image">
                <?php
                $attachment_full_image = '';
                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                $attachment_full_image = $attachment_image[0];
                
                the_post_thumbnail('medium');
                ?>
                <a class="colorbox" href="<?php echo esc_url($attachment_full_image) ?>" title="<?php the_title(); ?>">
                    <span class="mosaic-hover"><i class="fa fa-plus-circle"></i></span>
                </a>

            </div>
        <?php } ?>
        <?php if($show_title){ ?>
            <h3 class="feature-delivery-title ns2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php } ?>
        <?php if($show_description){ ?>
            <div class="feature-delivery-description">
                <?php echo custom_excerpt($excerpt_length, $excerpt_more); ?>
            </div>
        <?php } ?>
    </div>
</article>
