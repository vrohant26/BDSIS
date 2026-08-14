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




