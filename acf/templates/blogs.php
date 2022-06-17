<?php
/**
 * This is the file for the Blogs ACF block type
 */

global $ctblock;
$ctblock = $block;

global $post;
$blogs = get_field('blogs');
?>

<div class="acf-block__blogs">
    <?php if($blogs): ?>
        <div class="blogs-slider">
            <?php
                foreach($blogs as $post ):
                    setup_postdata($post);
            ?>
                    <div class="post-wrapper">
                        <a href="<?php the_permalink(); ?>" class="featured-image">
                            <?php the_post_thumbnail('ct-blog-thumbnail-slider'); ?>
                        </a>
                        <div class="post-inner">
                            <p class="post-date">
                                <span>
                                    <img src="<?php echo assets_uri(); ?>/images/icon-calendar.svg" alt="">
                                </span>
                                <span>
                                    <?php echo get_the_date(); ?>
                                </span>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="post-title">
                                <h6><?php the_title(); ?></h6>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    <?php
            wp_reset_postdata();
        endif;
    ?>
</div>