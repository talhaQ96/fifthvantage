<?php
/**
 * This is the file for the Service ACF block type
 */

global $ctblock;
$ctblock = $block;
?>

<div class="acf-block__services">
    <?php if(have_rows('services')): ?>
        <div class="services-wrapper">
            <?php
                while(have_rows('services')): the_row();
                    $image = get_sub_field('image');
                    $default_image = $image['default-image'];
                    $mobile_image  = $image['mobile-image'];
                    $link = get_sub_field('service-link');
            ?>
                    <div>

                        <div class="d-s_tablet-none thumbnail">
                            <?php echo wp_get_attachment_image($default_image, 'full'); ?>
                        </div>

                        <div class="d-none d-s_tablet-block thumbnail">
                            <?php echo wp_get_attachment_image($mobile_image, 'full'); ?>
                        </div>
                         
                         <div class="slide">
                            <div>
                                <h5><?php the_sub_field('title'); ?></h5>
                                <p><?php the_sub_field('text'); ?></p>
                            </div>

                            <?php if($link): ?>
                                <div class="arrow-wrap">
                                    <a href="<?php echo ($link); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" class="arrow-rect">
                                            <g id="right_arrow" data-name="right arrow" transform="translate(-350 -1506)">
                                                <rect id="Rectangle_146" data-name="Rectangle 146" width="36" height="36" transform="translate(350 1506)" fill="#febe0f"/>
                                                <path id="Path_647" data-name="Path 647" d="M1.668,4.211l.99.572.05.029.542.313.542.313.059.034.958.553.066.038.542.313.292.169,1.57.907.3.175.308.178.361.208.414.239.418.241.666.384.542-.313.542-.313.42-.242.243-.14.42-.242.42-.242,1.426-.823.321-.185.542-.313.3-.172.685-.4.1-.058.542-.313.542-.313.1-.058.884-.51.1-.057L19.5,3.248,18.415,0l-.542.313-.542.313L16.79.938l-.542.313-.542.313-.542.313-.511.3-.145.084-.427.246-.542.313L13,3.127l-.542.313-.2.113-.411.238-.477.275-.542.313-.542.313L9.749,5,9.207,4.69l-.542-.313-.542-.313-.542-.313L7.041,3.44,6.5,3.127l-.54-.312-.007,0L5.416,2.5l-.542-.313-.542-.313-.542-.313L3.25,1.251,2.708.938,2.174.63,2.157.62,1.625.313,1.083,0,0,3.248l1.625.938Z" transform="translate(364.12 1533.215) rotate(-90)" fill="#1c283f"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                         </div>
                    </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>