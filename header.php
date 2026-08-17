<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">
	<!-- Fixed Header Container (Fixed Navigation & Announcement Marquee) -->
	<header class="site-header-fixed">
		<!-- Top Announcement Linear Marquee -->
		<div class="top-marquee" aria-label="Announcement marquee">
			<div class="marquee-track">
				<div class="marquee-content">
					<span>ADMISSIONS FOR AY 2027-28 OPEN ON JULY 23, 2026 | APPLICATIONS WILL BE AVAILABLE ONLINE FROM 10 AM.</span>
					<span class="marquee-dot">•</span>
					<span>ADMISSIONS FOR AY 2027-28 OPEN ON JULY 23, 2026 | APPLICATIONS WILL BE AVAILABLE ONLINE FROM 10 AM.</span>
					<span class="marquee-dot">•</span>
					<span>ADMISSIONS FOR AY 2027-28 OPEN ON JULY 23, 2026 | APPLICATIONS WILL BE AVAILABLE ONLINE FROM 10 AM.</span>
					<span class="marquee-dot">•</span>
				</div>
				<div class="marquee-content" aria-hidden="true">
					<span>ADMISSIONS FOR AY 2027-28 OPEN ON JULY 23, 2026 | APPLICATIONS WILL BE AVAILABLE ONLINE FROM 10 AM.</span>
					<span class="marquee-dot">•</span>
					<span>ADMISSIONS FOR AY 2027-28 OPEN ON JULY 23, 2026 | APPLICATIONS WILL BE AVAILABLE ONLINE FROM 10 AM.</span>
					<span class="marquee-dot">•</span>
					<span>ADMISSIONS FOR AY 2027-28 OPEN ON JULY 23, 2026 | APPLICATIONS WILL BE AVAILABLE ONLINE FROM 10 AM.</span>
					<span class="marquee-dot">•</span>
				</div>
			</div>
		</div>

		<!-- Main Header Navbar -->
		<div class="main-header">
			<div class="site-container header-inner flex-between">
				<!-- Logo -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/BD Somani Logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo" width="220" height="55">
				</a>

				<?php 
					$home_url        = esc_url( home_url( '/' ) );
					$about_url       = esc_url( home_url( '/about/' ) );
					$faq_url         = esc_url( home_url( '/faq/' ) );
					$gallery_url     = esc_url( home_url( '/gallery/' ) );

					$approach_url        = esc_url( home_url( '/approach/' ) );
					$daycare_url         = esc_url( home_url( '/daycare/' ) );
					$pre_primary_url     = esc_url( home_url( '/pre-primary-school/' ) );
					$primary_url         = esc_url( home_url( '/primary-school/' ) );
					$middle_url          = esc_url( home_url( '/middle-school/' ) );
					$post_school_act_url = esc_url( home_url( '/post-school-activities/' ) );
					$campus_life_url     = esc_url( home_url( '/campus-life/' ) );
					$admissions_url      = esc_url( home_url( '/admissions/' ) );
					$contact_url         = esc_url( home_url( '/contact-us/' ) );

					$is_faq             = is_page_template( 'page-faq.php' ) || is_page( 'faq' );
					$is_about           = is_page_template( 'page-about.php' ) || is_page( 'about' ) || is_page( 'about-us' );
					$is_gallery         = is_page_template( 'page-gallery.php' ) || is_page( 'gallery' ) || is_post_type_archive( 'gallery' );
					$is_approach        = is_page_template( 'page-approach.php' ) || is_page( 'approach' ) || is_page( 'our-approach' );
					$is_daycare         = is_page( 'daycare' );
					$is_pre_primary     = is_page( 'pre-primary-school' ) || is_page( 'pre-primary' );
					$is_primary         = is_page( 'primary-school' ) || is_page( 'primary' );
					$is_middle          = is_page( 'middle-school' ) || is_page( 'middle' );
					$is_post_school_act = is_page( 'post-school-activities' ) || is_page( 'after-school' );
					$is_academics_sub   = is_page_template( 'page-academics.php' ) || $is_daycare || $is_pre_primary || $is_primary || $is_middle || $is_post_school_act;
					$is_campus_life     = is_page_template( 'page-campus-life.php' ) || is_page( 'campus-life' );
					$is_admissions      = is_page_template( 'page-admissions.php' ) || is_page( 'admissions' );
					$is_contact         = is_page_template( 'page-contact-us.php' ) || is_page( 'contact-us' ) || is_page( 'contact' );
					$is_home            = ( is_front_page() || is_home() ) && ! $is_faq && ! $is_about && ! $is_gallery && ! $is_approach && ! $is_academics_sub && ! $is_campus_life && ! $is_admissions && ! $is_contact;

					$home_prefix = $is_home ? '' : $home_url;
				?>
				<!-- Desktop Navigation Menu -->
				<nav class="main-nav" aria-label="Main Navigation">
					<ul class="nav-menu flex gap-md">
						<li class="nav-item"><a href="<?php echo $home_url; ?>" class="nav-link <?php echo $is_home ? 'active' : ''; ?>">HOME</a></li>
						<li class="nav-item"><a href="<?php echo $about_url; ?>" class="nav-link <?php echo $is_about ? 'active' : ''; ?>">ABOUT</a></li>
						<li class="nav-item dropdown">
							<a href="<?php echo $home_prefix; ?>#academics" class="nav-link <?php echo ( $is_approach || $is_academics_sub ) ? 'active' : ''; ?>">
								ACADEMICS
								<svg class="dropdown-icon" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
							<div class="dropdown-menu">
								<span class="dropdown-header-title">ACADEMICS</span>
								<ul class="dropdown-list">
									<li><a href="<?php echo $approach_url; ?>" class="<?php echo $is_approach ? 'active' : ''; ?>">OUR APPROACH</a></li>
									<li><a href="<?php echo $daycare_url; ?>" class="<?php echo $is_daycare ? 'active' : ''; ?>">DAYCARE</a></li>
									<li><a href="<?php echo $pre_primary_url; ?>" class="<?php echo $is_pre_primary ? 'active' : ''; ?>">PRE-PRIMARY SCHOOL</a></li>
									<li><a href="<?php echo $primary_url; ?>" class="<?php echo $is_primary ? 'active' : ''; ?>">PRIMARY SCHOOL</a></li>
									<li><a href="<?php echo $middle_url; ?>" class="<?php echo $is_middle ? 'active' : ''; ?>">MIDDLE SCHOOL</a></li>
									<li><a href="<?php echo $post_school_act_url; ?>" class="<?php echo $is_post_school_act ? 'active' : ''; ?>">POST-SCHOOL ACTIVITIES</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item"><a href="<?php echo $campus_life_url; ?>" class="nav-link <?php echo $is_campus_life ? 'active' : ''; ?>">CAMPUS LIFE</a></li>
						<li class="nav-item"><a href="<?php echo $admissions_url; ?>" class="nav-link <?php echo $is_admissions ? 'active' : ''; ?>">ADMISSIONS</a></li>
						<li class="nav-item"><a href="<?php echo $gallery_url; ?>" class="nav-link <?php echo $is_gallery ? 'active' : ''; ?>">GALLERY</a></li>
						<li class="nav-item"><a href="<?php echo $faq_url; ?>" class="nav-link <?php echo $is_faq ? 'active' : ''; ?>">FAQ</a></li>
						<li class="nav-item"><a href="<?php echo $contact_url; ?>" class="nav-link <?php echo $is_contact ? 'active' : ''; ?>">CONTACT US</a></li>
					</ul>
				</nav>

				<!-- Header CTA Button -->
				<div class="header-cta flex-center">
					<a href="<?php echo $admissions_url; ?>" class="btn btn-yellow radius-md">APPLY NOW</a>
				</div>

				<!-- Mobile Menu Toggle Button -->
				<button class="mobile-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
					<span class="hamburger-bar"></span>
					<span class="hamburger-bar"></span>
					<span class="hamburger-bar"></span>
				</button>
			</div>

			<!-- Mobile Navigation Card Container (Slides down directly below white navbar) -->
			<div class="mobile-nav-wrapper" id="mobile-nav">
				<div class="mobile-nav-card">
					<ul class="mobile-nav-menu">
						<li class="mobile-nav-item"><a href="<?php echo $home_url; ?>" class="mobile-link <?php echo $is_home ? 'active' : ''; ?>">HOME</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $about_url; ?>" class="mobile-link <?php echo $is_about ? 'active' : ''; ?>">ABOUT US</a></li>
						<li class="mobile-nav-item mobile-dropdown-item">
							<div class="mobile-dropdown-header flex-between align-center">
								<a href="<?php echo $home_prefix; ?>#academics" class="mobile-link <?php echo ( $is_approach || $is_academics_sub ) ? 'active' : ''; ?>">ACADEMICS</a>
								<button class="mobile-dropdown-toggle" aria-label="Toggle Academics submenu">
									<svg class="mobile-dropdown-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L5 5L9 1" stroke="#9C5E91" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</button>
							</div>
							<ul class="mobile-submenu">
								<li><a href="<?php echo $approach_url; ?>" class="<?php echo $is_approach ? 'active' : ''; ?>">OUR APPROACH</a></li>
								<li><a href="<?php echo $daycare_url; ?>" class="<?php echo $is_daycare ? 'active' : ''; ?>">DAYCARE</a></li>
								<li><a href="<?php echo $pre_primary_url; ?>" class="<?php echo $is_pre_primary ? 'active' : ''; ?>">PRE-PRIMARY SCHOOL</a></li>
								<li><a href="<?php echo $primary_url; ?>" class="<?php echo $is_primary ? 'active' : ''; ?>">PRIMARY SCHOOL</a></li>
								<li><a href="<?php echo $middle_url; ?>" class="<?php echo $is_middle ? 'active' : ''; ?>">MIDDLE SCHOOL</a></li>
								<li><a href="<?php echo $post_school_act_url; ?>" class="<?php echo $is_post_school_act ? 'active' : ''; ?>">POST-SCHOOL ACTIVITIES</a></li>
							</ul>
						</li>
						<li class="mobile-nav-item"><a href="<?php echo $campus_life_url; ?>" class="mobile-link <?php echo $is_campus_life ? 'active' : ''; ?>">CAMPUS LIFE</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $admissions_url; ?>" class="mobile-link <?php echo $is_admissions ? 'active' : ''; ?>">ADMISSIONS</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $gallery_url; ?>" class="mobile-link <?php echo $is_gallery ? 'active' : ''; ?>">GALLERY</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $faq_url; ?>" class="mobile-link <?php echo $is_faq ? 'active' : ''; ?>">FAQ</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $contact_url; ?>" class="mobile-link <?php echo $is_contact ? 'active' : ''; ?>">CONTACT US</a></li>
					</ul>
					<div class="mobile-cta-box">
						<a href="<?php echo $admissions_url; ?>" class="btn btn-yellow radius-md btn-full">APPLY NOW</a>
					</div>
				</div>
			</div>
		</div>
	</header>
