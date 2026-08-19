<?php
/**
 * Template Name: Gallery Page Template
 * Description: Custom template for Gallery matching B.D. Somani International School design with CPT & Taxonomy filtering.
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main gallery-page-custom">

	<div class="site-container">
		
		<!-- Breadcrumb Navigation (Consistent with About Page) -->
		<nav class="gallery-breadcrumb flex align-center gap-xs" aria-label="Breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-home-link flex align-center gap-xs" aria-label="Home">
				<?php 
				$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
				if ( file_exists( $home_svg_path ) ) {
					echo file_get_contents( $home_svg_path );
				} else {
					?>
					<svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 18V6L8 0L16 6V18H10V11H6V18H0Z" fill="#2B182C"/>
					</svg>
					<?php
				}
				?>
			</a>
			<span class="breadcrumb-separator">/</span>
			<span class="breadcrumb-current">Gallery</span>
		</nav>

		<!-- Hero Section -->
		<section class="gallery-hero-custom relative">
			
			<!-- Left Camera Doodle SVG Illustration -->
			<div class="gallery-camera-doodle">
				<?php 
				$camera_svg = get_template_directory() . '/assets/svgs/gallery camera.svg';
				if ( file_exists( $camera_svg ) ) {
					echo file_get_contents( $camera_svg );
				}
				?>
			</div>

			<!-- Right Background Decorative Wavy Line SVG -->
			<div class="gallery-wavy-decor">
				<svg width="423" height="422" viewBox="0 0 423 422" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M570.301 276.242C357.749 622.86 346.638 33.6598 214.397 265.741C82.1555 497.822 -7.27757 184.524 122.951 65.7798C253.18 -52.9641 10.9655 -88.8132 34.6725 -112.174" stroke="var(--clr-wavy-purple-light)" stroke-width="66" stroke-linecap="round"/>
				</svg>
			</div>

			<!-- Hero Title -->
			<div class="gallery-hero-content text-center relative z-2">
				<h1 class="gallery-hero-title">A Glimpse Into <br> Our Community and community</h1>
			</div>

		</section>

		<!-- Dark Purple Category Navigation Bar -->
		<div class="gallery-nav-bar-wrapper sticky-nav-bar">
			<nav class="gallery-category-nav" aria-label="Gallery Category Navigation">
				<ul class="gallery-nav-tabs" role="tablist">
					<li class="gallery-tab-item">
						<button class="gallery-tab-link active" data-category="all" role="tab" aria-selected="true">ALL</button>
					</li>
					<?php 
					$categories = get_terms( array(
						'taxonomy'   => 'gallery_category',
						'hide_empty' => false,
					) );

					$preset_categories = array(
						'campus'      => 'CAMPUS',
						'academics'   => 'ACADEMICS',
						'sports'      => 'SPORTS',
						'arts'        => 'ARTS',
						'events'      => 'EVENTS',
						'field-trips' => 'FIELD TRIPS',
						'extras'      => 'EXTRAS',
					);

					if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
						foreach ( $categories as $cat ) {
							$slug = esc_attr( $cat->slug );
							$name = esc_html( strtoupper( $cat->name ) );
							?>
							<li class="gallery-tab-item">
								<button class="gallery-tab-link" data-category="<?php echo $slug; ?>" role="tab" aria-selected="false"><?php echo $name; ?></button>
							</li>
							<?php
						}
					} else {
						foreach ( $preset_categories as $slug => $label ) {
							?>
							<li class="gallery-tab-item">
								<button class="gallery-tab-link" data-category="<?php echo $slug; ?>" role="tab" aria-selected="false"><?php echo $label; ?></button>
							</li>
							<?php
						}
					}
					?>
				</ul>
			</nav>
		</div>

		<!-- 4-Column Image Gallery Grid Container -->
		<div class="gallery-grid-container">
			<div class="gallery-grid" id="galleryGrid">

				<?php 
				$args = array(
					'post_type'      => 'gallery',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
				);

				$gallery_query = new WP_Query( $args );
				$has_cpt_images = false;

				if ( $gallery_query->have_posts() ) {
					while ( $gallery_query->have_posts() ) {
						$gallery_query->the_post();
						$post_id    = get_the_ID();
						$post_title = get_the_title();

						// Get Category Slugs
						$terms = get_the_terms( $post_id, 'gallery_category' );
						$slugs = array();
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								$slugs[] = $term->slug;
							}
						}
						$category_class = implode( ' ', $slugs );

						// Collect all images for this CPT item
						$images_to_display = array();

						// 1. Featured Image
						$featured_url = get_the_post_thumbnail_url( $post_id, 'full' );
						if ( $featured_url ) {
							$images_to_display[] = array(
								'url'   => $featured_url,
								'title' => $post_title,
							);
						}

						// 2. Custom Album Metabox Images
						$meta_ids = get_post_meta( $post_id, '_bds_gallery_image_ids', true );
						if ( ! empty( $meta_ids ) ) {
							$ids_arr = explode( ',', $meta_ids );
							foreach ( $ids_arr as $img_id ) {
								$img_id = intval( trim( $img_id ) );
								if ( $img_id > 0 ) {
									$full_url = wp_get_attachment_image_url( $img_id, 'full' );
									$alt_text = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
									if ( $full_url ) {
										$images_to_display[] = array(
											'url'   => $full_url,
											'title' => ! empty( $alt_text ) ? $alt_text : $post_title,
										);
									}
								}
							}
						}

						// 3. Attached Media Images
						$attachments = get_attached_media( 'image', $post_id );
						if ( ! empty( $attachments ) ) {
							foreach ( $attachments as $att ) {
								$att_url = wp_get_attachment_image_url( $att->ID, 'full' );
								if ( $att_url ) {
									$images_to_display[] = array(
										'url'   => $att_url,
										'title' => ! empty( $att->post_title ) ? $att->post_title : $post_title,
									);
								}
							}
						}

						// De-duplicate images by URL
						$unique_images = array();
						foreach ( $images_to_display as $item ) {
							$unique_images[ $item['url'] ] = $item;
						}

						if ( ! empty( $unique_images ) ) {
							$has_cpt_images = true;
							foreach ( $unique_images as $img_item ) {
								?>
								<div class="gallery-card-item <?php echo esc_attr( $category_class ); ?>" data-category="<?php echo esc_attr( $category_class ); ?>">
									<div class="gallery-card-inner">
										<img src="<?php echo esc_url( $img_item['url'] ); ?>" alt="<?php echo esc_attr( $img_item['title'] ); ?>" class="gallery-img" loading="lazy" decoding="async">
										<div class="gallery-card-overlay">
											<span class="gallery-card-title"><?php echo esc_html( $img_item['title'] ); ?></span>
											<iconify-icon icon="lucide:zoom-in" class="zoom-icon"></iconify-icon>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					wp_reset_postdata();
				}

				if ( ! $has_cpt_images ) {
					// Fallback Curated Gallery Set matching screenshots & categories
					$fallback_items = array(
						array(
							'title'    => 'Campus Grounds & Sports Turf',
							'category' => 'campus sports',
							'img'      => get_template_directory_uri() . '/assets/images/BD Somani International School Building.webp',
						),
						array(
							'title'    => 'Acoustic Indoor Auditorium',
							'category' => 'campus arts',
							'img'      => get_template_directory_uri() . '/assets/images/performing arts.webp',
						),
						array(
							'title'    => 'Main Academic Block Aerial View',
							'category' => 'campus',
							'img'      => get_template_directory_uri() . '/assets/images/middle school 1.webp',
						),
						array(
							'title'    => 'Multi-Purpose Athletic Field',
							'category' => 'sports campus',
							'img'      => get_template_directory_uri() . '/assets/images/indoor and outdoor sports.webp',
						),
						array(
							'title'    => 'Outdoor Play Area & Turf',
							'category' => 'campus extras',
							'img'      => get_template_directory_uri() . '/assets/images/daycare1.webp',
						),
						array(
							'title'    => 'Basketball & Athletics Court',
							'category' => 'sports',
							'img'      => get_template_directory_uri() . '/assets/images/primary school 1.webp',
						),
						array(
							'title'    => 'Temperature Regulated Swimming Pool',
							'category' => 'campus sports',
							'img'      => get_template_directory_uri() . '/assets/images/middle school 2.webp',
						),
						array(
							'title'    => 'Kharghar School Entrance & Turf',
							'category' => 'campus',
							'img'      => get_template_directory_uri() . '/assets/images/primary school 2.webp',
						),
						array(
							'title'    => 'Science Laboratory Experiment',
							'category' => 'academics',
							'img'      => get_template_directory_uri() . '/assets/images/footer images/Exported Photo DSC1318 1.webp',
						),
						array(
							'title'    => 'Library & Reading Room',
							'category' => 'academics arts',
							'img'      => get_template_directory_uri() . '/assets/images/reading and literature club.webp',
						),
						array(
							'title'    => 'Annual Cultural Event',
							'category' => 'events arts',
							'img'      => get_template_directory_uri() . '/assets/images/clubs and activities.webp',
						),
						array(
							'title'    => 'Field Trips & Outings',
							'category' => 'field-trips extras',
							'img'      => get_template_directory_uri() . '/assets/images/innovation and design workshop.webp',
						),
					);

					foreach ( $fallback_items as $item ) {
						?>
						<div class="gallery-card-item <?php echo esc_attr( $item['category'] ); ?>" data-category="<?php echo esc_attr( $item['category'] ); ?>">
							<div class="gallery-card-inner">
								<img src="<?php echo esc_url( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="gallery-img" loading="lazy" decoding="async">
								<div class="gallery-card-overlay">
									<span class="gallery-card-title"><?php echo esc_html( $item['title'] ); ?></span>
									<iconify-icon icon="lucide:zoom-in" class="zoom-icon"></iconify-icon>
								</div>
							</div>
						</div>
						<?php
					}
				}
				?>

			</div>
		</div>

	</div><!-- /.site-container -->

	<!-- Fullscreen Lightbox Modal -->
	<div class="gallery-lightbox-modal" id="galleryLightbox" aria-hidden="true" role="dialog" aria-label="Image Lightbox Preview">
		<div class="lightbox-backdrop"></div>
		<button class="lightbox-close-btn" aria-label="Close image preview">
			<iconify-icon icon="lucide:x"></iconify-icon>
		</button>
		<button class="lightbox-nav-btn prev-btn" id="lightboxPrevBtn" aria-label="Previous image">
			<iconify-icon icon="lucide:chevron-left"></iconify-icon>
		</button>
		<button class="lightbox-nav-btn next-btn" id="lightboxNextBtn" aria-label="Next image">
			<iconify-icon icon="lucide:chevron-right"></iconify-icon>
		</button>
		<div class="lightbox-content-box">
			<img src="" alt="" class="lightbox-active-img" id="lightboxActiveImg">
			<div class="lightbox-caption" id="lightboxCaption"></div>
		</div>
	</div>

</main>

<?php
get_footer();
