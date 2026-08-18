<?php
/**
 * B.D. Somani International School Theme Functions
 *
 * @package BD_Somani
 */

// 1. Theme Setup & Supports
function theme_setup_features() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'theme_setup_features' );

// Enable SVG Upload Support in WordPress Media Library
function theme_enable_svg_uploads( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'theme_enable_svg_uploads' );

function theme_fix_svg_filetype( $data, $file, $filename, $mimes ) {
	$ext = pathinfo( $filename, PATHINFO_EXTENSION );
	if ( 'svg' === strtolower( $ext ) ) {
		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}
	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'theme_fix_svg_filetype', 10, 4 );

// 2. Resource Hints for Faster Font Loading
function theme_resource_hints( $urls, $relation_type ) {
	if ( wp_dependencies_unique_hosts() && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'theme_resource_hints', 10, 2 );

// 3. Enqueue Styles and Scripts
function theme_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$css_file      = get_template_directory() . '/style.css';
	$js_file       = get_template_directory() . '/assets/script.js';

	$css_ver = file_exists( $css_file ) ? filemtime( $css_file ) : $theme_version;
	$js_ver  = file_exists( $js_file ) ? filemtime( $js_file ) : $theme_version;

	// Google Fonts (Montserrat & Merriweather)
	wp_enqueue_style( 'google-fonts-theme', 'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400&family=Montserrat:wght@400;500;600;700;800&display=swap', array(), null );

	// Swiper CSS for 3D Coverflow Carousel
	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );

	// Theme Stylesheet
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'google-fonts-theme', 'swiper-style' ), $css_ver );
	wp_enqueue_style( 'lenis-style', 'https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.css', array(), '1.1.18' );

	// GSAP Core & Plugins
	wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js', array(), '3.15', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js', array( 'gsap' ), '3.15', true );
	wp_enqueue_script( 'gsap-drawsvg', 'https://cdn.jsdelivr.net/npm/gsap@3.15/dist/DrawSVGPlugin.min.js', array( 'gsap' ), '3.15', true );

	// Lenis Smooth Scroll
	wp_enqueue_script( 'lenis', 'https://cdn.jsdelivr.net/npm/lenis@1.3.26/dist/lenis.min.js', array(), '1.3.26', true );

	// Swiper JS for 3D Coverflow
	wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );

	// Iconify Web Component (https://icon-sets.iconify.design/)
	wp_enqueue_script( 'iconify-icon', 'https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js', array(), '2.1.0', true );

	// Custom Theme Script (depends on GSAP, Lenis, and Swiper)
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/script.js', array( 'gsap', 'gsap-scrolltrigger', 'gsap-drawsvg', 'lenis', 'swiper-script' ), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );

// 4. Register Gallery Custom Post Type & Taxonomy
function theme_register_gallery_cpt() {
	// Register Taxonomy: Gallery Category
	$tax_labels = array(
		'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'bd-somani' ),
		'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'bd-somani' ),
		'search_items'      => __( 'Search Gallery Categories', 'bd-somani' ),
		'all_items'         => __( 'All Gallery Categories', 'bd-somani' ),
		'parent_item'       => __( 'Parent Gallery Category', 'bd-somani' ),
		'parent_item_colon' => __( 'Parent Gallery Category:', 'bd-somani' ),
		'edit_item'         => __( 'Edit Gallery Category', 'bd-somani' ),
		'update_item'       => __( 'Update Gallery Category', 'bd-somani' ),
		'add_new_item'      => __( 'Add New Gallery Category', 'bd-somani' ),
		'new_item_name'     => __( 'New Gallery Category Name', 'bd-somani' ),
		'menu_name'         => __( 'Categories', 'bd-somani' ),
	);

	$tax_args = array(
		'hierarchical'      => true,
		'labels'            => $tax_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery-category' ),
		'show_in_rest'      => true,
	);

	register_taxonomy( 'gallery_category', array( 'gallery' ), $tax_args );

	// Register Custom Post Type: Gallery
	$cpt_labels = array(
		'name'               => _x( 'Gallery', 'post type general name', 'bd-somani' ),
		'singular_name'      => _x( 'Gallery Item', 'post type singular name', 'bd-somani' ),
		'menu_name'          => _x( 'Gallery', 'admin menu', 'bd-somani' ),
		'name_admin_bar'     => _x( 'Gallery Item', 'add new on admin bar', 'bd-somani' ),
		'add_new'            => _x( 'Add New', 'gallery item', 'bd-somani' ),
		'add_new_item'       => __( 'Add New Gallery Item', 'bd-somani' ),
		'new_item'           => __( 'New Gallery Item', 'bd-somani' ),
		'edit_item'          => __( 'Edit Gallery Item', 'bd-somani' ),
		'view_item'          => __( 'View Gallery Item', 'bd-somani' ),
		'all_items'          => __( 'All Gallery Items', 'bd-somani' ),
		'search_items'       => __( 'Search Gallery Items', 'bd-somani' ),
		'parent_item_colon'  => __( 'Parent Gallery Items:', 'bd-somani' ),
		'not_found'          => __( 'No gallery items found.', 'bd-somani' ),
		'not_found_in_trash' => __( 'No gallery items found in Trash.', 'bd-somani' ),
	);

	$cpt_args = array(
		'labels'             => $cpt_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gallery-item' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'thumbnail' ),
		'show_in_rest'       => false,
	);

	register_post_type( 'gallery', $cpt_args );
}
add_action( 'init', 'theme_register_gallery_cpt' );



// 6. Add Custom Metaboxes for Academics Sub-Page Hero & Programme Sections
function theme_add_academics_metaboxes( $post_type, $post = null ) {
	if ( 'page' === $post_type && $post ) {
		$template = get_page_template_slug( $post->ID );
		// Only register metaboxes for Pages if page_template is page-academics.php
		if ( 'page-academics.php' !== $template && false === strpos( (string) $template, 'academics' ) ) {
			return;
		}
	}

	add_meta_box(
		'bds_academics_hero_mb',
		__( 'Academics Sub-Page Hero Section Settings', 'bd-somani' ),
		'theme_academics_hero_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_programme_mb',
		__( 'Academics Programme / Overview Section Settings', 'bd-somani' ),
		'theme_academics_programme_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_approach_mb',
		__( 'Academics Sticky Approach / Cards Section Settings', 'bd-somani' ),
		'theme_academics_approach_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_experiences_mb',
		__( 'Academics Experiences Section Settings', 'bd-somani' ),
		'theme_academics_experiences_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_cornerstones_mb',
		__( 'Academics Cornerstones Section Settings', 'bd-somani' ),
		'theme_academics_cornerstones_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_care_mb',
		__( 'Academics Circle of Care & Communication Section Settings', 'bd-somani' ),
		'theme_academics_care_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_interest_mb',
		__( 'Academics After-School / Co-Curricular Section Settings', 'bd-somani' ),
		'theme_academics_interest_metabox_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'bds_academics_potential_mb',
		__( 'Academics Potential Banner / Video Section Settings', 'bd-somani' ),
		'theme_academics_potential_metabox_callback',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'theme_add_academics_metaboxes', 10, 2 );

function theme_academics_potential_metabox_callback( $post ) {
	$visibility = metadata_exists( 'post', $post->ID, '_bds_academics_potential_visibility' ) ? get_post_meta( $post->ID, '_bds_academics_potential_visibility', true ) : 'show';
	$title      = metadata_exists( 'post', $post->ID, '_bds_academics_potential_title' ) ? get_post_meta( $post->ID, '_bds_academics_potential_title', true ) : __( 'A Place to Discover Your Superpower', 'bd-somani' );
	$desc       = metadata_exists( 'post', $post->ID, '_bds_academics_potential_desc' ) ? get_post_meta( $post->ID, '_bds_academics_potential_desc', true ) : __( 'Every student brings unique strengths. Our campus gives them the opportunities to explore, develop, and let those strengths shine.', 'bd-somani' );
	$video_url  = metadata_exists( 'post', $post->ID, '_bds_academics_potential_video' ) ? get_post_meta( $post->ID, '_bds_academics_potential_video', true ) : '';
	?>
	<div id="bds-academics-potential-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<div>
			<label for="bds_academics_potential_visibility" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Visibility', 'bd-somani' ); ?></label>
			<select id="bds_academics_potential_visibility" name="bds_academics_potential_visibility">
				<option value="show" <?php selected( $visibility, 'show' ); ?>><?php esc_html_e( 'Show Section', 'bd-somani' ); ?></option>
				<option value="hide" <?php selected( $visibility, 'hide' ); ?>><?php esc_html_e( 'Hide Section', 'bd-somani' ); ?></option>
			</select>
		</div>

		<div>
			<label for="bds_academics_potential_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Banner Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_potential_title" name="bds_academics_potential_title" value="<?php echo esc_attr( $title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_academics_potential_desc" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Banner Description', 'bd-somani' ); ?></label>
			<textarea id="bds_academics_potential_desc" name="bds_academics_potential_desc" rows="3" class="large-text"><?php echo esc_textarea( $desc ); ?></textarea>
		</div>

		<div>
			<label for="bds_academics_potential_video" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Banner Video File URL (MP4 / WebM)', 'bd-somani' ); ?></label>
			<div style="display: flex; gap: 10px; align-items: center;">
				<input type="text" id="bds_academics_potential_video" name="bds_academics_potential_video" value="<?php echo esc_attr( $video_url ); ?>" class="large-text" placeholder="https://... or upload from media library">
				<button type="button" class="button button-secondary" id="bds-upload-potential-video-btn"><?php esc_html_e( 'Select / Upload Video', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-potential-video-btn" style="<?php echo $video_url ? '' : 'display:none;'; ?>"><?php esc_html_e( 'Remove', 'bd-somani' ); ?></button>
			</div>
			<span class="description"><?php esc_html_e( 'Leave empty to use default theme video (A2.webm).', 'bd-somani' ); ?></span>
		</div>
	</div>
	<?php
}

// Add Careers Page Metabox
function theme_add_careers_metaboxes() {
	add_meta_box(
		'bds_careers_hero_mb',
		__( 'Careers Page Settings & HR Details', 'bd-somani' ),
		'theme_careers_hero_metabox_callback',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'theme_add_careers_metaboxes' );

function theme_careers_hero_metabox_callback( $post ) {
	wp_nonce_field( 'theme_save_careers', 'theme_careers_nonce' );

	$title    = metadata_exists( 'post', $post->ID, '_bds_careers_hero_title' ) ? get_post_meta( $post->ID, '_bds_careers_hero_title', true ) : __( 'Join Our Team of Educator Pioneers', 'bd-somani' );
	$sub      = metadata_exists( 'post', $post->ID, '_bds_careers_hero_subtitle' ) ? get_post_meta( $post->ID, '_bds_careers_hero_subtitle', true ) : __( 'At B.D. Somani International School, our educators embody a unique blend of compassion, creativity, and enthusiasm. With open minds and a commitment to lifelong learning, they serve as facilitators, encouraging inquiry and exploration in the classroom.', 'bd-somani' );
	$hr_email = metadata_exists( 'post', $post->ID, '_bds_careers_hr_email' ) ? get_post_meta( $post->ID, '_bds_careers_hr_email', true ) : 'hr@bdsiskharghar.org';
	$hr_phone = metadata_exists( 'post', $post->ID, '_bds_careers_hr_phone' ) ? get_post_meta( $post->ID, '_bds_careers_hr_phone', true ) : '+91 86577 97826';
	$location = metadata_exists( 'post', $post->ID, '_bds_careers_location' ) ? get_post_meta( $post->ID, '_bds_careers_location', true ) : __( 'B.D. Somani International School, Plot No. 92, Ranjanpada, Sector 27, Kharghar', 'bd-somani' );
	?>
	<div id="bds-careers-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<div>
			<label for="bds_careers_hero_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Careers Hero Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_careers_hero_title" name="bds_careers_hero_title" value="<?php echo esc_attr( $title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_careers_hero_subtitle" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Introductory Letter / Description', 'bd-somani' ); ?></label>
			<textarea id="bds_careers_hero_subtitle" name="bds_careers_hero_subtitle" rows="3" class="large-text"><?php echo esc_textarea( $sub ); ?></textarea>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 5px;">
		<h4 style="margin: 0;"><?php esc_html_e( 'HR Contact & Location Details', 'bd-somani' ); ?></h4>

		<div style="display: flex; gap: 20px; flex-wrap: wrap;">
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_careers_hr_email" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'HR Email Address', 'bd-somani' ); ?></label>
				<input type="email" id="bds_careers_hr_email" name="bds_careers_hr_email" value="<?php echo esc_attr( $hr_email ); ?>" class="regular-text">
			</div>
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_careers_hr_phone" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'HR Phone Number', 'bd-somani' ); ?></label>
				<input type="text" id="bds_careers_hr_phone" name="bds_careers_hr_phone" value="<?php echo esc_attr( $hr_phone ); ?>" class="regular-text">
			</div>
		</div>

		<div>
			<label for="bds_careers_location" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'School Location Address', 'bd-somani' ); ?></label>
			<input type="text" id="bds_careers_location" name="bds_careers_location" value="<?php echo esc_attr( $location ); ?>" class="large-text">
		</div>
	</div>
	<?php
}

function theme_save_careers_meta( $post_id ) {
	if ( ! isset( $_POST['theme_careers_nonce'] ) || ! wp_verify_nonce( $_POST['theme_careers_nonce'], 'theme_save_careers' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'bds_careers_hero_title'    => '_bds_careers_hero_title',
		'bds_careers_hero_subtitle' => '_bds_careers_hero_subtitle',
		'bds_careers_hr_email'      => '_bds_careers_hr_email',
		'bds_careers_hr_phone'      => '_bds_careers_hr_phone',
		'bds_careers_location'      => '_bds_careers_location',
	);

	foreach ( $fields as $post_key => $meta_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			if ( 'bds_careers_hero_subtitle' === $post_key ) {
				update_post_meta( $post_id, $meta_key, sanitize_textarea_field( $_POST[ $post_key ] ) );
			} elseif ( 'bds_careers_hr_email' === $post_key ) {
				update_post_meta( $post_id, $meta_key, sanitize_email( $_POST[ $post_key ] ) );
			} else {
				update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
			}
		}
	}
}
add_action( 'save_post', 'theme_save_careers_meta' );

// Remove default block editor when editing a page using Academics Sub Page template
function theme_remove_editor_for_academics_template() {
	if ( isset( $_GET['post'] ) ) {
		$post_id  = intval( $_GET['post'] );
		$template = get_page_template_slug( $post_id );
		if ( 'page-academics.php' === $template ) {
			remove_post_type_support( 'page', 'editor' );
		}
	}
}
add_action( 'admin_init', 'theme_remove_editor_for_academics_template' );

function theme_academics_hero_metabox_callback( $post ) {
	wp_nonce_field( 'theme_save_academics_hero', 'theme_academics_hero_nonce' );

	$breadcrumb = get_post_meta( $post->ID, '_bds_academics_breadcrumb', true );
	if ( metadata_exists( 'post', $post->ID, '_bds_academics_hero_title' ) ) {
		$hero_title = get_post_meta( $post->ID, '_bds_academics_hero_title', true );
	} else {
		$hero_title = __( 'A Safe Space to Learn, Play and Grow', 'bd-somani' );
	}

	if ( metadata_exists( 'post', $post->ID, '_bds_academics_hero_subtitle' ) ) {
		$hero_subtitle = get_post_meta( $post->ID, '_bds_academics_hero_subtitle', true );
	} else {
		$hero_subtitle = __( 'A nurturing environment where children feel safe, explore with confidence, and discover the joy of learning through meaningful everyday experiences.', 'bd-somani' );
	}

	if ( metadata_exists( 'post', $post->ID, '_bds_academics_cta_text' ) ) {
		$cta_text = get_post_meta( $post->ID, '_bds_academics_cta_text', true );
	} else {
		$cta_text = __( 'ENQUIRE ABOUT DAYCARE', 'bd-somani' );
	}

	$cta_url       = get_post_meta( $post->ID, '_bds_academics_cta_url', true );
	$main_img_id   = get_post_meta( $post->ID, '_bds_academics_main_img_id', true );
	$sub_img_id    = get_post_meta( $post->ID, '_bds_academics_sub_img_id', true );

	if ( empty( $breadcrumb ) ) {
		$breadcrumb = 'Academics / Daycare';
	}
	if ( empty( $cta_url ) ) {
		$cta_url = '#';
	}

	$top_marquee_vis    = metadata_exists( 'post', $post->ID, '_bds_academics_top_marquee_visibility' ) ? get_post_meta( $post->ID, '_bds_academics_top_marquee_visibility', true ) : 'show';
	$bottom_marquee_vis = metadata_exists( 'post', $post->ID, '_bds_academics_bottom_marquee_visibility' ) ? get_post_meta( $post->ID, '_bds_academics_bottom_marquee_visibility', true ) : 'show';

	$main_thumb = $main_img_id ? wp_get_attachment_image_url( $main_img_id, 'medium' ) : '';
	$sub_thumb  = $sub_img_id ? wp_get_attachment_image_url( $sub_img_id, 'thumbnail' ) : '';
	?>
	<div id="bds-academics-hero-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<div>
			<label for="bds_academics_breadcrumb" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Breadcrumb Sub-Path', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_breadcrumb" name="bds_academics_breadcrumb" value="<?php echo esc_attr( $breadcrumb ); ?>" class="large-text" placeholder="Academics / Daycare">
			<span class="description"><?php esc_html_e( 'Appears next to the Home icon in the sub-page breadcrumbs (e.g. Academics / Daycare)', 'bd-somani' ); ?></span>
		</div>

		<div>
			<label for="bds_academics_hero_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Hero Main Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_hero_title" name="bds_academics_hero_title" value="<?php echo esc_attr( $hero_title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_academics_hero_subtitle" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Hero Description / Paragraph', 'bd-somani' ); ?></label>
			<textarea id="bds_academics_hero_subtitle" name="bds_academics_hero_subtitle" rows="3" class="large-text"><?php echo esc_textarea( $hero_subtitle ); ?></textarea>
		</div>

		<div style="display: flex; gap: 20px; flex-wrap: wrap;">
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_academics_cta_text" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'CTA Button Text', 'bd-somani' ); ?></label>
				<input type="text" id="bds_academics_cta_text" name="bds_academics_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" class="regular-text">
			</div>
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_academics_cta_url" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'CTA Button URL / Link', 'bd-somani' ); ?></label>
				<input type="text" id="bds_academics_cta_url" name="bds_academics_cta_url" value="<?php echo esc_attr( $cta_url ); ?>" class="regular-text" placeholder="#">
			</div>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 10px;">

		<div style="display: flex; gap: 30px; flex-wrap: wrap;">
			<!-- Main Image -->
			<div style="flex: 1; min-width: 280px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Main Hero Photo (Large Right Photo)', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_main_img_id" id="bds_academics_main_img_id" value="<?php echo esc_attr( $main_img_id ); ?>">
				<div id="bds-main-img-preview" style="margin-bottom: 12px; min-height: 120px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $main_thumb ) : ?>
						<img src="<?php echo esc_url( $main_thumb ); ?>" style="max-width: 100%; max-height: 180px; object-fit: cover;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'No Main Image Selected (Placeholder will be shown on frontend)', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-main-img-btn"><?php esc_html_e( 'Select Main Photo', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-main-img-btn" style="<?php echo $main_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Image', 'bd-somani' ); ?></button>
			</div>

			<!-- Sub Image -->
			<div style="flex: 1; min-width: 280px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Secondary Overlapping Photo (Bottom-Left Small Photo)', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_sub_img_id" id="bds_academics_sub_img_id" value="<?php echo esc_attr( $sub_img_id ); ?>">
				<div id="bds-sub-img-preview" style="margin-bottom: 12px; min-height: 120px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $sub_thumb ) : ?>
						<img src="<?php echo esc_url( $sub_thumb ); ?>" style="max-width: 100%; max-height: 180px; object-fit: cover;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'No Secondary Image Selected (Placeholder will be shown on frontend)', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-sub-img-btn"><?php esc_html_e( 'Select Secondary Photo', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-sub-img-btn" style="<?php echo $sub_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Image', 'bd-somani' ); ?></button>
			</div>
		</div>

		<!-- Marquee Visibility Toggles -->
		<div style="background: #f4f6f9; padding: 15px; border: 1px solid #ccd0d4; border-radius: 8px; margin-top: 5px;">
			<h4 style="margin: 0 0 12px 0; color: #1d2327;"><?php esc_html_e( 'Brand Marquee Scrolling Banner Options', 'bd-somani' ); ?></h4>
			<div style="display: flex; gap: 30px; flex-wrap: wrap;">
				<div>
					<label for="bds_academics_bottom_marquee_visibility" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Bottom Marquee (Above Footer)', 'bd-somani' ); ?></label>
					<select id="bds_academics_bottom_marquee_visibility" name="bds_academics_bottom_marquee_visibility" style="font-weight: 600; padding: 4px 10px;">
						<option value="show" <?php selected( $bottom_marquee_vis, 'show' ); ?>><?php esc_html_e( 'Show Bottom Marquee Banner', 'bd-somani' ); ?></option>
						<option value="hide" <?php selected( $bottom_marquee_vis, 'hide' ); ?>><?php esc_html_e( 'Hide Bottom Marquee Banner', 'bd-somani' ); ?></option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<?php
}

function theme_academics_programme_metabox_callback( $post ) {
	$tagline   = metadata_exists( 'post', $post->ID, '_bds_academics_overview_tagline' ) ? get_post_meta( $post->ID, '_bds_academics_overview_tagline', true ) : __( 'Daycare at B.D. Somani International School, Kharghar', 'bd-somani' );
	$title     = metadata_exists( 'post', $post->ID, '_bds_academics_overview_title' ) ? get_post_meta( $post->ID, '_bds_academics_overview_title', true ) : __( 'A Programme Rooted in Caring and Learning', 'bd-somani' );
	$desc      = metadata_exists( 'post', $post->ID, '_bds_academics_overview_desc' ) ? get_post_meta( $post->ID, '_bds_academics_overview_desc', true ) : __( 'A warm and nurturing environment where children feel safe, build confidence, and begin their learning journey through play, care, and meaningful everyday experiences.', 'bd-somani' );
	$pdf_label = metadata_exists( 'post', $post->ID, '_bds_academics_overview_pdf_label' ) ? get_post_meta( $post->ID, '_bds_academics_overview_pdf_label', true ) : __( 'Download Day Care Programme Overview', 'bd-somani' );
	$pdf_url   = metadata_exists( 'post', $post->ID, '_bds_academics_overview_pdf_url' ) ? get_post_meta( $post->ID, '_bds_academics_overview_pdf_url', true ) : '#';

	$left_img_id       = get_post_meta( $post->ID, '_bds_academics_overview_img_left', true );
	$right_img_id      = get_post_meta( $post->ID, '_bds_academics_overview_img_right', true );
	$annotation_svg_id = get_post_meta( $post->ID, '_bds_academics_overview_annotation_svg', true );

	$left_thumb       = $left_img_id ? wp_get_attachment_image_url( $left_img_id, 'medium' ) : '';
	$right_thumb      = $right_img_id ? wp_get_attachment_image_url( $right_img_id, 'medium' ) : '';
	$annotation_thumb = $annotation_svg_id ? wp_get_attachment_image_url( $annotation_svg_id, 'medium' ) : '';
	?>
	<div id="bds-academics-programme-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<p class="description"><?php esc_html_e( 'Configure the Programme / Overview section content. Leave all fields empty if you wish to hide this section entirely from the frontend.', 'bd-somani' ); ?></p>

		<div>
			<label for="bds_academics_overview_tagline" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Tagline / Small Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_overview_tagline" name="bds_academics_overview_tagline" value="<?php echo esc_attr( $tagline ); ?>" class="large-text">
		</div>

		<div>
			<label for="bds_academics_overview_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Main Heading / Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_overview_title" name="bds_academics_overview_title" value="<?php echo esc_attr( $title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_academics_overview_desc" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Description Paragraph', 'bd-somani' ); ?></label>
			<textarea id="bds_academics_overview_desc" name="bds_academics_overview_desc" rows="3" class="large-text"><?php echo esc_textarea( $desc ); ?></textarea>
		</div>

		<div style="display: flex; gap: 20px; flex-wrap: wrap;">
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_academics_overview_pdf_label" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'PDF Button Label', 'bd-somani' ); ?></label>
				<input type="text" id="bds_academics_overview_pdf_label" name="bds_academics_overview_pdf_label" value="<?php echo esc_attr( $pdf_label ); ?>" class="regular-text">
			</div>
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_academics_overview_pdf_url" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'PDF Download File URL / Link', 'bd-somani' ); ?></label>
				<input type="text" id="bds_academics_overview_pdf_url" name="bds_academics_overview_pdf_url" value="<?php echo esc_attr( $pdf_url ); ?>" class="regular-text" placeholder="https://example.com/file.pdf">
			</div>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 10px;">

		<div style="display: flex; gap: 20px; flex-wrap: wrap;">
			<!-- Left Image -->
			<div style="flex: 1; min-width: 250px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Left Tilted Photo', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_overview_img_left" id="bds_academics_overview_img_left" value="<?php echo esc_attr( $left_img_id ); ?>">
				<div id="bds-left-img-preview" style="margin-bottom: 12px; min-height: 100px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $left_thumb ) : ?>
						<img src="<?php echo esc_url( $left_thumb ); ?>" style="max-width: 100%; max-height: 140px; object-fit: cover;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'No Left Photo Selected', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-left-img-btn"><?php esc_html_e( 'Select Left Photo', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-left-img-btn" style="<?php echo $left_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Image', 'bd-somani' ); ?></button>
			</div>

			<!-- Right Image -->
			<div style="flex: 1; min-width: 250px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Right Tilted Photo', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_overview_img_right" id="bds_academics_overview_img_right" value="<?php echo esc_attr( $right_img_id ); ?>">
				<div id="bds-right-img-preview" style="margin-bottom: 12px; min-height: 100px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $right_thumb ) : ?>
						<img src="<?php echo esc_url( $right_thumb ); ?>" style="max-width: 100%; max-height: 140px; object-fit: cover;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'No Right Photo Selected', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-right-img-btn"><?php esc_html_e( 'Select Right Photo', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-right-img-btn" style="<?php echo $right_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Image', 'bd-somani' ); ?></button>
			</div>

			<!-- Annotation Graphic / SVG -->
			<div style="flex: 1; min-width: 250px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Annotation SVG / Graphic Upload', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_overview_annotation_svg" id="bds_academics_overview_annotation_svg" value="<?php echo esc_attr( $annotation_svg_id ); ?>">
				<div id="bds-annotation-svg-preview" style="margin-bottom: 12px; min-height: 100px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $annotation_thumb ) : ?>
						<img src="<?php echo esc_url( $annotation_thumb ); ?>" style="max-width: 100%; max-height: 140px; object-fit: contain;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'Default annotation will be used', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-annotation-svg-btn"><?php esc_html_e( 'Upload Annotation Graphic', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-annotation-svg-btn" style="<?php echo $annotation_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Graphic', 'bd-somani' ); ?></button>
			</div>
		</div>
	</div>
	<?php
}

function theme_academics_approach_metabox_callback( $post ) {
	$app_title = metadata_exists( 'post', $post->ID, '_bds_academics_app_title' ) ? get_post_meta( $post->ID, '_bds_academics_app_title', true ) : __( 'Our Approach', 'bd-somani' );

	if ( metadata_exists( 'post', $post->ID, '_bds_academics_app_desc' ) ) {
		$app_desc = get_post_meta( $post->ID, '_bds_academics_app_desc', true );
	} else {
		// Migration fallback from old desc1/desc2 if exists, else default text
		$old_desc1 = get_post_meta( $post->ID, '_bds_academics_app_desc1', true );
		$old_desc2 = get_post_meta( $post->ID, '_bds_academics_app_desc2', true );
		$old_sched = get_post_meta( $post->ID, '_bds_academics_app_schedule', true );

		if ( ! empty( $old_desc1 ) || ! empty( $old_desc2 ) ) {
			$parts = array();
			if ( ! empty( $old_sched ) ) {
				$parts[] = $old_sched;
			}
			if ( ! empty( $old_desc1 ) ) {
				$parts[] = $old_desc1;
			}
			if ( ! empty( $old_desc2 ) ) {
				$parts[] = $old_desc2;
			}
			$app_desc = implode( "\n\n", $parts );
		} else {
			$app_desc = "Monday–Friday • 11:30 AM – 5:30 PM\n\nA child's first experience away from home should feel safe, comforting and filled with joyful moments. At B.D. Somani International School, Kharghar, we create a nurturing environment where children begin their learning journey with a smile.\n\nOur programme centers around creating familiar routines, playful exploration, and warm interactions. While children learn, parents can go about their day knowing they are in safe and caring hands.";
		}
	}

	$default_cards = array(
		1 => array(
			'title' => __( 'Building Self-Reliance', 'bd-somani' ),
			'desc'  => __( 'A structured environment and consistent routines encourage children to become more confident, independent and comfortable away from home.', 'bd-somani' ),
		),
		2 => array(
			'title' => __( 'Social Confidence', 'bd-somani' ),
			'desc'  => __( 'Children observe, interact and learn alongside one another. These everyday experiences help them express themselves, build friendships and develop empathy.', 'bd-somani' ),
		),
		3 => array(
			'title' => __( 'School Readiness', 'bd-somani' ),
			'desc'  => __( 'Children gradually become familiar with books, teachers and classroom experiences. This helps them smoothly transition into school life.', 'bd-somani' ),
		),
		4 => array(
			'title' => __( 'Guided Exploration', 'bd-somani' ),
			'desc'  => __( 'Our age-appropriate programme encourages children to wonder, question and communicate through stories and play.', 'bd-somani' ),
		),
		5 => array(
			'title' => __( 'Holistic Development', 'bd-somani' ),
			'desc'  => __( 'Promoting physical, emotional, and creative growth through engaging hands-on experiences and caring guidance.', 'bd-somani' ),
		),
	);

	$cards_data = array();
	for ( $i = 1; $i <= 5; $i++ ) {
		$cards_data[ $i ] = array(
			'title' => metadata_exists( 'post', $post->ID, "_bds_academics_app_card{$i}_title" ) ? get_post_meta( $post->ID, "_bds_academics_app_card{$i}_title", true ) : $default_cards[ $i ]['title'],
			'desc'  => metadata_exists( 'post', $post->ID, "_bds_academics_app_card{$i}_desc" ) ? get_post_meta( $post->ID, "_bds_academics_app_card{$i}_desc", true ) : $default_cards[ $i ]['desc'],
			'img'   => get_post_meta( $post->ID, "_bds_academics_app_card{$i}_img", true ),
		);
	}
	?>
	<div id="bds-academics-approach-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<p class="description"><?php esc_html_e( 'Configure the Sticky "Our Approach" / Cards section. Leave all fields empty if you wish to hide this section entirely from the frontend.', 'bd-somani' ); ?></p>

		<div>
			<label for="bds_academics_app_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Main Heading / Section Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_app_title" name="bds_academics_app_title" value="<?php echo esc_attr( $app_title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_academics_app_desc" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Description & Schedule Content', 'bd-somani' ); ?></label>
			<textarea id="bds_academics_app_desc" name="bds_academics_app_desc" rows="6" class="large-text"><?php echo esc_textarea( $app_desc ); ?></textarea>
			<span class="description"><?php esc_html_e( 'Enter your schedule tagline and paragraphs here. Empty line breaks will create formatted paragraphs with spacing on the frontend.', 'bd-somani' ); ?></span>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 10px;">
		<h4 style="margin: 0; font-size: 15px;"><?php esc_html_e( 'Right Column Feature Cards (Up to 5 Cards)', 'bd-somani' ); ?></h4>

		<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$c_thumb = $cards_data[ $i ]['img'] ? wp_get_attachment_image_url( $cards_data[ $i ]['img'], 'medium' ) : '';
				?>
				<div style="background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px; display: flex; flex-direction: column; gap: 10px;">
					<h5 style="margin: 0; color: #9C5E91;"><?php printf( esc_html__( 'Card %d', 'bd-somani' ), $i ); ?></h5>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Card Title', 'bd-somani' ); ?></label>
						<input type="text" name="bds_academics_app_card<?php echo $i; ?>_title" value="<?php echo esc_attr( $cards_data[ $i ]['title'] ); ?>" class="large-text">
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Card Description', 'bd-somani' ); ?></label>
						<textarea name="bds_academics_app_card<?php echo $i; ?>_desc" rows="3" class="large-text"><?php echo esc_textarea( $cards_data[ $i ]['desc'] ); ?></textarea>
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Background Photo', 'bd-somani' ); ?></label>
						<input type="hidden" name="bds_academics_app_card<?php echo $i; ?>_img" id="bds_academics_app_card<?php echo $i; ?>_img" value="<?php echo esc_attr( $cards_data[ $i ]['img'] ); ?>">
						<div id="bds-app-card<?php echo $i; ?>-img-preview" style="margin-bottom: 8px; min-height: 90px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 6px; overflow: hidden;">
							<?php if ( $c_thumb ) : ?>
								<img src="<?php echo esc_url( $c_thumb ); ?>" style="max-width: 100%; max-height: 120px; object-fit: cover;">
							<?php else : ?>
								<span style="color: #999; font-size: 12px;"><?php esc_html_e( 'No Photo Selected', 'bd-somani' ); ?></span>
							<?php endif; ?>
						</div>
						<button type="button" class="button button-secondary" id="bds-upload-app-card<?php echo $i; ?>-img-btn"><?php esc_html_e( 'Select Photo', 'bd-somani' ); ?></button>
						<button type="button" class="button button-link-delete" id="bds-remove-app-card<?php echo $i; ?>-img-btn" style="<?php echo $c_thumb ? '' : 'display:none;'; ?> margin-left: 6px;"><?php esc_html_e( 'Remove', 'bd-somani' ); ?></button>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<?php
}

function theme_academics_experiences_metabox_callback( $post ) {
	$visibility = metadata_exists( 'post', $post->ID, '_bds_academics_exp_visibility' ) ? get_post_meta( $post->ID, '_bds_academics_exp_visibility', true ) : 'show';
	$main_title = metadata_exists( 'post', $post->ID, '_bds_academics_exp_main_title' ) ? get_post_meta( $post->ID, '_bds_academics_exp_main_title', true ) : __( 'Experiences that Enrich Classroom Learning', 'bd-somani' );
	$sub_title  = metadata_exists( 'post', $post->ID, '_bds_academics_exp_sub_title' ) ? get_post_meta( $post->ID, '_bds_academics_exp_sub_title', true ) : '';
	$sub_desc   = metadata_exists( 'post', $post->ID, '_bds_academics_exp_sub_desc' ) ? get_post_meta( $post->ID, '_bds_academics_exp_sub_desc', true ) : '';

	$main_img_id = get_post_meta( $post->ID, '_bds_academics_exp_main_img', true );
	$sub_img_id  = get_post_meta( $post->ID, '_bds_academics_exp_sub_img', true );

	$main_thumb = $main_img_id ? wp_get_attachment_image_url( $main_img_id, 'medium' ) : '';
	$sub_thumb  = $sub_img_id ? wp_get_attachment_image_url( $sub_img_id, 'thumbnail' ) : '';

	$default_cards = array(
		1 => array(
			'title' => __( 'Theme-Based Learning', 'bd-somani' ),
			'desc'  => __( 'Themes like My Family, Community Helpers, and Seasons connect learning across subjects, helping children relate classroom concepts to everyday life.', 'bd-somani' ),
		),
	);

	$max_cards = 20;
	$last_visible_card = 1;
	$exp_cards = array();

	for ( $i = 1; $i <= $max_cards; $i++ ) {
		$default_t = isset( $default_cards[ $i ] ) ? $default_cards[ $i ]['title'] : '';
		$default_d = isset( $default_cards[ $i ] ) ? $default_cards[ $i ]['desc'] : '';

		$has_t = metadata_exists( 'post', $post->ID, "_bds_academics_exp_card{$i}_title" );
		$has_d = metadata_exists( 'post', $post->ID, "_bds_academics_exp_card{$i}_desc" );
		$has_i = metadata_exists( 'post', $post->ID, "_bds_academics_exp_card{$i}_img" );

		$c_t   = $has_t ? get_post_meta( $post->ID, "_bds_academics_exp_card{$i}_title", true ) : $default_t;
		$c_d   = $has_d ? get_post_meta( $post->ID, "_bds_academics_exp_card{$i}_desc", true ) : $default_d;
		$c_img = $has_i ? get_post_meta( $post->ID, "_bds_academics_exp_card{$i}_img", true ) : '';

		$exp_cards[ $i ] = array(
			'title' => $c_t,
			'desc'  => $c_d,
			'img'   => $c_img,
		);

		if ( ! empty( trim( $c_t ) ) || ! empty( trim( $c_d ) ) || ! empty( $c_img ) ) {
			$last_visible_card = max( $last_visible_card, $i );
		}
	}
	?>
	<div id="bds-academics-experiences-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<p class="description"><?php esc_html_e( 'Configure the "Experiences that Enrich Classroom Learning" section and purple cards carousel. Leave left sub-heading, sub-description, and photos blank if you wish to hide the left content slide.', 'bd-somani' ); ?></p>

		<div>
			<label for="bds_academics_exp_visibility" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Visibility', 'bd-somani' ); ?></label>
			<select id="bds_academics_exp_visibility" name="bds_academics_exp_visibility">
				<option value="show" <?php selected( $visibility, 'show' ); ?>><?php esc_html_e( 'Show Section', 'bd-somani' ); ?></option>
				<option value="hide" <?php selected( $visibility, 'hide' ); ?>><?php esc_html_e( 'Hide Section', 'bd-somani' ); ?></option>
			</select>
		</div>

		<div>
			<label for="bds_academics_exp_main_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Main Title (Centered)', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_exp_main_title" name="bds_academics_exp_main_title" value="<?php echo esc_attr( $main_title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div style="display: flex; gap: 20px; flex-wrap: wrap;">
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_academics_exp_sub_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Left Content Sub-Heading', 'bd-somani' ); ?></label>
				<input type="text" id="bds_academics_exp_sub_title" name="bds_academics_exp_sub_title" value="<?php echo esc_attr( $sub_title ); ?>" class="large-text" placeholder="<?php esc_attr_e( 'Leave empty to hide left slide...', 'bd-somani' ); ?>">
			</div>
			<div style="flex: 1; min-width: 250px;">
				<label for="bds_academics_exp_sub_desc" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Left Content Sub-Description', 'bd-somani' ); ?></label>
				<textarea id="bds_academics_exp_sub_desc" name="bds_academics_exp_sub_desc" rows="2" class="large-text" placeholder="<?php esc_attr_e( 'Leave empty to hide left slide...', 'bd-somani' ); ?>"><?php echo esc_textarea( $sub_desc ); ?></textarea>
			</div>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 10px;">

		<div style="display: flex; gap: 30px; flex-wrap: wrap;">
			<!-- Main Left Photo -->
			<div style="flex: 1; min-width: 260px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Left Main Large Photo', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_exp_main_img" id="bds_academics_exp_main_img" value="<?php echo esc_attr( $main_img_id ); ?>">
				<div id="bds-exp-main-img-preview" style="margin-bottom: 12px; min-height: 100px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $main_thumb ) : ?>
						<img src="<?php echo esc_url( $main_thumb ); ?>" style="max-width: 100%; max-height: 140px; object-fit: cover;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'No Main Photo Selected', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-exp-main-img-btn"><?php esc_html_e( 'Select Main Photo', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-exp-main-img-btn" style="<?php echo $main_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Image', 'bd-somani' ); ?></button>
			</div>

			<!-- Secondary Overlapping Photo -->
			<div style="flex: 1; min-width: 260px; background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h4 style="margin: 0 0 10px 0;"><?php esc_html_e( 'Left Secondary Overlapping Photo', 'bd-somani' ); ?></h4>
				<input type="hidden" name="bds_academics_exp_sub_img" id="bds_academics_exp_sub_img" value="<?php echo esc_attr( $sub_img_id ); ?>">
				<div id="bds-exp-sub-img-preview" style="margin-bottom: 12px; min-height: 100px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ddd; border-radius: 8px; overflow: hidden;">
					<?php if ( $sub_thumb ) : ?>
						<img src="<?php echo esc_url( $sub_thumb ); ?>" style="max-width: 100%; max-height: 140px; object-fit: cover;">
					<?php else : ?>
						<span style="color: #999;"><?php esc_html_e( 'No Secondary Photo Selected', 'bd-somani' ); ?></span>
					<?php endif; ?>
				</div>
				<button type="button" class="button button-secondary" id="bds-upload-exp-sub-img-btn"><?php esc_html_e( 'Select Secondary Photo', 'bd-somani' ); ?></button>
				<button type="button" class="button button-link-delete" id="bds-remove-exp-sub-img-btn" style="<?php echo $sub_thumb ? '' : 'display:none;'; ?> margin-left: 10px;"><?php esc_html_e( 'Remove Image', 'bd-somani' ); ?></button>
			</div>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 10px;">
		<div style="display: flex; justify-content: space-between; align-items: center;">
			<h4 style="margin: 0; font-size: 15px;"><?php esc_html_e( 'Right Carousel Purple Cards', 'bd-somani' ); ?></h4>
			<button type="button" class="button button-primary" id="bds-add-exp-card-btn"><?php esc_html_e( '+ Add Purple Card', 'bd-somani' ); ?></button>
		</div>

		<div id="bds-exp-cards-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
			<?php for ( $i = 1; $i <= $max_cards; $i++ ) :
				$card_thumb = $exp_cards[ $i ]['img'] ? wp_get_attachment_image_url( $exp_cards[ $i ]['img'], 'medium' ) : '';
				$is_visible = ( $i <= $last_visible_card );
				?>
				<div class="bds-exp-card-row" data-card-index="<?php echo $i; ?>" style="background: #f4ecf3; padding: 15px; border: 1px solid #d3a2c7; border-radius: 8px; display: <?php echo $is_visible ? 'flex' : 'none'; ?>; flex-direction: column; gap: 10px; relative">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<h5 style="margin: 0; color: #683969;"><?php printf( esc_html__( 'Purple Card %d', 'bd-somani' ), $i ); ?></h5>
						<button type="button" class="button button-link-delete bds-remove-exp-card-row-btn" style="font-size: 12px;"><?php esc_html_e( 'Delete Card', 'bd-somani' ); ?></button>
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Card Title', 'bd-somani' ); ?></label>
						<input type="text" name="bds_academics_exp_card<?php echo $i; ?>_title" value="<?php echo esc_attr( $exp_cards[ $i ]['title'] ); ?>" class="large-text">
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Card Description', 'bd-somani' ); ?></label>
						<textarea name="bds_academics_exp_card<?php echo $i; ?>_desc" rows="3" class="large-text"><?php echo esc_textarea( $exp_cards[ $i ]['desc'] ); ?></textarea>
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Card Header Photo', 'bd-somani' ); ?></label>
						<input type="hidden" name="bds_academics_exp_card<?php echo $i; ?>_img" id="bds_academics_exp_card<?php echo $i; ?>_img" value="<?php echo esc_attr( $exp_cards[ $i ]['img'] ); ?>">
						<div id="bds-exp-card<?php echo $i; ?>-img-preview" class="bds-img-preview-box" style="margin-bottom: 8px; min-height: 90px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #bbb; border-radius: 6px; overflow: hidden;">
							<?php if ( $card_thumb ) : ?>
								<img src="<?php echo esc_url( $card_thumb ); ?>" style="max-width: 100%; max-height: 120px; object-fit: cover;">
							<?php else : ?>
								<span style="color: #999; font-size: 12px;"><?php esc_html_e( 'No Photo Selected', 'bd-somani' ); ?></span>
							<?php endif; ?>
						</div>
						<button type="button" class="button button-secondary" id="bds-upload-exp-card<?php echo $i; ?>-img-btn"><?php esc_html_e( 'Select Photo', 'bd-somani' ); ?></button>
						<button type="button" class="button button-link-delete" id="bds-remove-exp-card<?php echo $i; ?>-img-btn" style="<?php echo $card_thumb ? '' : 'display:none;'; ?> margin-left: 6px;"><?php esc_html_e( 'Remove', 'bd-somani' ); ?></button>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<?php
}

function theme_academics_cornerstones_metabox_callback( $post ) {
	$main_title = metadata_exists( 'post', $post->ID, '_bds_academics_cs_title' ) ? get_post_meta( $post->ID, '_bds_academics_cs_title', true ) : __( 'Cornerstones of Our Pre-Primary Programme', 'bd-somani' );

	$default_tabs = array(
		1 => array(
			'title' => __( 'Building Strong Foundations', 'bd-somani' ),
			'desc'  => __( 'Children learn in an environment that celebrates Indian values while embracing globally recognised teaching practices. Every lesson, activity, and assessment is thoughtfully designed to inspire confidence, curiosity, and a love for learning.', 'bd-somani' ),
		),
		2 => array(
			'title' => __( 'Personalised Growth', 'bd-somani' ),
			'desc'  => __( 'Tailored learning pathways that support each child\'s unique pace, strengths, and personal milestones through individual guidance and nurturing attention.', 'bd-somani' ),
		),
		3 => array(
			'title' => __( 'Future-Ready Mindsets', 'bd-somani' ),
			'desc'  => __( 'Fostering early critical thinking, adaptability, environmental awareness, and a lifelong curiosity to thrive in an ever-changing world.', 'bd-somani' ),
		),
	);

	$cs_tabs = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		$def_t = isset( $default_tabs[ $i ] ) ? $default_tabs[ $i ]['title'] : '';
		$def_d = isset( $default_tabs[ $i ] ) ? $default_tabs[ $i ]['desc'] : '';

		$cs_tabs[ $i ] = array(
			'title' => metadata_exists( 'post', $post->ID, "_bds_academics_cs_tab{$i}_title" ) ? get_post_meta( $post->ID, "_bds_academics_cs_tab{$i}_title", true ) : $def_t,
			'desc'  => metadata_exists( 'post', $post->ID, "_bds_academics_cs_tab{$i}_desc" ) ? get_post_meta( $post->ID, "_bds_academics_cs_tab{$i}_desc", true ) : $def_d,
			'img'   => get_post_meta( $post->ID, "_bds_academics_cs_tab{$i}_img", true ),
		);
	}
	?>
	<div id="bds-academics-cornerstones-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<p class="description"><?php esc_html_e( 'Configure the "Cornerstones of Our Pre-Primary Programme" accordion section (Up to 6 tabs). Leave fields empty to hide tabs or section.', 'bd-somani' ); ?></p>

		<div>
			<label for="bds_academics_cs_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Main Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_cs_title" name="bds_academics_cs_title" value="<?php echo esc_attr( $main_title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 10px;">
		<h4 style="margin: 0; font-size: 15px;"><?php esc_html_e( 'Cornerstone Accordion Tabs (Up to 6 Tabs)', 'bd-somani' ); ?></h4>

		<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
			<?php for ( $i = 1; $i <= 6; $i++ ) :
				$tab_thumb = $cs_tabs[ $i ]['img'] ? wp_get_attachment_image_url( $cs_tabs[ $i ]['img'], 'medium' ) : '';
				?>
				<div style="background: #fdfaf6; padding: 15px; border: 1px solid #e2d4e3; border-radius: 8px; display: flex; flex-direction: column; gap: 10px;">
					<h5 style="margin: 0; color: #3D213E;"><?php printf( esc_html__( 'Tab Item %d', 'bd-somani' ), $i ); ?></h5>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Tab Title', 'bd-somani' ); ?></label>
						<input type="text" name="bds_academics_cs_tab<?php echo $i; ?>_title" value="<?php echo esc_attr( $cs_tabs[ $i ]['title'] ); ?>" class="large-text">
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Tab Description', 'bd-somani' ); ?></label>
						<textarea name="bds_academics_cs_tab<?php echo $i; ?>_desc" rows="3" class="large-text"><?php echo esc_textarea( $cs_tabs[ $i ]['desc'] ); ?></textarea>
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Left Stage Photo', 'bd-somani' ); ?></label>
						<input type="hidden" name="bds_academics_cs_tab<?php echo $i; ?>_img" id="bds_academics_cs_tab<?php echo $i; ?>_img" value="<?php echo esc_attr( $cs_tabs[ $i ]['img'] ); ?>">
						<div id="bds-cs-tab<?php echo $i; ?>-img-preview" style="margin-bottom: 8px; min-height: 90px; display: flex; align-items: center; justify-content: center; background: #fff; border: 2px dashed #ccc; border-radius: 6px; overflow: hidden;">
							<?php if ( $tab_thumb ) : ?>
								<img src="<?php echo esc_url( $tab_thumb ); ?>" style="max-width: 100%; max-height: 120px; object-fit: cover;">
							<?php else : ?>
								<span style="color: #999; font-size: 12px;"><?php esc_html_e( 'Default Daycare Photo', 'bd-somani' ); ?></span>
							<?php endif; ?>
						</div>
						<button type="button" class="button button-secondary" id="bds-upload-cs-tab<?php echo $i; ?>-img-btn"><?php esc_html_e( 'Select Photo', 'bd-somani' ); ?></button>
						<button type="button" class="button button-link-delete" id="bds-remove-cs-tab<?php echo $i; ?>-img-btn" style="<?php echo $tab_thumb ? '' : 'display:none;'; ?> margin-left: 6px;"><?php esc_html_e( 'Remove', 'bd-somani' ); ?></button>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<?php
}

function theme_academics_care_metabox_callback( $post ) {
	$visibility = metadata_exists( 'post', $post->ID, '_bds_academics_care_visibility' ) ? get_post_meta( $post->ID, '_bds_academics_care_visibility', true ) : 'show';
	$care_title = metadata_exists( 'post', $post->ID, '_bds_academics_care_title' ) ? get_post_meta( $post->ID, '_bds_academics_care_title', true ) : __( 'A Circle of Care & Communication', 'bd-somani' );
	$care_sub   = metadata_exists( 'post', $post->ID, '_bds_academics_care_sub' ) ? get_post_meta( $post->ID, '_bds_academics_care_sub', true ) : __( 'We believe a child\'s growth is strongest when school and home work together. Through open communication, dedicated support, and a caring community, we keep parents actively involved in every step of the learning journey.', 'bd-somani' );

	$care_cards_def = array(
		1 => array(
			'title' => __( 'School App', 'bd-somani' ),
			'desc'  => __( 'Regular updates, announcements and classroom communication through EduSprint.', 'bd-somani' ),
		),
		2 => array(
			'title' => __( 'Dedicated Support', 'bd-somani' ),
			'desc'  => __( 'Coordinators and qualified staff on every floor.', 'bd-somani' ),
		),
		3 => array(
			'title' => __( 'Student Counselling', 'bd-somani' ),
			'desc'  => __( 'Two in-house counsellors for student well-being.', 'bd-somani' ),
		),
	);

	$care_cards = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$c_t = metadata_exists( 'post', $post->ID, "_bds_academics_care_card{$i}_title" ) ? get_post_meta( $post->ID, "_bds_academics_care_card{$i}_title", true ) : $care_cards_def[ $i ]['title'];
		$c_d = metadata_exists( 'post', $post->ID, "_bds_academics_care_card{$i}_desc" ) ? get_post_meta( $post->ID, "_bds_academics_care_card{$i}_desc", true ) : $care_cards_def[ $i ]['desc'];
		$c_d = str_replace( array( ' and MISC.', ' and MISC', ' & MISC.', ' & MISC' ), '.', $c_d );

		$care_cards[ $i ] = array(
			'title' => $c_t,
			'desc'  => $c_d,
		);
	}
	?>
	<div id="bds-academics-care-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<p class="description"><?php esc_html_e( 'Configure the "Circle of Care & Communication" section. You can toggle visibility to show or hide this section on this page.', 'bd-somani' ); ?></p>

		<!-- Show / Hide Section Toggle -->
		<div style="background: #fff8e5; padding: 12px 16px; border: 1px solid #f1c822; border-radius: 8px; display: flex; align-items: center; justify-content: space-between;">
			<label for="bds_academics_care_visibility" style="font-weight: 700; font-size: 14px; color: #3d213e;"><?php esc_html_e( 'Section Visibility:', 'bd-somani' ); ?></label>
			<select id="bds_academics_care_visibility" name="bds_academics_care_visibility" style="font-weight: 600; padding: 4px 12px; font-size: 14px;">
				<option value="show" <?php selected( $visibility, 'show' ); ?>><?php esc_html_e( 'Show Circle of Care Section', 'bd-somani' ); ?></option>
				<option value="hide" <?php selected( $visibility, 'hide' ); ?>><?php esc_html_e( 'Hide Circle of Care Section', 'bd-somani' ); ?></option>
			</select>
		</div>

		<div>
			<label for="bds_academics_care_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Main Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_care_title" name="bds_academics_care_title" value="<?php echo esc_attr( $care_title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_academics_care_sub" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Subtitle / Description', 'bd-somani' ); ?></label>
			<textarea id="bds_academics_care_sub" name="bds_academics_care_sub" rows="3" class="large-text"><?php echo esc_textarea( $care_sub ); ?></textarea>
		</div>

		<hr style="border: 0; border-top: 1px solid #ccc; margin-block: 5px;">
		<h4 style="margin: 0; font-size: 15px;"><?php esc_html_e( 'Cards Content', 'bd-somani' ); ?></h4>

		<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px;">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<div style="background: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px; display: flex; flex-direction: column; gap: 10px;">
					<h5 style="margin: 0; color: #3d213e;"><?php printf( esc_html__( 'Card %d', 'bd-somani' ), $i ); ?></h5>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Card Title', 'bd-somani' ); ?></label>
						<input type="text" name="bds_academics_care_card<?php echo $i; ?>_title" value="<?php echo esc_attr( $care_cards[ $i ]['title'] ); ?>" class="large-text">
					</div>
					<div>
						<label style="font-weight: 600; display: block; margin-bottom: 2px;"><?php esc_html_e( 'Card Description', 'bd-somani' ); ?></label>
						<textarea name="bds_academics_care_card<?php echo $i; ?>_desc" rows="3" class="large-text"><?php echo esc_textarea( $care_cards[ $i ]['desc'] ); ?></textarea>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<?php
}

function theme_academics_interest_metabox_callback( $post ) {
	$visibility = metadata_exists( 'post', $post->ID, '_bds_academics_interest_visibility' ) ? get_post_meta( $post->ID, '_bds_academics_interest_visibility', true ) : 'show';
	$title      = metadata_exists( 'post', $post->ID, '_bds_academics_interest_title' ) ? get_post_meta( $post->ID, '_bds_academics_interest_title', true ) : __( 'Taking Every Interest Further', 'bd-somani' );
	$sub        = metadata_exists( 'post', $post->ID, '_bds_academics_interest_sub' ) ? get_post_meta( $post->ID, '_bds_academics_interest_sub', true ) : __( 'Our commitment to nurturing curious, courageous, and collaborative learners continues beyond the classroom through enriching after-school experiences that help students discover new interests and grow with confidence.', 'bd-somani' );
	?>
	<div id="bds-academics-interest-metabox" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px;">
		<p class="description"><?php esc_html_e( 'Configure the "Taking Every Interest Further" After-School Co-Curricular section. Toggle section visibility to show or hide this section on this page.', 'bd-somani' ); ?></p>

		<!-- Show / Hide Section Toggle -->
		<div style="background: #fff8e5; padding: 12px 16px; border: 1px solid #f1c822; border-radius: 8px; display: flex; align-items: center; justify-content: space-between;">
			<label for="bds_academics_interest_visibility" style="font-weight: 700; font-size: 14px; color: #3d213e;"><?php esc_html_e( 'Section Visibility:', 'bd-somani' ); ?></label>
			<select id="bds_academics_interest_visibility" name="bds_academics_interest_visibility" style="font-weight: 600; padding: 4px 12px; font-size: 14px;">
				<option value="show" <?php selected( $visibility, 'show' ); ?>><?php esc_html_e( 'Show After-School Co-Curricular Section', 'bd-somani' ); ?></option>
				<option value="hide" <?php selected( $visibility, 'hide' ); ?>><?php esc_html_e( 'Hide After-School Co-Curricular Section', 'bd-somani' ); ?></option>
			</select>
		</div>

		<div>
			<label for="bds_academics_interest_title" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Main Title', 'bd-somani' ); ?></label>
			<input type="text" id="bds_academics_interest_title" name="bds_academics_interest_title" value="<?php echo esc_attr( $title ); ?>" class="large-text" style="font-size: 16px; padding: 6px 10px;">
		</div>

		<div>
			<label for="bds_academics_interest_sub" style="font-weight: 600; display: block; margin-bottom: 4px;"><?php esc_html_e( 'Section Subtitle / Description', 'bd-somani' ); ?></label>
			<textarea id="bds_academics_interest_sub" name="bds_academics_interest_sub" rows="3" class="large-text"><?php echo esc_textarea( $sub ); ?></textarea>
		</div>
	</div>
	<?php
}

function theme_save_academics_hero_meta( $post_id ) {
	if ( ! isset( $_POST['theme_academics_hero_nonce'] ) || ! wp_verify_nonce( $_POST['theme_academics_hero_nonce'], 'theme_save_academics_hero' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'bds_academics_breadcrumb'              => '_bds_academics_breadcrumb',
		'bds_academics_hero_title'               => '_bds_academics_hero_title',
		'bds_academics_hero_subtitle'            => '_bds_academics_hero_subtitle',
		'bds_academics_cta_text'                 => '_bds_academics_cta_text',
		'bds_academics_cta_url'                  => '_bds_academics_cta_url',
		'bds_academics_main_img_id'              => '_bds_academics_main_img_id',
		'bds_academics_sub_img_id'               => '_bds_academics_sub_img_id',
		'bds_academics_overview_tagline'         => '_bds_academics_overview_tagline',
		'bds_academics_overview_title'           => '_bds_academics_overview_title',
		'bds_academics_overview_desc'            => '_bds_academics_overview_desc',
		'bds_academics_overview_pdf_label'       => '_bds_academics_overview_pdf_label',
		'bds_academics_overview_pdf_url'         => '_bds_academics_overview_pdf_url',
		'bds_academics_overview_img_left'        => '_bds_academics_overview_img_left',
		'bds_academics_overview_img_right'       => '_bds_academics_overview_img_right',
		'bds_academics_overview_annotation_svg' => '_bds_academics_overview_annotation_svg',
		'bds_academics_app_title'               => '_bds_academics_app_title',
		'bds_academics_app_desc'                => '_bds_academics_app_desc',
		'bds_academics_app_card1_title'         => '_bds_academics_app_card1_title',
		'bds_academics_app_card1_desc'          => '_bds_academics_app_card1_desc',
		'bds_academics_app_card1_img'           => '_bds_academics_app_card1_img',
		'bds_academics_app_card2_title'         => '_bds_academics_app_card2_title',
		'bds_academics_app_card2_desc'          => '_bds_academics_app_card2_desc',
		'bds_academics_app_card2_img'           => '_bds_academics_app_card2_img',
		'bds_academics_app_card3_title'         => '_bds_academics_app_card3_title',
		'bds_academics_app_card3_desc'          => '_bds_academics_app_card3_desc',
		'bds_academics_app_card3_img'           => '_bds_academics_app_card3_img',
		'bds_academics_app_card4_title'         => '_bds_academics_app_card4_title',
		'bds_academics_app_card4_desc'          => '_bds_academics_app_card4_desc',
		'bds_academics_app_card4_img'           => '_bds_academics_app_card4_img',
		'bds_academics_app_card5_title'         => '_bds_academics_app_card5_title',
		'bds_academics_app_card5_desc'          => '_bds_academics_app_card5_desc',
		'bds_academics_app_card5_img'           => '_bds_academics_app_card5_img',
		'bds_academics_potential_visibility'    => '_bds_academics_potential_visibility',
		'bds_academics_potential_title'         => '_bds_academics_potential_title',
		'bds_academics_potential_desc'          => '_bds_academics_potential_desc',
		'bds_academics_potential_video'         => '_bds_academics_potential_video',
		'bds_academics_exp_visibility'          => '_bds_academics_exp_visibility',
		'bds_academics_exp_main_title'          => '_bds_academics_exp_main_title',
		'bds_academics_exp_sub_title'           => '_bds_academics_exp_sub_title',
		'bds_academics_exp_sub_desc'            => '_bds_academics_exp_sub_desc',
		'bds_academics_exp_main_img'            => '_bds_academics_exp_main_img',
		'bds_academics_exp_sub_img'             => '_bds_academics_exp_sub_img',
	);

	$textarea_keys = array(
		'bds_academics_hero_subtitle',
		'bds_academics_overview_desc',
		'bds_academics_app_desc',
		'bds_academics_app_card1_desc',
		'bds_academics_app_card2_desc',
		'bds_academics_app_card3_desc',
		'bds_academics_app_card4_desc',
		'bds_academics_app_card5_desc',
		'bds_academics_potential_desc',
		'bds_academics_exp_sub_desc',
		'bds_academics_cs_tab1_desc',
		'bds_academics_cs_tab2_desc',
		'bds_academics_cs_tab3_desc',
		'bds_academics_cs_tab4_desc',
		'bds_academics_cs_tab5_desc',
		'bds_academics_cs_tab6_desc',
	);

	for ( $c = 1; $c <= 20; $c++ ) {
		$fields[ "bds_academics_exp_card{$c}_title" ] = "_bds_academics_exp_card{$c}_title";
		$fields[ "bds_academics_exp_card{$c}_desc" ]  = "_bds_academics_exp_card{$c}_desc";
		$fields[ "bds_academics_exp_card{$c}_img" ]   = "_bds_academics_exp_card{$c}_img";
		$textarea_keys[] = "bds_academics_exp_card{$c}_desc";
	}

	for ( $tab = 1; $tab <= 6; $tab++ ) {
		$fields[ "bds_academics_cs_tab{$tab}_title" ] = "_bds_academics_cs_tab{$tab}_title";
		$fields[ "bds_academics_cs_tab{$tab}_desc" ]  = "_bds_academics_cs_tab{$tab}_desc";
		$fields[ "bds_academics_cs_tab{$tab}_img" ]   = "_bds_academics_cs_tab{$tab}_img";
	}

	$fields['bds_academics_care_visibility'] = '_bds_academics_care_visibility';
	$fields['bds_academics_care_title']      = '_bds_academics_care_title';
	$fields['bds_academics_care_sub']        = '_bds_academics_care_sub';
	$textarea_keys[]                         = 'bds_academics_care_sub';

	for ( $cc = 1; $cc <= 3; $cc++ ) {
		$fields[ "bds_academics_care_card{$cc}_title" ] = "_bds_academics_care_card{$cc}_title";
		$fields[ "bds_academics_care_card{$cc}_desc" ]  = "_bds_academics_care_card{$cc}_desc";
		$textarea_keys[]                               = "bds_academics_care_card{$cc}_desc";
	}

	$fields['bds_academics_interest_visibility'] = '_bds_academics_interest_visibility';
	$fields['bds_academics_interest_title']      = '_bds_academics_interest_title';
	$fields['bds_academics_interest_sub']        = '_bds_academics_interest_sub';
	$textarea_keys[]                             = 'bds_academics_interest_sub';

	$fields['bds_academics_top_marquee_visibility']    = '_bds_academics_top_marquee_visibility';
	$fields['bds_academics_bottom_marquee_visibility'] = '_bds_academics_bottom_marquee_visibility';

	$url_keys = array( 'bds_academics_cta_url', 'bds_academics_overview_pdf_url' );

	foreach ( $fields as $post_key => $meta_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			if ( in_array( $post_key, $textarea_keys, true ) ) {
				update_post_meta( $post_id, $meta_key, sanitize_textarea_field( $_POST[ $post_key ] ) );
			} elseif ( in_array( $post_key, $url_keys, true ) ) {
				update_post_meta( $post_id, $meta_key, esc_url_raw( $_POST[ $post_key ] ) );
			} else {
				update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
			}
		}
	}
}
add_action( 'save_post', 'theme_save_academics_hero_meta' );

// Enqueue Media Uploader for Academics CPT & Pages
function theme_academics_admin_scripts( $hook ) {
	global $post_type;
	if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && ( 'academics' === $post_type || 'page' === $post_type ) ) {
		wp_enqueue_media();
		add_action( 'admin_footer', 'theme_academics_admin_footer_js' );
	}
}
add_action( 'admin_enqueue_scripts', 'theme_academics_admin_scripts' );

function theme_academics_admin_footer_js() {
	?>
	<script>
	jQuery(document).ready(function($) {
		function setupImageUploader(btnId, removeBtnId, inputId, previewId, titleText) {
			var frame;
			$(btnId).on('click', function(e) {
				e.preventDefault();
				if (frame) {
					frame.open();
					return;
				}
				frame = wp.media({
					title: titleText,
					button: { text: 'Select Image' },
					multiple: false
				});
				frame.on('select', function() {
					var attachment = frame.state().get('selection').first().toJSON();
					$(inputId).val(attachment.id);
					var url = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;
					$(previewId).html('<img src="' + url + '" style="max-width: 100%; max-height: 180px; object-fit: cover;">');
					$(removeBtnId).show();
				});
				frame.open();
			});

			$(removeBtnId).on('click', function(e) {
				e.preventDefault();
				$(inputId).val('');
				$(previewId).html('<span style="color: #999;">No Image Selected</span>');
				$(this).hide();
			});
		}

		setupImageUploader('#bds-upload-main-img-btn', '#bds-remove-main-img-btn', '#bds_academics_main_img_id', '#bds-main-img-preview', 'Select Main Hero Image');
		setupImageUploader('#bds-upload-sub-img-btn', '#bds-remove-sub-img-btn', '#bds_academics_sub_img_id', '#bds-sub-img-preview', 'Select Secondary Overlapping Image');
		setupImageUploader('#bds-upload-left-img-btn', '#bds-remove-left-img-btn', '#bds_academics_overview_img_left', '#bds-left-img-preview', 'Select Left Tilted Image');
		setupImageUploader('#bds-upload-right-img-btn', '#bds-remove-right-img-btn', '#bds_academics_overview_img_right', '#bds-right-img-preview', 'Select Right Tilted Image');
		setupImageUploader('#bds-upload-annotation-svg-btn', '#bds-remove-annotation-svg-btn', '#bds_academics_overview_annotation_svg', '#bds-annotation-svg-preview', 'Select Annotation Graphic / SVG');
		setupImageUploader('#bds-upload-exp-main-img-btn', '#bds-remove-exp-main-img-btn', '#bds_academics_exp_main_img', '#bds-exp-main-img-preview', 'Select Experiences Left Main Photo');
		setupImageUploader('#bds-upload-exp-sub-img-btn', '#bds-remove-exp-sub-img-btn', '#bds_academics_exp_sub_img', '#bds-exp-sub-img-preview', 'Select Experiences Left Overlapping Photo');

		for (var i = 1; i <= 5; i++) {
			setupImageUploader('#bds-upload-app-card' + i + '-img-btn', '#bds-remove-app-card' + i + '-img-btn', '#bds_academics_app_card' + i + '_img', '#bds-app-card' + i + '-img-preview', 'Select Card ' + i + ' Photo');
		}

		for (var j = 1; j <= 20; j++) {
			setupImageUploader('#bds-upload-exp-card' + j + '-img-btn', '#bds-remove-exp-card' + j + '-img-btn', '#bds_academics_exp_card' + j + '_img', '#bds-exp-card' + j + '-img-preview', 'Select Purple Card ' + j + ' Photo');
		}

		$('#bds-add-exp-card-btn').on('click', function(e) {
			e.preventDefault();
			var $hiddenCards = $('.bds-exp-card-row:hidden');
			if ($hiddenCards.length > 0) {
				$hiddenCards.first().css('display', 'flex');
			} else {
				alert('Maximum 20 purple cards reached.');
			}
		});

		$('.bds-remove-exp-card-row-btn').on('click', function(e) {
			e.preventDefault();
			var $cardRow = $(this).closest('.bds-exp-card-row');
			$cardRow.find('input[type="text"]').val('');
			$cardRow.find('textarea').val('');
			$cardRow.find('input[type="hidden"]').val('');
			$cardRow.find('.bds-img-preview-box').html('<span style="color: #999; font-size: 12px;">No Photo Selected</span>');
			$cardRow.find('.button-link-delete').not(this).hide();
			
			if ($('.bds-exp-card-row:visible').length > 1) {
				$cardRow.hide();
			}
		});

		for (var k = 1; k <= 6; k++) {
			setupImageUploader('#bds-upload-cs-tab' + k + '-img-btn', '#bds-remove-cs-tab' + k + '-img-btn', '#bds_academics_cs_tab' + k + '_img', '#bds-cs-tab' + k + '-img-preview', 'Select Cornerstone Tab ' + k + ' Photo');
		}

		$('#bds-upload-potential-video-btn').on('click', function(e) {
			e.preventDefault();
			var customUploader = wp.media({
				title: 'Select / Upload Banner Video',
				button: { text: 'Use this video' },
				library: { type: 'video' },
				multiple: false
			}).on('select', function() {
				var attachment = customUploader.state().get('selection').first().toJSON();
				$('#bds_academics_potential_video').val(attachment.url);
				$('#bds-remove-potential-video-btn').show();
			}).open();
		});

		$('#bds-remove-potential-video-btn').on('click', function(e) {
			e.preventDefault();
			$('#bds_academics_potential_video').val('');
			$(this).hide();
		});

		// Toggle Metabox & Block Editor Appender visibility based on template selection
		function checkAcademicsTemplate() {
			var $metaBoxes = $('#bds_academics_hero_mb, #bds_academics_programme_mb, #bds_academics_potential_mb, #bds_academics_approach_mb, #bds_academics_experiences_mb, #bds_academics_cornerstones_mb, #bds_academics_care_mb, #bds_academics_interest_mb');

			var templateVal = '';
			if (wp.data && wp.data.select('core/editor')) {
				templateVal = wp.data.select('core/editor').getEditedPostAttribute('template') || '';
			}
			if (!templateVal) {
				templateVal = $('.editor-page-attributes__template select').val() || $('select[name="page_template"]').val() || '';
			}

			if (templateVal === 'page-academics.php' || (templateVal && templateVal.indexOf('academics') !== -1)) {
				$metaBoxes.show();
				$('body').addClass('is-academics-page-template');
			} else {
				$metaBoxes.hide();
				$('body').removeClass('is-academics-page-template');
			}
		}

		function checkCareersTemplate() {
			var $careersMb = $('#bds_careers_hero_mb');
			var templateVal = '';
			if (wp.data && wp.data.select('core/editor')) {
				templateVal = wp.data.select('core/editor').getEditedPostAttribute('template') || '';
			}
			if (!templateVal) {
				templateVal = $('.editor-page-attributes__template select').val() || $('select[name="page_template"]').val() || '';
			}

			if (templateVal === 'page-careers.php' || (templateVal && templateVal.indexOf('careers') !== -1)) {
				$careersMb.show();
			} else {
				$careersMb.hide();
			}
		}

		checkAcademicsTemplate();
		checkCareersTemplate();
		setInterval(checkAcademicsTemplate, 1000);
		setInterval(checkCareersTemplate, 1000);
	});
	</script>
	<style>
		/* Hide "Type / to choose a block" and default block appender when editing Academics Sub Page template */
		body.is-academics-page-template .block-editor-default-block-appender,
		body.is-academics-page-template .block-editor-block-list__layout > .wp-block-paragraph:only-child[data-empty="true"] {
			display: none !important;
		}
	</style>
	<?php
}

// Auto-seed default taxonomy categories once in WP Admin
function theme_seed_gallery_terms() {
	if ( get_option( 'bd_gallery_terms_seeded' ) ) {
		return;
	}

	if ( ! taxonomy_exists( 'gallery_category' ) ) {
		return;
	}

	$default_terms = array( 'Campus', 'Academics', 'Sports', 'Arts', 'Events', 'Field Trips', 'Extras' );
	foreach ( $default_terms as $term_name ) {
		if ( ! term_exists( $term_name, 'gallery_category' ) ) {
			wp_insert_term( $term_name, 'gallery_category' );
		}
	}

	update_option( 'bd_gallery_terms_seeded', true );
}
add_action( 'admin_init', 'theme_seed_gallery_terms' );

// 5. Add Custom Image Gallery Metabox for Gallery CPT
function theme_add_gallery_metaboxes() {
	add_meta_box(
		'bds_gallery_images_mb',
		__( 'Gallery Photo Album / Multiple Images', 'bd-somani' ),
		'theme_gallery_images_metabox_callback',
		'gallery',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'theme_add_gallery_metaboxes' );

function theme_gallery_images_metabox_callback( $post ) {
	wp_nonce_field( 'theme_save_gallery_images', 'theme_gallery_nonce' );
	$image_ids = get_post_meta( $post->ID, '_bds_gallery_image_ids', true );
	$ids_array = ! empty( $image_ids ) ? explode( ',', $image_ids ) : array();
	?>
	<div id="bds-gallery-metabox-wrapper">
		<p class="description"><?php esc_html_e( 'Upload or select photos for this gallery item. Select categories in the right sidebar.', 'bd-somani' ); ?></p>
		<input type="hidden" name="bds_gallery_image_ids" id="bds_gallery_image_ids" value="<?php echo esc_attr( $image_ids ); ?>">
		<div id="bds-thumbs-container" style="display: flex; flex-wrap: wrap; gap: 10px; margin-block: 15px;">
			<?php
			if ( ! empty( $ids_array ) ) {
				foreach ( $ids_array as $img_id ) {
					$img_id = intval( trim( $img_id ) );
					if ( $img_id > 0 ) {
						$thumb_src = wp_get_attachment_image_url( $img_id, 'thumbnail' );
						if ( $thumb_src ) {
							echo '<div class="bds-thumb-item" data-id="' . $img_id . '" style="position: relative; width: 90px; height: 90px; border-radius: 8px; overflow: hidden; border: 1px solid #ccc;">';
							echo '<img src="' . esc_url( $thumb_src ) . '" style="width: 100%; height: 100%; object-fit: cover;">';
							echo '<button type="button" class="bds-remove-thumb" style="position: absolute; top: 4px; right: 4px; background: #e74c3c; color: #fff; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 12px; line-height: 1; text-align: center;">&times;</button>';
							echo '</div>';
						}
					}
				}
			}
			?>
		</div>
		<button type="button" class="button button-primary" id="bds-upload-gallery-btn"><?php esc_html_e( '+ Add / Manage Photos', 'bd-somani' ); ?></button>
	</div>
	<?php
}

function theme_save_gallery_images_meta( $post_id ) {
	if ( ! isset( $_POST['theme_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['theme_gallery_nonce'], 'theme_save_gallery_images' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['bds_gallery_image_ids'] ) ) {
		update_post_meta( $post_id, '_bds_gallery_image_ids', sanitize_text_field( $_POST['bds_gallery_image_ids'] ) );
	}
}
add_action( 'save_post_gallery', 'theme_save_gallery_images_meta' );

// Enqueue WP Media Uploader scripts in admin for Gallery CPT
function theme_gallery_admin_scripts( $hook ) {
	global $post_type;
	if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && 'gallery' === $post_type ) {
		wp_enqueue_media();
		add_action( 'admin_footer', 'theme_gallery_admin_footer_js' );
	}
}
add_action( 'admin_enqueue_scripts', 'theme_gallery_admin_scripts' );

function theme_gallery_admin_footer_js() {
	?>
	<script>
	jQuery(document).ready(function($) {
		var frame;
		$('#bds-upload-gallery-btn').on('click', function(e) {
			e.preventDefault();
			if (frame) {
				frame.open();
				return;
			}
			frame = wp.media({
				title: 'Select or Upload Gallery Images',
				button: { text: 'Use Selected Images' },
				multiple: true
			});
			frame.on('select', function() {
				var selection = frame.state().get('selection');
				var ids = [];
				var thumbsHtml = '';
				selection.each(function(attachment) {
					var att = attachment.toJSON();
					ids.push(att.id);
					var url = att.sizes && att.sizes.thumbnail ? att.sizes.thumbnail.url : att.url;
					thumbsHtml += '<div class="bds-thumb-item" data-id="' + att.id + '" style="position: relative; width: 90px; height: 90px; border-radius: 8px; overflow: hidden; border: 1px solid #ccc;">';
					thumbsHtml += '<img src="' + url + '" style="width: 100%; height: 100%; object-fit: cover;">';
					thumbsHtml += '<button type="button" class="bds-remove-thumb" style="position: absolute; top: 4px; right: 4px; background: #e74c3c; color: #fff; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 12px; line-height: 1; text-align: center;">&times;</button>';
					thumbsHtml += '</div>';
				});
				$('#bds_gallery_image_ids').val(ids.join(','));
				$('#bds-thumbs-container').html(thumbsHtml);
			});
			frame.open();
		});

		$(document).on('click', '.bds-remove-thumb', function() {
			var $item = $(this).closest('.bds-thumb-item');
			var removeId = $item.data('id');
			$item.remove();
			var currentIds = $('#bds_gallery_image_ids').val().split(',').filter(Boolean);
			var newIds = currentIds.filter(function(id) { return parseInt(id) !== parseInt(removeId); });
			$('#bds_gallery_image_ids').val(newIds.join(','));
		});
	});
	</script>
	<?php
}


// =============================================================================
// CAMPUS LIFE PAGE META BOXES
// =============================================================================

/**
 * Register Campus Life page meta boxes.
 */
function theme_add_campus_life_metaboxes() {
	add_meta_box(
		'bds_cl_hero_mb',
		__( 'Campus Life Hero Section', 'bd-somani' ),
		'theme_cl_hero_metabox_callback',
		'page',
		'normal',
		'high'
	);
	add_meta_box(
		'bds_cl_overview_mb',
		__( 'Campus Life Overview Section ("Every Day Shapes Tomorrow")', 'bd-somani' ),
		'theme_cl_overview_metabox_callback',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'theme_add_campus_life_metaboxes' );

/**
 * Hide campus life meta boxes unless the Campus Life Page template is selected.
 * (Runs inline JS on the post edit screen — same pattern as academics.)
 */
add_action( 'admin_footer-post.php',    'theme_cl_metabox_visibility_js' );
add_action( 'admin_footer-post-new.php','theme_cl_metabox_visibility_js' );

function theme_cl_metabox_visibility_js() {
	global $post;
	if ( ! $post || 'page' !== $post->post_type ) { return; }
	?>
	<script>
	(function($){
		function toggleCLBoxes() {
			var tpl = $('#page_template').val();
			if ( tpl === 'page-campus-life.php' ) {
				$('#bds_cl_hero_mb, #bds_cl_overview_mb').show();
			} else {
				$('#bds_cl_hero_mb, #bds_cl_overview_mb').hide();
			}
		}
		$(document).ready( toggleCLBoxes );
		$('#page_template').on('change', toggleCLBoxes );
	})(jQuery);
	</script>
	<?php
}

/**
 * Hero meta box callback.
 */
function theme_cl_hero_metabox_callback( $post ) {
	wp_nonce_field( 'bds_cl_save_meta', 'bds_cl_nonce' );

	$fields = array(
		'_bds_cl_breadcrumb'    => array( 'label' => 'Breadcrumb Label', 'type' => 'text' ),
		'_bds_cl_hero_title'    => array( 'label' => 'Hero Main Title', 'type' => 'text' ),
		'_bds_cl_hero_subtitle' => array( 'label' => 'Hero Description / Paragraph', 'type' => 'textarea' ),
		'_bds_cl_cta_text'      => array( 'label' => 'CTA Button Label', 'type' => 'text' ),
		'_bds_cl_cta_url'       => array( 'label' => 'CTA Button URL', 'type' => 'text' ),
	);

	$img_fields = array(
		'_bds_cl_main_img_id' => 'Main Hero Image',
		'_bds_cl_sub_img_id'  => 'Secondary Overlapping Image',
	);

	echo '<div style="display:grid;gap:16px;padding:8px 0;">';
	foreach ( $fields as $key => $cfg ) {
		$val   = get_post_meta( $post->ID, $key, true );
		$name  = ltrim( $key, '_' );
		echo '<div>';
		echo '<label for="' . esc_attr( $name ) . '" style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $cfg['label'] ) . '</label>';
		if ( 'textarea' === $cfg['type'] ) {
			echo '<textarea id="' . esc_attr( $name ) . '" name="' . esc_attr( $name ) . '" rows="3" class="large-text">' . esc_textarea( $val ) . '</textarea>';
		} else {
			echo '<input type="text" id="' . esc_attr( $name ) . '" name="' . esc_attr( $name ) . '" value="' . esc_attr( $val ) . '" class="large-text" style="font-size:16px;padding:6px 10px;">';
		}
		echo '</div>';
	}
	foreach ( $img_fields as $key => $label ) {
		$img_id  = get_post_meta( $post->ID, $key, true );
		$img_url = $img_id ? wp_get_attachment_image_url( $img_id, 'thumbnail' ) : '';
		$name    = ltrim( $key, '_' );
		echo '<div>';
		echo '<label style="font-weight:600;display:block;margin-bottom:6px;">' . esc_html( $label ) . '</label>';
		echo '<div style="display:flex;align-items:center;gap:12px;">';
		if ( $img_url ) {
			echo '<img src="' . esc_url( $img_url ) . '" style="width:80px;height:80px;object-fit:cover;border-radius:6px;border:1px solid #ddd;">';
		}
		echo '<input type="hidden" name="' . esc_attr( $name ) . '" id="' . esc_attr( $name ) . '" value="' . esc_attr( $img_id ) . '">';
		echo '<button type="button" class="button bds-cl-img-picker" data-target="' . esc_attr( $name ) . '">' . esc_html__( 'Select Image', 'bd-somani' ) . '</button>';
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
	?>
	<script>
	jQuery(function($){
		$('.bds-cl-img-picker').on('click', function(){
			var targetId = $(this).data('target');
			var frame = wp.media({ title: 'Select Image', multiple: false });
			frame.on('select', function(){
				var att = frame.state().get('selection').first().toJSON();
				$('#' + targetId).val(att.id);
			});
			frame.open();
		});
	});
	</script>
	<?php
}

/**
 * Overview meta box callback.
 */
function theme_cl_overview_metabox_callback( $post ) {
	$fields = array(
		'_bds_cl_ov_tagline'    => array( 'label' => 'Tagline (small text above title)', 'type' => 'text' ),
		'_bds_cl_ov_title'      => array( 'label' => 'Section Title', 'type' => 'text' ),
		'_bds_cl_ov_desc'       => array( 'label' => 'Description Paragraph', 'type' => 'textarea' ),
		'_bds_cl_ov_cta_text'   => array( 'label' => 'CTA Button Label', 'type' => 'text' ),
		'_bds_cl_ov_cta_url'    => array( 'label' => 'CTA Button URL', 'type' => 'text' ),
		'_bds_cl_ov_annotation' => array( 'label' => 'Handwritten Annotation Text', 'type' => 'text' ),
	);

	$img_fields = array(
		'_bds_cl_ov_left_img_id'  => 'Left Floating Photo',
		'_bds_cl_ov_right_img_id' => 'Right Floating Photo',
	);

	echo '<div style="display:grid;gap:16px;padding:8px 0;">';
	foreach ( $fields as $key => $cfg ) {
		$val  = get_post_meta( $post->ID, $key, true );
		$name = ltrim( $key, '_' );
		echo '<div>';
		echo '<label for="' . esc_attr( $name ) . '" style="font-weight:600;display:block;margin-bottom:4px;">' . esc_html( $cfg['label'] ) . '</label>';
		if ( 'textarea' === $cfg['type'] ) {
			echo '<textarea id="' . esc_attr( $name ) . '" name="' . esc_attr( $name ) . '" rows="3" class="large-text">' . esc_textarea( $val ) . '</textarea>';
		} else {
			echo '<input type="text" id="' . esc_attr( $name ) . '" name="' . esc_attr( $name ) . '" value="' . esc_attr( $val ) . '" class="large-text" style="font-size:16px;padding:6px 10px;">';
		}
		echo '</div>';
	}
	foreach ( $img_fields as $key => $label ) {
		$img_id  = get_post_meta( $post->ID, $key, true );
		$img_url = $img_id ? wp_get_attachment_image_url( $img_id, 'thumbnail' ) : '';
		$name    = ltrim( $key, '_' );
		echo '<div>';
		echo '<label style="font-weight:600;display:block;margin-bottom:6px;">' . esc_html( $label ) . '</label>';
		echo '<div style="display:flex;align-items:center;gap:12px;">';
		if ( $img_url ) {
			echo '<img src="' . esc_url( $img_url ) . '" style="width:80px;height:80px;object-fit:cover;border-radius:6px;border:1px solid #ddd;">';
		}
		echo '<input type="hidden" name="' . esc_attr( $name ) . '" id="' . esc_attr( $name ) . '" value="' . esc_attr( $img_id ) . '">';
		echo '<button type="button" class="button bds-cl-img-picker-ov" data-target="' . esc_attr( $name ) . '">' . esc_html__( 'Select Image', 'bd-somani' ) . '</button>';
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
	?>
	<script>
	jQuery(function($){
		$('.bds-cl-img-picker-ov').on('click', function(){
			var targetId = $(this).data('target');
			var frame = wp.media({ title: 'Select Image', multiple: false });
			frame.on('select', function(){
				var att = frame.state().get('selection').first().toJSON();
				$('#' + targetId).val(att.id);
			});
			frame.open();
		});
	});
	</script>
	<?php
}

/**
 * Save Campus Life meta fields.
 */
function theme_save_campus_life_meta( $post_id ) {
	if ( ! isset( $_POST['bds_cl_nonce'] ) ) { return; }
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bds_cl_nonce'] ) ), 'bds_cl_save_meta' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

	$text_fields = array(
		'bds_cl_breadcrumb', 'bds_cl_hero_title', 'bds_cl_hero_subtitle',
		'bds_cl_cta_text', 'bds_cl_cta_url',
		'bds_cl_ov_tagline', 'bds_cl_ov_title', 'bds_cl_ov_desc',
		'bds_cl_ov_cta_text', 'bds_cl_ov_cta_url', 'bds_cl_ov_annotation',
	);
	$img_fields = array(
		'bds_cl_main_img_id', 'bds_cl_sub_img_id',
		'bds_cl_ov_left_img_id', 'bds_cl_ov_right_img_id',
	);

	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
	foreach ( $img_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, absint( $_POST[ $field ] ) );
		}
	}
}
add_action( 'save_post', 'theme_save_campus_life_meta' );

