<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

function md_custm_error_404_top_content(){

}
add_action( 'medilac_404_page_top', 'md_custm_error_404_top_content' );

/**
 * Actually this is for management shop page 
 * Such: 
 * with side bar, 
 * without sidebar
 * no sidebar
 * 
 * we will handle this based on get var of link
 * 
 * we will use medilac_option filter.
 * 
 * filter loc: lib/top-functions.php
 * function: medilac_option()
 * 
 * ### USED ####
 * apply_filters( 'medilac_option', $theme_mod, $keyword, $post_ID, $sufix );//get_theme_mod( $keyword );
 * apply_filters( 'medilac_option', $cmb2, $keyword, $post_ID, $sufix );
 * 
 */
function md_custom_shop_page_manage_by_get_var( $theme_mod, $keyword, $post_ID, $sufix  ){

    //$post_ID == $shop_page_id && 
    if( $keyword == 'layout_sidebar' && isset( $_GET['layout_sidebar'] ) && ! empty( $_GET['layout_sidebar'] ) ){

        return $_GET['layout_sidebar'];
    }
    
    return $theme_mod;
}
//add_filter( 'medilac_option', 'md_custom_shop_page_manage_by_get_var', 10, 4 );


/**
 * To change shop page's Column for shop page,
 * We will use this filter.
 * 
 * @param type $columns
 * @return Int Number
 */
function md_custom_shop_column_manage_by_get_var( $columns ){
    
    if( isset( $_GET['shop_column'] ) && ! empty( $_GET['shop_column'] ) && is_numeric( $_GET['shop_column'] ) ){
        $col = (int) $_GET['shop_column'];
        return $col;
    }
    
    return $columns;
}
//add_filter( 'loop_shop_columns', 'md_custom_shop_column_manage_by_get_var', 10, 4 );

