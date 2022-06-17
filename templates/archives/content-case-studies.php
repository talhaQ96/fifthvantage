<?php
/**
 * The template-part for displaying Case Studies in Archive Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */
?>

<div class="case-studies-grid">
    <?php
        $count = 0;

        while(have_posts()): the_post();

            if(get_field('visibility')):
                $featured  = get_field('featured');
                $thumbnail = get_field('thumbnail');
                $logo      = get_field('logo');
                $count++;
    ?>
                <div class="case-wrapper">
                    <?php if($thumbnail): ?>
                        <div class="thumbnail">
                            <?php
                                echo wp_get_attachment_image($thumbnail, 'full');

                                if($featured):
                                    echo '<label>featured</label>';
                                endif;

                                if($logo):
                                    echo '<div class="logo-box">'. wp_get_attachment_image($logo) .'</div>';
                                endif;
                            ?>
                        </div>
                    <?php endif; ?>

                    <div class="content">
                        <h4><?php the_title(); ?></h4>
                         <?php the_terms($post->ID, 'case_study_category', '<div class="case-cat-list">', '', '</div>'); ?>

                        <a href="<?php the_permalink(); ?>" class="readmore">
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
                    </div>
                </div>
    <?php   endif;
        endwhile;
    ?>
</div>

<?php
    if($count > 6):

    if(get_post_type() == 'case-studies'):
        $id = 'loadmore-case';

    elseif (get_post_type() == 'services'):
        $id = 'loadmore-service'; 

    endif;
?>
    <div class="loadmore-button" id="<?php echo $id; ?>">
        <a href="javascript:;" class="ct-button">Load More</a>
    </div>
<?php endif; ?>