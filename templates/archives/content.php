<?php
/**
 * The template-part for displaying Blog Post in Archive Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */
?>

<div class="blog-grid">
    <?php
        $count = 0;
        $postCount= 0;

        while(have_posts()) : the_post();
            $count ++;
            $postCount ++;

            if($postCount == 1){
                $thumbnail = get_the_post_thumbnail('', 'ct-blog-thumbnail-wide', '');
            }

            else{
                $thumbnail = get_the_post_thumbnail('', 'ct-blog-thumbnail', '');
            }
    ?>
            <div class="blog-wrapper">
                <?php if(has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>" class="thumbnail">
                        <?php echo $thumbnail;  ?>
                    </a>
                <?php else: ?>
                    <div class="head">
                        <h2><?php the_title(); ?></h2>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php
                        if(is_search()):
                            $postType = get_post_type_object(get_post_type());
                    ?>
                        <label><?php echo $postType->labels->singular_name ?></label>
                    <?php endif; ?>

                    <h4 class="blog-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="readmore">
                        <span>Read More</span>

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
    <?php
        if($postCount == 5){
            $postCount = 0;
        }

        endwhile;
    ?>
</div>

<?php if($count > 10): ?>
    <div class="loadmore-button" id="loadmore-blog">
        <a href="javascript:;" class="ct-button">Load More</a>
    </div>
<?php endif; ?>

