<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <div class="content">              
        <div class="team">
            <div class="row">
                <?php 
                $class = 'col-xs-6 col-sm-6 col-md-6 col-lg-6';
                if (has_post_thumbnail()) {  ?>
                <div class="team-item-image <?php echo esc_attr($class);?>">
                    <?php
                    the_post_thumbnail('thumbnail'); 
                    ?>
                </div>
                <?php }else{
                    $class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
                }?>
                <div class="team-item-info <?php echo esc_attr($class);?>">
                    <div class="team-name">
                        <h3><?php the_title(); ?></h3>
                        <span><?php echo get_post_meta(get_the_ID(), 'team_position', true ); ?></span>
                    </div>
                    <div class="team-about">
                        <?php the_content(); ?>
                    </div>
                    <?php
                        $facebook_link = get_post_meta(get_the_ID(), 'team_facebook_link', true );
                        $twiter_link = get_post_meta(get_the_ID(), 'team_twiter_link', true );
                        $google_plus_link = get_post_meta(get_the_ID(), 'team_google_plus_link', true );
                        $linkedin_link = get_post_meta(get_the_ID(), 'team_linkedin_link', true );
                    ?>
                    <?php if(!empty($facebook_link) || !empty($twiter_link) || !empty($google_plus_link) || !empty($linkedin_link)) { ?>
                    <div class="social-icons">
                        <ul class="social-icons overlay-content list-inline">
                            <?php if (!empty($facebook_link)): ?>
                                <li><a class="facebook" href="<?php echo $facebook_link; ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($twiter_link)): ?>
                                <li><a class="twitter" href="<?php echo $twiter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($google_plus_link)): ?>
                                <li><a class="gplus" href="<?php echo $google_plus_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($linkedin_link)): ?>
                                <li><a class="linkedin" href="<?php echo $linkedin_link; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</article>
