<?php
/**
 * This is the file for the Button ACF block type
 */

global $ctblock;
$ctblock = $block;

$button = get_field('button');
$link = $button['link'];
$alignment =  $button['alignment'];
$cssClass = $button['css-class'];

if($alignment == 'Center'){
    $alignment = 'justify-content: center;';
}

elseif($alignment == 'Left'){
    $alignment = 'justify-content: end;';
}

else{
    $alignment = 'justify-content: start;';
}
?>

<?php
    if($link):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
?>
        <div class="acf-block__button d-flex" style="<?php echo $alignment; ?>">
            <a class="ct-button <?php echo $cssClass; ?>"
               href="<?php echo esc_url($link_url); ?>"
               target="<?php echo esc_attr($link_target); ?>"
            >
                 <?php echo esc_html($link_title); ?>
            </a>
        </div>
<?php endif; ?>