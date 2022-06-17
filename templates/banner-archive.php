<?php
/**
 * Template-Part for displaying banner or Archive Pages
 */
?>

<section class="page-banner has-pointer-below">
    <div class="container">
        <h1 class="title">
            <?php
                if(is_home()){
                    single_post_title();
                }

                else{
                    single_cat_title();
                    post_type_archive_title();
                }
            ?>    
        </h1>

        <?php if (category_description()): ?>
            <div><?php echo category_description(); ?></div>
        <?php endif; ?>
    </div>
</section>