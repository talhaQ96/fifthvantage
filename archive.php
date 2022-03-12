<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
        get_template_part('templates/banner-archive');
        if (have_posts()):
    ?>
        <section class="section-archive has-padding-eq">
            <div class="container">
                <?php get_template_part('templates/archives/content', get_post_type()); ?>
            </div>
        </section>
    <?php
        
        else:
            get_template_part('templates/notfound');
            
        endif;
    ?>
</main>

<?php get_footer(); ?>