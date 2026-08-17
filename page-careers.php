<?php
/**
 * Template Name: Careers Page
 * Template Post Type: page
 *
 * @package BD_Somani
 */

get_header();

$post_id = get_the_ID();

// Fetch Hero Metadata
$hero_title = get_post_meta( $post_id, '_bds_careers_hero_title', true );
$hero_sub   = get_post_meta( $post_id, '_bds_careers_hero_subtitle', true );

if ( empty( $hero_title ) ) {
	$hero_title = __( 'Join Our Team of Educator Pioneers', 'bd-somani' );
}
if ( empty( $hero_sub ) ) {
	$hero_sub = __( 'At B.D. Somani International School, our educators embody a unique blend of compassion, creativity, and enthusiasm. With open minds and a commitment to lifelong learning, they serve as facilitators, encouraging inquiry and exploration in the classroom.', 'bd-somani' );
}

// Fetch HR Contact Metadata
$hr_email = get_post_meta( $post_id, '_bds_careers_hr_email', true );
$hr_phone = get_post_meta( $post_id, '_bds_careers_hr_phone', true );
$location = get_post_meta( $post_id, '_bds_careers_location', true );

if ( empty( $hr_email ) ) {
	$hr_email = 'hr@bdsiskharghar.org';
}
if ( empty( $hr_phone ) ) {
	$hr_phone = '+91 86577 97826';
}
if ( empty( $location ) ) {
	$location = __( 'B.D. Somani International School, Plot No. 92, Ranjanpada, Sector 27, Kharghar', 'bd-somani' );
}
?>

<main id="primary" class="site-main careers-page-custom">
	<div class="site-container">

		<!-- Breadcrumbs -->
		<nav class="careers-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bd-somani' ); ?>">
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
			<span class="breadcrumb-current"><?php esc_html_e( 'Careers', 'bd-somani' ); ?></span>
		</nav>

		<!-- Hero Section -->
		<section class="careers-hero-section relative overflow-hidden">
			<div class="careers-hero-grid relative z-2">
				
				<!-- Left Column: Title, Letter & Call to Action -->
				<div class="careers-hero-left">
					<span class="careers-badge"><?php esc_html_e( 'CAREERS AT B.D. SOMANI', 'bd-somani' ); ?></span>
					<h1 class="careers-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
					
					<div class="careers-letter-content">
						<p><strong><?php esc_html_e( 'Dear Prospective Educator,', 'bd-somani' ); ?></strong></p>
						<p><?php echo esc_html( $hero_sub ); ?></p>
						<p><?php esc_html_e( 'Our faculty is an international tapestry of professionals united by a common objective: to equip 21st-century learners with the skills and confidence to become proactive architects of their own education.', 'bd-somani' ); ?></p>
					</div>

					<div class="careers-hero-actions">
						<a href="#openings" class="careers-primary-btn">
							<?php esc_html_e( 'VIEW OPEN POSITIONS', 'bd-somani' ); ?>
							<iconify-icon icon="lucide:arrow-down" class="btn-arrow-icon"></iconify-icon>
						</a>
						<a href="mailto:<?php echo esc_attr( $hr_email ); ?>" class="careers-secondary-btn">
							<iconify-icon icon="lucide:mail"></iconify-icon>
							<?php esc_html_e( 'SEND RESUME', 'bd-somani' ); ?>
						</a>
					</div>
				</div>

				<!-- Right Column: Values Card Stack -->
				<div class="careers-hero-right relative">
					<div class="careers-hero-card">
						<div class="careers-card-header flex-between">
							<div class="careers-card-icon flex-center">
								<iconify-icon icon="ph:graduation-cap-fill"></iconify-icon>
							</div>
							<span class="careers-card-badge"><?php esc_html_e( 'Professional Growth', 'bd-somani' ); ?></span>
						</div>
						<h3 class="careers-card-title"><?php esc_html_e( 'Continual Development', 'bd-somani' ); ?></h3>
						<p class="careers-card-desc"><?php esc_html_e( 'We offer diverse avenues for continual development—ranging from international workshops to pedagogical research—ensuring our faculty remains at the forefront of education.', 'bd-somani' ); ?></p>

						<div class="careers-highlights-grid">
							<div class="careers-highlight-item">
								<iconify-icon icon="lucide:check-circle-2"></iconify-icon>
								<span><?php esc_html_e( 'Pedagogical Workshops', 'bd-somani' ); ?></span>
							</div>
							<div class="careers-highlight-item">
								<iconify-icon icon="lucide:check-circle-2"></iconify-icon>
								<span><?php esc_html_e( 'CAIE & ICSE Training', 'bd-somani' ); ?></span>
							</div>
							<div class="careers-highlight-item">
								<iconify-icon icon="lucide:check-circle-2"></iconify-icon>
								<span><?php esc_html_e( 'Inclusive Work Culture', 'bd-somani' ); ?></span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- WE ARE HIRING / Positions Section -->
		<section id="openings" class="careers-openings-section relative">
			<div class="careers-section-header text-center">
				<div class="hiring-tag-banner flex-center">
					<iconify-icon icon="ph:megaphone-simple-fill" class="hiring-megaphone"></iconify-icon>
					<span><?php esc_html_e( 'WE ARE HIRING • ACADEMIC YEAR 2026-27', 'bd-somani' ); ?></span>
					<iconify-icon icon="ph:megaphone-simple-fill" class="hiring-megaphone flipped"></iconify-icon>
				</div>
				<h2 class="careers-section-title"><?php esc_html_e( 'Current Open Positions', 'bd-somani' ); ?></h2>
				<p class="careers-section-subtitle"><?php esc_html_e( 'BDSISK is seeking passionate individuals committed to imparting quality education for the academic year 2026-27. Explore our open roles below:', 'bd-somani' ); ?></p>
			</div>

			<!-- Open Positions Table -->
			<div class="careers-table-wrapper overflow-hidden">
				<table class="careers-positions-table">
					<thead>
						<tr>
							<th class="col-position"><?php esc_html_e( 'Position', 'bd-somani' ); ?></th>
							<th class="col-qualification"><?php esc_html_e( 'Qualification & Experience Requirements', 'bd-somani' ); ?></th>
							<th class="col-action"><?php esc_html_e( 'Action', 'bd-somani' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:baby-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'Pre-School Teachers', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification"><?php esc_html_e( 'Graduates with a Diploma in Early Childhood Education.', 'bd-somani' ); ?></td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20Pre-School%20Teachers" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>

						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:book-open-text-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'Primary Teachers', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification"><?php esc_html_e( 'Graduates with a B.Ed in any subject.', 'bd-somani' ); ?></td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20Primary%20Teachers" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>

						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:chalkboard-teacher-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'Middle School Teachers (ICSE)', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification"><?php esc_html_e( 'Graduates with a B.Ed in any subject and a minimum of 3 years of teaching experience in Classes VI–X in a recognized school.', 'bd-somani' ); ?></td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20Middle%20School%20Teachers%20(ICSE)" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>

						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:globe-hemisphere-west-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'Middle School Teachers (IGCSE)', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification"><?php esc_html_e( 'Graduates with a B.Ed in any subject and a minimum of 3 years of teaching experience in Classes VI–X in a recognized school.', 'bd-somani' ); ?></td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20Middle%20School%20Teachers%20(IGCSE)" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>

						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:certificate-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'IGCSE Co-ordinator', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification"><?php esc_html_e( 'Graduate/Master\'s degree in Education or a relevant field with a minimum of 5 years of experience in the Cambridge IGCSE curriculum. Must possess proven leadership and organizational skills, strong communication and interpersonal abilities, and familiarity with CAIE guidelines, documentation, and assessments.', 'bd-somani' ); ?></td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20IGCSE%20Co-ordinator" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>

						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:heartbeat-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'Special Educator', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification"><?php esc_html_e( 'Master\'s degree in Psychology with excellent communication skills and a minimum of 5 years of relevant experience.', 'bd-somani' ); ?></td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20Special%20Educator" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>

						<tr>
							<td class="col-position">
								<div class="position-title-wrap">
									<iconify-icon icon="ph:users-four-fill" class="position-icon"></iconify-icon>
									<span class="position-name"><?php esc_html_e( 'Other Positions', 'bd-somani' ); ?></span>
								</div>
							</td>
							<td class="col-qualification">
								<div class="other-positions-details">
									<p><strong><?php esc_html_e( 'Teaching Roles:', 'bd-somani' ); ?></strong> <?php esc_html_e( 'Computer, Music, Art & Craft, Dance, Language Teachers (Sanskrit, French, Hindi, Marathi), Physical Education, Lab Assistant, Theatre.', 'bd-somani' ); ?></p>
									<p><strong><?php esc_html_e( 'Administrative Roles:', 'bd-somani' ); ?></strong> <?php esc_html_e( 'Accountant, Admin Manager, HR, Admissions Head, Front Desk Executive.', 'bd-somani' ); ?></p>
								</div>
							</td>
							<td class="col-action">
								<a href="mailto:<?php echo esc_attr( $hr_email ); ?>?subject=Application%20for%20Other%20Positions" class="apply-table-btn"><?php esc_html_e( 'Apply Now', 'bd-somani' ); ?></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>

		<!-- How to Apply & HR Contact Section -->
		<section class="careers-apply-section relative overflow-hidden">
			<div class="careers-apply-card relative z-2 text-center">
				<div class="apply-card-icon-wrap flex-center">
					<iconify-icon icon="ph:paper-plane-tilt-fill"></iconify-icon>
				</div>
				<h2 class="apply-card-title"><?php esc_html_e( 'Join Us in Making a Difference!', 'bd-somani' ); ?></h2>
				<p class="apply-card-subtitle"><?php esc_html_e( 'If you are driven to inspire young minds and be part of a vibrant educational community, we would love to hear from you!', 'bd-somani' ); ?></p>

				<div class="apply-contact-box flex-center">
					<div class="contact-box-item flex-center">
						<iconify-icon icon="lucide:mail"></iconify-icon>
						<span><?php esc_html_e( 'Send Resume to:', 'bd-somani' ); ?></span>
						<a href="mailto:<?php echo esc_attr( $hr_email ); ?>" class="hr-email-link"><?php echo esc_html( $hr_email ); ?></a>
					</div>
					<div class="contact-box-divider"></div>
					<div class="contact-box-item flex-center">
						<iconify-icon icon="lucide:phone"></iconify-icon>
						<span><?php esc_html_e( 'HR Inquiry:', 'bd-somani' ); ?></span>
						<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $hr_phone ) ); ?>" class="hr-phone-link"><?php echo esc_html( $hr_phone ); ?></a>
					</div>
				</div>

				<div class="careers-location-badge flex-center">
					<iconify-icon icon="lucide:map-pin"></iconify-icon>
					<span><strong><?php esc_html_e( 'Location:', 'bd-somani' ); ?></strong> <?php echo esc_html( $location ); ?></span>
				</div>
			</div>
		</section>

	</div>
</main>

<?php
get_footer();
