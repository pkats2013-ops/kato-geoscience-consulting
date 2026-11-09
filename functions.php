<?php
/** Theme setup and editable homepage settings. */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kgc_setup() {
	load_theme_textdomain( 'kato-geoscience-consulting', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 280, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => __( 'Primary Menu', 'kato-geoscience-consulting' ) ) );
}
add_action( 'after_setup_theme', 'kgc_setup' );

function kgc_assets() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'kgc-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_script( 'kgc-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'kgc_assets' );

function kgc_customizer( $wp_customize ) {
	$wp_customize->add_section( 'kgc_homepage', array(
		'title'       => __( 'Consulting Homepage', 'kato-geoscience-consulting' ),
		'description' => __( 'Edit the ready-made homepage text and contact details.', 'kato-geoscience-consulting' ),
		'priority'    => 30,
	) );

	$fields = array(
		'hero_eyebrow'     => array( __( 'Hero label', 'kato-geoscience-consulting' ), 'Geology · Geophysics · Groundwater', 'text' ),
		'hero_title'       => array( __( 'Hero heading', 'kato-geoscience-consulting' ), 'Understand the ground. Make better decisions.', 'textarea' ),
		'hero_copy'        => array( __( 'Hero introduction', 'kato-geoscience-consulting' ), 'Independent geological and geophysical consulting for responsible exploration, water resources, infrastructure and land development.', 'textarea' ),
		'intro_title'      => array( __( 'About heading', 'kato-geoscience-consulting' ), 'Clear insight beneath the surface.', 'textarea' ),
		'intro_copy'       => array( __( 'About text', 'kato-geoscience-consulting' ), 'Paul Kato provides practical earth-science advice to help clients understand subsurface conditions, reduce uncertainty and plan their next steps with confidence.', 'textarea' ),
		'intro_note'       => array( __( 'About side note', 'kato-geoscience-consulting' ), 'From early-stage site reviews to integrated field investigations, each assignment is shaped around the project, the evidence and the decisions that need to be made.', 'textarea' ),
		'services_title'   => array( __( 'Services heading', 'kato-geoscience-consulting' ), 'Earth science for real-world projects.', 'textarea' ),
		'services_intro'   => array( __( 'Services introduction', 'kato-geoscience-consulting' ), 'A focused range of consulting support, tailored to site conditions and project objectives.', 'textarea' ),
		'service_1_title'  => array( __( 'Service 1 title', 'kato-geoscience-consulting' ), 'Geological consulting', 'text' ),
		'service_1_copy'   => array( __( 'Service 1 description', 'kato-geoscience-consulting' ), 'Geological mapping, site characterization, lithology and structure interpretation, and exploration planning.', 'textarea' ),
		'service_2_title'  => array( __( 'Service 2 title', 'kato-geoscience-consulting' ), 'Geophysical surveys', 'text' ),
		'service_2_copy'   => array( __( 'Service 2 description', 'kato-geoscience-consulting' ), 'Survey design and interpretation support using appropriate geophysical methods to investigate subsurface targets.', 'textarea' ),
		'service_3_title'  => array( __( 'Service 3 title', 'kato-geoscience-consulting' ), 'Groundwater & site studies', 'text' ),
		'service_3_copy'   => array( __( 'Service 3 description', 'kato-geoscience-consulting' ), 'Hydrogeological assessments, groundwater prospecting support and ground-condition studies for planning.', 'textarea' ),
		'approach_title'   => array( __( 'Approach heading', 'kato-geoscience-consulting' ), 'Evidence-led. Grounded in context.', 'textarea' ),
		'approach_copy'    => array( __( 'Approach introduction', 'kato-geoscience-consulting' ), 'Good consulting connects sound field practice with clear interpretation. The aim is to make technical findings useful to the people responsible for the next decision.', 'textarea' ),
		'approach_1'       => array( __( 'Approach point 1', 'kato-geoscience-consulting' ), 'Start with the site, the question and the available evidence', 'text' ),
		'approach_2'       => array( __( 'Approach point 2', 'kato-geoscience-consulting' ), 'Select practical methods suited to the objectives', 'text' ),
		'approach_3'       => array( __( 'Approach point 3', 'kato-geoscience-consulting' ), 'Explain findings, assumptions and uncertainties clearly', 'text' ),
		'contact_title'    => array( __( 'Contact heading', 'kato-geoscience-consulting' ), 'Have a site or project to discuss?', 'textarea' ),
		'contact_copy'     => array( __( 'Contact introduction', 'kato-geoscience-consulting' ), 'Get in touch to outline your objectives, location and timeline. We can discuss the right next steps for your project.', 'textarea' ),
		'contact_email'    => array( __( 'Contact email', 'kato-geoscience-consulting' ), 'pkats2013@gmail.com', 'email' ),
		'whatsapp_1'       => array( __( 'WhatsApp number 1', 'kato-geoscience-consulting' ), '+256705445619', 'text' ),
		'whatsapp_2'       => array( __( 'WhatsApp number 2', 'kato-geoscience-consulting' ), '+393522057575', 'text' ),
		'contact_location' => array( __( 'Location / address note', 'kato-geoscience-consulting' ), 'Available for consulting enquiries. Add your office address or service area here.', 'textarea' ),
	);

	foreach ( $fields as $key => $field ) {
		$setting = 'kgc_' . $key;
		$wp_customize->add_setting( $setting, array(
			'default'           => $field[1],
			'sanitize_callback' => 'email' === $field[2] ? 'sanitize_email' : ( 'textarea' === $field[2] ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
		) );
		$wp_customize->add_control( $setting, array(
			'label'   => $field[0],
			'section' => 'kgc_homepage',
			'type'    => $field[2],
		) );
	}
}
add_action( 'customize_register', 'kgc_customizer' );

/** Get a homepage setting, falling back to its starter copy. */
function kgc_text( $key ) {
	$defaults = array(
		'hero_eyebrow' => 'Geology · Geophysics · Groundwater',
		'hero_title' => 'Understand the ground. Make better decisions.',
		'hero_copy' => 'Independent geological and geophysical consulting for responsible exploration, water resources, infrastructure and land development.',
		'intro_title' => 'Clear insight beneath the surface.',
		'intro_copy' => 'Paul Kato provides practical earth-science advice to help clients understand subsurface conditions, reduce uncertainty and plan their next steps with confidence.',
		'intro_note' => 'From early-stage site reviews to integrated field investigations, each assignment is shaped around the project, the evidence and the decisions that need to be made.',
		'services_title' => 'Earth science for real-world projects.',
		'services_intro' => 'A focused range of consulting support, tailored to site conditions and project objectives.',
		'service_1_title' => 'Geological consulting', 'service_1_copy' => 'Geological mapping, site characterization, lithology and structure interpretation, and exploration planning.',
		'service_2_title' => 'Geophysical surveys', 'service_2_copy' => 'Survey design and interpretation support using appropriate geophysical methods to investigate subsurface targets.',
		'service_3_title' => 'Groundwater & site studies', 'service_3_copy' => 'Hydrogeological assessments, groundwater prospecting support and ground-condition studies for planning.',
		'approach_title' => 'Evidence-led. Grounded in context.',
		'approach_copy' => 'Good consulting connects sound field practice with clear interpretation. The aim is to make technical findings useful to the people responsible for the next decision.',
		'approach_1' => 'Start with the site, the question and the available evidence', 'approach_2' => 'Select practical methods suited to the objectives', 'approach_3' => 'Explain findings, assumptions and uncertainties clearly',
		'contact_title' => 'Have a site or project to discuss?',
		'contact_copy' => 'Get in touch to outline your objectives, location and timeline. We can discuss the right next steps for your project.',
		'contact_email' => 'pkats2013@gmail.com', 'whatsapp_1' => '+256705445619', 'whatsapp_2' => '+393522057575',
		'contact_location' => 'Available for consulting enquiries. Add your office address or service area here.',
	);
	return get_theme_mod( 'kgc_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

function kgc_whatsapp_url( $number ) {
	return 'https://wa.me/' . preg_replace( '/\D+/', '', $number );
}
