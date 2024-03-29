<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}
$context = Timber::get_context();

$args = array(
    // Get post type project
    'post_type' => 'post',
    // Get all posts
    'posts_per_page' => -1,
    // Order by post date
    'orderby' => array(
        'date' => 'DESC'
    ));

// If we are on the home page, add a few other templates to our hierarchy.
$templates = array( 'index.twig' );
$posts = Timber::get_posts( $args );
// $context['posts'] = $posts;
// $context['posts_number'] = count($posts);
$context['options'] = get_fields('options');

Timber::render( $templates, $context);
