<?php
function theme_enqueue_assets() {
	// Google Fonts (Montserrat & Merriweather)
	wp_enqueue_style( 'google-fonts-theme', 'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400&family=Montserrat:wght@400;500;600;700;800&display=swap', array(), null );

	// Swiper CSS for 3D Coverflow Carousel
	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );

	// Theme Stylesheets
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'google-fonts-theme', 'swiper-style' ), '1.0.0' );
	wp_enqueue_style( 'lenis-style', 'https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.css', array(), '1.1.18' );

	// GSAP Core & Plugins
	wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js', array(), '3.15', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js', array( 'gsap' ), '3.15', true );
	wp_enqueue_script( 'gsap-splittext', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/SplitText.min.js', array( 'gsap' ), '3.15', true );
	wp_enqueue_script( 'gsap-drawsvg', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/DrawSVGPlugin.min.js', array( 'gsap' ), '3.15', true );

	// Lenis Smooth Scroll
	wp_enqueue_script( 'lenis', 'https://cdn.jsdelivr.net/npm/lenis@1.3.26/dist/lenis.min.js', array(), '1.3.26', true );

	// Swiper JS for 3D Coverflow
	wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );

	// Iconify Web Component & SVG Framework (https://icon-sets.iconify.design/)
	wp_enqueue_script( 'iconify-icon', 'https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js', array(), '2.1.0', true );
	wp_enqueue_script( 'iconify-framework', 'https://code.iconify.design/3/3.1.1/iconify.min.js', array(), '3.1.1', true );

	// Custom Theme Script (depends on GSAP, Lenis, and Swiper)
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/script.js', array( 'gsap', 'gsap-scrolltrigger', 'gsap-splittext', 'gsap-drawsvg', 'lenis', 'swiper-script' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );
