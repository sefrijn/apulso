<?php
	add_theme_support( 'post-thumbnails' );

	add_action( 'init', 'register_my_menus' );

	add_image_size( 'news-thumb', 300, 300, true ); // (cropped)	

	function register_my_menus() {
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu' ),
				'footer_menu' => __( 'Footer Menu')
				)
			);
	}

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

add_filter('the_content', 'filter_ptags_on_images');	
?>