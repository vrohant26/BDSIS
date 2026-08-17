<?php
/**
 * Template Name: Approach Page
 * Template Post Type: page
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main approach-page-main">

	<!-- Top Purple Hero & Breadcrumb Header Section -->
	<section class="approach-hero-section">
		<div class="site-container relative z-10">
			
			<!-- Breadcrumb Navigation -->
			<nav class="approach-breadcrumb" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-link flex align-center gap-xs">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/home svg.svg' ); ?>" alt="Home" width="16" height="18" class="breadcrumb-home-icon">
				</a>
				<span class="breadcrumb-sep">/</span>
				<a href="<?php echo esc_url( home_url( '/#academics' ) ); ?>" class="breadcrumb-link">Academics</a>
				<span class="breadcrumb-sep">/</span>
				<span class="breadcrumb-current">Our Approach</span>
			</nav>

			<!-- Hero Title & Subtitle -->
			<div class="approach-hero-content text-center">
				<h1 class="approach-hero-title">An Education that Begins with Curiosity and Grows Through Experience</h1>
				<p class="approach-hero-subtitle">Our curriculum is grounded in contemporary educational research and designed around how children learn, think, and grow.</p>
			</div>

		</div>
	</section>




	<!-- Main Interactive Diagram Section with Diagonal Split & Floating Accordion Cards -->
	<section class="approach-diagram-section relative overflow-hidden">
		<!-- Diagonal White Canvas Backdrop -->
		<div class="approach-diagonal-canvas"></div>
		
		<div class="site-container relative z-10">
			
			<div class="approach-diagram-wrapper">

				<!-- Top-Right Annotation Graphic ("our approach") -->
				<div class="approach-annotation-box">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/our approach annotation.svg' ); ?>" alt="our approach" class="approach-annotation-img">
				</div>

				<!-- Left Column Cards (Cards 1, 2, 3) -->
				<div class="approach-col approach-col-left">

					<!-- Card 1: Learning Philosophy -->
					<div class="approach-card-slot">
						<div class="approach-card" data-accordion>
							<button class="approach-card-header" aria-expanded="false" aria-controls="approach-body-1">
								<span class="approach-card-badge">Learning Philosophy</span>
								<span class="approach-card-title">Inquiry-Based Learning</span>
								<svg class="approach-card-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="#49274A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div id="approach-body-1" class="approach-card-body">
								<div class="approach-card-content">
									<p>Curiosity drives every learning experience. Students are encouraged to question and discover, building a deeper understanding through exploration rather than memorisation.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Card 2: Student Well-being -->
					<div class="approach-card-slot">
						<div class="approach-card" data-accordion>
							<button class="approach-card-header" aria-expanded="false" aria-controls="approach-body-2">
								<span class="approach-card-badge">Student Well-being</span>
								<span class="approach-card-title">Social-Emotional Learning</span>
								<svg class="approach-card-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="#49274A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div id="approach-body-2" class="approach-card-body">
								<div class="approach-card-content">
									<p>The journey of learning is also about looking inward. As students progress through the curriculum, they develop self-awareness, empathy, and emotional intelligence.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Card 3: Design Thinking -->
					<div class="approach-card-slot">
						<div class="approach-card" data-accordion>
							<button class="approach-card-header" aria-expanded="false" aria-controls="approach-body-3">
								<span class="approach-card-badge">Design Thinking</span>
								<span class="approach-card-title">Design &amp; Problem-Solving Approach:</span>
								<svg class="approach-card-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="#49274A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div id="approach-body-3" class="approach-card-body">
								<div class="approach-card-content">
									<p>Our culture of innovation inspires students to look beyond the obvious. They analyse challenges, experiment with ideas and translate their learnings into practical solutions.</p>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Center Column (Isometric Building Illustration) -->
				<div class="approach-center-building">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/approach building.svg' ); ?>" alt="B.D. Somani International School Building Illustration" class="approach-building-img">
				</div>

				<!-- Right Column Cards (Cards 4, 5, 6) -->
				<div class="approach-col approach-col-right">

					<!-- Card 4: Curriculum Design -->
					<div class="approach-card-slot">
						<div class="approach-card" data-accordion>
							<button class="approach-card-header" aria-expanded="false" aria-controls="approach-body-4">
								<span class="approach-card-badge">Curriculum Design</span>
								<span class="approach-card-title">Integrated-Interdisciplinary Teaching</span>
								<svg class="approach-card-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="#49274A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div id="approach-body-4" class="approach-card-body">
								<div class="approach-card-content">
									<p>Here, learning is enriched through connections across disciplines. By looking beyond subjects, students strengthen conceptual knowledge and critical thinking.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Card 5: Future Readiness -->
					<div class="approach-card-slot">
						<div class="approach-card" data-accordion>
							<button class="approach-card-header" aria-expanded="false" aria-controls="approach-body-5">
								<span class="approach-card-badge">Future Readiness</span>
								<span class="approach-card-title">21st Century Skills:</span>
								<svg class="approach-card-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="#49274A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div id="approach-body-5" class="approach-card-body">
								<div class="approach-card-content">
									<p>To be curious/ analytical, collaborative/ adaptable and courageous/socially responsible are core values embedded across our teaching principles. These qualities help students thrive with confidence in an ever-evolving world.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Card 6: Growth Mindset -->
					<div class="approach-card-slot">
						<div class="approach-card" data-accordion>
							<button class="approach-card-header" aria-expanded="false" aria-controls="approach-body-6">
								<span class="approach-card-badge">Growth Mindset</span>
								<span class="approach-card-title">Habits of Mind &amp; Growth</span>
								<svg class="approach-card-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="#49274A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div id="approach-body-6" class="approach-card-body">
								<div class="approach-card-content">
									<p>Our culture of innovation inspires students to look beyond the obvious. They analyse challenges, experiment with ideas and translate their learnings into practical solutions.</p>
								</div>
							</div>
						</div>
					</div>

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
					<h2 class="about-potential-title">From Little Dreams to Big Achievements.</h2>
					<p class="about-potential-lead">Every champion begins with a small dream, nurtured with learning, shaped by courage, and celebrated through achievement.</p>
				</div>

				<!-- Right Column: Circular Video Frame -->
				<div class="about-potential-media flex-center">
					<div class="about-potential-video-container relative">
						<!-- Video Frame -->
						<div class="about-potential-video-wrap">
							<video autoplay loop muted playsinline>
								<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/A1 WEBM.webm' ); ?>" type="video/webm">
								<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/about video.mp4' ); ?>" type="video/mp4">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="curriculum-carousel-section bg-white relative" id="academics">
		<!-- Screen-Edge Halfway Navigation Arrow (Left) -->
		<button class="carousel-nav-btn prev-btn flex-center" id="curriculumPrevBtn" aria-label="Previous Topic">
			<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7 15L1 8M1 8L7 1M1 8H19" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<!-- Screen-Edge Halfway Navigation Arrow (Right) -->
		<button class="carousel-nav-btn next-btn flex-center" id="curriculumNextBtn" aria-label="Next Topic">
			<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<div class="site-container relative">
			<!-- Header Content -->
			<div class="curriculum-header text-center flex-column align-center gap-xs">
				<h2 class="section-title curriculum-title">An Education Built on Excellence, Care &amp; Growth</h2>
				<div class="curriculum-subtitle-wrapper relative">
					<p class="section-subtitle">Guided by care and driven by excellence, every stage of learning empowers students to grow with confidence, curiosity, character, and purpose.</p>
					<!-- Hand-Drawn Doodle Arrow Graphic (Reusing Section 2 SVG Image) -->
					<div class="curriculum-doodle-arrow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/Doodle Arrow Icons .svg' ); ?>" alt="Doodle Arrow Icon" width="80" height="60">
					</div>
				</div>
			</div>

			<!-- Interactive Timeline Stepper Bar -->
			<div class="timeline-stepper-wrapper">
				<div class="timeline-stepper-track">
					<div class="timeline-progress-bar" id="timelineProgressBar"></div>
					<div class="timeline-steps flex-between">
						<button class="timeline-step-btn active" data-step="0">
							<span class="timeline-step-dot"></span>
							<span class="timeline-step-label">Day Care</span>
						</button>
						<button class="timeline-step-btn" data-step="1">
							<span class="timeline-step-dot"></span>
							<span class="timeline-step-label">Pre-Primary School</span>
						</button>
						<button class="timeline-step-btn" data-step="2">
							<span class="timeline-step-dot"></span>
							<span class="timeline-step-label">Primary School</span>
						</button>
						<button class="timeline-step-btn" data-step="3">
							<span class="timeline-step-dot"></span>
							<span class="timeline-step-label">Middle School</span>
						</button>
					</div>
				</div>
			</div>

			<!-- Carousel Slider Main Area -->
			<div class="curriculum-carousel-container relative">
				<!-- Swiper Carousel Container -->
				<div class="swiper curriculum-swiper">
					<div class="swiper-wrapper">

						<!-- Slide 1: Daycare -->
						<div class="swiper-slide curriculum-slide" data-slide-index="0">
							<div class="curriculum-slide-inner flex align-center gap-lg">
								<!-- Left Overlapping Images Box -->
								<div class="curriculum-media-box relative">
									<div class="main-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/daycare1.webp' ); ?>" alt="Daycare Outdoor Play Area" loading="lazy">
									</div>
									<div class="secondary-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/daycare2.webp' ); ?>" alt="Daycare Activity Corner" loading="lazy">
									</div>
								</div>

								<!-- Right Topic Details Box -->
								<div class="curriculum-info-box flex-column gap-sm relative">
									<!-- Background Iconify Doodle Icons (Light Solid Color Fill) -->
									<iconify-icon icon="ph:sun-fill" class="curriculum-doodle-icon doodle-pos-1" style="color: rgba(241, 200, 34, 0.28);"></iconify-icon>
									<iconify-icon icon="ph:balloon-fill" class="curriculum-doodle-icon doodle-pos-3" style="color: rgba(248, 214, 179, 0.35);"></iconify-icon>

									<h3 class="curriculum-topic-title">Daycare</h3>
									<p class="curriculum-topic-desc">Designed for working parents, our Day Care Facilities offer children a safe and engaging environment with meaningful after-school activities.</p>

									<div class="curriculum-cta-wrapper">
										<a href="#daycare" class="btn btn-yellow">
											<span>KNOW MORE ABOUT DAY CARE PROGRAM</span>
											<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</a>
									</div>

									<iconify-icon icon="ph:teddy-bear-fill" class="curriculum-doodle-icon doodle-pos-2" style="color: rgba(73, 39, 74, 0.22);"></iconify-icon>
								</div>
							</div>
						</div>

						<!-- Slide 2: Pre-Primary School -->
						<div class="swiper-slide curriculum-slide" data-slide-index="1">
							<div class="curriculum-slide-inner flex align-center gap-lg">
								<!-- Left Overlapping Images Box -->
								<div class="curriculum-media-box relative">
									<div class="main-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pre-primary 1.webp' ); ?>" alt="Pre-Primary Classroom" loading="lazy">
									</div>
									<div class="secondary-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pre-primary 2.webp' ); ?>" alt="Pre-Primary Play Group" loading="lazy">
									</div>
									<!-- Background Iconify Doodle Icons -->
									<iconify-icon icon="ph:puzzle-piece-fill" class="curriculum-doodle-icon media-doodle-1" style="color: rgba(73, 39, 74, 0.22);"></iconify-icon>
									<iconify-icon icon="ph:palette-fill" class="curriculum-doodle-icon media-doodle-2" style="color: rgba(241, 200, 34, 0.28);"></iconify-icon>
								</div>

								<!-- Right Topic Details Box -->
								<div class="curriculum-info-box flex-column gap-sm relative">
									<h3 class="curriculum-topic-title">Pre-Primary</h3>
									<p class="curriculum-topic-desc">Our Pre-Primary School lays the foundation for lifelong learning through play-based experiences, engaging activities, and a nurturing daily rhythm.</p>

									<div class="curriculum-cta-wrapper">
										<a href="#pre-primary" class="btn btn-yellow">
											<span>EXPLORE OUR PRE-PRIMARY SCHOOL</span>
											<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>

						<!-- Slide 3: Primary School -->
						<div class="swiper-slide curriculum-slide" data-slide-index="2">
							<div class="curriculum-slide-inner flex align-center gap-lg">
								<!-- Left Overlapping Images Box -->
								<div class="curriculum-media-box relative">
									<div class="main-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/primary school 1.webp' ); ?>" alt="Primary School Robotics & Lab" loading="lazy">
									</div>
									<div class="secondary-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/primary school 2.webp' ); ?>" alt="Primary School Classroom Learning" loading="lazy">
									</div>
									<!-- Background Iconify Doodle Icons -->
									<iconify-icon icon="ph:pencil-fill" class="curriculum-doodle-icon media-doodle-1" style="color: rgba(73, 39, 74, 0.22);"></iconify-icon>
									<iconify-icon icon="ph:atom-fill" class="curriculum-doodle-icon media-doodle-2" style="color: rgba(241, 200, 34, 0.28);"></iconify-icon>
								</div>

								<!-- Right Topic Details Box -->
								<div class="curriculum-info-box flex-column gap-sm relative">
									<h3 class="curriculum-topic-title">Primary School</h3>
									<p class="curriculum-topic-desc">The Primary years introduce students to structured learning, where they develop independent thinking, collaboration and problem-solving skills.</p>

									<div class="curriculum-cta-wrapper">
										<a href="#primary" class="btn btn-yellow">
											<span>CHECK OUR PRIMARY SCHOOL</span>
											<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>

						<!-- Slide 4: Middle School -->
						<div class="swiper-slide curriculum-slide" data-slide-index="3">
							<div class="curriculum-slide-inner flex align-center gap-lg">
								<!-- Left Overlapping Images Box -->
								<div class="curriculum-media-box relative">
									<div class="main-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/middle school 1.webp' ); ?>" alt="Middle School Classroom & Science" loading="lazy">
									</div>
									<div class="secondary-photo-card placeholder-card">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/middle school 2.webp' ); ?>" alt="Middle School Outdoor Field & Activities" loading="lazy">
									</div>
									<!-- Background Iconify Doodle Icons -->
									<iconify-icon icon="ph:compass-fill" class="curriculum-doodle-icon media-doodle-1" style="color: rgba(241, 200, 34, 0.28);"></iconify-icon>
									<iconify-icon icon="ph:graduation-cap-fill" class="curriculum-doodle-icon media-doodle-2" style="color: rgba(73, 39, 74, 0.22);"></iconify-icon>
								</div>

								<!-- Right Topic Details Box -->
								<div class="curriculum-info-box flex-column gap-sm relative">
									<h3 class="curriculum-topic-title">Middle School</h3>
									<p class="curriculum-topic-desc">Our Middle School offers the flexibility of ICSE and IGCSE curricula, supported by academic guidance that helps students choose the pathway best suited to their aspirations.</p>

									<div class="curriculum-cta-wrapper">
										<a href="#middle" class="btn btn-yellow">
											<span>EXPLORE MIDDLE SCHOOL</span>
											<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Section: Teacher Testimonials Component -->
	<?php get_template_part( 'template-parts/teachers-testimonials' ); ?>

	

</main>

<?php
get_footer();
