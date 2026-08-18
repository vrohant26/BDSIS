<?php
get_header();
?>

<main class="site-main">
	<!-- Hero Carousel Section -->
	<section class="hero-slider" aria-label="Hero Slider">
		<div class="hero-slides">

			<!-- Slide 1 -->
			<div class="hero-slide active" data-slide="0" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/BD Somani International School Building.webp' ); ?>');">
				<div class="hero-overlay"></div>
				<div class="site-container hero-container">
					<div class="hero-content flex-column gap-md">
						<h1 class="hero-title">Tomorrow’s Endeavour Begins Now</h1>
						<p class="hero-subtitle">An ecosystem of growth where every experience helps children become thoughtful, confident, and compassionate individuals.</p>
						<div class="hero-actions">
							<a href="#visit" class="btn btn-yellow hero-btn">
								<span>VISIT OUR SCHOOL</span>
								<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Slide 2 -->
			<div class="hero-slide" data-slide="1" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/Carousel 2.webp' ); ?>');">
				<div class="hero-overlay"></div>
				<div class="site-container hero-container">
					<div class="hero-content flex-column gap-md">
						<h1 class="hero-title">Learning That Inspires. Education That Endures.</h1>
						<p class="hero-subtitle">A thoughtfully designed classroom experience where academic excellence meets creativity, curiosity, and real-world readiness.</p>
						<div class="hero-actions">
							<a href="#schedule" class="btn btn-yellow hero-btn">
								<span>SCHEDULE A CAMPUS VISIT</span>
								<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Slide 3 -->
			<div class="hero-slide" data-slide="2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/Carousel 3.webp' ); ?>');">
				<div class="hero-overlay"></div>
				<div class="site-container hero-container">
					<div class="hero-content flex-column gap-md">
						<h1 class="hero-title">Creating Minds That Think. Hearts That Grow.</h1>
						<p class="hero-subtitle">Beyond academics, every experience nurtures creativity, adaptability, problem-solving, and the confidence to thrive in an ever-changing world.</p>
						<div class="hero-actions">
							<a href="#apply" class="btn btn-yellow hero-btn">
								<span>BEGIN YOUR CHILD'S NEXT CHAPTER</span>
								<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Slide 4 -->
			<div class="hero-slide" data-slide="3" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/Carousel 4.webp' ); ?>');">
				<div class="hero-overlay"></div>
				<div class="site-container hero-container">
					<div class="hero-content flex-column gap-md">
						<h1 class="hero-title">Every Experience. A Step Towards New Horizons.</h1>
						<p class="hero-subtitle">Beyond academics, students discover the confidence, perspective, and life skills that prepare them for a world of possibilities.</p>
						<div class="hero-actions">
							<a href="#admissions" class="btn btn-yellow hero-btn">
								<span>TAKE THE NEXT STEP</span>
								<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Bottom Center Carousel Progress Bar Indicators -->
		<div class="hero-progress-wrapper flex-center">
			<div class="hero-progress-container flex gap-xs">
				<button class="hero-progress-item active" data-slide-index="0" aria-label="Go to Slide 1">
					<span class="hero-progress-track">
						<span class="progress-bar-fill"></span>
					</span>
				</button>
				<button class="hero-progress-item" data-slide-index="1" aria-label="Go to Slide 2">
					<span class="hero-progress-track">
						<span class="progress-bar-fill"></span>
					</span>
				</button>
				<button class="hero-progress-item" data-slide-index="2" aria-label="Go to Slide 3">
					<span class="hero-progress-track">
						<span class="progress-bar-fill"></span>
					</span>
				</button>
				<button class="hero-progress-item" data-slide-index="3" aria-label="Go to Slide 4">
					<span class="hero-progress-track">
						<span class="progress-bar-fill"></span>
					</span>
				</button>
			</div>
		</div>
	</section>

	<!-- Section 2: A School for Who They will Become (Coverflow Carousel) -->
	<section class="philosophy-section">
		<div class="site-container relative">
			<!-- Floating Globe Icon (Top Left) -->
			<div class="floating-globe-icon">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/Doodle globe Icon.svg' ); ?>" alt="Globe Icon" width="90" height="90">
			</div>

			<!-- Floating Arrow Icon (Bottom Right) -->
			<div class="floating-arrow-icon">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/Doodle Arrow Icons .svg' ); ?>" alt="Doodle Arrow Icon" width="80" height="60">
			</div>

			<!-- Header Content -->
			<div class="philosophy-header text-center flex-column align-center gap-sm">
				<h2 class="section-title">A School for Who They will Become</h2>
				<p class="section-subtitle">The world our children will grow into is changing faster than we can predict, so the real question isn't what they will study, but who they'll become.</p>
			</div>

			<!-- Swiper 3D Coverflow Carousel -->
			<div class="coverflow-carousel-wrapper">
				<div class="swiper coverflow-swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="coverflow-card">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coverflow carousel 1.webp' ); ?>" alt="BD Somani Campus & Activities 1" loading="lazy">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="coverflow-card">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coverflow carousel 2.webp' ); ?>" alt="BD Somani Campus & Activities 2" loading="lazy">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="coverflow-card">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coverflow carousel 3.webp' ); ?>" alt="BD Somani Campus Building" loading="lazy">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="coverflow-card">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coverflow carousel 4.webp' ); ?>" alt="BD Somani Campus & Activities 4" loading="lazy">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="coverflow-card">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coverflow carousel 5.webp' ); ?>" alt="BD Somani Campus & Activities 5" loading="lazy">
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer Content & CTA -->
			<div class="philosophy-footer text-center flex-column align-center gap-md">
				<p class="philosophy-copy">At B.D. Somani International School, Kharghar,<br>that belief shapes every child’s experience.</p>
				<div class="philosophy-cta-wrapper relative flex-center">
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-yellow">
						<span>OUR LEGACY &amp; OUR PHILOSOPHY</span>
						<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Section 3: Preparing India's Next Generation for a Global Future (Video Placeholder) -->
	<section class="global-future-section">
		<!-- Top Right Background Decorative Wavy Line SVG -->
		<div class="bg-wavy-line-svg">
			<svg width="423" height="422" viewBox="0 0 423 422" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M570.301 276.242C357.749 622.86 346.638 33.6598 214.397 265.741C82.1555 497.822 -7.27757 184.524 122.951 65.7798C253.18 -52.9641 10.9655 -88.8132 34.6725 -112.174" stroke="var(--clr-accent-cream)" stroke-width="66" stroke-linecap="round"/>
			</svg>
		</div>

		<div class="site-container relative">
			<!-- Header Content -->
			<div class="global-future-header text-center flex-column align-center gap-sm">
				<h2 class="section-title global-future-title">Preparing India's Next Generation<br>for a Global Future</h2>
				<p class="section-subtitle global-future-subtitle">Our internationally recognised curriculum connects classroom learning with experiential opportunities, creative exploration and practical application. Students develop agility of thought as they engage with new ideas and perspectives. They leave with a global outlook, grounded in Indian values.</p>
			</div>

			<!-- Video Player Placeholder Container -->
			<div class="video-placeholder-wrapper">
				<div class="video-card-container relative">
					<!-- Top-Left Circular Badge (50+ Years of Legacy - Ref Image 2 Style) -->
					<div class="legacy-badge-wrapper flex-center">
						<svg class="legacy-badge-svg" width="150" height="150" viewBox="0 0 150 150">
							<defs>
								<path id="legacyTextPath" d="M 75, 75 m -52, 0 a 52,52 0 1,1 104,0 a 52,52 0 1,1 -104,0" fill="none"/>
							</defs>
							<!-- Center White Circle Background -->
							<circle cx="75" cy="75" r="70" fill="transparent"/>
							<!-- Outer Purple Ring Band -->
							<path d="M 75 5 A 70 70 0 1 0 75 145 A 70 70 0 1 0 75 5 Z M 75 35 A 40 40 0 1 1 75 115 A 40 40 0 1 1 75 35 Z" fill="var(--clr-primary-purple)" fill-rule="evenodd"/>
							<!-- Rotating Text on Purple Ring Band -->
							<text fill="#FFFFFF" font-family="Montserrat" font-size="13" font-weight="700" letter-spacing="0.8">
								<textPath href="#legacyTextPath" startOffset="0%">
									50+ years of legacy • 50+ years of legacy •
								</textPath>
							</text>
						</svg>
						<!-- Center Hat Icon SVG (Purple Fill #49274A) -->
						<div class="legacy-badge-center-icon flex-center">
							<svg width="44" height="31" viewBox="0 0 48 34" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.6605 0L0 8.87293L23.6605 20.7032L34.9298 15.0686L24.358 11.8364C24.1403 11.9407 23.902 11.9952 23.6605 11.9957C23.2306 11.9957 22.8182 11.8249 22.5142 11.5209C22.2102 11.2169 22.0394 10.8045 22.0394 10.3746C22.0394 9.94459 22.2102 9.53223 22.5142 9.2282C22.8182 8.92417 23.2306 8.75337 23.6605 8.75337L23.3924 9.62496L25.2707 10.2028L25.2715 10.2085L28.0431 11.0561L43.824 15.9114V17.1421C43.6057 17.2906 43.427 17.4901 43.3034 17.7234C43.1798 17.9566 43.115 18.2166 43.1147 18.4806C43.115 18.7506 43.1828 19.0163 43.3118 19.2535C43.4409 19.4907 43.6271 19.692 43.8537 19.8389C43.1157 22.6279 43.1147 28.9556 43.1147 31.4499C44.7359 32.5032 44.7359 32.5417 46.3571 31.4499C46.3571 28.9559 46.3563 22.6294 45.6184 19.8398C45.8451 19.6927 46.0314 19.4913 46.1604 19.2539C46.2894 19.0165 46.357 18.7507 46.3571 18.4805C46.3571 18.2162 46.2924 17.9559 46.1688 17.7223C46.0452 17.4887 45.8663 17.2889 45.6478 17.1403V14.5646L39.6369 12.7151L47.3211 8.87293L23.6605 0ZM9.8423 16.15L8.51262 24.1283C11.1648 24.4751 14.3373 26.0166 17.2538 27.8394C18.9125 28.8762 20.4661 30.0142 21.7279 31.1183C22.4992 31.7931 23.1441 32.4406 23.6605 33.0776C24.177 32.4405 24.8219 31.7931 25.5932 31.1183C26.855 30.0142 28.4085 28.8762 30.0673 27.8394C32.9838 26.0166 36.1563 24.4751 38.8085 24.1283L37.4786 16.15H36.8453L23.6605 22.7424L10.4756 16.15H9.8423Z" fill="var(--clr-primary-purple)"/>
							</svg>
						</div>
					</div>

					<!-- Video Poster Placeholder Image -->
					<div class="video-poster-box">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/coverflow carousel 5.webp' ); ?>" alt="BD Somani Auditorium & Facilities" class="video-poster-img" loading="lazy">
						<div class="video-overlay"></div>
					</div>

					<!-- Bottom-Right Pause/Play Toggle Button -->
					<button class="video-control-btn" aria-label="Toggle Video Playback">
						<svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect width="5" height="18" rx="2" fill="#222222"/>
							<rect x="11" width="5" height="18" rx="2" fill="#222222"/>
						</svg>
					</button>
				</div>
			</div>

			<!-- Bottom CTA Button -->
			<div class="global-future-cta flex-center">
				<a href="<?php echo esc_url( home_url( '/approach/' ) ); ?>" class="btn btn-yellow">
					<span>SEE HOW WE LEARN DIFFERENTLY</span>
					<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</div>
		</div>
	</section>

	<!-- Section 4: Brand Values Full-Width Purple Marquee (Below Video Section) -->
	<?php get_template_part( 'template-parts/brand-marquee' ); ?>

	<!-- Section 5: Curriculum Stage Timeline Carousel Component -->
	<?php get_template_part( 'template-parts/curriculum-carousel' ); ?>

	<!-- Section 6: Experiential Learning Carousel (100svh Solid Purple Section) -->
	<section class="purple-full-section relative overflow-hidden flex-center" id="student-life">
		<!-- Background Wavy Cream Ribbon SVG Path -->
		<svg class="experiential-ribbon-svg" viewBox="0 0 1060 878" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
			<path class="experiential-ribbon-path" d="M1033.64 -46.2938C1057.75 0.461853 590.175 55.3294 730.36 293.577C870.545 531.825 456.118 1134.19 403.613 675.948C351.109 217.711 -143.78 1360.05 -249.45 674.754" stroke="#FFF5EE" stroke-width="50" stroke-linecap="round"/>
		</svg>

		<div class="site-container relative z-2">
			<div class="experiential-grid">
				
				<!-- Left Image Box / Active Carousel Image Container -->
				<div class="experiential-media-wrapper relative">
					<div class="experiential-media-card placeholder-card relative overflow-hidden">
						<div class="experiential-slides">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/indoor and outdoor sports.webp' ); ?>" alt="Indoor &amp; Outdoor Sports" class="experiential-img-slide active" data-index="0" loading="lazy" decoding="async">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/performing arts.webp' ); ?>" alt="Performing Arts" class="experiential-img-slide" data-index="1" loading="lazy" decoding="async">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/clubs and activities.webp' ); ?>" alt="Clubs &amp; Activities" class="experiential-img-slide" data-index="2" loading="lazy" decoding="async">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/reading and literature club.webp' ); ?>" alt="Reading &amp; Literary Clubs" class="experiential-img-slide" data-index="3" loading="lazy" decoding="async">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/innovation and design workshop.webp' ); ?>" alt="Innovation &amp; Design Workshops" class="experiential-img-slide" data-index="4" loading="lazy" decoding="async">
						</div>
					</div>
				</div>

				<!-- Right Topic & Interactive Bullet Tabs Box -->
				<div class="experiential-info-box flex-column gap-md relative">
					<div class="experiential-header flex-column gap-xs">
						<h2 class="experiential-title">Learning Enriched by Experience</h2>
						<p class="experiential-desc">A well-rounded education complements academics with experiential learning. Our co-curricular programs are designed to encourage students to pursue their interests, develop confidence and discover their potential across a wide range of opportunities.</p>
					</div>

					<!-- Bullet Points Carousel Tabs -->
					<div class="experiential-tabs-list flex-column gap-sm relative">
						<button class="experiential-tab-item active" data-tab-index="0">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/indoor outdoor sports.svg' ); ?>" class="experiential-tab-icon" alt="Indoor &amp; Outdoor Sports">
							<span class="experiential-tab-text">Indoor &amp; Outdoor Sports</span>
						</button>

						<button class="experiential-tab-item" data-tab-index="1">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/performing arts.svg' ); ?>" class="experiential-tab-icon" alt="Performing Arts">
							<span class="experiential-tab-text">Performing Arts</span>
						</button>

						<button class="experiential-tab-item" data-tab-index="2">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/clubs and activities.svg' ); ?>" class="experiential-tab-icon" alt="Clubs &amp; Activities">
							<span class="experiential-tab-text">Clubs &amp; Activities</span>
						</button>

						<button class="experiential-tab-item" data-tab-index="3">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/reading and literary.svg' ); ?>" class="experiential-tab-icon" alt="Reading &amp; Literary Clubs">
							<span class="experiential-tab-text">Reading &amp; Literary Clubs</span>
						</button>

						<button class="experiential-tab-item" data-tab-index="4">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/innovation and design workshop.svg' ); ?>" class="experiential-tab-icon" alt="Innovation &amp; Design Workshops">
							<span class="experiential-tab-text">Innovation &amp; Design Workshops</span>
						</button>

						<!-- Floating Paper Plane Doodle Icon -->
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/Paper Plane Icon 1.svg' ); ?>" class="curriculum-doodle-icon experiential-paper-plane floating-doodle" alt="Floating Paper Plane Icon">
					</div>

					<div class="experiential-cta-wrapper margin-top-xs">
						<a href="<?php echo esc_url( home_url( '/campus-life/' ) ); ?>" class="btn btn-yellow">
							<span>EXPLORE STUDENT LIFE AT BDSIS</span>
							<svg class="btn-arrow" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11 1L17 7M17 7L11 13M17 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Section 7: The Values We Nurture (Pinned Scroll-Based Section) -->
	<section class="values-pinned-section relative overflow-hidden" id="our-values">
		<div class="values-pinned-sticky flex-center">
			<div class="values-content-container relative z-2 width-100 flex-column flex-between align-center">
				
				<!-- Top Header & Floating Doodle -->
				<div class="values-header text-center relative margin-bottom-xs">
					<h2 class="values-main-title">The Values We Nurture</h2>
					<!-- Decorative Top-Left Book Doodle -->
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/book.svg' ); ?>" class="values-doodle-book floating-doodle" alt="Book Doodle">
				</div>

				<!-- Middle Stage Container -->
				<div class="values-stage-container relative width-100 flex-between align-center">
					
					<!-- Left Side: Collaboration Card -->
					<div class="value-card-wrapper card-left value-card-collaboration" id="valueCardCollaboration">
						<div class="value-card-box relative">
							<div class="value-card-header flex-between align-center">
								<span class="value-card-title">COLLABORATION</span>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/collaboration.svg' ); ?>" class="value-card-icon" alt="Collaboration Icon">
							</div>
							<p class="value-card-desc">We cultivate respectful communicators who value teamwork, diverse thinking and shared success.</p>
						</div>
					</div>

					<!-- Center Graphic Illustration Container -->
					<div class="values-center-media relative flex-center">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/curious svg.svg' ); ?>" class="values-svg-graphic graphic-curious" id="graphicCurious" alt="Curiosity Illustration">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/collaborative svg.svg' ); ?>" class="values-svg-graphic graphic-collaborative" id="graphicCollaborative" alt="Collaboration Illustration">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/courage svg.svg' ); ?>" class="values-svg-graphic graphic-courage" id="graphicCourage" alt="Courage Illustration">
					</div>

					<!-- Right Side: Courage & Curiosity Cards Container -->
					<div class="values-right-cards flex-column gap-md">
						
						<!-- Courage Card (Top Right) -->
						<div class="value-card-wrapper card-right value-card-courage" id="valueCardCourage">
							<div class="value-card-box relative">
								<div class="value-card-header flex-between align-center">
									<span class="value-card-title">COURAGE</span>
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/courage.svg' ); ?>" class="value-card-icon" alt="Courage Icon">
								</div>
								<p class="value-card-desc">We inspire confident individuals who act with integrity, empathy and a strong sense of responsibility.</p>
							</div>
						</div>

						<!-- Curiosity Card (Bottom Right) -->
						<div class="value-card-wrapper card-right value-card-curiosity" id="valueCardCuriosity">
							<div class="value-card-box relative">
								<div class="value-card-header flex-between align-center">
									<span class="value-card-title">CURIOSITY</span>
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/curiosity.svg' ); ?>" class="value-card-icon" alt="Curiosity Icon">
								</div>
								<p class="value-card-desc">We nurture inquisitive minds that explore ideas, embrace perspectives and seek meaningful answers.</p>
							</div>
						</div>

					</div>

				</div>

				<!-- Bottom Subtitle Paragraph -->
				<div class="values-footer text-center width-100">
					<p class="values-bottom-subtitle">Every stage of your child's journey is shaped by our core values of Curiosity, Collaboration, and Courage.</p>
				</div>

			</div>
		</div>
	</section>

	<!-- Section 8: Families Who Chose B.D. Somani International School (Testimonial Component) -->
	<?php get_template_part( 'template-parts/testimonials' ); ?>

	<!-- Section 9: Call To Action (CTA) Section -->
	
</main>

<?php
get_footer();
