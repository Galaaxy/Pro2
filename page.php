<?php

get_header();

require_once "inc/mods.php";

/**
 * Has the Page a Passwort? NO? Go this way
 */
if ( ! post_password_required() ) {
	
	$context = renderPage();

	
	Timber::render("page.html.twig", $context);

/**
 * The Page has a Passwort? Yes? Go this way
 */
}else if ( post_password_required() ){
	
	$context = renderPage();

	$context["post"]->content    = get_the_password_form();
	Timber::render("page.html.twig", $context);
}

/**
 * Standard pageRender function gets the information and put them in Array to overgive them to the Template
 */
function renderPage(){
	
	$context = [];

	$context = Timber::get_context();
	$context['post'] = new TimberPost();
	$context["mods"] = get_theme_mods();
	
	$settingsSlider = [
		"image" => 1,
		"title" => 0,
		"subtitle" => 0
	];

	$slider = new mods("slider", $settingsSlider, $context["mods"]);
	$slider->cropImgId('image_cropped','',"image");
	$slider = $slider->getArr();

	$context["slider"] = $slider;

	if(isset($context["mods"]["slider_speed"]))
		$context["slider_speed"] = $context["mods"]["slider_speed"];

	return $context;
}




get_footer();
