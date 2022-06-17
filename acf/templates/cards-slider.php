<?php
/**
 * This is the file for the Cards Slider ACF block type
 */

global $ctblock;
$ctblock = $block;

?>

<div class="acf-block__cards-slider">
    <?php if(have_rows('cards-slider')): ?>
        <div class="cards-slider">
            <?php 
                while(have_rows('cards-slider')): the_row();
                    $image = get_sub_field('image');
            ?>
                    <div>
                        <div class="icon-wrapper">
                            <?php echo wp_get_attachment_image($image); ?>
                        </div>
                        <div class="content-wrapper">
                            <h4><?php the_sub_field('title'); ?></h4>
                            <p><?php the_sub_field('text') ?></p>
                        </div>      
                    </div>  
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>
