<?php

/**
 * Template Name: Homepage
 */
get_header();
?>

<main id="primary" class="site-main">
    <section class="home-banner">
        <div class="container">
            <?php
                if(get_field('heading')):
                    echo '<h1 class="title">'. get_field('heading') .'</h1>';
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

        <div id="hero" class="particles"></div>
    </section>
    <a id="back-to-top-button"></a>

    <?php the_content(); ?>
</main>

<?php get_footer(); ?>