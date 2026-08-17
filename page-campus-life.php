<?php
/**
 * Template Name: Campus Life Page
 * Template Post Type: page
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main academics-sub-page-main campus-life-main">

	<!-- SECTION 1: HERO -->
	<section class="academics-hero-section">
		<div class="site-container">

			<div class="academics-breadcrumbs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="academics-breadcrumb-home" aria-label="<?php esc_attr_e( 'Home', 'bd-somani' ); ?>">
					<?php
					$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
					if ( file_exists( $home_svg_path ) ) { include $home_svg_path; }
					else { echo '<iconify-icon icon="lucide:home"></iconify-icon>'; }
					?>
				</a>
				<span class="academics-breadcrumb-sep">/</span>
				<span class="academics-breadcrumb-current"><?php esc_html_e( 'Campus Life', 'bd-somani' ); ?></span>
			</div>

			<div class="academics-hero-grid">
				<div class="academics-hero-content">
					<div class="academics-hero-heading-wrap">
						<h1 class="academics-hero-title"><?php esc_html_e( 'A Campus Life Designed to Nurture Purposeful Growth', 'bd-somani' ); ?></h1>
						<div class="academics-hero-doodle-arrow" aria-hidden="true">
							<?php
							$wavy_svg_path = get_template_directory() . '/assets/svgs/wavy arrow.svg';
							if ( file_exists( $wavy_svg_path ) ) { include $wavy_svg_path; }
							?>
						</div>
					</div>
					<p class="academics-hero-subtitle"><?php esc_html_e( 'From sports and performing arts to clubs and experiential learning, our campus nurtures every aspect of a child\'s growth.', 'bd-somani' ); ?></p>
					<div class="academics-hero-cta">
						<a href="#campus-programme" class="academics-btn-primary">
							<span><?php esc_html_e( 'EXPLORE OUR CAMPUS BELOW', 'bd-somani' ); ?></span>
							<iconify-icon icon="lucide:arrow-right" class="btn-arrow-icon"></iconify-icon>
						</a>
					</div>
				</div>

				<div class="academics-hero-media">
					<div class="academics-main-image-wrap">
						<div class="academics-image-placeholder academics-main-placeholder">
							<div class="placeholder-content">
								<iconify-icon icon="lucide:image" class="ph-icon"></iconify-icon>
								<span class="ph-text"><?php esc_html_e( 'Main Hero Photo Placeholder', 'bd-somani' ); ?></span>
							</div>
						</div>
					</div>
					<div class="academics-sub-image-wrap">
						<div class="academics-image-placeholder academics-sub-placeholder">
							<div class="placeholder-content">
								<iconify-icon icon="lucide:image-plus" class="ph-icon-sm"></iconify-icon>
								<span class="ph-text-sm"><?php esc_html_e( 'Secondary Photo Placeholder', 'bd-somani' ); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- MARQUEE BANNER -->
	<section class="academics-marquee-section" aria-label="Campus Life values marquee">
		<div class="marquee-track">
			<div class="marquee-content academics-marquee-content">
				<span>STUDENT-CENTRED LEARNING</span>
				<span class="marquee-star">★</span>
				<span>GLOBAL OUTLOOK</span>
				<span class="marquee-star">★</span>
				<span>NURTURING ENVIRONMENT</span>
				<span class="marquee-star">★</span>
				<span>COLLABORATIVE CULTURE</span>
				<span class="marquee-star">★</span>
			</div>
			<div class="marquee-content academics-marquee-content" aria-hidden="true">
				<span>STUDENT-CENTRED LEARNING</span>
				<span class="marquee-star">★</span>
				<span>GLOBAL OUTLOOK</span>
				<span class="marquee-star">★</span>
				<span>NURTURING ENVIRONMENT</span>
				<span class="marquee-star">★</span>
				<span>COLLABORATIVE CULTURE</span>
				<span class="marquee-star">★</span>
			</div>
		</div>
	</section>

	<!-- SECTION 2: CAMPUS PROGRAMME OVERVIEW SECTION -->
	<section class="academics-programme-section" id="campus-programme">
		<!-- Organic Background Wave Shape -->
		<div class="programme-bg-wave" aria-hidden="true">
			<svg width="532" height="291" viewBox="0 0 532 291" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M-53.669 135.552C186.691 -224.42 176.581 431.125 326.736 188.922C476.891 -53.2813 560.882 305.083 417.111 421.674C273.341 538.264 531.158 606.456 504.921 629.618" stroke="#FFE9DB" stroke-width="50"/>
			</svg>
		</div>

		<div class="site-container programme-container">
			<!-- Left Floating Tilted Photo Placeholder -->
			<div class="programme-left-card">
				<div class="academics-image-placeholder programme-placeholder">
					<div class="placeholder-content">
						<iconify-icon icon="lucide:image" class="ph-icon-sm"></iconify-icon>
						<span class="ph-text-sm"><?php esc_html_e( 'Left Photo Placeholder', 'bd-somani' ); ?></span>
					</div>
				</div>
			</div>

			<!-- Center Text & CTA Button -->
			<div class="programme-center-content">
				<h2 class="programme-title"><?php esc_html_e( 'Every Day Shapes Tomorrow.', 'bd-somani' ); ?></h2>
				<p class="programme-desc"><?php esc_html_e( 'Campus life at B.D. Somani is built around experiences that inspire curiosity, encourage collaboration, and nurture confidence. Whether inside the classroom or beyond it, every moment is an opportunity to discover new passions, build meaningful friendships, and grow into a future-ready individual.', 'bd-somani' ); ?></p>
				
				<div class="programme-pdf-wrap flex-center">
					<a href="#student-life" class="btn btn-yellow radius-md flex-center" style="display: inline-flex; padding: 0.85rem 1.75rem; text-decoration: none;">
						<span><?php esc_html_e( 'EXPLORE STUDENT LIFE', 'bd-somani' ); ?></span>
						<svg width="18" height="14" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 8px;">
							<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</a>
				</div>
			</div>

			<!-- Right Floating Tilted Photo Placeholder -->
			<div class="programme-right-card">
				<div class="academics-image-placeholder programme-placeholder">
					<div class="placeholder-content">
						<iconify-icon icon="lucide:image" class="ph-icon-sm"></iconify-icon>
						<span class="ph-text-sm"><?php esc_html_e( 'Right Photo Placeholder', 'bd-somani' ); ?></span>
					</div>
				</div>
			</div>
		</div>

		<!-- Bottom Right Annotation SVG Graphic -->
		<div class="programme-annotation-wrap">
			<?php
			$flight_svg_path = get_template_directory() . '/assets/svgs/curiosity takes flight.svg';
			if ( file_exists( $flight_svg_path ) ) {
				include $flight_svg_path;
			}
			?>
		</div>
	</section>

</main>

<?php
get_footer();
