<?php

/**
 * Template Name: Beiträge
 */

get_header();


/**
 * Has the Page a Passwort? NO? Go this way
 */
if ( ! post_password_required() ) {
	
	$context = renderPage();

	
	Timber::render("page-category.html.twig", $context);

/**
 * The Page has a Passwort? Yes? Go this way
 */
}else if ( post_password_required() ){
	
	$context = renderPage();

	$context["post"]->content    = get_the_password_form();
	Timber::render("page-category.html.twig", $context);
}

/**
 * Standard pageRender function gets the information and put them in Array to overgive them to the Template
 */
function renderPage(){

	$args = array(
		'post_type' => 'post'
	);

	$context = Timber::get_context();
	$context['post'] = new Timber\PostQuery();
	$context['beitrag'] = Timber::get_posts($args);

	return $context;
}




get_footer();
