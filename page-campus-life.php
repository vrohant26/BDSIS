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
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/reading and literature club.webp' ); ?>" alt="<?php esc_attr_e( 'Reading and Literature Club', 'bd-somani' ); ?>" class="academics-main-img">
					</div>
					<div class="academics-sub-image-wrap">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/campus life hero image 2.webp' ); ?>" alt="<?php esc_attr_e( 'Campus Life Hero Image', 'bd-somani' ); ?>" class="academics-sub-img">
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- MARQUEE BANNER -->
	<?php get_template_part( 'template-parts/brand-marquee' ); ?>

	<!-- SECTION 2: CAMPUS PROGRAMME OVERVIEW SECTION -->
	<section class="academics-programme-section" id="campus-programme">
		<!-- Organic Background Wave Shape -->
		<div class="programme-bg-wave" aria-hidden="true">
			<svg width="542" height="301" viewBox="0 0 542 301" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M-53.6729 145.556C186.687 -214.416 176.577 441.129 326.732 198.926C476.887 -43.2773 560.878 315.087 417.107 431.678C273.337 548.268 531.154 616.46 504.917 639.622" stroke="#FFEEE2" stroke-width="70"/>
			</svg>
		</div>

		<div class="site-container programme-container">
			<!-- Left Floating Tilted Photo -->
			<div class="programme-left-card">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cricket.webp' ); ?>" alt="<?php esc_attr_e( 'Students Playing Cricket', 'bd-somani' ); ?>" class="programme-tilted-img">
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

			<!-- Right Floating Tilted Photo -->
			<div class="programme-right-card">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/recess.webp' ); ?>" alt="<?php esc_attr_e( 'Students Having Recess', 'bd-somani' ); ?>" class="programme-tilted-img">
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
	<?php get_template_part( 'template-parts/brand-marquee' ); ?>

		<!-- SECTION 3: LIFE AT B.D. SOMANI CAROUSEL -->
		<section class="academics-experiences-section campus-life-experiences-section relative overflow-hidden" id="student-life">
			<button type="button" class="carousel-nav-btn prev-btn experiences-prev-btn flex-center" aria-label="<?php esc_attr_e( 'Previous Slide', 'bd-somani' ); ?>">
				<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7 15L1 8M1 8L7 1M1 8H19" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
			<button type="button" class="carousel-nav-btn next-btn experiences-next-btn flex-center" aria-label="<?php esc_attr_e( 'Next Slide', 'bd-somani' ); ?>">
				<svg width="24" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>

			<div class="site-container">
				<div class="academics-exp-header text-center relative">
					<h2 class="academics-exp-main-title"><?php esc_html_e( 'Life at B.D. Somani International School, Kharghar', 'bd-somani' ); ?></h2>
					<div class="academics-exp-star-doodle" aria-hidden="true">
						<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21 2L26.3 14.7L40 16.2L29.8 25.5L32.6 39L21 32L9.4 39L12.2 25.5L2 16.2L15.7 14.7L21 2Z" fill="#FFE0CF"/>
						</svg>
					</div>
				</div>

				<div class="academics-exp-carousel-wrap relative">
					<div class="swiper experiences-swiper">
						<div class="swiper-wrapper">

							<div class="swiper-slide experiences-left-content-slide">
								<div class="academics-exp-left-col">
									<div class="academics-exp-media-wrap relative">
										<div class="academics-exp-curved-arrow" aria-hidden="true">
											<?php
											$arrow_doodle_path = get_template_directory() . '/assets/svgs/Doodle Arrow Icons .svg';
											if ( file_exists( $arrow_doodle_path ) ) {
												include $arrow_doodle_path;
											}
											?>
										</div>

										<div class="academics-exp-main-card">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/life at bd somani big image 1.webp' ); ?>" alt="<?php esc_attr_e( 'Our role is to nurture lifelong learners', 'bd-somani' ); ?>" class="academics-exp-main-photo">
										</div>

										<div class="academics-exp-sub-card">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/life at bd somani sub image .webp' ); ?>" alt="<?php esc_attr_e( 'Our role is to nurture lifelong learners', 'bd-somani' ); ?>" class="academics-exp-sub-photo">
										</div>
									</div>

									<div class="academics-exp-text-wrap relative">
										<h3 class="academics-exp-sub-title"><?php esc_html_e( 'Our role is to nurture lifelong learners.', 'bd-somani' ); ?></h3>
										<p class="academics-exp-sub-desc reveal-text"><?php esc_html_e( 'In this journey, their every doubt of "Will I be able to?" becomes "Why not?" through the experiences we create.', 'bd-somani' ); ?></p>

										<div class="academics-exp-chess-doodle" aria-hidden="true">
											<?php
											$chess_svg_path = get_template_directory() . '/assets/svgs/chess.svg';
											if ( file_exists( $chess_svg_path ) ) {
												include $chess_svg_path;
											}
											?>
										</div>
									</div>
								</div>
							</div>

							<div class="swiper-slide experiences-card-slide">
								<div class="experiences-purple-card" style="transform: rotate(-2.5deg);">
									<div class="experiences-card-img-wrap">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Find their voice.webp' ); ?>" alt="<?php esc_attr_e( 'Find their Voice', 'bd-somani' ); ?>" class="experiences-card-photo" style="width:100%; height:100%; object-fit:cover; display:block;">
									</div>
									<div class="experiences-card-content">
										<h4 class="experiences-card-title"><?php esc_html_e( 'Find their Voice', 'bd-somani' ); ?></h4>
										<p class="experiences-card-desc"><?php esc_html_e( 'Our culture of open dialogue encourages students to participate with confidence through discussions, assemblies, and student-led initiatives.', 'bd-somani' ); ?></p>
									</div>
								</div>
							</div>

							<div class="swiper-slide experiences-card-slide">
								<div class="experiences-purple-card" style="transform: rotate(2.2deg);">
									<div class="experiences-card-img-wrap">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/applied thinking.webp' ); ?>" alt="<?php esc_attr_e( 'Applied Thinking', 'bd-somani' ); ?>" class="experiences-card-photo" style="width:100%; height:100%; object-fit:cover; display:block;">
									</div>
									<div class="experiences-card-content">
										<h4 class="experiences-card-title"><?php esc_html_e( 'Applied Thinking', 'bd-somani' ); ?></h4>
										<p class="experiences-card-desc"><?php esc_html_e( 'Our classrooms reflect real-world learning through inquiry, practical application, experiments, case studies, and STEM experiences that strengthen problem-solving skills.', 'bd-somani' ); ?></p>
									</div>
								</div>
							</div>

							<div class="swiper-slide experiences-card-slide">
								<div class="experiences-purple-card" style="transform: rotate(-1.8deg);">
									<div class="experiences-card-img-wrap">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/initiative in action.webp' ); ?>" alt="<?php esc_attr_e( 'Initiative in Action', 'bd-somani' ); ?>" class="experiences-card-photo" style="width:100%; height:100%; object-fit:cover; display:block;">
									</div>
									<div class="experiences-card-content">
										<h4 class="experiences-card-title"><?php esc_html_e( 'Initiative in Action', 'bd-somani' ); ?></h4>
										<p class="experiences-card-desc"><?php esc_html_e( 'Students develop responsibility through leadership opportunities like the Student Council, MUN, debates, classroom roles, and service initiatives.', 'bd-somani' ); ?></p>
									</div>
								</div>
							</div>

							<div class="swiper-slide experiences-card-slide">
								<div class="experiences-purple-card" style="transform: rotate(3deg);">
									<div class="experiences-card-img-wrap">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/beyond the familiar.webp' ); ?>" alt="<?php esc_attr_e( 'Beyond the Familiar', 'bd-somani' ); ?>" class="experiences-card-photo" style="width:100%; height:100%; object-fit:cover; display:block;">
									</div>
									<div class="experiences-card-content">
										<h4 class="experiences-card-title"><?php esc_html_e( 'Beyond the Familiar', 'bd-somani' ); ?></h4>
										<p class="experiences-card-desc"><?php esc_html_e( 'New experiences spark curiosity through sports, performing arts, field trips, and competitions that expand learning beyond the classroom.', 'bd-somani' ); ?></p>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="experiences-progress-wrapper flex-center">
					<div class="experiences-progress-bar-track relative">
						<div class="experiences-progress-bar-fill" id="experiencesProgressBar"></div>
					</div>
				</div>
			</div>
		</section>

	

			<!-- SECTION 4: A LEARNING SPACE DESIGNED FOR EVERY LEARNER -->
	<section class="campus-spaces-section relative overflow-hidden" id="campus-spaces">
		
		<!-- Background Organic Wavy Ribbon Accent (Top Right) -->
		<div class="spaces-bg-ribbon-top" aria-hidden="true">
			<?php
			$top_wave_svg = get_template_directory() . '/assets/svgs/campus spaces top right wave.svg';
			if ( file_exists( $top_wave_svg ) ) {
				include $top_wave_svg;
			} else {
				?>
				<svg width="420" height="330" viewBox="0 0 420 330" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M676.597 160.642C506.988 558.87 395.637 -87.2283 292.886 178.575C190.134 444.377 41.2902 107.74 161.008 -33.4378C280.725 -174.615 14.7423 -193.93 36.2412 -221.546" stroke="#FFEEE2" stroke-width="70"/>
				</svg>
				<?php
			}
			?>
		</div>

		<div class="site-container relative z-2">

			<!-- Section Header & Top Left Doodle Accent -->
			<div class="campus-spaces-header text-center relative">
				<!-- Annotation Doodle SVG (Top Left) -->
				<div class="spaces-annotation-doodle" aria-hidden="true">
					<?php
					$curious_svg_path = get_template_directory() . '/assets/svgs/designed for curios minds.svg';
					if ( file_exists( $curious_svg_path ) ) {
						include $curious_svg_path;
					}
					?>
				</div>

				<h2 class="spaces-main-title"><?php esc_html_e( 'A Learning Space Designed for Every Learner', 'bd-somani' ); ?></h2>
				<p class="spaces-main-subtitle"><?php esc_html_e( 'Our campus is more than a place to learn. It is where curiosity is sparked, ideas take shape, and every experience prepares students for life beyond school.', 'bd-somani' ); ?></p>
			</div>

			<!-- Tab Navigation Bar -->
			<div class="spaces-tabs-nav-wrap flex-center">
				<ul class="spaces-tabs-nav flex-center" role="tablist">
					<li role="presentation">
						<button type="button" class="spaces-tab-btn active" data-tab="tab-classrooms" role="tab" aria-selected="true"><?php esc_html_e( 'CLASSROOMS', 'bd-somani' ); ?></button>
					</li>
					<li role="presentation">
						<button type="button" class="spaces-tab-btn" data-tab="tab-library" role="tab" aria-selected="false"><?php esc_html_e( 'LIBRARY', 'bd-somani' ); ?></button>
					</li>
					<li role="presentation">
						<button type="button" class="spaces-tab-btn" data-tab="tab-labs" role="tab" aria-selected="false"><?php esc_html_e( 'SCIENCE LABS', 'bd-somani' ); ?></button>
					</li>
					<li role="presentation">
						<button type="button" class="spaces-tab-btn" data-tab="tab-sports" role="tab" aria-selected="false"><?php esc_html_e( 'SPORTS', 'bd-somani' ); ?></button>
					</li>
					<li role="presentation">
						<button type="button" class="spaces-tab-btn" data-tab="tab-creativity" role="tab" aria-selected="false"><?php esc_html_e( 'CREATIVITY & INNOVATION', 'bd-somani' ); ?></button>
					</li>
					<li role="presentation">
						<button type="button" class="spaces-tab-btn" data-tab="tab-outdoor" role="tab" aria-selected="false"><?php esc_html_e( 'OUTDOOR SPACES', 'bd-somani' ); ?></button>
					</li>
				</ul>
			</div>

			<!-- Dark Purple Card Container for Tab Content -->
			<div class="spaces-purple-card relative">
				<div class="spaces-card-stars-doodle" aria-hidden="true">
					<?php
					$purple_doodle_svg = get_template_directory() . '/assets/svgs/spaces purple card doodle.svg';
					if ( file_exists( $purple_doodle_svg ) ) {
						include $purple_doodle_svg;
					}
					?>
				</div>

				<!-- TAB 1: CLASSROOMS -->
				<div class="spaces-tab-pane active" id="tab-classrooms" role="tabpanel">
					<div class="spaces-card-grid">
						<div class="spaces-card-text">
							<div class="spaces-highlights-wrap">
								<h3 class="spaces-highlights-heading"><?php esc_html_e( 'Highlights', 'bd-somani' ); ?></h3>
								<ul class="spaces-highlights-list">
									<li><?php esc_html_e( 'Inquiry-led lessons that encourage students to question, analyse, and think independently', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Interactive lessons supported by modern learning technologies.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Collaborative discussions that value every perspective and every voice', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Personalised guidance tailored to individual learning needs', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Real-world experiences that strengthen understanding beyond textbooks', 'bd-somani' ); ?></li>
								</ul>
							</div>
						</div>
						<div class="spaces-card-media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/classrooms.webp' ); ?>" alt="<?php esc_attr_e( 'Classroom', 'bd-somani' ); ?>" class="spaces-card-img">
						</div>
					</div>
				</div>

				<!-- TAB 2: LIBRARY -->
				<div class="spaces-tab-pane" id="tab-library" role="tabpanel">
					<div class="spaces-card-grid">
						<div class="spaces-card-text">
							<div class="spaces-highlights-wrap">
								<h3 class="spaces-highlights-heading"><?php esc_html_e( 'Highlights', 'bd-somani' ); ?></h3>
								<ul class="spaces-highlights-list">
									<li><?php esc_html_e( 'A thoughtfully curated collection that encourages reading across genres and interests', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Dedicated spaces for reading, storytelling, and independent study', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Resources that strengthen information literacy and research skills', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Reading experiences that broaden perspectives and develop lifelong learning habits', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'A quiet environment that inspires curiosity and a love for books', 'bd-somani' ); ?></li>
								</ul>
							</div>
						</div>
						<div class="spaces-card-media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/library.webp' ); ?>" alt="<?php esc_attr_e( 'Library', 'bd-somani' ); ?>" class="spaces-card-img">
						</div>
					</div>
				</div>

				<!-- TAB 3: SCIENCE LABS -->
				<div class="spaces-tab-pane" id="tab-labs" role="tabpanel">
					<div class="spaces-card-grid">
						<div class="spaces-card-text">
							<div class="spaces-highlights-wrap">
								<h3 class="spaces-highlights-heading"><?php esc_html_e( 'Highlights', 'bd-somani' ); ?></h3>
								<ul class="spaces-highlights-list">
									<li><?php esc_html_e( 'Subject-specific Physics, Chemistry, and Biology laboratories for practical learning', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Hands-on experiments that reinforce scientific concepts through application', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Safe, well-equipped spaces that encourage exploration with precision and responsibility', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Opportunities to investigate, analyse, and draw evidence-based conclusions', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Practical experiences that instill scientific temper and analytical thinking', 'bd-somani' ); ?></li>
								</ul>
							</div>
						</div>
						<div class="spaces-card-media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/science lab.webp' ); ?>" alt="<?php esc_attr_e( 'Science Labs', 'bd-somani' ); ?>" class="spaces-card-img">
						</div>
					</div>
				</div>

				<!-- TAB 4: SPORTS -->
				<div class="spaces-tab-pane" id="tab-sports" role="tabpanel">
					<div class="spaces-card-grid">
						<div class="spaces-card-text">
							<div class="spaces-highlights-wrap">
								<h3 class="spaces-highlights-heading"><?php esc_html_e( 'Highlights', 'bd-somani' ); ?></h3>
								<ul class="spaces-highlights-list">
									<li><?php esc_html_e( 'A well-rounded sports programme across indoor and outdoor disciplines', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Coaching across cricket, football, basketball, chess, taekwondo, and more', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Regular training that builds discipline, perseverance, and team spirit', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Competitive opportunities that inspire resilience and sportsmanship', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Physical activity that promotes fitness, confidence, and overall well-being', 'bd-somani' ); ?></li>
								</ul>
							</div>
						</div>
						<div class="spaces-card-media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sports.webp' ); ?>" alt="<?php esc_attr_e( 'Sports', 'bd-somani' ); ?>" class="spaces-card-img">
						</div>
					</div>
				</div>

				<!-- TAB 5: CREATIVITY & INNOVATION -->
				<div class="spaces-tab-pane" id="tab-creativity" role="tabpanel">
					<div class="spaces-card-grid">
						<div class="spaces-card-text">
							<div class="spaces-highlights-wrap">
								<h3 class="spaces-highlights-heading"><?php esc_html_e( 'Highlights', 'bd-somani' ); ?></h3>
								<ul class="spaces-highlights-list">
									<li><?php esc_html_e( 'Pursue a passion for music by learning the piano, guitar, drums, vocals, and a range of other instruments.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Discover the world of dramatics and performing arts with rehearsals and stage performances.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Turn curiosity into innovation with hands-on STEM projects that encourage designing, building, and experimenting.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Build the confidence to express different perspectives in debates and collaborative forums.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Share stories and spark conversations through student-led podcasts and media projects.', 'bd-somani' ); ?></li>
								</ul>
							</div>
						</div>
						<div class="spaces-card-media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Creativity & Innovation.webp' ); ?>" alt="<?php esc_attr_e( 'Creativity & Innovation', 'bd-somani' ); ?>" class="spaces-card-img">
						</div>
					</div>
				</div>

				<!-- TAB 6: OUTDOOR SPACES -->
				<div class="spaces-tab-pane" id="tab-outdoor" role="tabpanel">
					<div class="spaces-card-grid">
						<div class="spaces-card-text">
							<div class="spaces-highlights-wrap">
								<h3 class="spaces-highlights-heading"><?php esc_html_e( 'Highlights', 'bd-somani' ); ?></h3>
								<ul class="spaces-highlights-list">
									<li><?php esc_html_e( 'Open corridors, a light-filled atrium, and lush green views create a calm learning environment', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Outdoor spaces on every floor encourage students to step out, interact, and learn in the open.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Hydroponics and nature-based activities encourage students to connect with the environment.', 'bd-somani' ); ?></li>
									<li><?php esc_html_e( 'Field trips and outdoor activities make learning more immersive.', 'bd-somani' ); ?></li>
								</ul>
							</div>
						</div>
						<div class="spaces-card-media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/outdoor spaces.webp' ); ?>" alt="<?php esc_attr_e( 'Outdoor Spaces', 'bd-somani' ); ?>" class="spaces-card-img">
						</div>
					</div>
				</div>

			</div>

			<!-- Bottom CTA Button -->
			<div class="spaces-cta-wrap flex-center">
				<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="btn-spaces-gallery flex-center">
					<span><?php esc_html_e( 'VIEW GALLERY', 'bd-somani' ); ?></span>
					<svg width="18" height="14" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 8px;">
						<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="#2B182C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</div>

		</div>
	</section>

		<!-- banner section -->
	<section class="about-potential-section relative overflow-hidden">
		<div class="site-container relative z-2">
			<div class="about-potential-grid">
				
				<!-- Left Column: Content -->
				<div class="about-potential-content">
					<h2 class="about-potential-title">A Place to Discover Your Superpower</h2>
					<p class="about-potential-lead">Every student brings unique strengths. Our campus gives them the opportunities to explore, develop, and let those strengths shine.</p>
				</div>

				<!-- Right Column:  -->
				<div class="about-potential-media flex-center">
					<div class="about-potential-video-container relative">
						<!-- Video Frame -->
						<div class="about-potential-video-wrap">
							<video autoplay loop muted playsinline>
								<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/A2.webm' ); ?>" type="video/mp4">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- SECTION 5: SAFETY & WELL-BEING -->
	<section class="campus-safety-section relative overflow-hidden" id="safety-wellbeing">
		<div class="site-container relative z-2">
			
			<!-- Section Header -->
			<div class="campus-safety-header text-center">
				<span class="campus-safety-badge"><?php esc_html_e( 'SAFETY & WELL-BEING', 'bd-somani' ); ?></span>
				<h2 class="campus-safety-title"><?php esc_html_e( 'The Care Behind Every School Day', 'bd-somani' ); ?></h2>
				<p class="campus-safety-subtitle"><?php esc_html_e( 'A safe school is built through thoughtful systems, prepared spaces, and people who care. From campus monitoring and fire safety to healthcare and essential infrastructure, every measure supports a secure and supportive environment for our students.', 'bd-somani' ); ?></p>
			</div>

			<!-- Swiper Carousel Container -->
			<div class="campus-safety-carousel-wrap relative">
				<div class="swiper safety-swiper">
					<div class="swiper-wrapper">

						<!-- Card 01 -->
						<div class="swiper-slide">
							<div class="safety-card">
								<div class="safety-card-image-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/security  and well being 1.webp' ); ?>" alt="<?php esc_attr_e( 'Reliable Systems', 'bd-somani' ); ?>" class="safety-card-img" loading="lazy" decoding="async">
								</div>
								<div class="safety-card-body">
									<div class="safety-card-meta flex align-center gap-xs">
										<span class="safety-card-num">01</span>
										<span class="safety-card-category"><?php esc_html_e( 'Campus Infrastructure', 'bd-somani' ); ?></span>
									</div>
									<h3 class="safety-card-title"><?php esc_html_e( 'Reliable Systems', 'bd-somani' ); ?></h3>
									<p class="safety-card-desc"><?php esc_html_e( 'Essential electrical systems are carefully managed to support the safe and reliable functioning of the campus.', 'bd-somani' ); ?></p>
								</div>
							</div>
						</div>

						<!-- Card 02 -->
						<div class="swiper-slide">
							<div class="safety-card">
								<div class="safety-card-image-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/security  and well being 2.webp' ); ?>" alt="<?php esc_attr_e( 'Power Continuity', 'bd-somani' ); ?>" class="safety-card-img" loading="lazy" decoding="async">
								</div>
								<div class="safety-card-body">
									<div class="safety-card-meta flex align-center gap-xs">
										<span class="safety-card-num">02</span>
										<span class="safety-card-category"><?php esc_html_e( 'Backup Power', 'bd-somani' ); ?></span>
									</div>
									<h3 class="safety-card-title"><?php esc_html_e( 'Power Continuity', 'bd-somani' ); ?></h3>
									<p class="safety-card-desc"><?php esc_html_e( 'Backup power infrastructure helps keep essential school operations running during power interruptions.', 'bd-somani' ); ?></p>
								</div>
							</div>
						</div>

						<!-- Card 03 -->
						<div class="swiper-slide">
							<div class="safety-card">
								<div class="safety-card-image-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/security  and well being 3.webp' ); ?>" alt="<?php esc_attr_e( 'Active Monitoring', 'bd-somani' ); ?>" class="safety-card-img" loading="lazy" decoding="async">
								</div>
								<div class="safety-card-body">
									<div class="safety-card-meta flex align-center gap-xs">
										<span class="safety-card-num">03</span>
										<span class="safety-card-category"><?php esc_html_e( 'Campus Monitoring', 'bd-somani' ); ?></span>
									</div>
									<h3 class="safety-card-title"><?php esc_html_e( 'Active Monitoring', 'bd-somani' ); ?></h3>
									<p class="safety-card-desc"><?php esc_html_e( 'Dedicated monitoring helps our team maintain awareness across key areas of the campus.', 'bd-somani' ); ?></p>
								</div>
							</div>
						</div>

						<!-- Card 04 -->
						<div class="swiper-slide">
							<div class="safety-card">
								<div class="safety-card-image-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/security  and well being 4.webp' ); ?>" alt="<?php esc_attr_e( 'Comfortable Spaces', 'bd-somani' ); ?>" class="safety-card-img" loading="lazy" decoding="async">
								</div>
								<div class="safety-card-body">
									<div class="safety-card-meta flex align-center gap-xs">
										<span class="safety-card-num">04</span>
										<span class="safety-card-category"><?php esc_html_e( 'Indoor Environment', 'bd-somani' ); ?></span>
									</div>
									<h3 class="safety-card-title"><?php esc_html_e( 'Comfortable Spaces', 'bd-somani' ); ?></h3>
									<p class="safety-card-desc"><?php esc_html_e( 'Ventilation and climate-control systems support comfortable indoor environments throughout the school.', 'bd-somani' ); ?></p>
								</div>
							</div>
						</div>

						<!-- Card 05 -->
						<div class="swiper-slide">
							<div class="safety-card">
								<div class="safety-card-image-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/security  and well being 5.webp' ); ?>" alt="<?php esc_attr_e( 'Fire Safety', 'bd-somani' ); ?>" class="safety-card-img" loading="lazy" decoding="async">
								</div>
								<div class="safety-card-body">
									<div class="safety-card-meta flex align-center gap-xs">
										<span class="safety-card-num">05</span>
										<span class="safety-card-category"><?php esc_html_e( 'Emergency Preparedness', 'bd-somani' ); ?></span>
									</div>
									<h3 class="safety-card-title"><?php esc_html_e( 'Fire Safety', 'bd-somani' ); ?></h3>
									<p class="safety-card-desc"><?php esc_html_e( 'Fire safety equipment and clearly designated emergency systems form an important part of campus preparedness.', 'bd-somani' ); ?></p>
								</div>
							</div>
						</div>

						<!-- Card 06 -->
						<div class="swiper-slide">
							<div class="safety-card">
								<div class="safety-card-image-wrap">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/security  and well being 6.webp' ); ?>" alt="<?php esc_attr_e( 'On-Campus Infirmary', 'bd-somani' ); ?>" class="safety-card-img" loading="lazy" decoding="async">
								</div>
								<div class="safety-card-body">
									<div class="safety-card-meta flex align-center gap-xs">
										<span class="safety-card-num">06</span>
										<span class="safety-card-category"><?php esc_html_e( 'Student Healthcare', 'bd-somani' ); ?></span>
									</div>
									<h3 class="safety-card-title"><?php esc_html_e( 'On-Campus Infirmary', 'bd-somani' ); ?></h3>
									<p class="safety-card-desc"><?php esc_html_e( 'A dedicated infirmary provides a quiet, equipped space for students who need care or medical attention during the school day.', 'bd-somani' ); ?></p>
								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Carousel Navigation Controls & Progress Bar -->
				<div class="safety-carousel-controls flex-between align-center">
					<div class="safety-progress-track">
						<div class="safety-progress-bar" id="safetyProgressBar"></div>
					</div>
					<div class="safety-nav-btns flex align-center gap-sm">
						<button class="safety-nav-btn safety-prev-btn flex-center" aria-label="Previous Slide">
							<svg width="18" height="14" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7 15L1 8M1 8L7 1M1 8H19" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button class="safety-nav-btn safety-next-btn flex-center" aria-label="Next Slide">
							<svg width="18" height="14" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13 1L19 8M19 8L13 15M19 8H1" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>

			</div>

		</div>
	</section>

	<!-- SECTION 6: COUNSELLORS / STUDENT WELL-BEING & GUIDANCE -->
	<section class="campus-counselors-section relative overflow-hidden" id="counselors">
		<div class="site-container relative z-2">
			
			<!-- Section Header -->
			<div class="campus-counselors-header text-center">
				<span class="campus-counselors-badge"><?php esc_html_e( 'STUDENT COUNSELLING & GUIDANCE', 'bd-somani' ); ?></span>
				<h2 class="campus-counselors-title"><?php esc_html_e( 'Compassionate Care & Guidance', 'bd-somani' ); ?></h2>
				<p class="campus-counselors-subtitle"><?php esc_html_e( 'Our dedicated school counsellors foster a safe, supportive environment where students receive personal, social, and emotional guidance to thrive with confidence.', 'bd-somani' ); ?></p>
			</div>

			<!-- Minimal 2-Card Grid -->
			<div class="campus-counselors-grid">

				<!-- Counselor Card 1 -->
				<div class="counselor-card">
					<div class="counselor-card-image-wrap">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/councelor 1.webp' ); ?>" alt="<?php esc_attr_e( 'Student Counselling', 'bd-somani' ); ?>" class="counselor-card-img" loading="lazy" decoding="async">
					</div>
					<div class="counselor-card-body">
						<span class="counselor-card-tag"><?php esc_html_e( 'Student Well-Being', 'bd-somani' ); ?></span>
						<h3 class="counselor-card-title"><?php esc_html_e( 'Personal & Emotional Support', 'bd-somani' ); ?></h3>
						<p class="counselor-card-desc"><?php esc_html_e( 'Providing confidential one-on-one sessions and group discussions to nurture mindfulness, self-awareness, and healthy coping mechanisms.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Counselor Card 2 -->
				<div class="counselor-card">
					<div class="counselor-card-image-wrap">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/councelor 2.webp' ); ?>" alt="<?php esc_attr_e( 'Academic & Career Guidance', 'bd-somani' ); ?>" class="counselor-card-img" loading="lazy" decoding="async">
					</div>
					<div class="counselor-card-body">
						<span class="counselor-card-tag"><?php esc_html_e( 'Academic & Career Growth', 'bd-somani' ); ?></span>
						<h3 class="counselor-card-title"><?php esc_html_e( 'Academic & Career Counselling', 'bd-somani' ); ?></h3>
						<p class="counselor-card-desc"><?php esc_html_e( 'Helping students navigate academic milestones, develop effective study strategies, and discover their future educational pathways.', 'bd-somani' ); ?></p>
					</div>
				</div>

			</div>

		</div>
	</section>

</main>

<?php
get_footer();
