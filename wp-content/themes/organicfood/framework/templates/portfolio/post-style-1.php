<?php
global $post, $wp_query, $portfolio_options;

$show_title = $portfolio_options['show_title'];
$show_category = $portfolio_options['show_category'];
$show_description = $portfolio_options['show_description'];
$excerpt_length = $portfolio_options['excerpt_length'];
$columns = $portfolio_options['columns'];
$enlarge = $portfolio_options['enlarge'];
$view_online = $portfolio_options['view_online'];
$read_more = $portfolio_options['read_more'];
$extra_class_1column = "";
if ($columns == 1) {
    $extra_class_1column = "span6";
}
?>
<div class="ww-portfolio-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="ww-portfolio-content <?php echo $extra_class_1column; ?>">
            <?php
            if (has_post_thumbnail()) {
                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                
                   echo '<img src="'. esc_attr($attachment_image[0]) .'" />';
                
                $image_large = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
            } else {
                $attachment_image = ww_get_theme_option('default_portfolio_image_feature');
                if($attachment_image != ''){
                    
                       echo '<img src="' . esc_attr($attachment_image) . '" />';
                    
                    $image_large[0] = $attachment_image;
                }
            }
            ?>      
            <div class="ww-portfolio-details <?php echo esc_attr($extra_class_1column); ?>">
                <div class="ww-portfolio-details-inner">
                    <?php if($show_title):?>
                    <div class="ww-title-portfolio">
                        <?php the_title();?>
                    </div>
                    <?php endif;?>
                    <?php if($read_more != '-1'):?>
                    <div class="ww-read-more-button">
                        <a class="ww-read-more" title="<?php echo $read_more;?>" href="<?php echo esc_url(get_permalink(get_the_ID()));?>">+</a>
                    </div>
                    <?php endif;?>
                </div>
            </div>           
        </div>
    </article>
</div>