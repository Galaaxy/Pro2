<?php

/**
 * Template Name: Startseite
 */

get_header();

require_once "inc/mods.php";

global $wpdb;

$args = array(
	'post_type' => 'post',
	'numberposts' => 5
);
$context = [];

$context = Timber::get_context();
$context["post"] = new TimberPost();
$context["mods"] = get_theme_mods();

/**
 * Settings für die Initialisierung der Customizer Mods fürs Frontend
 */
$settingsTeam = [
	"image" => 0,
	"name" => 1,
	"position" => 0
];
$settingsSlider = [
	"image" => 1,
	"title" => 0,
	"subtitle" => 0
];
$settingsGalerie = [
	"image" => 1
];

$settingTeaser = [
	"name" => 0,
	"position" => 0
];

/**
 * @param $mod = team
 * @param $var = team_image_1
 * @param $value = $context["mods"]["team_image_1]
 */

 /*
$team = new mods("team", $settingsTeam, $context["mods"]);
$team->cropImg('teamSmall', 'fewo-thumb', "image");
$team->cropImg('teamBig', 'fewo-big', "image");
$team = $team->getArr();
*/

$slider = new mods("slider", $settingsSlider, $context["mods"]);
$slider->cropImgId('image_cropped','',"image");
$slider = $slider->getArr();

$teaser2 = new mods("teaser",$settingTeaser,$context["mods"]);
$teaser2 = $teaser2->getArr();

$teaser4 = new mods("teaser2",$settingTeaser,$context["mods"]);
$teaser4 = $teaser4->getArr();

/*
$galerie = new mods("galerie", $settingsGalerie, $context["mods"]);
$galerie->cropImg('galSmall', 'thumbnail-crop', "image");
$galerie->cropImg('galBig', 'fewo-big', "image");
$galerie = $galerie->getArr();
*/


$context["beitrag"] = Timber::get_posts($args);
$context["slider"] = $slider;
$context["teaser2"] = $teaser2;
$context["teaser4"] = $teaser4;
if(isset($context["mods"]["slider_speed"]))
	$context["slider_speed"] = $context["mods"]["slider_speed"];
//$context["galerie"] = $galerie;
//$context["team"] = $team;
//if(isset($context["mods"]["team_title"]))
//	$context["team_title"] = $context["mods"]["team_title"];

Timber::render("start.html.twig", $context);

get_footer();