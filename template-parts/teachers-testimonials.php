<?php
/**
 * Template Part: Teachers Testimonial Section Component
 *
 * @package BD_Somani
 */
?>

<!-- Section: Voices of Our Educators -->
<section class="teachers-testimonial-section relative overflow-hidden" id="teachers-testimonials">
	<!-- Screen-Edge Navigation Arrow Buttons (Yellow Circles) -->
	<button class="teachers-nav-btn teachers-prev-btn flex-center" id="teachersPrevBtn" aria-label="Previous testimonial">
		<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7 15L1 8M1 8L7 1M1 8H19" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</button>
	<button class="teachers-nav-btn teachers-next-btn flex-center" id="teachersNextBtn" aria-label="Next testimonial">
		<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</button>

	<!-- Background Floating Decorative Quotes -->
	<div class="teachers-quote-decor teachers-quote-left">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/quotation.svg' ); ?>" alt="Quote Icon">
	</div>
	<div class="teachers-quote-decor teachers-quote-right">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/quotation.svg' ); ?>" alt="Quote Icon">
	</div>

	<!-- Background Top Right Decorative Wavy SVG -->
	<div class="teachers-wavy-decor-right" aria-hidden="true">
		<svg width="423" height="422" viewBox="0 0 423 422" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M570.301 276.242C357.749 622.86 346.638 33.6598 214.397 265.741C82.1555 497.822 -7.27757 184.524 122.951 65.7798C253.18 -52.9641 10.9655 -88.8132 34.6725 -112.174" stroke="var(--clr-accent-cream)" stroke-width="66" stroke-linecap="round"/>
		</svg>
	</div>

	<div class="site-container relative">
		
		<!-- Section Header -->
		<div class="teachers-header text-center margin-bottom-lg">
			<h2 class="teachers-main-title section-title">Voices of Our Educators</h2>
			<p class="teachers-subtitle section-subtitle">Our dedicated teachers share their experiences, passion for teaching, and commitment to nurturing lifelong learners at B.D. Somani International School.</p>
		</div>

		<!-- Teachers Carousel Stage Container -->
		<div class="teachers-carousel-wrapper relative">
			
			<!-- Swiper Container -->
			<div class="swiper teachers-swiper">
				<div class="swiper-wrapper">
					
					<!-- Slide 1: Ms. Ananya Deshmukh -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box (No Video Overlay) -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portrait 02265.webp' ); ?>" alt="Ms. Ananya Deshmukh" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Inspiring Curiosity And Critical Thinking In Every Young Learner.</h3>
									<p class="teachers-quote-text">"Teaching at B.D. Somani is a deeply fulfilling experience. Our inquiry-driven curriculum empowers students to question, explore, and connect classroom lessons to the real world. Seeing children develop confidence in their own ideas every day is what makes our community so special."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Ananya Deshmukh</h4>
									<p class="teachers-author-info">Primary Years Educator & Inquiry Coordinator</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 2: Mr. Rajesh Nair -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portrait 0282.webp' ); ?>" alt="Mr. Rajesh Nair" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Fostering Innovation, Problem-Solving, And Hands-On Discovery.</h3>
									<p class="teachers-quote-text">"In our Maker Labs and interactive classrooms, science comes alive. We encourage students to experiment, embrace trial and error, and think like innovators. The collaborative environment between teachers and students creates a truly dynamic learning culture."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Mr. Rajesh Nair</h4>
									<p class="teachers-author-info">Middle School Science & STEM Facilitator</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 3: Ms. Sunita Sharma -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portraits DSC02273.webp' ); ?>" alt="Ms. Sunita Sharma" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Nurturing Young Minds With Warmth, Empathy, And Joyful Learning.</h3>
									<p class="teachers-quote-text">"Every child’s first educational steps should feel warm, safe, and exciting. At B.D. Somani, we focus on emotional well-being, creative expression, and strong foundational values, giving young learners the perfect launchpad to flourish."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Sunita Sharma</h4>
									<p class="teachers-author-info">Early Childhood & Foundational Educator</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 4: Mr. Vikramaditya Joshi -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portraits DSC02285.webp' ); ?>" alt="Mr. Vikramaditya Joshi" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Unlocking Creative Expression And Building Lifelong Confidence.</h3>
									<p class="teachers-quote-text">"Arts and extracurriculars are not just additions to education—they are central to developing well-rounded, expressive individuals. Watching students discover their unique artistic voices and shine on stage is the greatest reward of my teaching journey."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Mr. Vikramaditya Joshi</h4>
									<p class="teachers-author-info">Performing Arts & Co-Curricular Lead</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 5: Ms. Priyanka Kulkarni -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portrait DSC02300.webp' ); ?>" alt="Ms. Priyanka Kulkarni" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Empowering Effective Communication And Global Perspectives.</h3>
									<p class="teachers-quote-text">"We guide students to articulate their thoughts clearly, appreciate diverse cultures, and develop strong analytical skills. The warm, inclusive atmosphere at B.D. Somani brings out the best in both educators and students alike."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Priyanka Kulkarni</h4>
									<p class="teachers-author-info">Language Arts & Humanities Mentor</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- Bottom Progress Bar Control -->
			<div class="teachers-progress-wrapper margin-top-lg flex-center">
				<div class="teachers-progress-bar-track relative">
					<div class="teachers-progress-bar-fill" id="teachersProgressBar"></div>
				</div>
			</div>

		</div>

	</div>
</section>
