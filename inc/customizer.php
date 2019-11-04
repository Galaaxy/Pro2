<?php

include_once "customizer_class.php";

function hauboldmedia_customizer_settings($wp_customize) {

    /**
	 * ================================
	 * ## Additional Functions / Extends
	 * ================================
	 */
	class pro_info extends WP_Customize_Control {
		public $type = 'info';
		public $label = '';
		public function render_content() {
			?>
            <h3 style="margin-top:30px;border:1px solid;padding:5px;color:#58719E;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
			<?php
		}
	}

	/**
	 * ================================
	 * ## Options
	 * ================================
	 */

	/**
	 * Wieviele Teammitglieder im Customizer angezeigt werden sollen
	 */
	$anzahlTeam     = 6;
	$anzahlGalerie  = 8;
	$anzahlSlider   = 6;
	$anzahlTeaser 	= 2;
	$anzahl4erTeaser = 4;

	/**
	 * prioritys | Reihenfolge der Customizer Module
	 */
	$sliderPrio     = 120;
	$galeriePrio    = 125;
	$teamPrio       = 130;
	$teaserPrio		= 135;
	$teaser4Prio	= 140;

	/**
	 * ================================
	 * ## Initialisiere Module
	 * ================================
	 */

	/**
	 * Create Slider Module
	 */
	$slider = new customizer_class();
	$slider->slider_module($wp_customize, $anzahlSlider, $sliderPrio, 1920, 700);

	/**
	 * Create Galerie Module
	 */
	/*
    $galerie = new customizer_class();
    $galerie->galerie_module($wp_customize, $anzahlGalerie, $galeriePrio);
*/
    /**
     * Create Team Module
     */
	/*
    $team = new customizer_class();
	$team->team_module($wp_customize, $anzahlTeam, $teamPrio);
	*/
	
    /**
     * Create Teaser Module
     */
    //$team = new customizer_class();
    //$team->teaser_module($wp_customize, $anzahlTeaser, $teaserPrio);

	// 4-er Teaser
	$team = new customizer_class();
    $team->teaser_module_2($wp_customize, $anzahl4erTeaser, $teaser4Prio);
}
add_action('customize_register', 'hauboldmedia_customizer_settings');

