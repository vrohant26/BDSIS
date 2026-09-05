<?php
/**
 * Template Name: About Us Page
 *
 * @package BD_Somani
 */

get_header();
?>

<main class="about-page-main">
	<!-- About Page Hero Section -->
	<section class="about-hero-section relative overflow-hidden" id="about-hero">
		<div class="site-container relative z-2">
			
			<!-- Top Breadcrumb Navigation -->
			<nav class="about-breadcrumb flex align-center gap-xs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-home-link flex align-center gap-xs" aria-label="Home">
					<?php 
					$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
					if ( file_exists( $home_svg_path ) ) {
						echo file_get_contents( $home_svg_path );
					} else {
						?>
						<svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 18V6L8 0L16 6V18H10V11H6V18H0Z" fill="#FBFBFB"/>
						</svg>
						<?php
					}
					?>
				</a>
				<span class="breadcrumb-separator">/</span>
				<span class="breadcrumb-current">About us</span>
			</nav>

			<!-- 2-Column Hero Flex Grid: Left Text Content + Right SVG Illustration -->
			<div class="about-hero-grid relative">
				
				<!-- Left Text Box -->
				<div class="about-hero-content flex-column pr-md">
					<h1 class="about-hero-title">Welcome to B.D. Somani International School, Kharghar</h1>
					<p class="about-hero-desc">At B.D. Somani International School, Kharghar, education is not simply imparted, it is carried forward as a legacy of thought, purpose, and possibility.</p>
					<p class="about-hero-desc">Rooted in the enduring B.D. Somani legacy, our institution remains committed to nurturing individuals whose education shapes not only what they achieve, but who they become.</p>
				</div>

				<!-- Right Illustration Graphic (Animated Inline SVG) -->
				<div class="about-hero-media flex-center">
					<?php 
					$svg_path = get_template_directory() . '/assets/svgs/about us hero section.svg';
					if ( ! file_exists( $svg_path ) ) {
						$svg_path = get_template_directory() . '/assets/svgs/About Us Hero Animation 1.svg';
					}
					if ( file_exists( $svg_path ) ) {
						echo file_get_contents( $svg_path );
					}
					?>
				</div>

				<!-- Yellow Rotating 50+ Years Legacy Badge (Solid Yellow Ring + Dark Purple Text + Transparent Center + Yellow Hat Icon) -->
				<div class="legacy-badge-wrapper yellow-badge about-hero-absolute-badge flex-center">
					<svg class="legacy-badge-svg" width="140" height="140" viewBox="0 0 150 150">
						<defs>
							<path id="aboutLegacyTextPath" d="M 75, 75 m -52, 0 a 52,52 0 1,1 104,0 a 52,52 0 1,1 -104,0" fill="none"/>
						</defs>
						<!-- Solid Yellow Donut Ring Band -->
						<path d="M 75 5 A 70 70 0 1 0 75 145 A 70 70 0 1 0 75 5 Z M 75 35 A 40 40 0 1 1 75 115 A 40 40 0 1 1 75 35 Z" fill="var(--clr-primary-yellow)" fill-rule="evenodd"/>
						<!-- Rotating Dark Purple Text on Yellow Ring Band -->
						<text fill="#2B182C" font-family="Montserrat" font-size="13" font-weight="700" letter-spacing="0.8">
							<textPath href="#aboutLegacyTextPath" startOffset="0%">
								50+ Years of legacy • 50+ Years of legacy •
							</textPath>
						</text>
					</svg>
					<!-- Center Graduation Hat Icon (YELLOW FILL, TRANSPARENT CENTER BG) -->
					<div class="legacy-badge-center-icon flex-center">
						<svg width="44" height="31" viewBox="0 0 48 34" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M23.6605 0L0 8.87293L23.6605 20.7032L34.9298 15.0686L24.358 11.8364C24.1403 11.9407 23.902 11.9952 23.6605 11.9957C23.2306 11.9957 22.8182 11.8249 22.5142 11.5209C22.2102 11.2169 22.0394 10.8045 22.0394 10.3746C22.0394 9.94459 22.2102 9.53223 22.5142 9.2282C22.8182 8.92417 23.2306 8.75337 23.6605 8.75337L23.3924 9.62496L25.2707 10.2028L25.2715 10.2085L28.0431 11.0561L43.824 15.9114V17.1421C43.6057 17.2906 43.427 17.4901 43.3034 17.7234C43.1798 17.9566 43.115 18.2166 43.1147 18.4806C43.115 18.7506 43.1828 19.0163 43.3118 19.2535C43.4409 19.4907 43.6271 19.692 43.8537 19.8389C43.1157 22.6279 43.1147 28.9556 43.1147 31.4499C44.7359 32.5032 44.7359 32.5417 46.3571 31.4499C46.3571 28.9559 46.3563 22.6294 45.6184 19.8398C45.8451 19.6927 46.0314 19.4913 46.1604 19.2539C46.2894 19.0165 46.357 18.7507 46.3571 18.4805C46.3571 18.2162 46.2924 17.9559 46.1688 17.7223C46.0452 17.4887 45.8663 17.2889 45.6478 17.1403V14.5646L39.6369 12.7151L47.3211 8.87293L23.6605 0ZM9.8423 16.15L8.51262 24.1283C11.1648 24.4751 14.3373 26.0166 17.2538 27.8394C18.9125 28.8762 20.4661 30.0142 21.7279 31.1183C22.4992 31.7931 23.1441 32.4406 23.6605 33.0776C24.177 32.4405 24.8219 31.7931 25.5932 31.1183C26.855 30.0142 28.4085 28.8762 30.0673 27.8394C32.9838 26.0166 36.1563 24.4751 38.8085 24.1283L37.4786 16.15H36.8453L23.6605 22.7424L10.4756 16.15H9.8423Z" fill="var(--clr-primary-yellow)"/>
						</svg>
					</div>
				</div>

			</div>

		</div>
	</section>

	

	<!-- Section 2: Our Approach (Merits Every Student Carries Forward) -->
	<section class="about-approach-section relative overflow-hidden" id="our-approach">
		<!-- Background Organic Wavy Doodle Shapes -->
		<div class="about-approach-bg-doodle about-approach-bg-doodle-top" aria-hidden="true">
			<svg width="323" height="232" viewBox="0 0 323 232" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M447.115 109.822C237.579 390.965 283.711 -51.9314 151.802 135.363C19.8932 322.658 -25.1132 95.0059 94.4674 -6.70432C214.048 -108.415 15.7675 -112.658 37.7 -132.488" stroke="var(--clr-wavy-purple-light)" stroke-width="50"/>
			</svg>
		</div>
		<div class="about-approach-bg-doodle about-approach-bg-doodle-bottom" aria-hidden="true">
			<svg width="310" height="312" viewBox="0 0 310 312" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M-137.143 122.166C72.3938 -158.977 26.2613 283.92 158.17 96.6249C290.079 -90.6699 335.086 136.982 215.505 238.693C95.9247 340.403 294.205 344.646 272.273 364.476" stroke="var(--clr-wavy-purple-light)" stroke-width="50"/>
			</svg>
		</div>

		<div class="site-container relative z-2">
			<!-- Header Content -->
			<div class="about-approach-header flex-column align-center text-center">
				<span class="about-approach-eyebrow">Our Approach</span>
				<h2 class="about-approach-title section-title">Merits Every Student Carries Forward</h2>
				<p class="about-approach-lead">Education is not defined by the knowledge of today, but by its ability to remain relevant for tomorrow. At B.D. Somani International School, Kharghar, we create learning experiences that evolve with the world while equipping every learner to thrive within it.</p>
			</div>

			<!-- 5 Merits Cards Grid (Swiper Carousel on Mobile) -->
			<div class="about-merits-grid swiper">
				<div class="swiper-wrapper">
					
					<!-- Card 1: Global Competence -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_1 = get_template_directory() . '/assets/svgs/global competence.svg';
							if ( file_exists( $svg_1 ) ) {
								echo file_get_contents( $svg_1 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Global Competence</h3>
					</div>

					<!-- Card 2: Future-Ready -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_2 = get_template_directory() . '/assets/svgs/future ready.svg';
							if ( file_exists( $svg_2 ) ) {
								echo file_get_contents( $svg_2 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Future-Ready</h3>
					</div>

					<!-- Card 3: Adaptable -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_3 = get_template_directory() . '/assets/svgs/adaptable.svg';
							if ( file_exists( $svg_3 ) ) {
								echo file_get_contents( $svg_3 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Adaptable</h3>
					</div>

					<!-- Card 4: Progressive Education -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_4 = get_template_directory() . '/assets/svgs/progressive education.svg';
							if ( file_exists( $svg_4 ) ) {
								echo file_get_contents( $svg_4 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Progressive Education</h3>
					</div>

					<!-- Card 5: Courage & Leadership -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_5 = get_template_directory() . '/assets/svgs/courage and leadership.svg';
							if ( file_exists( $svg_5 ) ) {
								echo file_get_contents( $svg_5 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Courage &amp; Leadership</h3>
					</div>

				</div>

				<!-- Mobile Progress Bar -->
				<div class="about-merits-progress-container">
					<div class="about-merits-progress-bar" id="meritsProgressBar"></div>
				</div>

			</div>

			<!-- Bottom Supportive Paragraph -->
			<div class="about-approach-footer text-center">
				<p class="about-approach-footer-text">We prepare students to embrace and rise to the opportunities of tomorrow by fostering broader perspectives, holistic development, and an adaptive mindset today.</p>
			</div>
		</div>
	</section>

	<!-- Section 3: Our Leadership -->
	<section class="about-leadership-section relative overflow-hidden" id="our-leadership">
		<div class="site-container relative z-2">
			
			<!-- Header Content with Handwritten Arrow Doodle -->
			<div class="about-leadership-header relative">
				<div class="about-leadership-annotation" aria-hidden="true">
					<?php 
					$annotation_svg = get_template_directory() . '/assets/svgs/meet the people behind the vision.svg';
					if ( file_exists( $annotation_svg ) ) {
						echo file_get_contents( $annotation_svg );
					}
					?>
				</div>
				<h2 class="about-leadership-title section-title text-center">Our Leadership</h2>
				<p class="about-leadership-lead text-center">A shared vision is only as meaningful as the people who bring it to life. Together, our educators and leaders create an environment where every child is encouraged to discover, grow, and thrive.</p>
			</div>

			<!-- 3 Leaders Grid -->
			<div class="about-leaders-grid">
				
				<!-- Leader 1: Aradhana Somani -->
				<div class="about-leader-card-wrapper">
					<div class="about-leader-card">
						<div class="about-leader-card-inner">
							<!-- Front side -->
							<div class="about-leader-card-front">
								<div class="about-leader-img-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/aradhana somani.webp' ); ?>" alt="Aradhana Somani" loading="lazy" decoding="async">
								</div>
								<div class="about-leader-info">
									<h3 class="about-leader-name">Ms. Aradhana Somani</h3>
									<p class="about-leader-role">Managing Trustee</p>
								</div>
							</div>
							<!-- Back side -->
							<div class="about-leader-card-back">
								<div class="about-leader-message-content">
									<div class="about-leader-quote-scroll" data-lenis-prevent>
										<p class="about-leader-quote">Education is one of the most enduring responsibilities we hold. Our greatest purpose lies in shaping individuals who contribute meaningfully to society and the generations that follow.</p>
									</div>
									<div class="about-leader-signature">
										<span class="signature-name">- Ms. Aradhana Somani</span>
										<span class="signature-role">Managing Trustee</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="about-leader-link-btn" aria-label="Toggle message from Aradhana Somani">Read Their Message</button>
				</div>

				<!-- Leader 2: Dhananjay Somani -->
				<div class="about-leader-card-wrapper">
					<div class="about-leader-card">
						<div class="about-leader-card-inner">
							<!-- Front side -->
							<div class="about-leader-card-front">
								<div class="about-leader-img-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dhananjay somani.webp' ); ?>" alt="Dhananjay Somani" loading="lazy" decoding="async">
								</div>
								<div class="about-leader-info">
									<h3 class="about-leader-name">Mr. Dhananjay Somani</h3>
									<p class="about-leader-role">Founding Director</p>
								</div>
							</div>
							<!-- Back side -->
							<div class="about-leader-card-back">
								<div class="about-leader-message-content">
									<div class="about-leader-quote-scroll" data-lenis-prevent>
										<p class="about-leader-quote">What we are building is far more than a school. It is a community where every child is encouraged to learn deeply, grow confidently, and leave with stories that last a lifetime.</p>
									</div>
									<div class="about-leader-signature">
										<span class="signature-name">- Mr. Dhananjay Somani</span>
										<span class="signature-role">Founding Director</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="about-leader-link-btn" aria-label="Toggle message from Dhananjay Somani">Read Their Message</button>
				</div>

				<!-- Leader 3: Dr. Katherine James -->
				<div class="about-leader-card-wrapper">
					<div class="about-leader-card">
						<div class="about-leader-card-inner">
							<!-- Front side -->
							<div class="about-leader-card-front">
								<div class="about-leader-img-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dr katherine james.webp' ); ?>" alt="Dr. Katherine James" loading="lazy" decoding="async">
								</div>
								<div class="about-leader-info">
									<h3 class="about-leader-name">Dr. Katherine James</h3>
									<p class="about-leader-role">School Principal</p>
								</div>
							</div>
							<!-- Back side -->
							<div class="about-leader-card-back">
								<div class="about-leader-message-content">
									<div class="about-leader-quote-scroll" data-lenis-prevent>
										<p class="about-leader-quote">No two children learn in the same way, and that is precisely what makes education meaningful. Our classrooms celebrate every learner for who they are and who they can become.</p>
									</div>
									<div class="about-leader-signature">
										<span class="signature-name">- Dr. Katherine James</span>
										<span class="signature-role">School Principal</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="about-leader-link-btn" aria-label="Toggle message from Dr. Katherine James">Read Their Message</button>
				</div>

			</div>

		</div>
	</section>

					<!-- Brand Values Marquee Banner Component -->
	<?php get_template_part( 'template-parts/brand-marquee' ); ?>

	<!-- Section 5: The Purpose that Guides Us -->
	<section class="about-purpose-section relative overflow-hidden">

		<!-- Wavy Line Decoration: Left -->
		<div class="about-purpose-wavy-line" aria-hidden="true">
			<svg width="275" height="420" viewBox="0 0 275 420" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M134.251 -27.1735C424.96 168.875 -19.6186 143.674 173.687 266.607C366.992 389.539 141.715 445.228 34.48 330.576C-72.7547 215.923 -67.6456 414.183 -88.4876 393.21" stroke="var(--clr-wavy-purple-light)" stroke-width="50"/>
			</svg>
		</div>

		<!-- Scale / Ruler Doodle: Right -->
		<div class="about-purpose-scale-right" aria-hidden="true">
			<?php 
			$scale_svg = get_template_directory() . '/assets/svgs/scale.svg';
			if ( file_exists( $scale_svg ) ) {
				echo file_get_contents( $scale_svg );
			}
			?>
		</div>

		<!-- Globe Doodle: Bottom Left -->
		<div class="about-purpose-globe" aria-hidden="true">
			<?php 
			$globe_svg = get_template_directory() . '/assets/svgs/Doodle globe Icon.svg';
			if ( file_exists( $globe_svg ) ) {
				echo file_get_contents( $globe_svg );
			}
			?>
		</div>

		<div class="site-container relative z-2">

			<!-- Header with "Our Promise" annotation -->
			<div class="about-purpose-header relative">
				<div class="about-purpose-annotation" aria-hidden="true">
					<?php 
					$promise_svg = get_template_directory() . '/assets/svgs/our promise.svg';
					if ( file_exists( $promise_svg ) ) {
						echo file_get_contents( $promise_svg );
					}
					?>
				</div>
				<h2 class="about-purpose-title text-center">The Purpose that Guides Us</h2>
			</div>

			<!-- Row 1: Image Left / Vision Text Right -->
			<div class="about-purpose-row">
				<div class="about-purpose-img-wrap">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/our vision.webp' ); ?>" alt="Our Vision – BD Somani building" loading="lazy" decoding="async">
				</div>
				<div class="about-purpose-text">
					<h3 class="about-purpose-subtitle">Our Vision</h3>
					<p class="about-purpose-body">To nurture generations of thoughtful, capable, and compassionate individuals who thrive in a changing world and contribute meaningfully to society.</p>
				</div>
			</div>

			<!-- Row 2: Image Left / Mission Text Right -->
			<div class="about-purpose-row about-purpose-row--reverse">
				<div class="about-purpose-img-wrap">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/our mission.webp' ); ?>" alt="Our Mission – students in the classroom" loading="lazy" decoding="async">
				</div>
				<div class="about-purpose-text">
					<h3 class="about-purpose-subtitle">Our Mission</h3>
					<p class="about-purpose-body">To provide an internationally recognised education that nurtures intellectual curiosity, personal growth, and strong character. Every learning experience is designed to help students realise their potential and embrace lifelong learning.</p>
				</div>
			</div>

		</div>
	</section>

		<!-- banner section -->
	<section class="about-potential-section relative overflow-hidden">
		<div class="site-container relative z-2">
			<div class="about-potential-grid">
				
				<!-- Left Column: Content -->
				<div class="about-potential-content">
					<h2 class="about-potential-title">Learning That Shapes Who We Become</h2>
					<p class="about-potential-lead">At B.D. Somani, learning goes beyond what happens in the classroom. We nurture curious, confident and thoughtful individuals who are ready to explore the world and make a meaningful difference.</p>
				</div>

				<!-- Right Column: Circular Video Frame -->
				<div class="about-potential-media flex-center">
					<div class="about-potential-video-container relative">
						<!-- Video Frame -->
						<div class="about-potential-video-wrap">
							<video autoplay loop muted playsinline webkit-playsinline preload="auto" src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/4th Animation WEBM.webm' ); ?>">
								<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/4th Animation WEBM.webm' ); ?>" type="video/webm">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- section 6 : the values we nurture + 3 C's -->
	<section class="values-nurture-section relative overflow-hidden" id="our-values">
		<div class="site-container relative z-2">
			
			<!-- Section Header -->
			<div class="values-nurture-header text-center flex-column align-center gap-xs">
				<h2 class="section-title values-nurture-title">The Values We Nurture</h2>
				<p class="section-subtitle values-nurture-subtitle">Curiosity to explore, Collaboration to connect, and Courage to lead.</p>
			</div>

			<!-- Creative Showcase Grid -->
			<div class="values-showcase-container flex-column gap-xl">
				
				<!-- Value 1: Curious -->
				<div class="value-showcase-card value-curious-card" id="value-curious">
					<div class="value-watermark">01</div>
					<div class="value-showcase-grid">
						
						<!-- Left: Text Content -->
						<div class="value-info-wrap">
							<div class="value-header-flex flex-between align-center">
								<div class="value-title-wrap">
									<span class="value-tag">FOUNDATIONAL VALUE</span>
									<h3 class="value-main-heading">Curious</h3>
								</div>
								<div class="value-badge-icon badge-curious flex-center">
									<?php echo bds_get_new_icon( 'bulb' ); ?>
								</div>
							</div>

							<div class="value-body-paragraphs">
								<p class="value-lead-p">Curiosity begins with the willingness to ask why. We encourage students to look beyond the first answer, investigate ideas and remain open to where a question might lead. Through inquiry, experiments, research, projects and hands-on experiences, they learn to observe closely, make connections and find meaning in what they discover.</p>
								<p class="value-sub-p">Whether exploring a new idea in the library, engaging with a visiting author or investigating a question through experience, students learn that understanding often begins with asking better questions.</p>
							</div>

							<div class="value-quote-pill">
								<iconify-icon icon="ph:quotes-fill" class="quote-icon"></iconify-icon>
								<span>Understanding often begins with asking better questions.</span>
							</div>
						</div>

						<!-- Right: Visual Artwork Showcase Frame -->
						<div class="value-visual-wrap flex-center">
							<div class="visual-frame-container relative flex-center">
								<div class="visual-aura-bg"></div>
								<div class="visual-photo-card flex-center relative">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/curious svg.svg' ); ?>" alt="Curious Illustration" class="visual-silhouette-img" loading="lazy">
								</div>
								<!-- Floating Accent Badge -->
								<div class="floating-accent-tag flex-center gap-xs">
									<iconify-icon icon="ph:lightbulb-bold"></iconify-icon>
									<span>Inquiry &amp; Discovery</span>
								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Value 2: Collaborative (Reversed Layout) -->
				<div class="value-showcase-card value-collaborative-card card-reversed" id="value-collaborative">
					<div class="value-watermark">02</div>
					<div class="value-showcase-grid">
						
						<!-- Left: Visual Artwork Showcase Frame -->
						<div class="value-visual-wrap flex-center">
							<div class="visual-frame-container relative flex-center">
								<div class="visual-aura-bg"></div>
								<div class="visual-photo-card flex-center relative">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/collaborative svg.svg' ); ?>" alt="Collaborative Illustration" class="visual-silhouette-img" loading="lazy">
								</div>
								<!-- Floating Accent Badge -->
								<div class="floating-accent-tag flex-center gap-xs">
									<iconify-icon icon="ph:users-three-bold"></iconify-icon>
									<span>Teamwork &amp; Empathy</span>
								</div>
							</div>
						</div>

						<!-- Right: Text Content -->
						<div class="value-info-wrap">
							<div class="value-header-flex flex-between align-center">
								<div class="value-title-wrap">
									<span class="value-tag">SOCIAL VALUE</span>
									<h3 class="value-main-heading">Collaborative</h3>
								</div>
								<div class="value-badge-icon badge-collaborative flex-center">
									<?php echo bds_get_new_icon( 'puzzle piece' ); ?>
								</div>
							</div>

							<div class="value-body-paragraphs">
								<p class="value-lead-p">We believe some of the most meaningful learning happens with others. Through classroom activities, sports, projects, interdisciplinary learning, team-based experiences and school-wide events, students learn to listen, contribute and create together. They encounter different perspectives, recognise the value each person brings and understand that working together requires more than participation.</p>
								<p class="value-sub-p">It calls for respect, communication and a willingness to make space for others. In time, students begin to see collaboration not simply as a way of working, but as a way of learning and growing.</p>
							</div>

							<div class="value-quote-pill">
								<iconify-icon icon="ph:quotes-fill" class="quote-icon"></iconify-icon>
								<span>Collaboration is not simply a way of working, but a way of learning and growing.</span>
							</div>
						</div>

					</div>
				</div>

				<!-- Value 3: Courageous -->
				<div class="value-showcase-card value-courageous-card" id="value-courageous">
					<div class="value-watermark">03</div>
					<div class="value-showcase-grid">
						
						<!-- Left: Text Content -->
						<div class="value-info-wrap">
							<div class="value-header-flex flex-between align-center">
								<div class="value-title-wrap">
									<span class="value-tag">CHARACTER VALUE</span>
									<h3 class="value-main-heading">Courageous</h3>
								</div>
								<div class="value-badge-icon badge-courageous flex-center">
									<?php echo bds_get_new_icon( 'rocket' ); ?>
								</div>
							</div>

							<div class="value-body-paragraphs">
								<p class="value-lead-p">Courage grows when students are given the opportunity to step forward. We encourage them to take on challenges, try something unfamiliar, and stand behind their ideas with confidence.</p>
								<p class="value-sub-p">Whether taking the lead in a school initiative, performing before an audience, participating in a competition, or taking responsibility through the Student Council, students learn to act with conviction while remaining open to learning. They discover that courage is not about always getting it right. It is about being willing to try, adapt, take responsibility, and move forward.</p>
							</div>

							<div class="value-quote-pill">
								<iconify-icon icon="ph:quotes-fill" class="quote-icon"></iconify-icon>
								<span>Courage is being willing to try, adapt, take responsibility, and move forward.</span>
							</div>
						</div>

						<!-- Right: Visual Artwork Showcase Frame -->
						<div class="value-visual-wrap flex-center">
							<div class="visual-frame-container relative flex-center">
								<div class="visual-aura-bg"></div>
								<div class="visual-photo-card flex-center relative">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/courage svg.svg' ); ?>" alt="Courageous Illustration" class="visual-silhouette-img" loading="lazy">
								</div>
								<!-- Floating Accent Badge -->
								<div class="floating-accent-tag flex-center gap-xs">
									<iconify-icon icon="ph:shield-check-bold"></iconify-icon>
									<span>Conviction &amp; Resilience</span>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>
	</section>

	
	<!-- Section 7: Our Faculty -->
	<section class="about-approach-section relative overflow-hidden" id="our-faculty">
		<!-- Background Organic Wavy Doodle Shapes -->
		<div class="about-approach-bg-doodle about-approach-bg-doodle-top" aria-hidden="true">
			<svg width="323" height="232" viewBox="0 0 323 232" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M447.115 109.822C237.579 390.965 283.711 -51.9314 151.802 135.363C19.8932 322.658 -25.1132 95.0059 94.4674 -6.70432C214.048 -108.415 15.7675 -112.658 37.7 -132.488" stroke="var(--clr-wavy-purple-light)" stroke-width="50"/>
			</svg>
		</div>
		<div class="about-approach-bg-doodle about-approach-bg-doodle-bottom" aria-hidden="true">
			<svg width="310" height="312" viewBox="0 0 310 312" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M-137.143 122.166C72.3938 -158.977 26.2613 283.92 158.17 96.6249C290.079 -90.6699 335.086 136.982 215.505 238.693C95.9247 340.403 294.205 344.646 272.273 364.476" stroke="var(--clr-wavy-purple-light)" stroke-width="50"/>
			</svg>
		</div>

		<div class="site-container relative z-2">
			<!-- Header Content -->
			<div class="about-approach-header flex-column align-center text-center">
				<span class="about-approach-eyebrow">Our Faculty</span>
				<h2 class="about-approach-title section-title">Teachers Who Recognise Students' Strengths<br> and Shape Their Aspirations</h2>
				<p class="about-approach-lead">Exceptional education is only possible through an exceptional learning community. Our educators share a common commitment to helping every learner grow with knowledge, character, and intent.</p>
			</div>

			<!-- 5 Merits Cards Grid (Swiper Carousel on Mobile) -->
			<div class="about-merits-grid swiper">
				<div class="swiper-wrapper">
					
					<!-- Card 1: Student-Centric Guidance -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_1 = get_template_directory() . '/assets/svgs/Student-Centric  Guidance.svg';
							if ( file_exists( $svg_1 ) ) {
								echo file_get_contents( $svg_1 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Student-Centric Guidance</h3>
					</div>

					<!-- Card 2: Subject-matter Experts -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_2 = get_template_directory() . '/assets/svgs/Subject-matter Experts.svg';
							if ( file_exists( $svg_2 ) ) {
								echo file_get_contents( $svg_2 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Subject-matter Experts</h3>
					</div>

					<!-- Card 3: Evolving Pedagogy -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_3 = get_template_directory() . '/assets/svgs/Evolving  Pedagogy.svg';
							if ( file_exists( $svg_3 ) ) {
								echo file_get_contents( $svg_3 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Evolving Pedagogy</h3>
					</div>

					<!-- Card 4: Globally Informed Teaching -->
					<div class="about-merit-card swiper-slide flex-column align-center">
						<div class="about-merit-icon-wrap flex-center">
							<?php 
							$svg_4 = get_template_directory() . '/assets/svgs/Globally Informed  Teaching.svg';
							if ( file_exists( $svg_4 ) ) {
								echo file_get_contents( $svg_4 );
							}
							?>
						</div>
						<h3 class="about-merit-title">Globally Informed Teaching</h3>
					</div>

				

				</div>

				<!-- Mobile Progress Bar -->
				<div class="about-merits-progress-container">
					<div class="about-merits-progress-bar" id="meritsProgressBar"></div>
				</div>

			</div>

			
		</div>
	</section>

	<!-- Section 8: Teacher Testimonials Component -->
	<?php get_template_part( 'template-parts/teachers-testimonials' ); ?>


</main>

<?php
get_footer();
