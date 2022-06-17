<?php
/**
 * This is the file for the Benefit ACF block type
 */

global $ctblock;
$ctblock = $block;
?>

<div class="acf-block__benefits">
     <?php if(have_rows('benefits')): ?>
        <div class="benefits-slider">
            <?php 
                while(have_rows('benefits')): the_row();
                    $icon = get_sub_field('icon');
                    $text = get_sub_field('text');
            ?>
                    <div class="benefit">
                        <div>
                            <div class="icon-wrapper">
                                <?php echo wp_get_attachment_image($icon); ?>
                            </div>
                            <p><?php echo $text; ?></p>
                        </div>
                    </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>
