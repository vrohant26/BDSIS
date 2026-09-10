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
			<path d="M570.301 276.242C357.749 622.86 346.638 33.6598 214.397 265.741C82.1555 497.822 -7.27757 184.524 122.951 65.7798C253.18 -52.9641 10.9655 -88.8132 34.6725 -112.174" stroke="var(--clr-wavy-purple-light)" stroke-width="66" stroke-linecap="round"/>
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
					
					<!-- Slide 1: Ms. Anjana Rajmane -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portraits DSC02273.webp' ); ?>" alt="Ms. Anjana Rajmane" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Nurturing Independent, Confident, And Lifelong Learners.</h3>
									<p class="teachers-quote-text">"At B.D. Somani International School, Kharghar, we nurture independent, confident, and lifelong learners who are encouraged to make meaningful connections with the world around them.</p>
									<p class="teachers-quote-text" style="margin-top: 0.75rem;">We believe in empowering students to take ownership of their learning and become agents of positive change. By connecting learning with real-world experiences and purposeful action, we inspire our learners to engage deeply, think independently, and make a meaningful contribution to society.</p>
									<p class="teachers-quote-text" style="margin-top: 0.75rem;">Our high-quality infrastructure provides a stimulating learning environment that supports curiosity, creativity, collaboration, and critical thinking. We equip our learners with the knowledge, skills, and mindset required to transition confidently into higher education and the workplace."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Anjana Rajmane</h4>
									<p class="teachers-author-info">Middle School Coordinator – IGCSE</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 2: Ms. Shraddha Sachdeva -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portraits DSC02285.webp' ); ?>" alt="Ms. Shraddha Sachdeva" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Planting The Seeds For A Sustainable, Compassionate Future.</h3>
									<p class="teachers-quote-text">"As a pre-primary coordinator, my vision is built on a simple truth: it takes a whole village to raise a child. I believe in establishing a close, collaborative partnership between students, teachers, and parents. By working hand in hand, we create a nurturing ecosystem where our youngest learners can truly thrive.<br><br>Our collective goal is to prepare students to become dynamic, global, honest, and disciplined individuals. Education at this foundational stage goes beyond traditional academics; it is about character building and fostering deep empathy. We guide our children to coexist peacefully not only with the people around them but also with plants, animals, and the entire environment. Together, we are planting the seeds for a sustainable, compassionate, and harmonious future."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Shraddha Sachdeva</h4>
									<p class="teachers-author-info">Pre-primary Coordinator</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 3: Ms. Pooja Shukla -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portrait DSC02300.webp' ); ?>" alt="Ms. Pooja Shukla" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Empowering Effective Communication And Global Perspectives.</h3>
									<p class="teachers-quote-text">"We guide students to articulate their thoughts clearly, appreciate diverse cultures, and develop strong analytical skills. The warm, inclusive atmosphere at B.D. Somani brings out the best in both educators and students alike."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Pooja Shukla</h4>
									<p class="teachers-author-info">Middle School Coordinator - ICSE</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 4 (Last): Ms. Jyotsna Dondapati -->
					<div class="swiper-slide teachers-slide-item">
						<div class="teachers-card-group flex gap-md">
							<!-- Portrait Box -->
							<div class="teachers-portrait-box relative">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Teacher Portrait 0282.webp' ); ?>" alt="Ms. Jyotsna Dondapati" class="teachers-portrait-img" loading="lazy" decoding="async">
							</div>
							<!-- Quote Details Box -->
							<div class="teachers-quote-box relative flex-column flex-between">
								<div class="teachers-quote-content">
									<h3 class="teachers-quote-heading">Learning, Leading and Growing Together</h3>
									<p class="teachers-quote-text">"My journey at B.D. Somani International School, Kharghar, has been one of continuous learning, reflection, and growth. As a Coordinator, I have had the privilege of working alongside students, teachers, and parents in a community that values curiosity, courage, and collaboration.<br><br>What I find most rewarding is being part of an environment where learning is not confined to the classroom. Students are encouraged to question, explore, take risks, and learn from their experiences, while educators are equally encouraged to evolve and reimagine their practice."</p>
								</div>
								<div class="teachers-quote-author">
									<h4 class="teachers-author-name">Ms. Jyotsna Dondapati</h4>
									<p class="teachers-author-info">Primary School Coordinator</p>
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
