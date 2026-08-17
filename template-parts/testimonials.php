<?php
/**
 * Template Part: Parents Testimonial Section Component
 *
 * @package BD_Somani
 */
?>

<!-- Section: Families Who Chose B.D. Somani International School -->
<section class="parents-testimonial-section relative overflow-hidden" id="parents-testimonials">
	<!-- Screen-Edge Navigation Arrow Buttons (Yellow Circles) -->
	<button class="parents-nav-btn parents-prev-btn flex-center" id="parentsPrevBtn" aria-label="Previous testimonial">
		<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7 15L1 8M1 8L7 1M1 8H19" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</button>
	<button class="parents-nav-btn parents-next-btn flex-center" id="parentsNextBtn" aria-label="Next testimonial">
		<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</button>

	<!-- Background Floating Decorative Quotes -->
	<div class="parents-quote-decor parents-quote-left">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/quotation.svg' ); ?>" alt="Quote Icon">
	</div>
	<div class="parents-quote-decor parents-quote-right">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/quotation.svg' ); ?>" alt="Quote Icon">
	</div>

	<!-- Background Top Right Decorative Wavy SVG -->
	<div class="parents-wavy-decor-right" aria-hidden="true">
		<svg width="423" height="422" viewBox="0 0 423 422" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M570.301 276.242C357.749 622.86 346.638 33.6598 214.397 265.741C82.1555 497.822 -7.27757 184.524 122.951 65.7798C253.18 -52.9641 10.9655 -88.8132 34.6725 -112.174" stroke="var(--clr-accent-cream)" stroke-width="66" stroke-linecap="round"/>
		</svg>
	</div>

	<div class="site-container relative">
		
		<!-- Section Header -->
		<div class="parents-header text-center margin-bottom-lg">
			<h2 class="parents-main-title section-title">Families Who Chose<br>B.D. Somani International School, Kharghar</h2>
			<p class="parents-subtitle section-subtitle">We value the trust B.D. Somani families place in us. Their experiences are the truest reflection of who we are as a school.</p>
		</div>

		<!-- Parents Carousel Stage Container -->
		<div class="parents-carousel-wrapper relative">
			
			<!-- Swiper Container -->
			<div class="swiper parents-swiper">
				<div class="swiper-wrapper">
					
					<!-- Slide 1: Ms. Zahabia Khairullah -->
					<div class="swiper-slide parents-slide-item">
						<div class="parents-card-group flex gap-md">
							<!-- Video Thumbnail Box -->
							<a href="https://www.youtube.com/watch?v=X2f28ryaOfY" target="_blank" rel="noopener noreferrer" class="parents-video-box relative" aria-label="<?php esc_attr_e( 'Watch Ms. Zahabia Khairullah video testimonial on YouTube', 'bd-somani' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/parent 1.webp' ); ?>" alt="Ms. Zahabia Khairullah" class="parents-video-img" loading="lazy" decoding="async">
								<div class="parents-play-overlay flex-center">
									<div class="parents-play-btn flex-center">
										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 10.2679C19.3333 11.0377 19.3333 12.9623 18 13.7321L4.5 21.5263C3.16667 22.2961 1.5 21.3338 1.5 19.7942L1.5 4.20577C1.5 2.66617 3.16667 1.70392 4.5 2.47372L18 10.2679Z" fill="#FFFFFF"/>
										</svg>
									</div>
								</div>
							</a>
							<!-- Quote Details Box -->
							<div class="parents-quote-box relative flex-column flex-between">
								<div class="parents-quote-content">
									<h3 class="parents-quote-heading">The school's focus on happiness, holistic development, and critical thinking is what truly sets it apart.</h3>
									<p class="parents-quote-text">"As a parent, my biggest priority is that my child is happy at school, and that's exactly what I see every day. The school balances academics with extracurricular activities while encouraging critical thinking beyond textbooks. I'm very happy with my son's overall development, and I believe this holistic approach truly sets the school apart."</p>
								</div>
								<div class="parents-quote-author">
									<h4 class="parents-author-name">Ms. Zahabia Khairullah</h4>
									<p class="parents-author-info">Mother of Ayaan Khairullah Grade 2 and Aqeel Khairullah Jr. KG</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 2: Ms. Jasmita Kaur Kohli -->
					<div class="swiper-slide parents-slide-item">
						<div class="parents-card-group flex gap-md">
							<!-- Video Thumbnail Box -->
							<a href="https://www.youtube.com/watch?v=6BEbjY-88_Q" target="_blank" rel="noopener noreferrer" class="parents-video-box relative" aria-label="<?php esc_attr_e( 'Watch Ms. Jasmita Kaur Kohli video testimonial on YouTube', 'bd-somani' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/parent 2.webp' ); ?>" alt="Ms. Jasmita Kaur Kohli" class="parents-video-img" loading="lazy" decoding="async">
								<div class="parents-play-overlay flex-center">
									<div class="parents-play-btn flex-center">
										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 10.2679C19.3333 11.0377 19.3333 12.9623 18 13.7321L4.5 21.5263C3.16667 22.2961 1.5 21.3338 1.5 19.7942L1.5 4.20577C1.5 2.66617 3.16667 1.70392 4.5 2.47372L18 10.2679Z" fill="#FFFFFF"/>
										</svg>
									</div>
								</div>
							</a>
							<!-- Quote Details Box -->
							<div class="parents-quote-box relative flex-column flex-between">
								<div class="parents-quote-content">
									<h3 class="parents-quote-heading">The school's focus on happiness, holistic development, and critical thinking is what truly sets it apart.</h3>
									<p class="parents-quote-text">"As a parent, my biggest priority is that my child is happy at school, and that's exactly what I see every day. The school balances academics with extracurricular activities while encouraging critical thinking beyond textbooks. I'm very happy with my son's overall development, and I believe this holistic approach truly sets the school apart."</p>
								</div>
								<div class="parents-quote-author">
									<h4 class="parents-author-name">Ms. Jasmita Kaur Kohli</h4>
									<p class="parents-author-info">Mother of Priyana Kaur Kohli, Grade 2</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 3: Mr. Vibhaav Ruparel -->
					<div class="swiper-slide parents-slide-item">
						<div class="parents-card-group flex gap-md">
							<!-- Video Thumbnail Box -->
							<a href="https://www.youtube.com/watch?v=Jwngof63i44" target="_blank" rel="noopener noreferrer" class="parents-video-box relative" aria-label="<?php esc_attr_e( 'Watch Mr. Vibhaav Ruparel video testimonial on YouTube', 'bd-somani' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/vaibhaav.webp' ); ?>" alt="Mr. Vibhaav Ruparel" class="parents-video-img" loading="lazy" decoding="async">
								<div class="parents-play-overlay flex-center">
									<div class="parents-play-btn flex-center">
										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 10.2679C19.3333 11.0377 19.3333 12.9623 18 13.7321L4.5 21.5263C3.16667 22.2961 1.5 21.3338 1.5 19.7942L1.5 4.20577C1.5 2.66617 3.16667 1.70392 4.5 2.47372L18 10.2679Z" fill="#FFFFFF"/>
										</svg>
									</div>
								</div>
							</a>
							<!-- Quote Details Box -->
							<div class="parents-quote-box relative flex-column flex-between">
								<div class="parents-quote-content">
									<h3 class="parents-quote-heading">The School’s Diverse Curriculum And Welcoming Environment Have Helped My Son Grow In Confidence, Communication, And Curiosity.</h3>
									<p class="parents-quote-text">"In just a year and a half, I’ve seen my son become much more confident and comfortable speaking with others. His English and Hindi communication skills have improved significantly, and his vocabulary continues to surprise us. I especially appreciate the diverse curriculum, which goes beyond academics to introduce children to the world around them. The school’s welcoming environment and infrastructure make it a place where we’re very happy to see him grow."</p>
								</div>
								<div class="parents-quote-author">
									<h4 class="parents-author-name">Mr. Vibhaav Ruparel</h4>
									<p class="parents-author-info">Father of Hridaan Ruparel, Grade Sr. KG</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 4: Ms. Meenu Dhoot -->
					<div class="swiper-slide parents-slide-item">
						<div class="parents-card-group flex gap-md">
							<!-- Video Thumbnail Box -->
							<a href="https://www.youtube.com/watch?v=DdNCC5WAfT0" target="_blank" rel="noopener noreferrer" class="parents-video-box relative" aria-label="<?php esc_attr_e( 'Watch Ms. Meenu Dhoot video testimonial on YouTube', 'bd-somani' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/meenu.webp' ); ?>" alt="Ms. Meenu Dhoot" class="parents-video-img" loading="lazy" decoding="async">
								<div class="parents-play-overlay flex-center">
									<div class="parents-play-btn flex-center">
										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 10.2679C19.3333 11.0377 19.3333 12.9623 18 13.7321L4.5 21.5263C3.16667 22.2961 1.5 21.3338 1.5 19.7942L1.5 4.20577C1.5 2.66617 3.16667 1.70392 4.5 2.47372L18 10.2679Z" fill="#FFFFFF"/>
										</svg>
									</div>
								</div>
							</a>
							<!-- Quote Details Box -->
							<div class="parents-quote-box relative flex-column flex-between">
								<div class="parents-quote-content">
									<h3 class="parents-quote-heading">The School’s Unique Learning Approach And Focus On Holistic Development Truly Set It Apart.</h3>
									<p class="parents-quote-text">"We are really glad that a reputed school like B.D. Somani International School has opened in Kharghar. My child is truly blessed to be part of this school. The teaching methods and techniques are very different and have helped my child grow both academically and through extracurricular activities. The Radio Station and Makers Lab are unique initiatives that I have not seen in other schools in Navi Mumbai. What I love most is that the school focuses not just on academics, but on the overall, holistic development of every child."</p>
								</div>
								<div class="parents-quote-author">
									<h4 class="parents-author-name">Ms. Meenu Dhoot</h4>
									<p class="parents-author-info">Mother of Anaya Dhoot, Grade 4</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 5: Ms. Urvashi Tripathi -->
					<div class="swiper-slide parents-slide-item">
						<div class="parents-card-group flex gap-md">
							<!-- Video Thumbnail Box -->
							<a href="https://www.youtube.com/watch?v=n1Lugd9nDKI" target="_blank" rel="noopener noreferrer" class="parents-video-box relative" aria-label="<?php esc_attr_e( 'Watch Ms. Urvashi Tripathi video testimonial on YouTube', 'bd-somani' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/urvashi.webp' ); ?>" alt="Ms. Urvashi Tripathi" class="parents-video-img" loading="lazy" decoding="async">
								<div class="parents-play-overlay flex-center">
									<div class="parents-play-btn flex-center">
										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 10.2679C19.3333 11.0377 19.3333 12.9623 18 13.7321L4.5 21.5263C3.16667 22.2961 1.5 21.3338 1.5 19.7942L1.5 4.20577C1.5 2.66617 3.16667 1.70392 4.5 2.47372L18 10.2679Z" fill="#FFFFFF"/>
										</svg>
									</div>
								</div>
							</a>
							<!-- Quote Details Box -->
							<div class="parents-quote-box relative flex-column flex-between">
								<div class="parents-quote-content">
									<h3 class="parents-quote-heading">A Happy Child, Practical Learning, And Personal Attention Make The School Stand Out.</h3>
									<p class="parents-quote-text">"My daughter is in Grade 2 and this is her second year at the school. She is very happy here and always looks forward to coming to school. She especially enjoys the extracurricular activities, including Bharatanatyam and Taekwondo. We are very happy with the infrastructure and teaching methods, particularly the practical approach to learning and its application in daily life. The teachers and staff are wonderful and give personal attention to every child. We truly feel it is one of the best schools in Navi Mumbai."</p>
								</div>
								<div class="parents-quote-author">
									<h4 class="parents-author-name">Ms. Urvashi Tripathi</h4>
									<p class="parents-author-info">Mother of Pavaki Chandra, Grade 2</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide 6: Ms. Geeta Bhosale -->
					<div class="swiper-slide parents-slide-item">
						<div class="parents-card-group flex gap-md">
							<!-- Video Thumbnail Box -->
							<a href="https://www.youtube.com/watch?v=Sd4BtKguZ5M" target="_blank" rel="noopener noreferrer" class="parents-video-box relative" aria-label="<?php esc_attr_e( 'Watch Ms. Geeta Bhosale video testimonial on YouTube', 'bd-somani' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Geeta.webp' ); ?>" alt="Ms. Geeta Bhosale" class="parents-video-img" loading="lazy" decoding="async">
								<div class="parents-play-overlay flex-center">
									<div class="parents-play-btn flex-center">
										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 10.2679C19.3333 11.0377 19.3333 12.9623 18 13.7321L4.5 21.5263C3.16667 22.2961 1.5 21.3338 1.5 19.7942L1.5 4.20577C1.5 2.66617 3.16667 1.70392 4.5 2.47372L18 10.2679Z" fill="#FFFFFF"/>
										</svg>
									</div>
								</div>
							</a>
							<!-- Quote Details Box -->
							<div class="parents-quote-box relative flex-column flex-between">
								<div class="parents-quote-content">
									<h3 class="parents-quote-heading">A School That Nurtures Responsible, Caring Individuals Through Values, Activities, And Genuine Support.</h3>
									<p class="parents-quote-text">"As parents, we always worry about how our children will grow up to become responsible and caring individuals. I feel truly blessed to be a part of the B.D. Somani family. The school instils strong values in children and provides them with so many activities that help them grow and develop. I am also grateful to Ms. Shrutika for patiently listening to our concerns and guiding us with such warmth and understanding. We are truly blessed to be a part of this family."</p>
								</div>
								<div class="parents-quote-author">
									<h4 class="parents-author-name">Ms. Geeta Bhosale</h4>
									<p class="parents-author-info">Mother of Mahi Pillai, Grade 2</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- Bottom Progress Bar Control -->
			<div class="parents-progress-wrapper margin-top-lg flex-center">
				<div class="parents-progress-bar-track relative">
					<div class="parents-progress-bar-fill" id="parentsProgressBar"></div>
				</div>
			</div>

		</div>

	</div>
</section>
