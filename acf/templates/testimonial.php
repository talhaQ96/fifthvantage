<?php
/**
 * This is the file for the Testimonial ACF block type
 */

global $ctblock;
$ctblock = $block;

global $post;

$testimonials = get_field('testimonials');
?>

<div class="acf-block__testimonials">
    <div class=slider-title>
        <h2><?php the_field('title'); ?></h2>
    </div>

    <?php if($testimonials): ?>
        <div class="testimonial-slider">
            <?php
                foreach($testimonials as $post):
                    setup_postdata($post);
            ?>
                        <div class="testimonial-wrapper">
                            <?php the_content(); ?>

                            <div class="client-info">
                                <div class="client">
                                    <?php the_post_thumbnail('ct-testimonial-thumbnail'); ?>

                                    <div>
                                        <h6><?php the_title(); ?></h6>
                                        <p><?php the_field('designation', $post); ?></p>
                                    </div>
                                </div>

                                <?php if(get_field('case-study', $post)): ?>
                                    <a href="<?php the_field('case-study', $post); ?>" class="case-study-link">
                                        <span>View Case Study</span>
                                        <span class="arrow-wrap">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25">
                                              <g id="link_arrow" data-name="link arrow" transform="translate(-115)">
                                                <rect id="Rectangle_191" data-name="Rectangle 191" width="24" height="25" transform="translate(115)" fill="#febe0f"/>
                                                <path id="Path_1009" data-name="Path 1009" d="M1.158,2.924l.688.4.035.02.376.217.376.217.041.024.666.384.046.026.376.217.2.117,1.091.63.211.122.214.124.251.145.288.166.29.167.462.267.376-.217.376-.217.292-.168.169-.1L8.275,5.3l.292-.168.99-.572.223-.129.376-.217.207-.12.476-.275.07-.04.376-.217.376-.217.069-.04.614-.354.069-.04,1.128-.651L12.788,0l-.376.217-.376.217L11.66.651l-.376.217-.376.217-.376.217-.355.205-.1.058-.3.171L9.4,1.954l-.376.217-.376.217-.135.078-.286.165L7.9,2.823l-.376.217-.376.217-.376.217-.376-.217L6.018,3.04l-.376-.217-.376-.217-.376-.217-.376-.217-.375-.216,0,0-.373-.215L3.385,1.52,3.009,1.3l-.376-.217L2.257.869,1.881.651,1.51.437,1.5.43,1.128.217.752,0,0,2.256l1.128.651Z" transform="translate(123.887 18.899) rotate(-90)" fill="#1c283f"/>
                                              </g>
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
        <?php endforeach; ?>
        </div>
    <?php
            wp_reset_postdata();
        endif;
    ?>
</div>