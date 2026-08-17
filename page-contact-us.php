<?php
/**
 * Template Name: Contact Us Page
 * Template Post Type: page
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main contact-page-custom">
	<div class="site-container">

	

		<!-- Hero Section: Contact Details & Form Grid -->
		<section class="contact-hero-section relative">

			<!-- Breadcrumb -->
		<div class="contact-breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Home', 'bd-somani' ); ?>">
				<?php
				$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
				if ( file_exists( $home_svg_path ) ) {
					include $home_svg_path;
				} else {
					echo '<iconify-icon icon="lucide:home"></iconify-icon>';
				}
				?>
			</a>
			<span class="breadcrumb-separator">/</span>
			<span class="breadcrumb-current"><?php esc_html_e( 'Contact Us', 'bd-somani' ); ?></span>
		</div>

			<!-- Right Background Organic Wave Shape Accent -->
			<div class="contact-form-bg-wave" aria-hidden="true">
				<?php
				$contact_wave_svg = get_template_directory() . '/assets/svgs/contact form wave bg.svg';
				if ( file_exists( $contact_wave_svg ) ) {
					include $contact_wave_svg;
				}
				?>
			</div>

			<div class="contact-hero-grid relative z-2">

				<!-- Left Column: Heading, Address & Phone Details -->
				<div class="contact-hero-left">
					<h1 class="contact-hero-title"><?php esc_html_e( 'We\'d Love to Hear From You', 'bd-somani' ); ?></h1>
					<p class="contact-hero-subtitle">
						<?php esc_html_e( 'Whether you have questions about admissions, our curriculum, or campus visits, our team is here to guide you every step of the way.', 'bd-somani' ); ?>
					</p>

					<!-- Contact Info List -->
					<ul class="contact-details-list">
						<li class="contact-detail-item">
							<div class="contact-icon-wrap" aria-hidden="true">
								<iconify-icon icon="lucide:map-pin"></iconify-icon>
							</div>
							<div class="contact-detail-text">
								<strong><?php esc_html_e( 'Address:', 'bd-somani' ); ?></strong><br>
								<?php esc_html_e( 'BD Somani International School, Plot #92, Sector 27, Kharghar, Navi Mumbai 410210', 'bd-somani' ); ?>
							</div>
						</li>

						<li class="contact-detail-item">
							<div class="contact-icon-wrap" aria-hidden="true">
								<iconify-icon icon="lucide:phone"></iconify-icon>
							</div>
							<div class="contact-detail-text">
								<strong><?php esc_html_e( 'Phone:', 'bd-somani' ); ?></strong><br>
								<a href="tel:+918976932746" class="contact-detail-link">+91 89769 32746</a> / 
								<a href="tel:+918976932747" class="contact-detail-link">+91 89769 32747</a>
							</div>
						</li>

						<li class="contact-detail-item">
							<div class="contact-icon-wrap" aria-hidden="true">
								<iconify-icon icon="lucide:mail"></iconify-icon>
							</div>
							<div class="contact-detail-text">
								<strong><?php esc_html_e( 'Email:', 'bd-somani' ); ?></strong><br>
								<a href="mailto:admissions.kharghar@bdsomani.org" class="contact-detail-link">admissions.kharghar@bdsomani.org</a>
							</div>
						</li>
					</ul>

					<!-- Additional Links (Pill Buttons) -->
					<div class="contact-extra-links">
						<div class="extra-link-item">
							<span><?php esc_html_e( 'For Admissions Enquiry', 'bd-somani' ); ?></span>
							<a href="<?php echo esc_url( home_url( '/admissions/' ) ); ?>" class="yellow-click-pill"><?php esc_html_e( 'CLICK HERE', 'bd-somani' ); ?></a>
						</div>
						<div class="extra-link-item">
							<span><?php esc_html_e( 'For Career Opportunities', 'bd-somani' ); ?></span>
							<a href="mailto:careers.kharghar@bdsomani.org" class="yellow-click-pill"><?php esc_html_e( 'CLICK HERE', 'bd-somani' ); ?></a>
						</div>
					</div>

					<!-- Enquiry Form Hand-drawn Accent Doodle (Frame 120.svg) -->
					<div class="enquiry-doodle-accent" aria-hidden="true">
						<?php
						$frame120_svg_path = get_template_directory() . '/assets/svgs/Frame 120.svg';
						if ( file_exists( $frame120_svg_path ) ) {
							include $frame120_svg_path;
						} else {
							?>
							<svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10 25C40 10 120 40 160 15M160 15L150 10M160 15L152 25" stroke="#49274A" stroke-width="2" stroke-linecap="round"/>
							</svg>
							<?php
						}
						?>
					</div>
				</div>

				<!-- Right Column: Purple Form Card -->
				<div class="contact-hero-right" id="enquire">
					<div class="contact-purple-card relative">
						
						<!-- Form Content (Gravity Forms or Fallback) -->
						<div class="contact-form-container">
							<?php
							// If Gravity Form ID is configured in WP Admin, render shortcode [gravityform id="1"]
							$gform_id = get_option( 'bds_contact_gform_id', '' );
							if ( ! empty( $gform_id ) && function_exists( 'gravity_form' ) ) {
								gravity_form( $gform_id, false, false, false, null, true );
							} else {
								// Mock HTML Form matching design structure
								?>
								<form action="#" method="post" class="contact-mock-form">
									<div class="form-row">
										<div class="form-group">
											<label for="first_name"><?php esc_html_e( 'First Name', 'bd-somani' ); ?></label>
											<input type="text" id="first_name" name="first_name" placeholder="<?php esc_attr_e( 'Enter your first name', 'bd-somani' ); ?>" required />
										</div>
										<div class="form-group">
											<label for="last_name"><?php esc_html_e( 'Last Name', 'bd-somani' ); ?></label>
											<input type="text" id="last_name" name="last_name" placeholder="<?php esc_attr_e( 'Enter your last name', 'bd-somani' ); ?>" required />
										</div>
									</div>

									<div class="form-row">
										<div class="form-group">
											<label for="email"><?php esc_html_e( 'Email ID', 'bd-somani' ); ?></label>
											<input type="email" id="email" name="email" placeholder="<?php esc_attr_e( 'xyz@example.com', 'bd-somani' ); ?>" required />
										</div>
										<div class="form-group">
											<label for="mobile_number"><?php esc_html_e( 'Mobile Number', 'bd-somani' ); ?></label>
											<input type="tel" id="mobile_number" name="mobile_number" placeholder="<?php esc_attr_e( '+91 9876543210', 'bd-somani' ); ?>" required />
										</div>
									</div>

									<div class="form-group">
										<label for="your_message"><?php esc_html_e( 'Your Message', 'bd-somani' ); ?></label>
										<textarea id="your_message" name="your_message" rows="4" placeholder="<?php esc_attr_e( 'Let us know how we can assist you...', 'bd-somani' ); ?>"></textarea>
									</div>

									<div class="form-submit-wrap">
										<button type="submit" class="btn-yellow-submit"><?php esc_html_e( 'SUBMIT', 'bd-somani' ); ?></button>
									</div>
								</form>
								<?php
							}
							?>
						</div>

						<!-- Background Card Vector Accent -->
						<div class="purple-card-bg-accent" aria-hidden="true"></div>
					</div>
				</div>

			</div>
		</section>

		<!-- Brand Marquee Scrolling Banner -->
		<?php get_template_part( 'template-parts/brand-marquee' ); ?>

	</div>

	<!-- Bottom Section: Map & Nearby Highlights -->
	<section class="contact-map-section relative">
		<div class="site-container map-section-container relative">
			
			<div class="contact-map-outer-wrapper relative">

				<!-- Google Maps Responsive iFrame (80% Aligned Right with Border Radius) -->
				<div class="google-map-embed-wrapper">
					<iframe 
						src="https://maps.google.com/maps?q=B.D.+Somani+International+School,+Plot+%2392,+Sector+27,+Kharghar,+Navi+Mumbai+410210&t=&z=16&ie=UTF8&iwloc=B&output=embed" 
						width="100%" 
						height="100%" 
						style="border:0;" 
						allowfullscreen="" 
						loading="lazy" 
						referrerpolicy="no-referrer-when-downgrade"
						title="BD Somani International School Kharghar Google Map Location">
					</iframe>
				</div>

				<!-- Nearby Highlights Floating Card (Overlapping Left Aligned) -->
				<div class="nearby-highlights-card">
					<div class="highlights-card-inner relative">

						<!-- Top Right Paper Plane Doodle Accent -->
						<div class="highlights-plane-doodle" aria-hidden="true">
							<svg width="95" height="55" viewBox="0 0 95 55" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 45C35 45 45 25 72 15M72 15L64 12M72 15L68 23" stroke="#9C5E91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="3.5 3.5"/>
								<path d="M72 15L90 8L82 25L72 15Z" fill="#9C5E91"/>
							</svg>
						</div>

						<!-- Badge Header -->
						<div class="highlights-badge flex-align-center">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="M12 2L14.5 9.5L22 12L14.5 14.5L12 22L9.5 14.5L2 12L9.5 9.5L12 2Z" fill="#F1C822" stroke="#F1C822" stroke-width="1.5" stroke-linejoin="round"/>
							</svg>
							<span class="badge-text"><?php esc_html_e( 'NEARBY HIGHLIGHTS', 'bd-somani' ); ?></span>
						</div>

						<h2 class="highlights-title"><?php esc_html_e( 'Everything', 'bd-somani' ); ?><br><?php esc_html_e( 'within reach', 'bd-somani' ); ?></h2>
						<p class="highlights-subtitle"><?php esc_html_e( 'A CAMPUS SURROUNDED BY SPACES TO EXPLORE, UNWIND AND GROW', 'bd-somani' ); ?></p>

						<!-- Highlights List -->
						<div class="highlights-list">
							
							<!-- Item 1: ISKCON Kharghar (Purple Icon Circle) -->
							<div class="highlight-item">
								<div class="highlight-icon-circle icon-purple">
									<iconify-icon icon="lucide:building-2"></iconify-icon>
								</div>
								<div class="highlight-content">
									<h3 class="highlight-item-title"><?php esc_html_e( 'ISKCON Kharghar', 'bd-somani' ); ?></h3>
									<p class="highlight-item-desc"><?php esc_html_e( 'temple and cultural centre', 'bd-somani' ); ?></p>
								</div>
							</div>

							<!-- Item 2: Kharghar Valley Golf Course (Orange Icon Circle) -->
							<div class="highlight-item">
								<div class="highlight-icon-circle icon-orange">
									<iconify-icon icon="lucide:flag"></iconify-icon>
								</div>
								<div class="highlight-content">
									<h3 class="highlight-item-title"><?php esc_html_e( 'Kharghar Valley Golf Cource', 'bd-somani' ); ?></h3>
									<p class="highlight-item-desc"><?php esc_html_e( 'Green Spaces and recreation', 'bd-somani' ); ?></p>
								</div>
							</div>

							<!-- Item 3: Central Park (Yellow Icon Circle) -->
							<div class="highlight-item">
								<div class="highlight-icon-circle icon-yellow">
									<iconify-icon icon="lucide:trees"></iconify-icon>
								</div>
								<div class="highlight-content">
									<h3 class="highlight-item-title"><?php esc_html_e( 'Central Park', 'bd-somani' ); ?></h3>
									<p class="highlight-item-desc"><?php esc_html_e( 'Nature, play and leisure', 'bd-somani' ); ?></p>
								</div>
							</div>

						</div>

						<!-- Bottom Link: Get directions -->
						<div class="highlights-link-wrap">
							<a href="https://maps.app.goo.gl/UuLxFmtv5xehKnms9" target="_blank" rel="noopener noreferrer" class="get-directions-link">
								<span><?php esc_html_e( 'Get directions', 'bd-somani' ); ?></span> <span class="arrow-icon">↗</span>
							</a>
						</div>

						<!-- Bottom Right Yellow Star Doodle Accent -->
						<div class="highlights-star-doodle" aria-hidden="true">
							<svg width="40" height="40" viewBox="0 0 24 24" fill="#FDE47F" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z"/>
							</svg>
						</div>

					</div>
				</div>

			</div>

		</div>
	</section>
</main>

<?php
get_footer();
