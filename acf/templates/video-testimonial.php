<?php
/**
 * This is the file for the Video Testimonial ACF block type
 */

global $ctblock;
$ctblock = $block;

$videoTestimonial = get_field('video-testimonial');
$image = get_field('image');
$logo = get_field('case-logo');
$caseTitle = get_field('case-title');
$caseCategory = get_field('case-category');
$caseDescription = get_field('description');
$clientName = get_field('client-name');
$clientDesignation = get_field('client-designation');
?>

<div class="acf-block__video-testimonial">
    <div class="video-wrapper">
        <?php 
            if($videoTestimonial):
                echo '<div class="video">'. $videoTestimonial .'</div>';

            else:
                echo wp_get_attachment_image($image, 'full');

            endif;
        ?>
        <h5>
            <span class="name"><?php echo $clientName ?></span>
            ,
            <span class="designation"><?php echo $clientDesignation ?></span>
        </h5>
    </div>


    <div class="content-wrapper">
        <?php
            echo '<div class="logo-box">'. wp_get_attachment_image($logo) .'</div>';
            echo '<h3>'. $caseTitle .'</h3>';
            echo '<p class="cat">'. $caseCategory .'</p>';
            echo '<p>'. $caseDescription .'</p>';
        ?>
    </div>
</div>