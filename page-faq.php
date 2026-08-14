<?php
/**
 * Template Name: FAQ Page Template
 * Description: Custom template for Frequently Asked Questions (FAQ) matching B.D. Somani International School design.
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main faq-page-custom">

	<div class="site-container">
		
		<!-- Breadcrumb Navigation -->
		<nav class="faq-breadcrumb" aria-label="Breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-home-link" aria-label="Home">
				<?php 
				$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
				if ( file_exists( $home_svg_path ) ) {
					echo file_get_contents( $home_svg_path );
				} else {
					?>
					<iconify-icon icon="lucide:home"></iconify-icon>
					<?php
				}
				?>
			</a>
			<span class="breadcrumb-separator">/</span>
			<span class="breadcrumb-current">Frequently Asked Questions</span>
		</nav>

		<!-- Hero Section -->
		<section class="faq-hero-custom relative">
			<div class="faq-hero-inner flex-between align-center">
				
				<!-- Hero Text Content -->
				<div class="faq-hero-text text-center">
					<h1 class="faq-hero-title">Have a question?</h1>
					<p class="faq-hero-subtitle">Everything you need to know about admissions, academics, school life and more all in one place.</p>
				</div>

				<!-- Right Doodle SVG Illustration -->
				<div class="faq-hero-doodle-wrap">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svgs/Vector.svg' ); ?>" alt="FAQ Illustration Doodle" class="faq-doodle-img" width="310" height="214">
				</div>

			</div>
		</section>

		<!-- Dark Purple Category Navigation Bar -->
		<div class="faq-nav-bar-wrapper sticky-nav-bar">
			<nav class="faq-category-nav" aria-label="FAQ Categories Navigation">
				<ul class="faq-nav-tabs" role="tablist">
					<li class="faq-tab-item">
						<a href="#about-the-school" class="faq-tab-link active" data-target="about-the-school" role="tab" aria-selected="true">ABOUT THE SCHOOL</a>
					</li>
					<li class="faq-tab-item">
						<a href="#admissions-sec" class="faq-tab-link" data-target="admissions-sec" role="tab" aria-selected="false">ADMISSIONS</a>
					</li>
					<li class="faq-tab-item">
						<a href="#academics-sec" class="faq-tab-link" data-target="academics-sec" role="tab" aria-selected="false">ACADEMICS & SCHOOL LIFE</a>
					</li>
					<li class="faq-tab-item">
						<a href="#campus-sec" class="faq-tab-link" data-target="campus-sec" role="tab" aria-selected="false">CAMPUS & FACILITIES</a>
					</li>
					<li class="faq-tab-item">
						<a href="#transport-sec" class="faq-tab-link" data-target="transport-sec" role="tab" aria-selected="false">TRANSPORT</a>
					</li>
					<li class="faq-tab-item">
						<a href="#campus-visits-sec" class="faq-tab-link" data-target="campus-visits-sec" role="tab" aria-selected="false">CAMPUS VISITS</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Accordion Groups Container -->
		<div class="faq-sections-container">

			<!-- Section 1: About the school -->
			<section class="faq-group-section" id="about-the-school">
				<h2 class="faq-group-title text-center">About the school</h2>
				<div class="faq-cards-list">

					<!-- Q1 (Default open in mockup) -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="true" aria-controls="ans-about-1" id="q-about-1">
							<span class="faq-card-question">When did the school start?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus" style="display:none;"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-1" class="faq-card-body is-open" role="region" aria-labelledby="q-about-1" style="max-height: 200px;">
							<div class="faq-card-content">
								<p>B.D. Somani International School, Kharghar, opened in the academic year 2023–2024.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-2" id="q-about-2">
							<span class="faq-card-question">Who are the promoters of the school?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-2" class="faq-card-body" role="region" aria-labelledby="q-about-2">
							<div class="faq-card-content">
								<p>B.D. Somani International School is promoted by the Hazarimal Somani Educational Trust, known for establishing premier educational institutions with a rich legacy of academic excellence.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-3" id="q-about-3">
							<span class="faq-card-question">What are the other schools in the group?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-3" class="faq-card-body" role="region" aria-labelledby="q-about-3">
							<div class="faq-card-content">
								<p>The group includes B.D. Somani International School (Cuffe Parade, Mumbai), B.D. Somani Institute of Art and Fashion Technology, and associated educational establishments.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-4" id="q-about-4">
							<span class="faq-card-question">What curriculum does the school follow?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-4" class="faq-card-body" role="region" aria-labelledby="q-about-4">
							<div class="faq-card-content">
								<p>The school offers an internationally recognized curriculum designed to foster inquiry-based learning, progressive pedagogy, and holistic child development across all grades.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- Section 2: Admissions -->
			<section class="faq-group-section" id="admissions-sec">
				<h2 class="faq-group-title text-center">Admissions</h2>
				<div class="faq-cards-list">

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-1" id="q-adm-1">
							<span class="faq-card-question">Which grades are open for enrolment?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-1" class="faq-card-body" role="region" aria-labelledby="q-adm-1">
							<div class="faq-card-content">
								<p>Enrolment is open for Reception, Primary, Middle School, and High School grades for the upcoming academic session.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-2" id="q-adm-2">
							<span class="faq-card-question">When does enrolment begin?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-2" class="faq-card-body" role="region" aria-labelledby="q-adm-2">
							<div class="faq-card-content">
								<p>Enrolment for AY 2027-28 opens on July 23, 2026 at 10 AM. Online application forms are available directly via our admissions portal.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-3" id="q-adm-3">
							<span class="faq-card-question">What are the eligibility criteria, fees, and admission process?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-3" class="faq-card-body" role="region" aria-labelledby="q-adm-3">
							<div class="faq-card-content">
								<p>Admissions are granted based on age eligibility, previous academic transcripts, and an informal interaction session. Detailed fee structures and brochures are provided upon submitting an online inquiry.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-4" id="q-adm-4">
							<span class="faq-card-question">What are the Admissions Office hours?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-4" class="faq-card-body" role="region" aria-labelledby="q-adm-4">
							<div class="faq-card-content">
								<p>The Admissions Office operates Monday through Friday from 9:00 AM to 4:00 PM, and on Saturdays from 9:00 AM to 1:00 PM.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- Section 3: Academics & School Life -->
			<section class="faq-group-section" id="academics-sec">
				<h2 class="faq-group-title text-center">Academics & School Life</h2>
				<div class="faq-cards-list">

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="true" aria-controls="ans-acad-1" id="q-acad-1">
							<span class="faq-card-question">What are the school timings for learners?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus" style="display:none;"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-1" class="faq-card-body is-open" role="region" aria-labelledby="q-acad-1" style="max-height: 200px;">
							<div class="faq-card-content">
								<p>Early Years: 8:30 AM to 12:30 PM.<br>Primary and Secondary School: 8:15 AM to 3:15 PM (Monday through Friday).</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- Section 4: Campus & Facilities -->
			<section class="faq-group-section" id="campus-sec">
				<h2 class="faq-group-title text-center">Campus & Facilities</h2>
				<div class="faq-cards-list">

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="true" aria-controls="ans-camp-1" id="q-camp-1">
							<span class="faq-card-question">What facilities are available at the school?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus" style="display:none;"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-1" class="faq-card-body is-open" role="region" aria-labelledby="q-camp-1" style="max-height: 200px;">
							<div class="faq-card-content">
								<p>The campus is equipped with smart classrooms, advanced science and computer labs, robotics labs, visual arts studios, music/drama halls, a sports turf, swimming pool, cafeteria, and library.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-2" id="q-camp-2">
							<span class="faq-card-question">Does the school have a swimming pool?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-2" class="faq-card-body" role="region" aria-labelledby="q-camp-2">
							<div class="faq-card-content">
								<p>Yes, the campus features a temperature-controlled swimming pool with dedicated swimming coaches and certified lifeguards.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-3" id="q-camp-3">
							<span class="faq-card-question">Does the school have an auditorium?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-3" class="faq-card-body" role="region" aria-labelledby="q-camp-3">
							<div class="faq-card-content">
								<p>Yes, an acoustic indoor auditorium is available for performances, assemblies, inter-school competitions, and cultural celebrations.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-4" id="q-camp-4">
							<span class="faq-card-question">Does the school provide cafeteria facilities?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-4" class="faq-card-body" role="region" aria-labelledby="q-camp-4">
							<div class="faq-card-content">
								<p>Yes, the school cafeteria serves wholesome, fresh vegetarian meals and snacks prepared under strict culinary hygiene standards.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-5" id="q-camp-5">
							<span class="faq-card-question">Does the school have an infirmary?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-5" class="faq-card-body" role="region" aria-labelledby="q-camp-5">
							<div class="faq-card-content">
								<p>Yes, a dedicated campus infirmary staffed by a registered full-time nurse provides prompt medical attention and first aid whenever needed.</p>
							</div>
						</div>
					</div>

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-6" id="q-camp-6">
							<span class="faq-card-question">Does the school provide a daycare facility?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-6" class="faq-card-body" role="region" aria-labelledby="q-camp-6">
							<div class="faq-card-content">
								<p>Yes, an extended daycare facility with supervised play, learning, and rest areas is available to support working parents.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- Section 5: Pickup and Drop -->
			<section class="faq-group-section" id="transport-sec">
				<h2 class="faq-group-title text-center">Pickup and Drop</h2>
				<div class="faq-cards-list">

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="true" aria-controls="ans-trans-1" id="q-trans-1">
							<span class="faq-card-question">Does the school provide transportation facilities?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus" style="display:none;"></iconify-icon>
							</span>
						</button>
						<div id="ans-trans-1" class="faq-card-body is-open" role="region" aria-labelledby="q-trans-1" style="max-height: 200px;">
							<div class="faq-card-content">
								<p>Yes, air-conditioned school buses with live GPS tracking, speed governors, CCTV surveillance, and trained female attendants serve designated routes across the city.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- Section 6: Campus Visits -->
			<section class="faq-group-section" id="campus-visits-sec">
				<h2 class="faq-group-title text-center">Campus Visits</h2>
				<div class="faq-cards-list">

					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="true" aria-controls="ans-visit-1" id="q-visit-1">
							<span class="faq-card-question">Can we visit the campus?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus" style="display:none;"></iconify-icon>
							</span>
						</button>
						<div id="ans-visit-1" class="faq-card-body is-open" role="region" aria-labelledby="q-visit-1" style="max-height: 200px;">
							<div class="faq-card-content">
								<p>Yes! Prospective parents are warmly invited to book a campus tour by contacting our admissions helpdesk or submitting an inquiry online.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

		</div><!-- /.faq-sections-container -->

	</div><!-- /.site-container -->

</main>

<?php
get_footer();
