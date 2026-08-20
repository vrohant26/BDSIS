<?php
/**
 * Template Name: Academics Sub Page
 * Template Post Type: page, academics
 *
 * @package BD_Somani
 */

get_header();

// Fetch post metadata with defaults matching the design layout
$post_id = get_the_ID();

$breadcrumb    = get_post_meta( $post_id, '_bds_academics_breadcrumb', true );
$hero_title    = get_post_meta( $post_id, '_bds_academics_hero_title', true );
$hero_subtitle = get_post_meta( $post_id, '_bds_academics_hero_subtitle', true );
$cta_text      = get_post_meta( $post_id, '_bds_academics_cta_text', true );
$cta_url       = get_post_meta( $post_id, '_bds_academics_cta_url', true );
$main_img_id   = get_post_meta( $post_id, '_bds_academics_main_img_id', true );
$sub_img_id    = get_post_meta( $post_id, '_bds_academics_sub_img_id', true );

if ( empty( $breadcrumb ) ) {
	$breadcrumb = 'Academics / Daycare';
}
if ( empty( $hero_title ) ) {
	$hero_title = __( 'A Safe Space to Learn, Play and Grow', 'bd-somani' );
}
if ( empty( $hero_subtitle ) ) {
	$hero_subtitle = __( 'A nurturing environment where children feel safe, explore with confidence, and discover the joy of learning through meaningful everyday experiences.', 'bd-somani' );
}
if ( empty( $cta_text ) ) {
	$cta_text = __( 'ENQUIRE ABOUT DAYCARE', 'bd-somani' );
}
if ( empty( $cta_url ) ) {
	$cta_url = '#';
}

$main_img_url = $main_img_id ? wp_get_attachment_image_url( $main_img_id, 'full' ) : '';
$sub_img_url  = $sub_img_id ? wp_get_attachment_image_url( $sub_img_id, 'full' ) : '';
?>

<main id="primary" class="site-main academics-sub-page-main">
	<section class="academics-hero-section">
		<div class="site-container">
			<!-- Breadcrumbs -->
			<div class="academics-breadcrumbs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="academics-breadcrumb-home" aria-label="<?php esc_attr_e( 'Home', 'bd-somani' ); ?>">
					<?php
					$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
					if ( file_exists( $home_svg_path ) ) {
						include $home_svg_path;
					} else {
						echo '<iconify-icon icon="lucide:home"></iconify-icon>';
					}
					?>
				</a>
				<span class="academics-breadcrumb-sep">/</span>
				<span class="academics-breadcrumb-current"><?php echo esc_html( $breadcrumb ); ?></span>
			</div>

			<!-- Hero Grid Container -->
			<div class="academics-hero-grid">
				<!-- Left Text & CTA Column -->
				<div class="academics-hero-content">
					<div class="academics-hero-heading-wrap">
						<h1 class="academics-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
						<div class="academics-hero-doodle-arrow" aria-hidden="true">
							<?php
							$wavy_svg_path = get_template_directory() . '/assets/svgs/wavy arrow.svg';
							if ( file_exists( $wavy_svg_path ) ) {
								include $wavy_svg_path;
							}
							?>
						</div>
					</div>

					<p class="academics-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>

					<div class="academics-hero-cta">
						<a href="<?php echo esc_url( $cta_url ); ?>" class="academics-btn-primary">
							<span><?php echo esc_html( $cta_text ); ?></span>
							<iconify-icon icon="lucide:arrow-right" class="btn-arrow-icon"></iconify-icon>
						</a>
					</div>
				</div>

				<!-- Right Media Column with Overlapping Images / Placeholders -->
				<div class="academics-hero-media">
					<!-- Main Hero Photo -->
					<div class="academics-main-image-wrap">
						<?php if ( ! empty( $main_img_url ) ) : ?>
							<img src="<?php echo esc_url( $main_img_url ); ?>" alt="<?php echo esc_attr( $hero_title ); ?>" class="academics-main-img">
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/life at bd somani big image 1.webp' ); ?>" alt="<?php esc_attr_e( 'Main Hero Photo', 'bd-somani' ); ?>" class="academics-main-img">
						<?php endif; ?>
					</div>

					<!-- Secondary Overlapping Hero Photo -->
					<div class="academics-sub-image-wrap">
						<?php if ( ! empty( $sub_img_url ) ) : ?>
							<img src="<?php echo esc_url( $sub_img_url ); ?>" alt="<?php esc_attr_e( 'Sub Hero Photo', 'bd-somani' ); ?>" class="academics-sub-img">
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/life at bd somani sub image .webp' ); ?>" alt="<?php esc_attr_e( 'Sub Hero Photo', 'bd-somani' ); ?>" class="academics-sub-img">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Brand Marquee Scrolling Banner -->
	<?php get_template_part( 'template-parts/brand-marquee' ); ?>



	<?php
	// Programme / Overview section metadata
	$ov_has_tagline = metadata_exists( 'post', $post_id, '_bds_academics_overview_tagline' );
	$ov_has_title   = metadata_exists( 'post', $post_id, '_bds_academics_overview_title' );

	$ov_tagline   = get_post_meta( $post_id, '_bds_academics_overview_tagline', true );
	$ov_title     = get_post_meta( $post_id, '_bds_academics_overview_title', true );
	$ov_desc      = get_post_meta( $post_id, '_bds_academics_overview_desc', true );
	$ov_pdf_label = get_post_meta( $post_id, '_bds_academics_overview_pdf_label', true );
	$ov_pdf_url   = get_post_meta( $post_id, '_bds_academics_overview_pdf_url', true );

	$ov_left_img_id       = get_post_meta( $post_id, '_bds_academics_overview_img_left', true );
	$ov_right_img_id      = get_post_meta( $post_id, '_bds_academics_overview_img_right', true );
	$ov_annotation_svg_id = get_post_meta( $post_id, '_bds_academics_overview_annotation_svg', true );

	// Set default fallback values if meta has not been saved yet
	if ( ! $ov_has_tagline && empty( $ov_tagline ) ) {
		$ov_tagline = __( 'Daycare at B.D. Somani International School, Kharghar', 'bd-somani' );
	}
	if ( ! $ov_has_title && empty( $ov_title ) ) {
		$ov_title = __( 'A Programme Rooted in Caring and Learning', 'bd-somani' );
	}
	if ( empty( $ov_desc ) && ! metadata_exists( 'post', $post_id, '_bds_academics_overview_desc' ) ) {
		$ov_desc = __( 'A warm and nurturing environment where children feel safe, build confidence, and begin their learning journey through play, care, and meaningful everyday experiences.', 'bd-somani' );
	}
	if ( empty( $ov_pdf_label ) && ! metadata_exists( 'post', $post_id, '_bds_academics_overview_pdf_label' ) ) {
		$ov_pdf_label = __( 'Download Day Care Programme Overview', 'bd-somani' );
	}

	$ov_left_img_url       = $ov_left_img_id ? wp_get_attachment_image_url( $ov_left_img_id, 'full' ) : '';
	$ov_right_img_url      = $ov_right_img_id ? wp_get_attachment_image_url( $ov_right_img_id, 'full' ) : '';
	$ov_annotation_svg_url = $ov_annotation_svg_id ? wp_get_attachment_image_url( $ov_annotation_svg_id, 'full' ) : '';

	// Check if section should be displayed (only display if content is present)
	$show_overview_section = ! (
		empty( trim( $ov_tagline ) ) &&
		empty( trim( $ov_title ) ) &&
		empty( trim( $ov_desc ) ) &&
		empty( trim( $ov_pdf_url ) ) &&
		empty( $ov_left_img_id ) &&
		empty( $ov_right_img_id )
	);
	?>

	<?php if ( $show_overview_section ) : ?>
	<!-- Academics Programme / Overview Section -->
	<section class="academics-programme-section">
		<!-- Organic Background Wave Shape -->
		<div class="programme-bg-wave" aria-hidden="true">
			<svg width="542" height="301" viewBox="0 0 542 301" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M-53.6729 145.556C186.687 -214.416 176.577 441.129 326.732 198.926C476.887 -43.2773 560.878 315.087 417.107 431.678C273.341 548.268 531.154 616.46 504.917 639.622" stroke="var(--clr-wavy-purple-light)" stroke-width="70"/>
			</svg>
		</div>

		<div class="site-container programme-container">
			<!-- Left Floating Tilted Photo -->
			<div class="programme-left-card">
				<?php if ( ! empty( $ov_left_img_url ) ) : ?>
					<img src="<?php echo esc_url( $ov_left_img_url ); ?>" alt="<?php echo esc_attr( $ov_title ); ?>" class="programme-tilted-img">
				<?php else : ?>
					<div class="academics-image-placeholder programme-placeholder">
						<div class="placeholder-content">
							<iconify-icon icon="lucide:image" class="ph-icon-sm"></iconify-icon>
							<span class="ph-text-sm"><?php esc_html_e( 'Left Photo Placeholder', 'bd-somani' ); ?></span>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Center Text & Download Content -->
			<div class="programme-center-content">
				<?php if ( ! empty( $ov_tagline ) ) : ?>
					<span class="programme-tagline"><?php echo esc_html( $ov_tagline ); ?></span>
				<?php endif; ?>

				<?php if ( ! empty( $ov_title ) ) : ?>
					<h2 class="programme-title"><?php echo esc_html( $ov_title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $ov_desc ) ) : ?>
					<p class="programme-desc"><?php echo esc_html( $ov_desc ); ?></p>
				<?php endif; ?>

				<?php if ( ! empty( $ov_pdf_label ) && ! empty( $ov_pdf_url ) ) : ?>
					<div class="programme-pdf-wrap">
						<a href="<?php echo esc_url( $ov_pdf_url ); ?>" class="programme-pdf-btn" download>
							<span><?php echo esc_html( $ov_pdf_label ); ?></span>
							<?php
							$pdf_svg_path = get_template_directory() . '/assets/svgs/pdf download.svg';
							if ( file_exists( $pdf_svg_path ) ) {
								include $pdf_svg_path;
							} else {
								echo '<iconify-icon icon="lucide:download"></iconify-icon>';
							}
							?>
						</a>
					</div>
				<?php endif; ?>
			</div>

			<!-- Right Floating Tilted Photo -->
			<div class="programme-right-card">
				<?php if ( ! empty( $ov_right_img_url ) ) : ?>
					<img src="<?php echo esc_url( $ov_right_img_url ); ?>" alt="<?php echo esc_attr( $ov_title ); ?>" class="programme-tilted-img">
				<?php else : ?>
					<div class="academics-image-placeholder programme-placeholder">
						<div class="placeholder-content">
							<iconify-icon icon="lucide:image" class="ph-icon-sm"></iconify-icon>
							<span class="ph-text-sm"><?php esc_html_e( 'Right Photo Placeholder', 'bd-somani' ); ?></span>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Bottom Right Annotation SVG & Handwritten Note -->
			
		</div>
		<div class="programme-annotation-wrap">
				<?php if ( ! empty( $ov_annotation_svg_url ) ) : ?>
					<img src="<?php echo esc_url( $ov_annotation_svg_url ); ?>" alt="<?php esc_attr_e( 'Annotation', 'bd-somani' ); ?>" class="programme-annotation-img">
				<?php else : ?>
					<div class="programme-annotation-default">
						<svg class="annotation-arrow-svg" width="90" height="40" viewBox="0 0 90 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M85 35C60 35 40 15 10 10M10 10L20 5M10 10L18 20" stroke="#9C5E91" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="3 3"/>
						</svg>
						<span class="annotation-text"><?php esc_html_e( 'a place to feel safe, loved & inspired', 'bd-somani' ); ?></span>
					</div>
				<?php endif; ?>
			</div>
	</section>
	<?php endif; ?>

	<?php
	// Potential Banner / Video Section Metadata & Visibility
	$potential_visibility = get_post_meta( $post_id, '_bds_academics_potential_visibility', true );
	$show_potential_sec   = ( 'hide' !== $potential_visibility );

	$potential_title = metadata_exists( 'post', $post_id, '_bds_academics_potential_title' ) ? get_post_meta( $post_id, '_bds_academics_potential_title', true ) : __( 'A Place to Discover Your Superpower', 'bd-somani' );
	$potential_desc  = metadata_exists( 'post', $post_id, '_bds_academics_potential_desc' ) ? get_post_meta( $post_id, '_bds_academics_potential_desc', true ) : __( 'Every student brings unique strengths. Our campus gives them the opportunities to explore, develop, and let those strengths shine.', 'bd-somani' );
	$potential_video = get_post_meta( $post_id, '_bds_academics_potential_video', true );

	if ( empty( $potential_video ) ) {
		$potential_video = get_template_directory_uri() . '/assets/video/A2.webm';
	}
	?>

	<?php if ( $show_potential_sec ) : ?>
	<!-- Section: A Place to Discover Your Superpower Banner -->
	<section class="about-potential-section relative overflow-hidden">
		<div class="site-container relative z-2">
			<div class="about-potential-grid">
				
				<!-- Left Column: Content -->
				<div class="about-potential-content">
					<?php if ( ! empty( $potential_title ) ) : ?>
						<h2 class="about-potential-title"><?php echo esc_html( $potential_title ); ?></h2>
					<?php endif; ?>

					<?php if ( ! empty( $potential_desc ) ) : ?>
						<p class="about-potential-lead"><?php echo esc_html( $potential_desc ); ?></p>
					<?php endif; ?>
				</div>

				<!-- Right Column: Video Frame -->
				<div class="about-potential-media flex-center">
					<div class="about-potential-video-container relative">
						<div class="about-potential-video-wrap">
							<video autoplay loop muted playsinline>
								<source src="<?php echo esc_url( $potential_video ); ?>" type="video/mp4">
								<source src="<?php echo esc_url( $potential_video ); ?>" type="video/webm">
								<?php esc_html_e( 'Your browser does not support the video tag.', 'bd-somani' ); ?>
							</video>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php
	// Sticky Approach / Cards Section Metadata
	$app_eyebrow   = get_post_meta( $post_id, '_bds_academics_app_eyebrow', true );
	if ( empty( $app_eyebrow ) && ! metadata_exists( 'post', $post_id, '_bds_academics_app_eyebrow' ) ) {
		$app_eyebrow = __( 'EXPLORE OUR PROGRAMME', 'bd-somani' );
	}
	$app_has_title = metadata_exists( 'post', $post_id, '_bds_academics_app_title' );
	$app_title     = get_post_meta( $post_id, '_bds_academics_app_title', true );

	if ( metadata_exists( 'post', $post_id, '_bds_academics_app_desc' ) ) {
		$app_desc = get_post_meta( $post_id, '_bds_academics_app_desc', true );
	} else {
		$old_desc1 = get_post_meta( $post_id, '_bds_academics_app_desc1', true );
		$old_desc2 = get_post_meta( $post_id, '_bds_academics_app_desc2', true );
		$old_sched = get_post_meta( $post_id, '_bds_academics_app_schedule', true );

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

	if ( ! $app_has_title && empty( $app_title ) ) {
		$app_title = __( 'Our Approach', 'bd-somani' );
	}

	$default_cards_def = array(
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

	$app_cards = array();
	$has_any_card_content = false;

	for ( $i = 1; $i <= 5; $i++ ) {
		$c_title_meta = get_post_meta( $post_id, "_bds_academics_app_card{$i}_title", true );
		$c_desc_meta  = get_post_meta( $post_id, "_bds_academics_app_card{$i}_desc", true );
		$c_img_id     = get_post_meta( $post_id, "_bds_academics_app_card{$i}_img", true );

		if ( metadata_exists( 'post', $post_id, "_bds_academics_app_card{$i}_title" ) ) {
			$c_title = $c_title_meta;
		} else {
			$c_title = $default_cards_def[ $i ]['title'];
		}

		if ( metadata_exists( 'post', $post_id, "_bds_academics_app_card{$i}_desc" ) ) {
			$c_desc = $c_desc_meta;
		} else {
			$c_desc = $default_cards_def[ $i ]['desc'];
		}

		if ( ! empty( trim( $c_title ) ) || ! empty( trim( $c_desc ) ) || ! empty( $c_img_id ) ) {
			$has_any_card_content = true;
		}

		$app_cards[] = array(
			'title' => $c_title,
			'desc'  => $c_desc,
			'url'   => $c_img_id ? wp_get_attachment_image_url( $c_img_id, 'full' ) : '',
		);
	}

	$show_approach_section = ! (
		empty( trim( $app_title ) ) &&
		empty( trim( $app_desc ) ) &&
		! $has_any_card_content
	);
	?>

	<?php if ( $show_approach_section ) : ?>
	<!-- Academics Sticky Approach / Cards Section -->
	<section class="academics-approach-section">
		<div class="site-container academics-approach-grid">
			
			<!-- Left Column (Pinned / Fixed on Scroll) -->
			<div class="academics-approach-left-sticky">
				<?php if ( ! empty( $app_eyebrow ) ) : ?>
					<span class="academics-approach-eyebrow"><?php echo esc_html( $app_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $app_title ) ) : ?>
					<h2 class="academics-approach-title"><?php echo esc_html( $app_title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $app_desc ) ) : ?>
					<div class="academics-approach-paragraphs academics-approach-p-wrap relative">
						<div class="academics-approach-p reveal-text">
							<?php echo wpautop( wp_kses_post( $app_desc ) ); ?>
						</div>
						
						<!-- Curled Purple Arrow Doodle -->
						<div class="academics-curled-arrow" aria-hidden="true">
							<?php
							$doodle_arrow_path = get_template_directory() . '/assets/svgs/Doodle Arrow Icons .svg';
							if ( file_exists( $doodle_arrow_path ) ) {
								include $doodle_arrow_path;
							}
							?>
						</div>
					</div>
				<?php endif; ?>

				<!-- Bottom Left Book & Stars Doodle -->
				<div class="academics-book-stars-doodle" aria-hidden="true">
					<svg width="200" height="155" viewBox="0 0 140 110" fill="none" xmlns="http://www.w3.org/2000/svg">
						<!-- Floating Stars -->
						<path d="M78 12L80 18L86 20L80 22L78 28L76 22L70 20L76 18Z" fill="#C28FB6"/>
						<path d="M122 30L123.5 34L128 35.5L123.5 37L122 41L120.5 37L116 35.5L120.5 34Z" fill="#C28FB6"/>
						<path d="M18 70L19.5 73.5L23 75L19.5 76.5L18 80L16.5 76.5L13 75L16.5 73.5Z" fill="#C28FB6"/>

						<!-- Open Book Outline (Thickened) -->
						<path d="M10 88C22 76 42 75 58 84V38C42 29 22 30 10 42V88Z" stroke="#C28FB6" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M106 88C94 76 74 75 58 84V38C74 29 94 30 106 42V88Z" stroke="#C28FB6" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M20 52C30 44 44 43 54 48" stroke="#C28FB6" stroke-width="2.5" stroke-dasharray="3 3" stroke-linecap="round"/>
						<path d="M20 64C30 56 44 55 54 60" stroke="#C28FB6" stroke-width="2.5" stroke-dasharray="3 3" stroke-linecap="round"/>
						<path d="M96 52C86 44 72 43 62 48" stroke="#C28FB6" stroke-width="2.5" stroke-dasharray="3 3" stroke-linecap="round"/>
						<path d="M96 64C86 56 72 55 62 60" stroke="#C28FB6" stroke-width="2.5" stroke-dasharray="3 3" stroke-linecap="round"/>
					</svg>
				</div>
			</div>

			<!-- Right Column (Scrolling Cards List) -->
			<div class="academics-approach-cards-col">
				<?php foreach ( $app_cards as $idx => $card ) : ?>
					<?php if ( empty( trim( $card['title'] ) ) && empty( trim( $card['desc'] ) ) && empty( $card['url'] ) ) continue; ?>
					<div class="academics-card-item">
						<!-- Card Background Image / Placeholder -->
						<?php if ( ! empty( $card['url'] ) ) : ?>
							<img src="<?php echo esc_url( $card['url'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" class="academics-card-bg-img">
						<?php else : ?>
							<div class="academics-card-bg-placeholder placeholder-gradient-<?php echo ( ( $idx % 5 ) + 1 ); ?>"></div>
						<?php endif; ?>

						<!-- Dark Gradient Text Overlay -->
						<div class="academics-card-overlay">
							<h3 class="academics-card-title"><?php echo esc_html( $card['title'] ); ?></h3>
							<p class="academics-card-desc"><?php echo esc_html( $card['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</section>
	<?php endif; ?>

	<?php
	// Taking Every Interest Further Section Metadata & Visibility
	$interest_visibility = get_post_meta( $post_id, '_bds_academics_interest_visibility', true );
	$show_interest_section = ( 'hide' !== $interest_visibility );

	$interest_title = get_post_meta( $post_id, '_bds_academics_interest_title', true );
	$interest_sub   = get_post_meta( $post_id, '_bds_academics_interest_sub', true );

	if ( empty( $interest_title ) && ! metadata_exists( 'post', $post_id, '_bds_academics_interest_title' ) ) {
		$interest_title = __( 'Taking Every Interest Further', 'bd-somani' );
	}
	if ( empty( $interest_sub ) && ! metadata_exists( 'post', $post_id, '_bds_academics_interest_sub' ) ) {
		$interest_sub = __( 'Our commitment to nurturing curious, courageous, and collaborative learners continues beyond the classroom through enriching after-school experiences that help students discover new interests and grow with confidence.', 'bd-somani' );
	}
	?>

	<?php if ( $show_interest_section ) : ?>
	<!-- Academics After-School / Co-Curricular Section (Taking Every Interest Further) -->
	<section class="academics-interest-section relative overflow-hidden">
		<div class="site-container relative">

			<!-- Top Left Music Icon Doodle SVG -->
			<div class="academics-interest-music-doodle" aria-hidden="true">
				<?php
				$music_svg_path = get_template_directory() . '/assets/svgs/music icon.svg';
				if ( file_exists( $music_svg_path ) ) {
					include $music_svg_path;
				}
				?>
			</div>

			<!-- Section Header Content -->
			<div class="academics-interest-header text-center relative">
				<h2 class="academics-interest-title"><?php echo esc_html( $interest_title ); ?></h2>
				<p class="academics-interest-subtitle"><?php echo esc_html( $interest_sub ); ?></p>

				<!-- Top Right Annotation Doodle SVG (Help Them Discover What They Love) -->
				<div class="academics-interest-discover-doodle" aria-hidden="true">
					<?php
					$discover_svg_path = get_template_directory() . '/assets/svgs/help them discover what they love.svg';
					if ( file_exists( $discover_svg_path ) ) {
						include $discover_svg_path;
					}
					?>
				</div>
			</div>

			<!-- 3 Accordions Stack -->
			<div class="academics-interest-accordions flex-column gap-md">

				<!-- Accordion 1: Be Curious (Yellow) -->
				<div class="academics-interest-card accordion-yellow open">
					<button type="button" class="interest-accordion-header flex-between" aria-expanded="true">
						<h3 class="interest-accordion-title"><?php esc_html_e( 'Be Curious', 'bd-somani' ); ?></h3>
						<span class="interest-accordion-toggle-icon" aria-hidden="true"></span>
					</button>
					<div class="interest-accordion-body">
						<div class="interest-accordion-grid grid-3-cols">
							<!-- Item 1: Gyansthan Chess -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:horse-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Gyansthan Chess', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'Every move strengthens strategic thinking, decision-making, and problem-solving. Students are guided through expert coaching, practice sessions, and tournaments to continually refine their game.', 'bd-somani' ); ?></p>
							</div>

							<!-- Item 2: Young Rembrandts' Art -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:palette-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Young Rembrandts\' Art', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'A vibrant art programme where imagination comes to life through drawing, painting and sculpting. Every session inspires creative expression while sharpening students’ focus, observation and coordination.', 'bd-somani' ); ?></p>
							</div>

							<!-- Item 3: Sanskar Varg -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:flower-lotus-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Sanskar Varg', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'Rooted in Indian traditions, Sanskar Varg introduces students to Sanskrit mantras and cultural practices in an engaging way. Every session supports speech, breathing, and holistic well-being.', 'bd-somani' ); ?></p>
							</div>
						</div>
					</div>
				</div>

				<!-- Accordion 2: Be Collaborative (Lavender / Purple) -->
				<div class="academics-interest-card accordion-lavender">
					<button type="button" class="interest-accordion-header flex-between" aria-expanded="false">
						<h3 class="interest-accordion-title"><?php esc_html_e( 'Be Collaborative', 'bd-somani' ); ?></h3>
						<span class="interest-accordion-toggle-icon" aria-hidden="true"></span>
					</button>
					<div class="interest-accordion-body">
						<div class="interest-accordion-grid grid-3-cols">
							<!-- Item 1: Musical Bonding -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:music-notes-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Musical Bonding', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'Designed for parents and young learners, Musical Bonding transforms music and movement into joyful shared experiences. Every session nurtures rhythm, interaction, and meaningful connections through play.', 'bd-somani' ); ?></p>
							</div>

							<!-- Item 2: Pyjama Drama -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:mask-happy-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Pyjama Drama', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'An internationally acclaimed drama programme that brings stories to life through music, movement and imaginative play. Students learn to collaborate and communicate while building social connections.', 'bd-somani' ); ?></p>
							</div>

							<!-- Item 3: Speech & Drama -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:microphone-stage-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Speech & Drama', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'From voice and performance to scriptwriting and stagecraft, students learn to express themselves and captivate an audience. Such collaborative performances encourage teamwork, creativity, and storytelling.', 'bd-somani' ); ?></p>
							</div>
						</div>
					</div>
				</div>

				<!-- Accordion 3: Be Courageous (Peach) -->
				<div class="academics-interest-card accordion-peach">
					<button type="button" class="interest-accordion-header flex-between" aria-expanded="false">
						<h3 class="interest-accordion-title"><?php esc_html_e( 'Be Courageous', 'bd-somani' ); ?></h3>
						<span class="interest-accordion-toggle-icon" aria-hidden="true"></span>
					</button>
					<div class="interest-accordion-body">
						<div class="interest-accordion-grid grid-3-cols">
							<!-- Item 1: Football -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:soccer-ball-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Football', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'Delivered in partnership with LaLiga Academy, students build technique, game awareness and teamwork through structured coaching and match play. Every challenge on the field instils resilience, discipline and the confidence to keep pushing further.', 'bd-somani' ); ?></p>
							</div>

							<!-- Item 2: Basketball -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:basketball-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Basketball', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'Powered by NBA Basketball School, students hone their technical skills, coordination and teamwork through structured training and gameplay. Every game reinforces quick decision-making, perseverance and the confidence to perform under pressure.', 'bd-somani' ); ?></p>
							</div>

							<!-- Item 3: Taekwondo -->
							<div class="interest-item-box">
								<div class="interest-item-icon-wrap flex-center">
									<iconify-icon icon="ph:hand-fist-fill"></iconify-icon>
								</div>
								<h4 class="interest-item-title"><?php esc_html_e( 'Taekwondo', 'bd-somani' ); ?></h4>
								<p class="interest-item-desc"><?php esc_html_e( 'Through structured Taekwondo training, students develop strength, coordination and self-discipline. Each session builds focus, resilience and respect while giving students the confidence to challenge themselves and grow.', 'bd-somani' ); ?></p>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>
	<?php endif; ?>



	<?php
	// Experiences Section Metadata
	$exp_visibility = get_post_meta( $post_id, '_bds_academics_exp_visibility', true );
	$exp_has_title  = metadata_exists( 'post', $post_id, '_bds_academics_exp_main_title' );
	$exp_main_title = get_post_meta( $post_id, '_bds_academics_exp_main_title', true );
	$exp_sub_title  = get_post_meta( $post_id, '_bds_academics_exp_sub_title', true );
	$exp_sub_desc   = get_post_meta( $post_id, '_bds_academics_exp_sub_desc', true );

	if ( ! $exp_has_title && empty( $exp_main_title ) ) {
		$exp_main_title = __( 'Experiences that Enrich Classroom Learning', 'bd-somani' );
	}

	$exp_main_img_id = get_post_meta( $post_id, '_bds_academics_exp_main_img', true );
	$exp_sub_img_id  = get_post_meta( $post_id, '_bds_academics_exp_sub_img', true );

	$exp_main_img_url = $exp_main_img_id ? wp_get_attachment_image_url( $exp_main_img_id, 'full' ) : '';
	$exp_sub_img_url  = $exp_sub_img_id ? wp_get_attachment_image_url( $exp_sub_img_id, 'full' ) : '';

	$default_exp_cards_def = array(
		1 => array(
			'title' => __( 'Theme-Based Learning', 'bd-somani' ),
			'desc'  => __( 'Themes like My Family, Community Helpers, and Seasons connect learning across subjects, helping children relate classroom concepts to everyday life.', 'bd-somani' ),
		),
	);

	$exp_cards = array();
	$has_any_exp_card_content = false;

	for ( $i = 1; $i <= 20; $i++ ) {
		$c_t_meta = get_post_meta( $post_id, "_bds_academics_exp_card{$i}_title", true );
		$c_d_meta = get_post_meta( $post_id, "_bds_academics_exp_card{$i}_desc", true );
		$c_i_id   = get_post_meta( $post_id, "_bds_academics_exp_card{$i}_img", true );

		if ( metadata_exists( 'post', $post_id, "_bds_academics_exp_card{$i}_title" ) ) {
			$c_t = $c_t_meta;
		} else {
			$c_t = isset( $default_exp_cards_def[ $i ] ) ? $default_exp_cards_def[ $i ]['title'] : '';
		}

		if ( metadata_exists( 'post', $post_id, "_bds_academics_exp_card{$i}_desc" ) ) {
			$c_d = $c_d_meta;
		} else {
			$c_d = isset( $default_exp_cards_def[ $i ] ) ? $default_exp_cards_def[ $i ]['desc'] : '';
		}

		if ( ! empty( trim( $c_t ) ) || ! empty( trim( $c_d ) ) || ! empty( $c_i_id ) ) {
			$has_any_exp_card_content = true;
			$exp_cards[] = array(
				'title' => $c_t,
				'desc'  => $c_d,
				'url'   => $c_i_id ? wp_get_attachment_image_url( $c_i_id, 'full' ) : '',
			);
		}
	}

	$show_experiences_section = ( 'hide' !== $exp_visibility ) && ! (
		empty( trim( $exp_main_title ) ) &&
		empty( trim( $exp_sub_title ) ) &&
		empty( trim( $exp_sub_desc ) ) &&
		empty( $exp_main_img_url ) &&
		empty( $exp_sub_img_url ) &&
		! $has_any_exp_card_content
	);
	?>

	<?php if ( $show_experiences_section ) : ?>
	<!-- Academics Experiences Section -->
	<section class="academics-experiences-section relative overflow-hidden">
		<!-- Screen-Edge Navigation Arrow Buttons (Yellow Circles - Halfway Overflowing Screen Edge) -->
		<button type="button" class="carousel-nav-btn prev-btn experiences-prev-btn flex-center" aria-label="<?php esc_attr_e( 'Previous Slide', 'bd-somani' ); ?>">
			<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7 15L1 8M1 8L7 1M1 8H19" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		<button type="button" class="carousel-nav-btn next-btn experiences-next-btn flex-center" aria-label="<?php esc_attr_e( 'Next Slide', 'bd-somani' ); ?>">
			<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<div class="site-container">

			<!-- Centered Main Section Title with Peach Star Accent -->
			<div class="academics-exp-header text-center relative">
				<?php if ( ! empty( $exp_main_title ) ) : ?>
					<h2 class="academics-exp-main-title"><?php echo esc_html( $exp_main_title ); ?></h2>
				<?php endif; ?>

				<!-- Peach Star Doodle -->
				<div class="academics-exp-star-doodle" aria-hidden="true">
					<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M21 2L26.3 14.7L40 16.2L29.8 25.5L32.6 39L21 32L9.4 39L12.2 25.5L2 16.2L15.7 14.7L21 2Z" fill="#FFE0CF"/>
					</svg>
				</div>
			</div>

			<!-- Single Carousel Container (Left Content Block + Purple Cards) -->
			<div class="academics-exp-carousel-wrap relative">
				<div class="swiper experiences-swiper">
					<div class="swiper-wrapper">

						<!-- SLIDE 1: Left Content Block (Photos + Text) -->
						<?php if ( ! empty( trim( $exp_sub_title ) ) || ! empty( trim( $exp_sub_desc ) ) || ! empty( $exp_main_img_url ) || ! empty( $exp_sub_img_url ) ) : ?>
							<div class="swiper-slide experiences-left-content-slide">
								<div class="academics-exp-left-col">
									<!-- Left Photo Stack Container -->
									<div class="academics-exp-media-wrap relative">
										<!-- Purple Arrow Doodle above Main Photo -->
										<div class="academics-exp-curved-arrow" aria-hidden="true">
											<?php
											$arrow_doodle_path = get_template_directory() . '/assets/svgs/Doodle Arrow Icons .svg';
											if ( file_exists( $arrow_doodle_path ) ) {
												include $arrow_doodle_path;
											}
											?>
										</div>

										<!-- Large Main Photo Card -->
										<div class="academics-exp-main-card">
											<?php if ( ! empty( $exp_main_img_url ) ) : ?>
												<img src="<?php echo esc_url( $exp_main_img_url ); ?>" alt="<?php echo esc_attr( $exp_sub_title ); ?>" class="academics-exp-main-photo">
											<?php else : ?>
												<div class="academics-exp-photo-placeholder main-ph"></div>
											<?php endif; ?>
										</div>

										<!-- Overlapping Secondary Photo Card -->
										<div class="academics-exp-sub-card">
											<?php if ( ! empty( $exp_sub_img_url ) ) : ?>
												<img src="<?php echo esc_url( $exp_sub_img_url ); ?>" alt="<?php echo esc_attr( $exp_sub_title ); ?>" class="academics-exp-sub-photo">
											<?php else : ?>
												<div class="academics-exp-photo-placeholder sub-ph"></div>
											<?php endif; ?>
										</div>
									</div>

									<!-- Left Text Content Area -->
									<div class="academics-exp-text-wrap relative">
										<?php if ( ! empty( $exp_sub_title ) ) : ?>
											<h3 class="academics-exp-sub-title"><?php echo esc_html( $exp_sub_title ); ?></h3>
										<?php endif; ?>

										<?php if ( ! empty( $exp_sub_desc ) ) : ?>
											<p class="academics-exp-sub-desc reveal-text"><?php echo esc_html( $exp_sub_desc ); ?></p>
										<?php endif; ?>

										<div class="academics-exp-cta-wrap" style="margin-top: 1.5rem; position: relative; z-index: 2;">
											<a href="<?php echo esc_url( home_url( '/campus-life/' ) ); ?>" class="btn btn-yellow">
												<span><?php esc_html_e( 'EXPLORE STUDENT LIFE AT BDSIS', 'bd-somani' ); ?></span>
												<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="#3D213E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a>
										</div>

										<!-- Chess Pieces Doodle Graphic at bottom right -->
										<div class="academics-exp-chess-doodle" aria-hidden="true">
											<?php
											$chess_svg_path = get_template_directory() . '/assets/svgs/chess.svg';
											if ( file_exists( $chess_svg_path ) ) {
												include $chess_svg_path;
											}
											?>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<!-- SLIDES 2+: Dynamic Purple Cards with Varied Rotations (-3deg to 3deg) -->
						<?php 
						$tilt_angles = array( -2.5, 2.2, -1.8, 3.0, -2.8, 1.5 );
						foreach ( $exp_cards as $card_idx => $exp_card ) : 
						?>
							<?php if ( empty( trim( $exp_card['title'] ) ) && empty( trim( $exp_card['desc'] ) ) && empty( $exp_card['url'] ) ) continue; ?>
							<?php $rot_angle = $tilt_angles[ $card_idx % count( $tilt_angles ) ]; ?>
							<div class="swiper-slide experiences-card-slide">
								<div class="experiences-purple-card" style="transform: rotate(<?php echo $rot_angle; ?>deg);">
									<!-- Card Top Photo / Placeholder -->
									<div class="experiences-card-img-wrap">
										<?php if ( ! empty( $exp_card['url'] ) ) : ?>
											<img src="<?php echo esc_url( $exp_card['url'] ); ?>" alt="<?php echo esc_attr( $exp_card['title'] ); ?>" class="experiences-card-photo">
										<?php else : ?>
											<div class="experiences-card-photo-ph placeholder-gradient-<?php echo ( ( $card_idx % 4 ) + 1 ); ?>"></div>
										<?php endif; ?>
									</div>

									<!-- Card Bottom Purple Text Container -->
									<div class="experiences-card-content">
										<h4 class="experiences-card-title"><?php echo esc_html( $exp_card['title'] ); ?></h4>
										<p class="experiences-card-desc"><?php echo esc_html( $exp_card['desc'] ); ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>

			<!-- Bottom Linear Progress Bar Control Track & Fill -->
			<div class="experiences-progress-wrapper flex-center">
				<div class="experiences-progress-bar-track relative">
					<div class="experiences-progress-bar-fill" id="experiencesProgressBar"></div>
				</div>
			</div>
			</div>

		</div>
	</section>
	<?php endif; ?>

	<?php
	// Section: Cornerstones of Our Pre-Primary Programme Metadata
	$cs_visibility = get_post_meta( $post_id, '_bds_academics_cs_visibility', true );
	$cs_has_title  = metadata_exists( 'post', $post_id, '_bds_academics_cs_title' );
	$cs_main_title = get_post_meta( $post_id, '_bds_academics_cs_title', true );
	if ( ! $cs_has_title && empty( $cs_main_title ) ) {
		$cs_main_title = __( 'Cornerstones of Our Pre-Primary Programme', 'bd-somani' );
	}

	$has_custom_cs_meta = metadata_exists( 'post', $post_id, '_bds_academics_cs_title' ) || metadata_exists( 'post', $post_id, '_bds_academics_cs_tab1_title' );

	$default_cs_tabs = array(
		1 => array(
			'title' => __( 'Building Strong Foundations', 'bd-somani' ),
			'desc'  => __( 'Children learn in an environment that celebrates Indian values while embracing globally recognised teaching practices. Every lesson, activity, and assessment is thoughtfully designed to inspire confidence, curiosity, and a love for learning.', 'bd-somani' ),
			'icon'  => 'lucide:sun',
		),
		2 => array(
			'title' => __( 'Personalised Growth', 'bd-somani' ),
			'desc'  => __( 'Tailored learning pathways that support each child\'s unique pace, strengths, and personal milestones through individual guidance and nurturing attention.', 'bd-somani' ),
			'icon'  => 'lucide:puzzle',
		),
		3 => array(
			'title' => __( 'Future-Ready Mindsets', 'bd-somani' ),
			'desc'  => __( 'Fostering early critical thinking, adaptability, environmental awareness, and a lifelong curiosity to thrive in an ever-changing world.', 'bd-somani' ),
			'icon'  => 'lucide:sprout',
		),
	);

	$cs_tabs = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		$def_t  = $has_custom_cs_meta ? '' : ( isset( $default_cs_tabs[ $i ] ) ? $default_cs_tabs[ $i ]['title'] : '' );
		$def_d  = $has_custom_cs_meta ? '' : ( isset( $default_cs_tabs[ $i ] ) ? $default_cs_tabs[ $i ]['desc'] : '' );
		$def_ic = isset( $default_cs_tabs[ $i ] ) ? $default_cs_tabs[ $i ]['icon'] : 'lucide:sparkles';

		$tab_t       = metadata_exists( 'post', $post_id, "_bds_academics_cs_tab{$i}_title" ) ? get_post_meta( $post_id, "_bds_academics_cs_tab{$i}_title", true ) : $def_t;
		$tab_d       = metadata_exists( 'post', $post_id, "_bds_academics_cs_tab{$i}_desc" ) ? get_post_meta( $post_id, "_bds_academics_cs_tab{$i}_desc", true ) : $def_d;
		$tab_img_id  = get_post_meta( $post_id, "_bds_academics_cs_tab{$i}_img", true );
		$tab_img_url = $tab_img_id ? wp_get_attachment_image_url( $tab_img_id, 'full' ) : '';

		if ( ! empty( trim( $tab_t ) ) || ! empty( trim( $tab_d ) ) || ! empty( $tab_img_url ) ) {
			$cs_tabs[] = array(
				'title' => $tab_t,
				'desc'  => $tab_d,
				'img'   => $tab_img_url,
				'icon'  => $def_ic,
			);
		}
	}

	$show_cs_section = ( 'hide' !== $cs_visibility ) && ! empty( $cs_tabs );
	?>

	<?php if ( $show_cs_section ) : ?>
	<!-- Section: Cornerstones of Our Pre-Primary Programme -->
	<section class="purple-full-section relative overflow-hidden academics-cornerstones-section">
		<!-- Background Wavy Cream Ribbon SVG -->
		<svg class="experiential-ribbon-svg" viewBox="0 0 1060 878" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
			<path class="experiential-ribbon-path" d="M1033.64 -46.2938C1057.75 0.461853 590.175 55.3294 730.36 293.577C870.545 531.825 456.118 1134.19 403.613 675.948C351.109 217.711 -143.78 1360.05 -249.45 674.754" stroke="var(--clr-wavy-purple-light)" stroke-width="50" stroke-linecap="round"/>
		</svg>

		<div class="site-container relative z-2">
			<div class="experiential-grid">
				
				<!-- Left Image Box / Active Tab Image Stack Container -->
				<div class="experiential-media-wrapper relative">
					<div class="experiential-media-card placeholder-card relative overflow-hidden">
						<div class="experiential-slides cornerstones-slides">
							<?php 
							$default_photos = array(
								'/assets/images/daycare-photo-1.jpg',
								'/assets/images/daycare-photo-2.jpg',
								'/assets/images/daycare-photo-3.jpg',
							);
							foreach ( $cs_tabs as $idx => $tab ) : 
								$img_src = ! empty( $tab['img'] ) ? $tab['img'] : get_template_directory_uri() . ( isset( $default_photos[ $idx ] ) ? $default_photos[ $idx ] : '/assets/images/daycare-photo-1.jpg' );
							?>
								<img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $tab['title'] ); ?>" class="experiential-img-slide cornerstones-img-slide <?php echo $idx === 0 ? 'active' : ''; ?>" data-index="<?php echo $idx; ?>" loading="lazy" decoding="async">
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Segmented Timeline Progress Bar Below Image -->
					<div class="cornerstones-timeline-wrapper">
						<div class="cornerstones-segments-grid flex gap-xs">
							<?php foreach ( $cs_tabs as $idx => $tab ) : ?>
								<div class="cornerstones-segment-track <?php echo $idx === 0 ? 'active' : ''; ?>" data-segment-index="<?php echo $idx; ?>" role="button" aria-label="<?php echo esc_attr( $tab['title'] ); ?>">
									<div class="cornerstones-segment-fill"></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<!-- Right Topic & Interactive Accordion Tabs Box -->
				<div class="experiential-info-box flex-column gap-md relative">
					<div class="experiential-header flex-column gap-xs">
						<?php if ( ! empty( $cs_main_title ) ) : ?>
							<h2 class="experiential-title cornerstones-title"><?php echo esc_html( $cs_main_title ); ?></h2>
						<?php endif; ?>
					</div>

					<!-- Bullet Points Accordion Tabs List -->
					<div class="cornerstones-tabs-list flex-column gap-sm relative">
						<?php foreach ( $cs_tabs as $idx => $tab ) : ?>
							<div class="cornerstones-tab-item <?php echo $idx === 0 ? 'active' : ''; ?>" data-tab-index="<?php echo $idx; ?>">
								<button class="cornerstones-tab-btn" type="button">
									<iconify-icon icon="<?php echo esc_attr( $tab['icon'] ); ?>" class="cornerstones-tab-icon"></iconify-icon>
									<span class="cornerstones-tab-heading"><?php echo esc_html( $tab['title'] ); ?></span>
								</button>
								<?php if ( ! empty( $tab['desc'] ) ) : ?>
									<div class="cornerstones-tab-content">
										<div class="cornerstones-tab-content-inner">
											<p class="cornerstones-tab-desc"><?php echo esc_html( $tab['desc'] ); ?></p>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>

						<!-- Floating Paper Plane Doodle Icon -->
						<div class="experiential-paper-plane" aria-hidden="true">
							<?php
							$plane_svg_path = get_template_directory() . '/assets/svgs/Paper Plane Icon 1.svg';
							if ( file_exists( $plane_svg_path ) ) {
								include $plane_svg_path;
							}
							?>
						</div>
					</div>

				</div>

			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php
	// Circle of Care & Communication Section Metadata & Visibility
	$care_visibility = get_post_meta( $post_id, '_bds_academics_care_visibility', true );
	$show_care_section = ( 'hide' !== $care_visibility );

	$care_title = get_post_meta( $post_id, '_bds_academics_care_title', true );
	$care_sub   = get_post_meta( $post_id, '_bds_academics_care_sub', true );

	if ( empty( $care_title ) && ! metadata_exists( 'post', $post_id, '_bds_academics_care_title' ) ) {
		$care_title = __( 'A Circle of Care & Communication', 'bd-somani' );
	}
	if ( empty( $care_sub ) && ! metadata_exists( 'post', $post_id, '_bds_academics_care_sub' ) ) {
		$care_sub = __( 'We believe a child\'s growth is strongest when school and home work together. Through open communication, dedicated support, and a caring community, we keep parents actively involved in every step of the learning journey.', 'bd-somani' );
	}

	$care_cards_def = array(
		1 => array(
			'title' => __( 'School App', 'bd-somani' ),
			'desc'  => __( 'Regular updates, announcements and classroom communication through EduSprint.', 'bd-somani' ),
			'icon'  => 'school app.svg',
		),
		2 => array(
			'title' => __( 'Dedicated Support', 'bd-somani' ),
			'desc'  => __( 'Coordinators and qualified staff on every floor.', 'bd-somani' ),
			'icon'  => 'dedicated support.svg',
		),
		3 => array(
			'title' => __( 'Student Counselling', 'bd-somani' ),
			'desc'  => __( 'Two in-house counsellors for student well-being.', 'bd-somani' ),
			'icon'  => 'student counceling.svg',
		),
	);
	?>

	<?php if ( $show_care_section ) : ?>
	<!-- Academics Circle of Care & Communication Section -->
	<section class="academics-care-section relative overflow-hidden">
		<div class="site-container relative">

			<!-- Header Content with Top-Right Doodle Annotation -->
			<div class="academics-care-header text-center relative">
				<h2 class="academics-care-title"><?php echo esc_html( $care_title ); ?></h2>
				<p class="academics-care-subtitle"><?php echo esc_html( $care_sub ); ?></p>

				<!-- Top Right Annotation Doodle SVG (Keeping Parents in the Loop) -->
				<div class="academics-care-loop-doodle" aria-hidden="true">
					<?php
					$loop_doodle_path = get_template_directory() . '/assets/svgs/keeping the parents in the loop.svg';
					if ( file_exists( $loop_doodle_path ) ) {
						include $loop_doodle_path;
					}
					?>
				</div>
			</div>

			<!-- 3 Cards Grid -->
			<div class="academics-care-grid">
				<?php for ( $c = 1; $c <= 3; $c++ ) : ?>
					<?php
					$card_t_meta = get_post_meta( $post_id, "_bds_academics_care_card{$c}_title", true );
					$card_d_meta = get_post_meta( $post_id, "_bds_academics_care_card{$c}_desc", true );
					
					$card_t = metadata_exists( 'post', $post_id, "_bds_academics_care_card{$c}_title" ) ? $card_t_meta : $care_cards_def[ $c ]['title'];
					$card_d = metadata_exists( 'post', $post_id, "_bds_academics_care_card{$c}_desc" ) ? $card_d_meta : $care_cards_def[ $c ]['desc'];
					$card_d = str_replace( array( ' and MISC.', ' and MISC', ' & MISC.', ' & MISC' ), '.', $card_d );
					$icon_name = $care_cards_def[ $c ]['icon'];
					?>
					<div class="academics-care-card">
						<div class="care-card-icon-wrap flex-center">
							<?php
							$icon_file_path = get_template_directory() . '/assets/svgs/' . $icon_name;
							if ( file_exists( $icon_file_path ) ) {
								include $icon_file_path;
							}
							?>
						</div>
						<h3 class="care-card-title"><?php echo esc_html( $card_t ); ?></h3>
						<p class="care-card-desc"><?php echo esc_html( $card_d ); ?></p>
					</div>
				<?php endfor; ?>
			</div>

		</div>
	</section>
	<?php endif; ?>



</main>

<?php
get_footer();


