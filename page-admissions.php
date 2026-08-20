<?php
/**
 * Template Name: Admissions Page
 * Template Post Type: page
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main contact-page-custom admissions-page-custom">
	<div class="site-container">

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
			<span class="breadcrumb-current"><?php esc_html_e( 'Admissions', 'bd-somani' ); ?></span>
		</div>

		<!-- Hero Section: Admissions Info & Form Grid (Reusing Contact Layout) -->
		<section class="contact-hero-section relative">

			<!-- Right Background Organic Wave Shape Accent -->
			<div class="contact-form-bg-wave admissions-hero-bg-wave" aria-hidden="true">
				<svg width="754" height="730" viewBox="0 0 754 730" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1120.96 436.549C502.356 1100.28 764.147 68.7049 371.322 510.497C-21.504 952.288 -59.421 425.445 274.248 183.162C607.916 -59.1211 111.644 -59.1878 173.23 -106.357" stroke="var(--clr-wavy-purple-light, #F3F1F3)" stroke-width="96"/>
				</svg>
			</div>

			<div class="contact-hero-grid relative z-2">

				<!-- Left Column: Title, Subtitle, Copy & CTA Buttons -->
				<div class="contact-hero-left admissions-hero-left">
					<h1 class="contact-hero-title admissions-title">
						<?php esc_html_e( 'The Journey to Become Curious, Collaborative & Courageous Starts Here', 'bd-somani' ); ?>
					</h1>

					<p class="contact-hero-subtitle admissions-lead">
						<?php esc_html_e( 'Thank you for choosing the B.D. Somani International School, Kharghar. We\'re delighted to welcome families who share our belief in meaningful learning and holistic growth.', 'bd-somani' ); ?>
					</p>

					<p class="contact-hero-subtitle admissions-lead">
						<?php esc_html_e( 'Explore the information below to learn about our admissions process, eligibility criteria, and application requirements.', 'bd-somani' ); ?>
					</p>

					<!-- Action Buttons -->
					<div class="admissions-cta-buttons flex align-center gap-sm flex-wrap">
						<a href="#apply" class="btn btn-yellow radius-md flex-center">
							<span><?php esc_html_e( 'SCHEDULE A SCHOOL VISIT', 'bd-somani' ); ?></span>
							<svg class="btn-arrow" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 8px;">
								<path d="M9 1L15 7M15 7L9 13M15 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>

						<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-outline-purple radius-md flex-center">
							<span><?php esc_html_e( 'LEARN MORE ABOUT US', 'bd-somani' ); ?></span>
							<svg class="btn-arrow" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 8px;">
								<path d="M9 1L15 7M15 7L9 13M15 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>

					<!-- Admission Form Annotation Doodle Accent (Bottom Right of Left Col) -->
					<div class="admissions-form-doodle" aria-hidden="true">
						<?php
						$adm_doodle_svg = get_template_directory() . '/assets/svgs/admission form.svg';
						if ( file_exists( $adm_doodle_svg ) ) {
							include $adm_doodle_svg;
						}
						?>
					</div>
				</div>

				<!-- Right Column: Purple Admissions Form Card -->
				<div class="contact-hero-right" id="apply">
					<div class="contact-purple-card relative">
						
						<!-- Form Content (Gravity Forms or Fallback HTML Form) -->
						<div class="contact-form-container">
							<?php
							$gform_id = get_option( 'bds_admissions_gform_id', '' );
							if ( ! empty( $gform_id ) && function_exists( 'gravity_form' ) ) {
								gravity_form( $gform_id, false, false, false, null, true );
							} else {
								// Mock HTML Form matching design structure
								?>
								<form action="#" method="post" class="contact-mock-form admissions-mock-form">
									<input type="hidden" name="form_type" value="Admissions">
									
									<!-- Row 1: First Name & Last Name -->
									<div class="form-row">
										<div class="form-group">
											<label for="adm_first_name"><?php esc_html_e( 'First Name *', 'bd-somani' ); ?></label>
											<input type="text" id="adm_first_name" name="first_name" placeholder="<?php esc_attr_e( 'Enter your first name', 'bd-somani' ); ?>" required />
										</div>
										<div class="form-group">
											<label for="adm_last_name"><?php esc_html_e( 'Last Name *', 'bd-somani' ); ?></label>
											<input type="text" id="adm_last_name" name="last_name" placeholder="<?php esc_attr_e( 'Enter your last name', 'bd-somani' ); ?>" required />
										</div>
									</div>

									<!-- Row 2: Email & Mobile Number -->
									<div class="form-row">
										<div class="form-group">
											<label for="adm_email"><?php esc_html_e( 'Email *', 'bd-somani' ); ?></label>
											<input type="email" id="adm_email" name="email" placeholder="<?php esc_attr_e( 'xyz@example.com', 'bd-somani' ); ?>" required />
										</div>
										<div class="form-group">
											<label for="adm_mobile"><?php esc_html_e( 'Mobile Number *', 'bd-somani' ); ?></label>
											<input type="tel" id="adm_mobile" name="mobile_number" placeholder="<?php esc_attr_e( '+91 9876543210', 'bd-somani' ); ?>" required />
										</div>
									</div>

									<!-- Row 3: Child's name & Date of birth -->
									<div class="form-row">
										<div class="form-group">
											<label for="adm_child_name"><?php esc_html_e( 'Child\'s name *', 'bd-somani' ); ?></label>
											<input type="text" id="adm_child_name" name="child_name" placeholder="<?php esc_attr_e( 'Enter your child\'s name', 'bd-somani' ); ?>" required />
										</div>
										<div class="form-group">
											<label for="adm_dob"><?php esc_html_e( 'Date of birth *', 'bd-somani' ); ?></label>
											<input type="text" id="adm_dob" name="date_of_birth" placeholder="<?php esc_attr_e( '26th April 2015', 'bd-somani' ); ?>" required />
										</div>
									</div>

									<!-- Row 4: Academic Year Dropdown -->
									<div class="form-group">
										<label for="adm_academic_year"><?php esc_html_e( 'Academic Year*', 'bd-somani' ); ?></label>
										<div class="select-wrap relative">
											<select id="adm_academic_year" name="academic_year" required>
												<option value="" disabled selected><?php esc_html_e( 'Choose academic year', 'bd-somani' ); ?></option>
												<option value="2025-2026">2025 - 2026</option>
												<option value="2026-2027">2026 - 2027</option>
												<option value="2027-2028">2027 - 2028</option>
											</select>
											<iconify-icon icon="lucide:chevron-down" class="select-arrow-icon"></iconify-icon>
										</div>
									</div>

									<!-- Row 5: I found you via Dropdown -->
									<div class="form-group">
										<label for="adm_found_via"><?php esc_html_e( 'I found you via*', 'bd-somani' ); ?></label>
										<div class="select-wrap relative">
											<select id="adm_found_via" name="found_via" required>
												<option value="" disabled selected><?php esc_html_e( 'Choose Source', 'bd-somani' ); ?></option>
												<option value="google"><?php esc_html_e( 'Google Search', 'bd-somani' ); ?></option>
												<option value="social_media"><?php esc_html_e( 'Social Media (Instagram/Facebook)', 'bd-somani' ); ?></option>
												<option value="word_of_mouth"><?php esc_html_e( 'Word of Mouth / Recommendation', 'bd-somani' ); ?></option>
												<option value="newspaper_ad"><?php esc_html_e( 'Newspaper / Print Ad', 'bd-somani' ); ?></option>
												<option value="other"><?php esc_html_e( 'Other', 'bd-somani' ); ?></option>
											</select>
											<iconify-icon icon="lucide:chevron-down" class="select-arrow-icon"></iconify-icon>
										</div>
									</div>

									<div class="form-submit-wrap">
										<button type="submit" class="btn-yellow-submit"><?php esc_html_e( 'SUBMIT', 'bd-somani' ); ?></button>
									</div>
								</form>
								<?php
							}
							?>
						</div>

					</div>
				</div>

			</div>
		</section>
	</div><!-- /.site-container -->

	


		<section class="about-potential-section relative overflow-hidden">
		<div class="site-container relative z-2">
			<div class="about-potential-grid">
				
				<!-- Left Column: Content -->
				<div class="about-potential-content">
					<h2 class="about-potential-title">Where Their <br> Journey Begins.</h2>
					<p class="about-potential-lead">Take the first step towards a learning experience that nurtures curiosity, builds confidence, and prepares children for what lies ahead.</p>
				</div>

				<!-- Right Column: Circular Video Frame -->
				<div class="about-potential-media flex-center">
					<div class="about-potential-video-container relative">
						<!-- Video Frame -->
						<div class="about-potential-video-wrap">
							<video autoplay loop muted playsinline>
								<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/desk2.mp4' ); ?>" type="video/mp4">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

		<!-- Section 3: Admissions Process Grid (No Carousel) -->
		<section class="admissions-process-section relative overflow-hidden" id="process">
			<div class="site-container">
				<div class="admissions-process-header text-center">
					<span class="admissions-process-eyebrow"><?php esc_html_e( 'YOUR JOURNEY WITH US', 'bd-somani' ); ?></span>
					<h2 class="admissions-process-title"><?php esc_html_e( 'Admissions Process', 'bd-somani' ); ?></h2>
					<p class="admissions-process-lead"><?php esc_html_e( 'We are here to support your family every step of the way, from your first conversation to your child\'s first day.', 'bd-somani' ); ?></p>
				</div>

				<!-- 5-Step Connected Flow Grid -->
				<div class="admissions-process-grid">
					
					<!-- Top Row: Steps 01, 02, 03 -->
					<div class="process-grid-top">
						
						<!-- Step 01 -->
						<div class="process-step-card warm-card">
							<div class="process-card-header flex-between align-center">
								<span class="process-step-badge">01</span>
								<div class="process-step-icon flex-center">
									<iconify-icon icon="ph:chat-circle-dots-bold"></iconify-icon>
								</div>
							</div>
							<h3 class="process-card-title"><?php esc_html_e( 'Begin with a Conversation', 'bd-somani' ); ?></h3>
							<p class="process-card-desc"><?php esc_html_e( 'Take the first step towards discovering B.D. Somani International School, Kharghar. Explore our website, get to know our approach to learning, and share a few details about your child and your preferred academic year through our online enquiry form.', 'bd-somani' ); ?></p>
						</div>

						<!-- Step 02 -->
						<div class="process-step-card warm-card">
							<div class="process-card-header flex-between align-center">
								<span class="process-step-badge">02</span>
								<div class="process-step-icon flex-center">
									<iconify-icon icon="ph:users-three-bold"></iconify-icon>
								</div>
							</div>
							<h3 class="process-card-title"><?php esc_html_e( 'Meet Our Admissions Team', 'bd-somani' ); ?></h3>
							<p class="process-card-desc"><?php esc_html_e( 'Every family has different questions and aspirations. Our Admissions Team is here to understand yours, share what matters to you and help you explore the possibilities at our school.', 'bd-somani' ); ?></p>
						</div>

						<!-- Step 03 -->
						<div class="process-step-card warm-card">
							<div class="process-card-header flex-between align-center">
								<span class="process-step-badge">03</span>
								<div class="process-step-icon flex-center">
									<iconify-icon icon="ph:compass-bold"></iconify-icon>
								</div>
							</div>
							<h3 class="process-card-title"><?php esc_html_e( 'Experience the School', 'bd-somani' ); ?></h3>
							<p class="process-card-desc"><?php esc_html_e( 'Come see the school for yourself. Walk through our campus, discover our learning spaces, meet our educators and experience the environment your child could soon call their own.', 'bd-somani' ); ?></p>
						</div>

					</div>

					<!-- Bottom Row: Steps 04 & 05 -->
					<div class="process-grid-bottom">
						
						<!-- Step 04 -->
						<div class="process-step-card warm-card">
							<div class="process-card-header flex-between align-center">
								<span class="process-step-badge">04</span>
								<div class="process-step-icon flex-center">
									<iconify-icon icon="ph:file-text-fill"></iconify-icon>
								</div>
							</div>
							<h3 class="process-card-title"><?php esc_html_e( 'Take the Next Step', 'bd-somani' ); ?></h3>
							<p class="process-card-desc"><?php esc_html_e( 'When you are ready to move forward, complete the application with the required documents. Our team will make the process clear and guide you through the details.', 'bd-somani' ); ?></p>
						</div>

						<!-- Step 05 -->
						<div class="process-step-card warm-card">
							<div class="process-card-header flex-between align-center">
								<span class="process-step-badge">05</span>
								<div class="process-step-icon flex-center">
									<iconify-icon icon="ph:heart-bold"></iconify-icon>
								</div>
							</div>
							<h3 class="process-card-title"><?php esc_html_e( 'Welcome to B.D. Somani Kharghar Community', 'bd-somani' ); ?></h3>
							<p class="process-card-desc"><?php esc_html_e( 'Once your child’s admission is confirmed, the next chapter begins. We will guide your family through enrolment and help make the transition into the B.D. Somani, Kharghar community a warm and welcoming one.', 'bd-somani' ); ?></p>
						</div>

					</div>

				</div>
			</div>
		</section>

		<!-- Section 4: Documents Required, Principal's Letter & Campus Banner -->
		<section class="admissions-docs-section relative overflow-hidden" id="documents">
			
			<!-- Top White Area Floating Doodles -->
			<div class="admissions-docs-top-area relative">
				
				<!-- Puzzle Icon (Top-Left Accent) -->
				<div class="docs-doodle-puzzle" aria-hidden="true">
					<?php
					$puzzle_svg = get_template_directory() . '/assets/svgs/Puzzle Icon 1.svg';
					if ( file_exists( $puzzle_svg ) ) {
						include $puzzle_svg;
					}
					?>
				</div>

				<!-- Pencil Icon (Left Edge Accent) -->
				<div class="docs-doodle-pencil" aria-hidden="true">
					<?php
					$pencil_svg = get_template_directory() . '/assets/svgs/hugeicons_pencil.svg';
					if ( file_exists( $pencil_svg ) ) {
						include $pencil_svg;
					}
					?>
				</div>

				<!-- Paper Plane Icon (Right Edge Accent) -->
				<div class="docs-doodle-plane" aria-hidden="true">
					<?php
					$plane_svg = get_template_directory() . '/assets/svgs/Paper Plane Icon 1.svg';
					if ( file_exists( $plane_svg ) ) {
						include $plane_svg;
					}
					?>
				</div>

				<div class="site-container relative z-3">
					<div class="admissions-cards-overlap-row flex justify-center align-start">
						
						<!-- Yellow Card: Documents Required -->
						<div class="admissions-docs-card">
							<h3 class="docs-card-title"><?php esc_html_e( 'Documents Required', 'bd-somani' ); ?></h3>
							<p class="docs-card-intro"><?php esc_html_e( 'To help us process your application efficiently, please keep the following documents ready at the time of submission:', 'bd-somani' ); ?></p>
							
							<ul class="docs-card-list">
								<li><?php esc_html_e( 'Child\'s Birth Certificate', 'bd-somani' ); ?></li>
								<li><?php esc_html_e( 'Recent Passport-size Photographs', 'bd-somani' ); ?></li>
								<li><?php esc_html_e( 'Previous School Report Cards (where applicable)', 'bd-somani' ); ?></li>
								<li><?php esc_html_e( 'Transfer Certificate (where applicable)', 'bd-somani' ); ?></li>
								<li><?php esc_html_e( 'Child\'s Aadhaar Card or Valid Government-issued Identity Proof', 'bd-somani' ); ?></li>
								<li><?php esc_html_e( 'Parent\'s/Guardian\'s Aadhaar Card or Valid Government-issued Identity Proof', 'bd-somani' ); ?></li>
								<li><?php esc_html_e( 'Current Address Proof', 'bd-somani' ); ?></li>
							</ul>

							<p class="docs-card-note"><?php esc_html_e( 'Please note: Additional documents may be requested based on the programme, grade level, or specific admission requirements.', 'bd-somani' ); ?></p>
						</div>

						<!-- Principal's Welcome Letter Image -->
						<div class="admissions-letter-img-card relative">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/letter.png' ); ?>" alt="<?php esc_attr_e( 'Welcome Letter from Principal - B.D. Somani International School', 'bd-somani' ); ?>" class="admissions-letter-img" loading="lazy" decoding="async">
						</div>

					</div>
				</div>

			</div>

			<!-- Bottom Dark Purple Split Area -->
			<div class="admissions-docs-purple-bottom relative z-2">
				<div class="site-container">
					
					<!-- Light Nude Banner Card: Step Inside Our Learning Environment -->
					<div class="admissions-campus-banner-card flex align-center justify-between gap-md">
						<div class="campus-banner-left flex-shrink-0">
							<div class="campus-banner-icon">
								<?php
								$books_svg = get_template_directory() . '/assets/svgs/emojione-monotone_books.svg';
								if ( file_exists( $books_svg ) ) {
									include $books_svg;
								}
								?>
							</div>
						</div>

						<div class="campus-banner-center">
							<h3 class="campus-banner-title"><?php esc_html_e( 'Step Inside Our Learning Environment', 'bd-somani' ); ?></h3>
							<p class="campus-banner-desc"><?php esc_html_e( 'From thoughtfully designed classrooms and collaborative learning spaces to sports facilities and activity areas, take a closer look at the environment where your child will learn, play, and grow.', 'bd-somani' ); ?></p>
						</div>

						<div class="campus-banner-right flex-shrink-0">
							<a href="<?php echo esc_url( home_url( '/campus-life/' ) ); ?>" class="btn-outline-purple-dark flex-center">
								<span><?php esc_html_e( 'EXPLORE CAMPUS', 'bd-somani' ); ?></span>
							</a>
						</div>
					</div>

				</div>
			</div>

		</section>

		<!-- Section 5: Need More Information? FAQ CTA Section -->
		<section class="admissions-faq-cta-section relative overflow-hidden" id="faq-cta">
			
			<!-- Floating Left Photo Card (Cricket) -->
			<div class="faq-floating-photo photo-left relative" aria-hidden="true">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cricket.webp' ); ?>" alt="<?php esc_attr_e( 'Students playing cricket', 'bd-somani' ); ?>" loading="lazy" decoding="async">
			</div>

			<!-- Floating Right Photo Card (Recess) -->
			<div class="faq-floating-photo photo-right relative" aria-hidden="true">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/recess.webp' ); ?>" alt="<?php esc_attr_e( 'Students having lunch during recess', 'bd-somani' ); ?>" loading="lazy" decoding="async">
			</div>

			<div class="site-container relative z-3">
				<div class="admissions-faq-content text-center">
					
					<h2 class="admissions-faq-title"><?php esc_html_e( 'Need More Information?', 'bd-somani' ); ?></h2>
					
					<p class="admissions-faq-subtitle"><?php esc_html_e( 'Find answers to the questions parents ask most about admissions, academics, transport, school timings, and campus life all in one convenient place.', 'bd-somani' ); ?></p>
					
					<!-- CTA Button & Annotation Doodle -->
					<div class="admissions-faq-btn-wrap relative inline-block">
						<a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="btn btn-yellow radius-md flex-center">
							<span><?php esc_html_e( 'BROWSE FAQS', 'bd-somani' ); ?></span>
							<svg class="btn-arrow" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 8px;">
								<path d="M9 1L15 7M15 7L9 13M15 7H1" stroke="#2B182C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>

						<!-- FAQ Annotation Doodle (Find Answers Here + Arrow) -->
						<div class="admissions-faq-annotation" aria-hidden="true">
							<?php
							$faq_doodle_svg = get_template_directory() . '/assets/svgs/faq annotation.svg';
							if ( file_exists( $faq_doodle_svg ) ) {
								include $faq_doodle_svg;
							}
							?>
						</div>
					</div>

				</div>
			</div>

		</section>

			<?php get_template_part( 'template-parts/brand-marquee' ); ?>


</main>

<?php
get_footer();
