<?php
/**
 * Template-Part for displaying page banner
 */
?>

<?php
    if(has_post_thumbnail() && get_field('featured-image-visibility')):
        $feat_img = get_the_post_thumbnail_url(); 
        $class = 'banner-has-featImg';

    else:
        $class = 'page-banner has-pointer-below';

    endif;
?>

<section class="<?php echo $class; ?>" style="background-image: url('<?php echo $feat_img ?>')">
    <div class="container">
        <?php
            if(get_field('heading')):
                echo '<h1 class="title">'. get_field('heading') .'</h1>';

            else:
                echo '<h1 class="title">'. get_the_title() .'</h1>';
            endif;
        ?>

        <div>
            <?php
                if(get_field('description')):
                    echo '<p>'. get_field('description') .'</p>';
                endif;

                $link = get_field('link');

                if($link):

                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';

            ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target );?>" class="ct-button">
                   <?php echo esc_html($link_title); ?>
                </a>

            <?php endif; ?>
        </div>
    </div>
</section>