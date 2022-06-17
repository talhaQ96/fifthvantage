<?php

/**
 * Function for Adding Custom Admin Dashboard Logo
 */
function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo assets_uri(); ?>/images/custom-logo.png);
            height: 40px;
            width: 240px;
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

function wpb_login_logo_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'wpb_login_logo_url' );
 
function wpb_login_logo_url_title() {
    return 'Smart Global Holdings';
}

add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

/**
 * Function for Custom Comment Template
 */

if(!function_exists('custom_comments_template')):
    function custom_comments_template($comment, $args, $depth) {
?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div>
            <div class="avatar">
                <?php echo get_avatar($comment, $size='80'); ?>
            </div>

            <div class="comment-block">
                <div class="comment-meta">
                    <div>
                        <p><strong><?php comment_author(); ?></strong></p>
                        <p class="date"><?php printf(esc_html__('%1$s at %2$s' , 'ct'), get_comment_date(),  get_comment_time()); ?></p>
                    </div>

                    <div>
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => 2))); ?>
                    </div>
                </div>

                <div class="comment-text">
                    <?php comment_text(); ?>
                </div>
            </div>
        </div>
   </li>
<?php }
endif;

/**
 * Function for Adding Placeholders to Comment Form Fields
 */

// Placeholder Name, Email, URL

 function placeholder_author_email_url_form_fields($fields) {
    $replace_author = __('Your Name', 'yourdomain');
    $replace_email =  __('Your Email', 'yourdomain');
    $replace_url =    __('Your Website', 'yourdomain');
    
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'yourdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input required = "required" id="author" name="author" type="name" placeholder="'.$replace_author.' *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Email', 'yourdomain' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input required = "required" id="email" name="email" type="email" placeholder="'.$replace_email.' *" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Website', 'yourdomain' ) . '</label>' .
    '<input id="url" name="url" type="url" placeholder="'.$replace_url.'" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>';
    
    return $fields;
}
add_filter('comment_form_default_fields','placeholder_author_email_url_form_fields');

/**
 * Auto Populating ACF Fields Value
 */

add_filter('acf/load_value/name=case-title', function($value) {

    if(empty($value)) {
        $value = get_the_title();
    }
    return $value;
});

add_filter('acf/load_value/name=case-category', function($value) {

    if(empty($value)) {
        $category  = get_the_terms($post, 'case_study_category');
        $categoryName = $category[0]->name;

        $value = $categoryName;
    }
    return $value;
});

/**
 * Show all CPT & Blog Post items on archive pages and index.php
 */

add_action('pre_get_posts', 'showAllBlogs');

function showAllBlogs($query) {
    
    if (!is_admin() && $query->is_main_query()){
    
        if(is_archive() || is_home()){
            $query->set('posts_per_page', -1 );
        }
    }
}

/**
 * Function for displaying listed post types only on search results page
 * Exclude everything else from search results page
 */

// function searchfilter($query) {
//     if ($query->is_search && !is_admin()){
//         $query->set('post_type',array('post'));
//     }

//     return $query;
// }
// add_filter('pre_get_posts','searchfilter');


/**
 * Function for retrieving Custom Taxonomy terms for a given post.
 * Returns anchor element with term name and term archive link.
 */

function custom_get_terms_with_link(int $postID, string $taxonomyName){

    $taxonomyTerms = get_the_terms($postID, $taxonomyName);
    $termsArray = array();

    for ($i = 0; $i < count($taxonomyTerms); $i++) {
                    
        $termLink = get_term_link($taxonomyTerms[$i]->term_id, $taxonomyName);
        $termName = $taxonomyTerms[$i]->name;

        $termsArray[$i] = '<a href="' .$termLink. '">'. $termName .'</a>';
    }

     return implode('', $termsArray);
}

/**
 * Function for Json Sitemap 
 **/

function json_sitemap(){
    $sitemap  = '<script type="application/ld+json">';
        $sitemap .= '{';
            $sitemap .= '"@context": "https://schema.org",';
            $sitemap .= '"@type": "Article",';
    
            $sitemap .= '"mainEntityOfPage": {';
                $sitemap .= '"@type": "WebPage",';
                $sitemap .= '"'. get_the_permalink() .'"';
            $sitemap .= '},';
    
            $sitemap .= '"headline": "'. get_the_title() .'",';
            $sitemap .= '"description": "'. get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) .'",';
            $sitemap .= '"image": "https://cdn-cdafe.nitrocdn.com/rBfsFnuaPzUkZtDJnEvRKHKcRNPTlwJI/assets/static/optimized/rev-9f9f997/patients/news/wp-content/uploads/2022/03/Female-patient-in-office-filling-out-medical-document-with-doctor.jpg",';
                
            $sitemap .= '"author": {';
                $sitemap .= '"@type": "Person",';
                $sitemap .= '"name": "' .get_author_name(). '",';
                $sitemap .= '"url": "'  .get_author_posts_url(get_the_author_meta('ID')). '",';
            $sitemap .= '},';
    
            $sitemap .= '"publisher": {';
                $sitemap .= '"@type": "Organization",';
                $sitemap .= '"name": "Heally",';
            $sitemap .= '},';
    
            $sitemap .= '"logo": {';
                $sitemap .= '"@type": "ImageObject",';
                $sitemap .= '"url": "https://cdn-cdafe.nitrocdn.com/rBfsFnuaPzUkZtDJnEvRKHKcRNPTlwJI/assets/static/optimized/rev-9f9f997/patients/news/wp-content/uploads/2021/03/logo-1.png"';
            $sitemap .= '},';
    
            $sitemap .= '"datePublished": "'. get_the_date('Y-m-d').'"';
    
        $sitemap .= '}';
    $sitemap .= '</script>';

    echo $sitemap;
}
