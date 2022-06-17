<?php
/**
 * This is the file for the Biography ACF block type
 */

global $ctblock;
$ctblock = $block;

$photo = get_field('photo');
$logos = get_field('logos');
?>

<div class="acf-block__bio">
    <h2 class="title d-s_laptop-block d-none text-center"><?php the_field('title'); ?></h2>

    <div>
        <div class="flex-item-1 photo-wrap">
            <figure><?php echo wp_get_attachment_image($photo, 'full'); ?></figure>
        </div>
    
        <div class="flex-item-2 about-text d-s_laptop-none">
            <h2 class="title"><?php the_field('title'); ?></h2>
    
            <?php
                the_field('about');
    
                if(have_rows('profiles')):
            ?>
                    <ul>
                        <?php
                            while(have_rows('profiles')): the_row();
                                $url  = get_sub_field('url');
                                $icon = get_sub_field('icon');
                         ?>
                            <li>
                                <a href="<?php echo $url ?>" target="_blank">
                                    <?php echo wp_get_attachment_image($icon); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
            <?php endif; ?>
        </div>

        <div class="flex-item-2 about-text d-s_laptop-block d-none">
            <?php
                $aboutTextMob = get_field('about-mobile');
                $aboutTextMobMore = get_field('about-mobile-more');

                if($aboutTextMob):
                    echo $aboutTextMob;

                    if($aboutTextMobMore): 
            ?>
                        <div id="readmore-text">
                            <?php
                                echo $aboutTextMobMore;

                                if(have_rows('profiles')):
                            ?>
                                    <ul>
                                        <?php
                                            while(have_rows('profiles')): the_row();
                                                $url  = get_sub_field('url');
                                                $icon = get_sub_field('icon');
                                        ?>
                                            <li>
                                                <a href="<?php echo $url ?>" target="_blank">
                                                    <?php echo wp_get_attachment_image($icon); ?>
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                            <?php endif; ?>
                        </div>

                        <a href="javascript:;" id="readmore"> Read More </a>
            <?php
                    endif;
                endif;
            ?>

            <?php if(have_rows('profiles')): ?>
                    <ul class="d-s_laptop-none">
                        <?php
                            while(have_rows('profiles')): the_row();
                                $url  = get_sub_field('url');
                                $icon = get_sub_field('icon');
                         ?>
                            <li>
                                <a href="<?php echo $url ?>" target="_blank">
                                    <?php echo wp_get_attachment_image($icon); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
            <?php endif; ?>
        </div>
    
        <?php if($logos): ?>
            <div class="flex-item-3 bio-slider">
                <ul>
                    <?php 
                        foreach($logos as $logo):
                            echo '<li>'. wp_get_attachment_image($logo, 'full') .'</li>';
                        endforeach;
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>