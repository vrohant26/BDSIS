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
		
		<!-- Breadcrumb Navigation (Consistent with Other Pages) -->
		<nav class="faq-breadcrumb flex align-center gap-xs" aria-label="Breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-home-link flex align-center gap-xs" aria-label="Home">
				<?php 
				$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
				if ( file_exists( $home_svg_path ) ) {
					echo file_get_contents( $home_svg_path );
				} else {
					?>
					<svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 18V6L8 0L16 6V18H10V11H6V18H0Z" fill="#2B182C"/>
					</svg>
					<?php
				}
				?>
			</a>
			<span class="breadcrumb-separator">/</span>
			<span class="breadcrumb-current">FAQ</span>
		</nav>

		<!-- Hero Section -->
		<section class="faq-hero-custom relative">
			<div class="faq-hero-inner flex-between align-center">
				
				<!-- Hero Text Content -->
				<div class="faq-hero-text text-center relative">
					<div class="faq-hero-icon-accent" style="width: 50px; height: 50px; margin: 0 auto 0.5rem auto;">
						<?php echo bds_get_new_icon( 'bulb' ); ?>
					</div>
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
			<button type="button" class="faq-nav-arrow prev-arrow" id="faqNavPrev" aria-label="Scroll categories left">
				<iconify-icon icon="lucide:chevron-left"></iconify-icon>
			</button>
			<nav class="faq-category-nav" aria-label="FAQ Categories Navigation">
				<ul class="faq-nav-tabs" role="tablist">
					<li class="faq-tab-item">
						<a href="#about-the-school" class="faq-tab-link active" data-target="about-the-school" role="tab" aria-selected="true">ABOUT OUR SCHOOL</a>
					</li>
					<li class="faq-tab-item">
						<a href="#admissions-sec" class="faq-tab-link" data-target="admissions-sec" role="tab" aria-selected="false">ADMISSIONS</a>
					</li>
					<li class="faq-tab-item">
						<a href="#academics-sec" class="faq-tab-link" data-target="academics-sec" role="tab" aria-selected="false">ACADEMICS</a>
					</li>
					<li class="faq-tab-item">
						<a href="#campus-sec" class="faq-tab-link" data-target="campus-sec" role="tab" aria-selected="false">CAMPUS & FACILITIES</a>
					</li>
					<li class="faq-tab-item">
						<a href="#safety-sec" class="faq-tab-link" data-target="safety-sec" role="tab" aria-selected="false">STUDENT WELL-BEING & SAFETY</a>
					</li>
					<li class="faq-tab-item">
						<a href="#daycare-sec" class="faq-tab-link" data-target="daycare-sec" role="tab" aria-selected="false">DAY CARE</a>
					</li>
					<li class="faq-tab-item">
						<a href="#afterschool-sec" class="faq-tab-link" data-target="afterschool-sec" role="tab" aria-selected="false">AFTER SCHOOL</a>
					</li>
					<li class="faq-tab-item">
						<a href="#facilities-visits-sec" class="faq-tab-link" data-target="facilities-visits-sec" role="tab" aria-selected="false">FACILITIES & VISITS</a>
					</li>
				</ul>
			</nav>
			<button type="button" class="faq-nav-arrow next-arrow" id="faqNavNext" aria-label="Scroll categories right">
				<iconify-icon icon="lucide:chevron-right"></iconify-icon>
			</button>
		</div>

		<!-- Accordion Groups Container -->
		<div class="faq-sections-container">

			<!-- ================================================================
			     Section 1: About Our School
			     ================================================================ -->
			<section class="faq-group-section" id="about-the-school">
				<h2 class="faq-group-title text-center">About Our School</h2>
				<div class="faq-cards-list">

					<!-- Q1 (Open by default) -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="true" aria-controls="ans-about-1" id="q-about-1">
							<span class="faq-card-question">1. When was B.D. Somani International School, Kharghar established?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus" style="display:none;"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-1" class="faq-card-body is-open" role="region" aria-labelledby="q-about-1" style="max-height: 250px;">
							<div class="faq-card-content">
								<p>B.D. Somani International School, Kharghar welcomed its first batch of learners in the Academic Year 2023–24.</p>
							</div>
						</div>
					</div>

					<!-- Q2 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-2" id="q-about-2">
							<span class="faq-card-question">2. Who manages B.D. Somani International School?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-2" class="faq-card-body" role="region" aria-labelledby="q-about-2">
							<div class="faq-card-content">
								<p>B.D. Somani International School is managed by the Shree Hazarimal Somani Memorial Trust, an educational trust with a long-standing legacy of establishing and nurturing leading schools in Mumbai.</p>
							</div>
						</div>
					</div>

					<!-- Q3 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-3" id="q-about-3">
							<span class="faq-card-question">3. Who are the trustees of the school?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-3" class="faq-card-body" role="region" aria-labelledby="q-about-3">
							<div class="faq-card-content">
								<p>The Shree Hazarimal Somani Memorial Trust has played a pivotal role in shaping South Mumbai's educational landscape. The trustees include Mrs. Aradhana Somani, an educationist with successful projects such as B.D. Somani International School (South Mumbai) and G.D. Somani Memorial School, and Mr. Dhananjay Somani, a Master of Education from Harvard Graduate School of Education.</p>
							</div>
						</div>
					</div>

					<!-- Q4 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-4" id="q-about-4">
							<span class="faq-card-question">4. What is the legacy of the Shree Hazarimal Somani Memorial Trust?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-4" class="faq-card-body" role="region" aria-labelledby="q-about-4">
							<div class="faq-card-content">
								<p>Since 1976, the Trust has been committed to providing quality education through institutions that inspire academic excellence, character development, and lifelong learning.</p>
							</div>
						</div>
					</div>

					<!-- Q5 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-5" id="q-about-5">
							<span class="faq-card-question">5. Which other schools are part of the Trust?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-5" class="faq-card-body" role="region" aria-labelledby="q-about-5">
							<div class="faq-card-content">
								<p>The Trust also manages B.D. Somani International School, South Mumbai (IB &amp; Cambridge) and G.D. Somani Memorial School (ICSE &amp; ISC), both recognised for their academic excellence.</p>
							</div>
						</div>
					</div>

					<!-- Q6 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-about-6" id="q-about-6">
							<span class="faq-card-question">6. What makes B.D. Somani International School a trusted choice for families?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-about-6" class="faq-card-body" role="region" aria-labelledby="q-about-6">
							<div class="faq-card-content">
								<p>B.D. Somani International School offers a globally benchmarked curriculum, experienced educators, thoughtfully designed learning spaces, and a holistic approach that nurtures academic excellence, creativity, and character. Together, these create an environment where every learner is encouraged to thrive with confidence and purpose.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 2: Admissions
			     ================================================================ -->
			<section class="faq-group-section" id="admissions-sec">
				<h2 class="faq-group-title text-center">Admissions</h2>
				<div class="faq-cards-list">

					<!-- Q7 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-7" id="q-adm-7">
							<span class="faq-card-question">7. Which grades are currently open for admission?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-7" class="faq-card-body" role="region" aria-labelledby="q-adm-7">
							<div class="faq-card-content">
								<p>Admissions for the 2026–27 Academic Year are currently open for Playgroup to Grade 8 for ICSE and up to Grade 9 for Cambridge IGCSE.</p>
							</div>
						</div>
					</div>

					<!-- Q8 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-8" id="q-adm-8">
							<span class="faq-card-question">8. When do admission applications open?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-8" class="faq-card-body" role="region" aria-labelledby="q-adm-8">
							<div class="faq-card-content">
								<p>Admission applications are accepted throughout the year, subject to seat availability. Please contact our Admissions Team to check programme availability and begin the application process.</p>
							</div>
						</div>
					</div>

					<!-- Q9 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-9" id="q-adm-9">
							<span class="faq-card-question">9. What is the admission process?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-9" class="faq-card-body" role="region" aria-labelledby="q-adm-9">
							<div class="faq-card-content">
								<p>The admissions process begins with an online enquiry or a visit to our Admissions Office. Our team will guide you through every stage, from understanding the application requirements to campus visits and enrollment.</p>
								<p>For a step-by-step overview, please visit our <a href="<?php echo esc_url( home_url( '/admissions/' ) ); ?>">Admissions page</a>.</p>
							</div>
						</div>
					</div>

					<!-- Q10 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-10" id="q-adm-10">
							<span class="faq-card-question">10. How can I get in touch with the Admissions Team?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-10" class="faq-card-body" role="region" aria-labelledby="q-adm-10">
							<div class="faq-card-content">
								<p>You can visit our Admissions Office Monday to Saturday, 8:00 AM to 4:00 PM, submit an online enquiry, call us on <a href="tel:+912268066697">+91 22 68066697</a>, or email us at <a href="mailto:info@bdsiskharghar.org">info@bdsiskharghar.org</a>. Our team will be happy to answer your queries and guide you through the admissions process.</p>
							</div>
						</div>
					</div>

					<!-- Q11 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-11" id="q-adm-11">
							<span class="faq-card-question">11. Where can I find the fee structure?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-11" class="faq-card-body" role="region" aria-labelledby="q-adm-11">
							<div class="faq-card-content">
								<p>Detailed information about tuition fees, payment schedules, and other applicable charges is available on our Fee Structure &amp; Admission Policy page or by contacting our Admissions Team directly.</p>
							</div>
						</div>
					</div>

					<!-- Q12 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-12" id="q-adm-12">
							<span class="faq-card-question">12. What documents are required for admission?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-12" class="faq-card-body" role="region" aria-labelledby="q-adm-12">
							<div class="faq-card-content">
								<p>The following documents are required for a seamless admissions process:</p>
								<ul class="faq-inner-list">
									<li>Child's Birth Certificate</li>
									<li>Recent Passport-size Photographs</li>
									<li>Previous School Report Cards (where applicable)</li>
									<li>Transfer Certificate (where applicable)</li>
									<li>Child's Aadhaar Card or Valid Government-issued Identity Proof</li>
									<li>Parent's/Guardian's Aadhaar Card or Valid Government-issued Identity Proof</li>
									<li>Current Address Proof</li>
								</ul>
								<p><em>Please note: Additional documents may be requested based on the programme, grade level, or specific admission requirements.</em></p>
							</div>
						</div>
					</div>

					<!-- Q13 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-13" id="q-adm-13">
							<span class="faq-card-question">13. What are the eligibility criteria for admission?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-13" class="faq-card-body" role="region" aria-labelledby="q-adm-13">
							<div class="faq-card-content">
								<p>Admission eligibility varies by programme and grade level. Please refer to our Fee Structure &amp; Admissions Policy page for detailed eligibility criteria and admissions guidelines.</p>
							</div>
						</div>
					</div>

					<!-- Q14 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-adm-14" id="q-adm-14">
							<span class="faq-card-question">14. How to schedule a campus visit?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-adm-14" class="faq-card-body" role="region" aria-labelledby="q-adm-14">
							<div class="faq-card-content">
								<p>Families are encouraged to visit the campus before applying. Submit an <a href="<?php echo esc_url( home_url( '/admissions/#enquire' ) ); ?>">online enquiry</a>, and our Admissions Team will arrange a personalised campus tour at a convenient time.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 3: Academics
			     ================================================================ -->
			<section class="faq-group-section" id="academics-sec">
				<h2 class="faq-group-title text-center">Academics</h2>
				<div class="faq-cards-list">

					<!-- Q15 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-15" id="q-acad-15">
							<span class="faq-card-question">15. What curriculum does B.D. Somani International School, Kharghar offer?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-15" class="faq-card-body" role="region" aria-labelledby="q-acad-15">
							<div class="faq-card-content">
								<p>B.D. Somani International School follows a progressive, globally benchmarked curriculum that combines academic rigour with experiential learning. We teach both Cambridge IGCSE and ICSE Curricula.</p>
								<p>Designed to develop critical thinking, creativity, and real-world skills, it prepares students to thrive in an evolving global environment.</p>
							</div>
						</div>
					</div>

					<!-- Q16 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-16" id="q-acad-16">
							<span class="faq-card-question">16. Which academic programmes are currently available?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-16" class="faq-card-body" role="region" aria-labelledby="q-acad-16">
							<div class="faq-card-content">
								<p>Our academic structure includes:</p>
								<ul class="faq-inner-list">
									<li><strong>Playgroup</strong></li>
									<li><strong>Pre-Primary:</strong> Nursery, Junior KG &amp; Senior KG</li>
									<li><strong>Primary School:</strong> Grades 1 to 5</li>
									<li><strong>Middle School:</strong> Grades 6 &amp; 7</li>
								</ul>
								<p>Admissions for the Academic Year 2026–27 are currently open from Playgroup to Grade 7.</p>
							</div>
						</div>
					</div>

					<!-- Q17 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-17" id="q-acad-17">
							<span class="faq-card-question">17. What is the age criterion for the Pre-Primary Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-17" class="faq-card-body" role="region" aria-labelledby="q-acad-17">
							<div class="faq-card-content">
								<p>The Pre-Primary Programme is designed for children between 3 and 6 years of age, with admissions offered across Nursery, Jr. KG and Sr. KG, subject to the school's age eligibility criteria.</p>
							</div>
						</div>
					</div>

					<!-- Q18 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-18" id="q-acad-18">
							<span class="faq-card-question">18. Which education board is the Primary Programme affiliated with?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-18" class="faq-card-body" role="region" aria-labelledby="q-acad-18">
							<div class="faq-card-content">
								<p>The Primary Programme follows the ICSE (Indian Certificate of Secondary Education) curriculum for Grades 1 to 5, offering a balanced academic framework that supports both conceptual learning and skill development.</p>
							</div>
						</div>
					</div>

					<!-- Q19 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-19" id="q-acad-19">
							<span class="faq-card-question">19. Which grades are included in the Primary Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-19" class="faq-card-body" role="region" aria-labelledby="q-acad-19">
							<div class="faq-card-content">
								<p>The Primary Programme includes Grades 1 to 4, where students progress from foundational learning to independent, concept-based learning.</p>
							</div>
						</div>
					</div>

					<!-- Q20 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-20" id="q-acad-20">
							<span class="faq-card-question">20. Which grades are included in the Middle School Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-20" class="faq-card-body" role="region" aria-labelledby="q-acad-20">
							<div class="faq-card-content">
								<p>The Middle School Programme at B.D. Somani International School, Kharghar, caters to students from Grade 5 to Grade 8 for ICSE and Grade 6 to Grade 9 for Cambridge IGCSE, supporting them through a phase of greater academic depth, leadership and independent learning.</p>
							</div>
						</div>
					</div>

					<!-- Q21 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-21" id="q-acad-21">
							<span class="faq-card-question">21. Which curriculum options are available in Middle School?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-21" class="faq-card-body" role="region" aria-labelledby="q-acad-21">
							<div class="faq-card-content">
								<p>From Grade 6 onwards, parents can choose between the ICSE and IGCSE curricula. Our academic team conducts a comprehensive orientation to help families understand both pathways and choose the curriculum best suited to their child's aspirations.</p>
							</div>
						</div>
					</div>

					<!-- Q22 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-22" id="q-acad-22">
							<span class="faq-card-question">22. What is the difference between ICSE and Cambridge IGCSE?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-22" class="faq-card-body" role="region" aria-labelledby="q-acad-22">
							<div class="faq-card-content">
								<p>The Cambridge IGCSE curriculum is internationally recognised and promotes conceptual understanding, practical application, and an international outlook.</p>
								<p>The ICSE curriculum offers a strong academic foundation with a balanced approach to languages, sciences, mathematics, and the humanities.</p>
								<p>Both curricula encourage critical thinking, problem-solving, and skill-based learning, helping students build a strong foundation for higher education and future opportunities.</p>
							</div>
						</div>
					</div>

					<!-- Q23 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-23" id="q-acad-23">
							<span class="faq-card-question">23. Can students choose between the ICSE and Cambridge IGCSE curricula?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-23" class="faq-card-body" role="region" aria-labelledby="q-acad-23">
							<div class="faq-card-content">
								<p>From Grade 1 to Grade 5 (Primary School), students follow the ICSE curriculum, which blends academic rigour with conceptual understanding, practical application, and a progressive approach to learning.</p>
								<p>From Grade 6 (Middle School) onwards, families are introduced to both the ICSE and Cambridge IGCSE pathways through a dedicated orientation, enabling them to make an informed curriculum choice.</p>
							</div>
						</div>
					</div>

					<!-- Q24 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-acad-24" id="q-acad-24">
							<span class="faq-card-question">24. What are the school timings?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-acad-24" class="faq-card-body" role="region" aria-labelledby="q-acad-24">
							<div class="faq-card-content">
								<p>The school operates <strong>Monday to Friday</strong>:</p>
								<ul class="faq-inner-list">
									<li><strong>Playgroup:</strong> 9:30 AM – 11:30 AM</li>
									<li><strong>Nursery, Junior KG &amp; Senior KG:</strong> 9:00 AM – 1:00 PM</li>
									<li><strong>Grades 1 onwards:</strong> 8:00 AM – 3:00 PM</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 4: Campus & Facilities
			     ================================================================ -->
			<section class="faq-group-section" id="campus-sec">
				<h2 class="faq-group-title text-center">Campus & Facilities</h2>
				<div class="faq-cards-list">

					<!-- Q25 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-25" id="q-camp-25">
							<span class="faq-card-question">25. What facilities are available on campus?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-25" class="faq-card-body" role="region" aria-labelledby="q-camp-25">
							<div class="faq-card-content">
								<p>B.D. Somani International School offers purpose-built learning, sports and creative spaces, including:</p>
								<ul class="faq-inner-list">
									<li>Smart classrooms with outdoor learning spaces on every floor</li>
									<li>Science laboratories (Physics, Chemistry &amp; Biology)</li>
									<li>Dedicated Computer Lab</li>
									<li>Library with dedicated zones for storytelling, reading and independent study</li>
									<li>Podcast Studio</li>
									<li>Aeromodelling Lab</li>
									<li>Hydroponics Learning Zone</li>
									<li>Pottery Studio</li>
									<li>Retractable Auditorium</li>
									<li>Swimming Pool</li>
									<li>Butterfly Garden</li>
									<li>Indoor Games &amp; Chess Area</li>
									<li>School Cafeteria with Indoor &amp; Outdoor Seating</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Q26 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-26" id="q-camp-26">
							<span class="faq-card-question">26. What sports facilities are available?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-26" class="faq-card-body" role="region" aria-labelledby="q-camp-26">
							<div class="faq-card-content">
								<p>Students have access to facilities that encourage both recreational and competitive sports, including:</p>
								<ul class="faq-inner-list">
									<li>Football Ground</li>
									<li>Cricket Ground &amp; Practice Nets</li>
									<li>Basketball Court</li>
									<li>Taekwondo Training</li>
									<li>Swimming Pool</li>
									<li>Indoor Games</li>
									<li>Chess</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Q27 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-27" id="q-camp-27">
							<span class="faq-card-question">27. How does the campus support experiential learning?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-27" class="faq-card-body" role="region" aria-labelledby="q-camp-27">
							<div class="faq-card-content">
								<p>Beyond classrooms, students learn through thoughtfully designed spaces such as the Butterfly Garden, Hydroponics Zone, Aeromodelling Lab, Pottery Studio, and Podcast Studio, which encourage hands-on learning, creativity, and exploration.</p>
							</div>
						</div>
					</div>

					<!-- Q28 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-28" id="q-camp-28">
							<span class="faq-card-question">28. Does the school have spaces for performances and events?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-28" class="faq-card-body" role="region" aria-labelledby="q-camp-28">
							<div class="faq-card-content">
								<p>Yes. The campus includes a retractable auditorium that hosts assemblies, performances, celebrations, competitions, and other school events throughout the year.</p>
							</div>
						</div>
					</div>

					<!-- Q29 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-camp-29" id="q-camp-29">
							<span class="faq-card-question">29. How does the school celebrate student life?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-camp-29" class="faq-card-body" role="region" aria-labelledby="q-camp-29">
							<div class="faq-card-content">
								<p>Students participate in a vibrant calendar of experiences throughout the year, including cultural celebrations, Annual Day, sports events, music and performing arts showcases, literary activities, exhibitions, and international observances.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 5: Student Well-being & Safety
			     ================================================================ -->
			<section class="faq-group-section" id="safety-sec">
				<h2 class="faq-group-title text-center">Student Well-being & Safety</h2>
				<div class="faq-cards-list">

					<!-- Q30 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-safe-30" id="q-safe-30">
							<span class="faq-card-question">30. Does the school provide meals?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-safe-30" class="faq-card-body" role="region" aria-labelledby="q-safe-30">
							<div class="faq-card-content">
								<p>Yes. The school has a dedicated cafeteria that serves freshly prepared, nutritious, and balanced meals in a clean and hygienic environment. Students can also enjoy their meals in designated outdoor seating areas.</p>
							</div>
						</div>
					</div>

					<!-- Q31 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-safe-31" id="q-safe-31">
							<span class="faq-card-question">31. How is student safety ensured at the school?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-safe-31" class="faq-card-body" role="region" aria-labelledby="q-safe-31">
							<div class="faq-card-content">
								<p>The campus is equipped with comprehensive safety measures, including CCTV surveillance across the school premises, trained staff, fire safety systems, and age-appropriate infrastructure.</p>
								<p>The Day Care and Pre-Primary sections feature child-safe furniture, child-friendly door handles, and easily accessible drinking water stations, creating a secure environment for young learners.</p>
							</div>
						</div>
					</div>

					<!-- Q32 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-safe-32" id="q-safe-32">
							<span class="faq-card-question">32. Does the school have medical support on campus?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-safe-32" class="faq-card-body" role="region" aria-labelledby="q-safe-32">
							<div class="faq-card-content">
								<p>Yes. The school has a dedicated infirmary with a qualified nurse available throughout school hours to provide immediate medical assistance.</p>
								<p>Students also have access to dedicated school counsellors who support their emotional well-being and overall development.</p>
							</div>
						</div>
					</div>

					<!-- Q33 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-safe-33" id="q-safe-33">
							<span class="faq-card-question">33. Is school transport available?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-safe-33" class="faq-card-body" role="region" aria-labelledby="q-safe-33">
							<div class="faq-card-content">
								<p>Yes. The school provides GPS-enabled transport services across designated routes. Parents can track their child's journey through the Chakraview app, and every bus is staffed with a trained female bus hostess to ensure students' comfort and safety throughout the journey.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 6: Day Care
			     ================================================================ -->
			<section class="faq-group-section" id="daycare-sec">
				<h2 class="faq-group-title text-center">Day Care</h2>
				<div class="faq-cards-list">

					<!-- Q34 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-dc-34" id="q-dc-34">
							<span class="faq-card-question">34. Does the school provide a daycare facility?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-dc-34" class="faq-card-body" role="region" aria-labelledby="q-dc-34">
							<div class="faq-card-content">
								<p>Yes, the daycare facility at BDSIS, Kharghar provides a structured, engaging environment for young children, with activities such as story time, music, physical education, art, and role play to support holistic development. The facility is open Monday through Friday, 11:30 a.m. to 5:30 p.m. You can request more information about our Day Care program by submitting an enquiry online.</p>
							</div>
						</div>
					</div>

					<!-- Q35 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-dc-35" id="q-dc-35">
							<span class="faq-card-question">35. What is the age criterion for joining the Day Care Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-dc-35" class="faq-card-body" role="region" aria-labelledby="q-dc-35">
							<div class="faq-card-content">
								<p>The Day Care Programme welcomes children between 3 and 4 years of age. Every experience is age-appropriate and thoughtfully aligned with their stage of development.</p>
							</div>
						</div>
					</div>

					<!-- Q36 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-dc-36" id="q-dc-36">
							<span class="faq-card-question">36. What are the Day Care days and timings?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-dc-36" class="faq-card-body" role="region" aria-labelledby="q-dc-36">
							<div class="faq-card-content">
								<p>The Daycare Programme runs <strong>Monday to Friday, from 11:30 a.m. to 5:30 p.m.</strong></p>
							</div>
						</div>
					</div>

					<!-- Q37 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-dc-37" id="q-dc-37">
							<span class="faq-card-question">37. How many children are there in a Day Care class?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-dc-37" class="faq-card-body" role="region" aria-labelledby="q-dc-37">
							<div class="faq-card-content">
								<p>Each Day Care class has a maximum capacity of 25 children. Two teachers and dedicated support staff are present throughout the day to ensure every child receives attentive care and supervision.</p>
							</div>
						</div>
					</div>

					<!-- Q38 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-dc-38" id="q-dc-38">
							<span class="faq-card-question">38. How can I enroll my child for the B.D. Somani Day Care Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-dc-38" class="faq-card-body" role="region" aria-labelledby="q-dc-38">
							<div class="faq-card-content">
								<p>Simply fill out our <a href="<?php echo esc_url( home_url( '/admissions/#enquire' ) ); ?>">Admissions Enquiry Form</a> or get in touch with our Admissions Team on <a href="tel:+912268066697">+91 22 68066697</a> or via email at <a href="mailto:info@bdsiskharghar.org">info@bdsiskharghar.org</a>. We'll guide you through the programme details and the enrolment process.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 7: After School
			     ================================================================ -->
			<section class="faq-group-section" id="afterschool-sec">
				<h2 class="faq-group-title text-center">After School</h2>
				<div class="faq-cards-list">

					<!-- Q39 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-as-39" id="q-as-39">
							<span class="faq-card-question">39. What are the After-School Programme timings?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-as-39" class="faq-card-body" role="region" aria-labelledby="q-as-39">
							<div class="faq-card-content">
								<p>Our After-School Programmes begin once the regular school day concludes. Sessions are conducted in the afternoon, depending on the specific activity selected.</p>
							</div>
						</div>
					</div>

					<!-- Q40 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-as-40" id="q-as-40">
							<span class="faq-card-question">40. How can I enroll my child in an After-School Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-as-40" class="faq-card-body" role="region" aria-labelledby="q-as-40">
							<div class="faq-card-content">
								<p>Each programme includes the relevant contact details to help you connect directly with the programme coordinator. Alternatively, you can submit an enquiry through our Admissions Team or get in touch with the School Reception for guidance on enrolment and programme availability.</p>
							</div>
						</div>
					</div>

					<!-- Q41 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-as-41" id="q-as-41">
							<span class="faq-card-question">41. Can my child enroll in more than one After-School Programme?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-as-41" class="faq-card-body" role="region" aria-labelledby="q-as-41">
							<div class="faq-card-content">
								<p>Students may enroll in multiple programmes, subject to age eligibility, availability and scheduling. Our team will be happy to guide you in choosing a combination that best suits your child's interests and routine.</p>
							</div>
						</div>
					</div>

				</div>
			</section>

			<hr class="faq-group-divider">

			<!-- ================================================================
			     Section 8: Facilities & Visits
			     ================================================================ -->
			<section class="faq-group-section" id="facilities-visits-sec">
				<h2 class="faq-group-title text-center">Facilities & Visits</h2>
				<div class="faq-cards-list">

					<!-- Q42 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-fv-42" id="q-fv-42">
							<span class="faq-card-question">42. Does the school have a swimming pool?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-fv-42" class="faq-card-body" role="region" aria-labelledby="q-fv-42">
							<div class="faq-card-content">
								<p>Yes, the swimming pool is fully operational.</p>
							</div>
						</div>
					</div>

					<!-- Q43 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-fv-43" id="q-fv-43">
							<span class="faq-card-question">43. Does the school have an auditorium?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-fv-43" class="faq-card-body" role="region" aria-labelledby="q-fv-43">
							<div class="faq-card-content">
								<p>Yes, the auditorium is 250+ seater with the latest LED screen, audio and video equipment.</p>
							</div>
						</div>
					</div>

					<!-- Q44 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-fv-44" id="q-fv-44">
							<span class="faq-card-question">44. Does the school have an infirmary?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-fv-44" class="faq-card-body" role="region" aria-labelledby="q-fv-44">
							<div class="faq-card-content">
								<p>Yes, the school has a well-equipped infirmary and trained medical professionals to handle minor injuries, illnesses, and other health-related concerns during school hours. The infirmary is integral to the school’s health and wellness program, ensuring regular check-ups and maintaining student health records.</p>
							</div>
						</div>
					</div>

					<!-- Q45 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-fv-45" id="q-fv-45">
							<span class="faq-card-question">45. Can we visit the campus?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-fv-45" class="faq-card-body" role="region" aria-labelledby="q-fv-45">
							<div class="faq-card-content">
								<p>Yes, campus tours are available. Please <a href="<?php echo esc_url( home_url( '/admissions/#enquire' ) ); ?>">click here to schedule a visit</a> or submit an enquiry, and our Admissions Team will gladly host you.</p>
							</div>
						</div>
					</div>

					<!-- Q46 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-fv-46" id="q-fv-46">
							<span class="faq-card-question">46. Does the school provide cafeteria facilities?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-fv-46" class="faq-card-body" role="region" aria-labelledby="q-fv-46">
							<div class="faq-card-content">
								<p>Yes, our cafeteria offers a healthy, nutritious vegetarian food menu, which is shared every week in advance with the parents. The cafeteria is committed to maintaining high hygiene and safety standards and provides ample, comfortable seating for students.</p>
							</div>
						</div>
					</div>

					<!-- Q47 -->
					<div class="faq-card-item">
						<button class="faq-card-header" aria-expanded="false" aria-controls="ans-fv-47" id="q-fv-47">
							<span class="faq-card-question">47. Does the school provide transportation facilities?</span>
							<span class="faq-card-toggle-icon" aria-hidden="true">
								<iconify-icon icon="lucide:minus" class="icon-minus" style="display:none;"></iconify-icon>
								<iconify-icon icon="lucide:plus" class="icon-plus"></iconify-icon>
							</span>
						</button>
						<div id="ans-fv-47" class="faq-card-body" role="region" aria-labelledby="q-fv-47">
							<div class="faq-card-content">
								<p>Yes, B.D. Somani provides transport services from Vashi to Panvel, equipped with GPS tracking systems for real-time monitoring, CCTV cameras for enhanced security, and a female attendant on board for supervision. A dedicated bus app for parents offers real-time route updates and notifications.</p>
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
