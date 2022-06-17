<?php

// Shortcode is [ct-sitemap show_tax="true"]
if ( defined( 'YOAST_ENVIRONMENT' ) ) {

	/**
	 * Shortcode for HTML Sitemap
	 *
	 * @return string of HTML sitemap
	 */
	function ct_sitemap( $atts ) {

		$a = shortcode_atts( array(
			'show_tax' => true,
		), $atts );

		$a['show_tax'] = $a['show_tax'] === 'true' ? true : false;

		$output = '';
		$pt = get_post_types( [ 'public' => true, 'show_in_rest' => true ], 'names', 'and' );
		sort( $pt );

		foreach ( $pt as $type ) {
			if ( $type !== 'attachment' && WPSEO_Post_Type::is_post_type_indexable( $type ) ) {

				$query = new WP_Query(
					array(
						'posts_per_page'    => -1,
						'post_type'         => $type,
						'post_status'     	=> 'publish',
						'has_password'		=> false,
						'post__not_in'		=> array( get_the_ID() ),
						'orderby'			=> 'title',
						'order'				=> 'ASC',
						'meta_query'        => array(
							'relation'      => 'OR',
							array(
								'compare'   => 'NOT EXISTS',
								'key'       => '_yoast_wpseo_meta-robots-noindex',
							),
							array(
								'value'     => 1,
								'compare'   => '!=',
								'key'       => '_yoast_wpseo_meta-robots-noindex',
							),
						),
					)
				);
				if ( $query->have_posts() ) {
					$output .= '<h3>' . get_post_type_object( $type )->labels->name . '</h3>';

					$output .= '<ul>';
					if ( get_post_type_object( $type )->hierarchical ) {
						$output .= wp_list_pages(
							array(
								'echo'      	=> 0,
								'title_li'  	=> null,
								'post_type' 	=> $type,
								'has_password'	=> false,
								'orderby'		=> 'title',
								'order'			=> 'ASC',
								'include'		=> wp_list_pluck( $query->posts, 'ID' ),
								'post_status'   => 'publish',
							)
						);
					} else {
						while ( $query->have_posts() ) { $query->the_post();
							$output .= '<li><a href="' . get_the_permalink( get_the_ID() ) . '">' . get_the_title() . '</a></li>';
						}
					}
					$output .= '</ul>';
				}
				wp_reset_postdata();

			}
		}

		if ( $a['show_tax'] ) {
			$tax_class = new WPSEO_Taxonomy_Sitemap_Provider();
			// Load all public taxonomies also. 
			foreach ( get_taxonomies( [ 'public' => true, 'show_in_rest' => true ], 'objects' ) as $tax => $n ) {
				if ( $tax_class->is_valid_taxonomy( $tax ) ) {
					$terms = get_terms( array(
						'taxonomy'		=> $tax,
						'hide_empty'	=> true,
					) );

					if ( !empty( $terms ) ) {
						$output .= '<h3>' . $n->label . '</h3>';
						$output .= '<ul>';
						foreach ( $terms as $t ) {
							if ( isset( get_option( 'wpseo_taxonomy_meta' )[$tax][$t->term_id]['wpseo_noindex'] ) ) {
								$index = get_option( 'wpseo_taxonomy_meta' )[$tax][$t->term_id]['wpseo_noindex'];
								if ( !empty( $index ) && $index === 'noindex' ) {
									continue;
								}
							}
							$output .= '<li><a href="' . get_term_link( $t, $tax ) . '">' . $t->name . '</a></li>';
						}
						$output .= '</ul>';
					}
				}
			}
		}

		return $output;
	}
	add_shortcode( 'ct-sitemap', 'ct_sitemap' );

}

/**
 * Shortcode for Displaying Blogs
 * 
 * Shortcode is [blogs]
 **/

function shortcode_blogs(){
	$blog = array('post_type' => 'post', 'posts_per_page' => -1);
	$blogQuery = new WP_Query($blog);

	if($blogQuery->have_posts()):
		$count = 0;
		$postCount = 0;

		$output  = '<div class="blog-grid">';
			while($blogQuery->have_posts()):$blogQuery->the_post();
				$count ++;
				$postCount ++;

				if($postCount == 1){
					$thumbnail = get_the_post_thumbnail('', 'ct-blog-thumbnail-wide', '');
				}

				else{
					$thumbnail = get_the_post_thumbnail('', 'ct-blog-thumbnail', '');
				}

				$output .= '<div class="blog-wrapper">';
            		if(has_post_thumbnail()):
            			$output .= '<a href="'. get_the_permalink() .'" class="thumbnail">'. $thumbnail .'</a>';
            		endif;

            		$output .= '<div class="content">';
            			$output .= '<h4 class="blog-title"><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h4>';
            			$output .= '<p>'. get_the_excerpt() .'</p>';
						$output .= '<a href="'. get_the_permalink() .'" class="readmore"><span>Read More</span><span class="arrow-wrap"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"><g id="link_arrow" data-name="link arrow" transform="translate(-115)"><rect id="Rectangle_191" data-name="Rectangle 191" width="24" height="25" transform="translate(115)" fill="#febe0f"/><path id="Path_1009" data-name="Path 1009" d="M1.158,2.924l.688.4.035.02.376.217.376.217.041.024.666.384.046.026.376.217.2.117,1.091.63.211.122.214.124.251.145.288.166.29.167.462.267.376-.217.376-.217.292-.168.169-.1L8.275,5.3l.292-.168.99-.572.223-.129.376-.217.207-.12.476-.275.07-.04.376-.217.376-.217.069-.04.614-.354.069-.04,1.128-.651L12.788,0l-.376.217-.376.217L11.66.651l-.376.217-.376.217-.376.217-.355.205-.1.058-.3.171L9.4,1.954l-.376.217-.376.217-.135.078-.286.165L7.9,2.823l-.376.217-.376.217-.376.217-.376-.217L6.018,3.04l-.376-.217-.376-.217-.376-.217-.376-.217-.375-.216,0,0-.373-.215L3.385,1.52,3.009,1.3l-.376-.217L2.257.869,1.881.651,1.51.437,1.5.43,1.128.217.752,0,0,2.256l1.128.651Z" transform="translate(123.887 18.899) rotate(-90)" fill="#1c283f"/></g></svg></span></a>';
            		$output .= '</div>';
				$output .= '</div>';

				if($postCount == 5){
					$postCount = 0;
				}
			endwhile;
			wp_reset_postdata();
		$output .= '</div>';

		if($count > 10):
			$output .= '<div class="loadmore-button" id="loadmore-blog"><a href="javascript:;" class="ct-button">Load More</a></div>';
		endif;
	endif;
	return $output;
}
add_shortcode('blogs', 'shortcode_blogs');

/**
 * Shortcode for Case Study CPT
 * 
 * Shortcode is [case-studies]
 **/

function shortcode_casestudy(){
	$case = array('post_type' => 'case-studies', 'posts_per_page' => -1);
	$caseQuery = new WP_Query($case);

	if($caseQuery->have_posts()):
		$count = 0;
		$output  = '<div class="case-studies-grid">';
			while($caseQuery->have_posts()):$caseQuery->the_post();
				if(get_field('visibility')):
            		$featured  = get_field('featured');
            		$thumbnail = get_field('thumbnail');
            		$logo      = get_field('logo');
            		$terms     = custom_get_terms_with_link(get_the_ID(), 'case_study_category');
            		$count++;
            		
            		$output .= '<div class="case-wrapper">';
            			if($thumbnail):
            				$output .= '<div class="thumbnail">';
            					$output .= wp_get_attachment_image($thumbnail, 'full');

            					if($featured):
            						$output .= '<label>featured</label>';
            					endif;

            					if($logo):
            						$output .= '<div class="logo-box">';
            							$output .= wp_get_attachment_image($logo);
            						$output .= '</div>';
            					endif;
            				$output .= '</div>';
            			endif;

            			$output .= '<div class="content">';
            				$output .= '<h4>'. get_the_title() .'</h4>';
            				$output .= '<div class="case-cat-list">'. $terms .'</div>';
            				$output	.= '<a href="'. get_the_permalink() .'" class="readmore"><span>View Case Study</span><span class="arrow-wrap"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"><g id="link_arrow" data-name="link arrow" transform="translate(-115)"><rect id="Rectangle_191" data-name="Rectangle 191" width="24" height="25" transform="translate(115)" fill="#febe0f"/><path id="Path_1009" data-name="Path 1009" d="M1.158,2.924l.688.4.035.02.376.217.376.217.041.024.666.384.046.026.376.217.2.117,1.091.63.211.122.214.124.251.145.288.166.29.167.462.267.376-.217.376-.217.292-.168.169-.1L8.275,5.3l.292-.168.99-.572.223-.129.376-.217.207-.12.476-.275.07-.04.376-.217.376-.217.069-.04.614-.354.069-.04,1.128-.651L12.788,0l-.376.217-.376.217L11.66.651l-.376.217-.376.217-.376.217-.355.205-.1.058-.3.171L9.4,1.954l-.376.217-.376.217-.135.078-.286.165L7.9,2.823l-.376.217-.376.217-.376.217-.376-.217L6.018,3.04l-.376-.217-.376-.217-.376-.217-.376-.217-.375-.216,0,0-.373-.215L3.385,1.52,3.009,1.3l-.376-.217L2.257.869,1.881.651,1.51.437,1.5.43,1.128.217.752,0,0,2.256l1.128.651Z" transform="translate(123.887 18.899) rotate(-90)" fill="#1c283f"/></g></svg></span></a>';
            			$output .= '</div>';
            		$output .= '</div>';
				endif;
			endwhile;
			wp_reset_postdata();
		$output .= '</div>';

		if($count > 6):
			$output .= '<div class="loadmore-button" id="loadmore-case"><a href="javascript:;" class="ct-button">Load More</a></div>';
		endif;
	endif;
	return $output;
}
add_shortcode('case-studies', 'shortcode_casestudy');


/**
 * Shortcode for Case Study CPT
 * 
 * Shortcode is [featured-case-studies]
 **/

function shortcode_feat_casestudy(){
	$case = array('post_type' => 'case-studies', 'posts_per_page' => -1);
	$caseQuery = new WP_Query($case);

	if($caseQuery->have_posts()):
		$output  = '<div class="feat-case-slider">';
			while($caseQuery->have_posts()):$caseQuery->the_post();
				if(get_field('featured') && get_field('visibility')):
            		$thumbnail = get_field('thumbnail');
            		$logo      = get_field('logo');
					$terms     = custom_get_terms_with_link(get_the_ID(), 'case_study_category');

            		$output .= '<div class="case-wrapper">';
            			if($thumbnail):
            				$output .= '<div class="thumbnail">';
            					$output .= wp_get_attachment_image($thumbnail, 'full');

            					if($logo):
            						$output .= '<div class="logo-box">';
            							$output .= wp_get_attachment_image($logo);
            						$output .= '</div>';
            					endif;
            				$output .= '</div>';
            			endif;

            			$output .= '<div class="content">';
            				$output .= '<h4>'. get_the_title() .'</h4>';
            				$output .= '<div class="case-cat-list">'. $terms .'</div>';
            				$output	.= '<a href="'. get_the_permalink() .'" class="readmore"><span>View Case Study</span><span class="arrow-wrap"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"><g id="link_arrow" data-name="link arrow" transform="translate(-115)"><rect id="Rectangle_191" data-name="Rectangle 191" width="24" height="25" transform="translate(115)" fill="#febe0f"/><path id="Path_1009" data-name="Path 1009" d="M1.158,2.924l.688.4.035.02.376.217.376.217.041.024.666.384.046.026.376.217.2.117,1.091.63.211.122.214.124.251.145.288.166.29.167.462.267.376-.217.376-.217.292-.168.169-.1L8.275,5.3l.292-.168.99-.572.223-.129.376-.217.207-.12.476-.275.07-.04.376-.217.376-.217.069-.04.614-.354.069-.04,1.128-.651L12.788,0l-.376.217-.376.217L11.66.651l-.376.217-.376.217-.376.217-.355.205-.1.058-.3.171L9.4,1.954l-.376.217-.376.217-.135.078-.286.165L7.9,2.823l-.376.217-.376.217-.376.217-.376-.217L6.018,3.04l-.376-.217-.376-.217-.376-.217-.376-.217-.375-.216,0,0-.373-.215L3.385,1.52,3.009,1.3l-.376-.217L2.257.869,1.881.651,1.51.437,1.5.43,1.128.217.752,0,0,2.256l1.128.651Z" transform="translate(123.887 18.899) rotate(-90)" fill="#1c283f"/></g></svg></span></a>';
            			$output .= '</div>';
            		$output .= '</div>';
				endif;
			endwhile;
			wp_reset_postdata();
		$output .= '</div>';
	endif;
	return $output;
}
add_shortcode('featured-case-studies', 'shortcode_feat_casestudy');


/**
 * Shortcode for Service CPT
 * 
 * Shortcode is [services]
 **/

function shortcode_services(){
	$service = array('post_type' => 'services', 'posts_per_page' => -1);
	$serviceQuery = new WP_Query($service);

	if($serviceQuery->have_posts()):
		$count = 0;
		$output  = '<div class="case-studies-grid">';
			while($serviceQuery->have_posts()):$serviceQuery->the_post();
            	$thumbnail = get_the_post_thumbnail('', 'ct-services-thumbnail', '');
            	$count++;
            	
            	$output .= '<div class="service-wrapper">';	
            		$output .= '<div class="case-wrapper">';
            			if($thumbnail):
            				$output .= '<div class="thumbnail">';
            					$output .= $thumbnail;
            				$output .= '</div>';
            			endif;

            			$output .= '<div class="content">';
            				$output .= '<h4>'. get_the_title() .'</h4>';
            				$output .= '<p>'. get_the_excerpt() .'</p>';
            				$output	.= '<a href="'. get_the_permalink() .'" class="readmore"><span>Learn More</span><span class="arrow-wrap"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"><g id="link_arrow" data-name="link arrow" transform="translate(-115)"><rect id="Rectangle_191" data-name="Rectangle 191" width="24" height="25" transform="translate(115)" fill="#febe0f"/><path id="Path_1009" data-name="Path 1009" d="M1.158,2.924l.688.4.035.02.376.217.376.217.041.024.666.384.046.026.376.217.2.117,1.091.63.211.122.214.124.251.145.288.166.29.167.462.267.376-.217.376-.217.292-.168.169-.1L8.275,5.3l.292-.168.99-.572.223-.129.376-.217.207-.12.476-.275.07-.04.376-.217.376-.217.069-.04.614-.354.069-.04,1.128-.651L12.788,0l-.376.217-.376.217L11.66.651l-.376.217-.376.217-.376.217-.355.205-.1.058-.3.171L9.4,1.954l-.376.217-.376.217-.135.078-.286.165L7.9,2.823l-.376.217-.376.217-.376.217-.376-.217L6.018,3.04l-.376-.217-.376-.217-.376-.217-.376-.217-.375-.216,0,0-.373-.215L3.385,1.52,3.009,1.3l-.376-.217L2.257.869,1.881.651,1.51.437,1.5.43,1.128.217.752,0,0,2.256l1.128.651Z" transform="translate(123.887 18.899) rotate(-90)" fill="#1c283f"/></g></svg></span></a>';
            			$output .= '</div>';
            		$output .= '</div>';
            	$output .= '</div>';
			endwhile;
			wp_reset_postdata();
		$output .= '</div>';

		if($count > 6):
			$output .= '<div class="loadmore-button" id="loadmore-service"><a href="javascript:;" class="ct-button">Load More</a></div>';
		endif;
	endif;
	return $output;
}
add_shortcode('services', 'shortcode_services');



