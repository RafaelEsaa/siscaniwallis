<?php
// include the css file
$cssFilePath = glob( get_template_directory() . '/css/build/main.min.css' );
$cssFileURI = get_template_directory_uri() . '/css/build/' . basename($cssFilePath[0]);
wp_enqueue_style( 'site_main_css', $cssFileURI );

// include the javascript file
$jsFilePath = glob( get_template_directory() . '/js/build/app-js.js' );
$jsFileURI = get_template_directory_uri() . '/js/build/' . basename($jsFilePath[0]);
wp_enqueue_script('site_main_js', $jsFileURI, null, null, true);

// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');
register_nav_menu('bottom', 'Bottom menu');

//Upload Image Logo
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

add_theme_support( 'custom-logo' );

//Create CPT
// Create post por codigo
require __DIR__ . '/vendor/autoload.php';
use PostTypes\PostType;

//Mason Grid
$masonGrid = new PostType('Mason Grid');
$masonGrid->labels(['add_new_item' => __('Add new Image')]);
$masonGrid->register();

//Social Media
$socialNetwork = new PostType('Social Network');
$socialNetwork->labels(['add_new_item' => __('Add new social network')]);
$socialNetwork->register();

//Carousel
$carousel = new PostType('Carousel');
$carousel->labels(['add_new_item' => __('Add new item carousel')]);
$carousel->register();