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
					$home_url    = esc_url( home_url( '/' ) );
					$about_url   = esc_url( home_url( '/about/' ) );
					$faq_url     = esc_url( home_url( '/faq/' ) );
					$gallery_url = esc_url( home_url( '/gallery/' ) );

					$is_faq     = is_page_template( 'page-faq.php' ) || is_page( 'faq' );
					$is_about   = is_page_template( 'page-about.php' ) || is_page( 'about' ) || is_page( 'about-us' );
					$is_gallery = is_page_template( 'page-gallery.php' ) || is_page( 'gallery' ) || is_post_type_archive( 'gallery' );
					$is_home    = ( is_front_page() || is_home() ) && ! $is_faq && ! $is_about && ! $is_gallery;

					$home_prefix = $is_home ? '' : $home_url;
				?>
				<!-- Desktop Navigation Menu -->
				<nav class="main-nav" aria-label="Main Navigation">
					<ul class="nav-menu flex gap-md">
						<li class="nav-item"><a href="<?php echo $home_url; ?>" class="nav-link <?php echo $is_home ? 'active' : ''; ?>">HOME</a></li>
						<li class="nav-item"><a href="<?php echo $about_url; ?>" class="nav-link <?php echo $is_about ? 'active' : ''; ?>">ABOUT</a></li>
						<li class="nav-item dropdown">
							<a href="<?php echo $home_prefix; ?>#academics" class="nav-link">
								ACADEMICS
								<svg class="dropdown-icon" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
							<div class="dropdown-menu">
								<span class="dropdown-header-title">ACADEMICS</span>
								<ul class="dropdown-list">
									<li><a href="<?php echo $home_prefix; ?>#our-approach">OUR APPROACH</a></li>
									<li><a href="<?php echo $home_prefix; ?>#daycare">DAYCARE</a></li>
									<li><a href="<?php echo $home_prefix; ?>#pre-primary">PRE-PRIMARY</a></li>
									<li><a href="<?php echo $home_prefix; ?>#primary">PRIMARY</a></li>
									<li><a href="<?php echo $home_prefix; ?>#middle">MIDDLE</a></li>
									<li><a href="<?php echo $home_prefix; ?>#after-school">AFTER SCHOOL</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item"><a href="<?php echo $home_prefix; ?>#campus-life" class="nav-link">CAMPUS LIFE</a></li>
						<li class="nav-item"><a href="<?php echo $home_prefix; ?>#admissions" class="nav-link">ADMISSIONS</a></li>
						<li class="nav-item"><a href="<?php echo $gallery_url; ?>" class="nav-link <?php echo $is_gallery ? 'active' : ''; ?>">GALLERY</a></li>
						<li class="nav-item"><a href="<?php echo $faq_url; ?>" class="nav-link <?php echo $is_faq ? 'active' : ''; ?>">FAQ</a></li>
						<li class="nav-item"><a href="<?php echo $home_prefix; ?>#contact" class="nav-link">CONTACT US</a></li>
					</ul>
				</nav>

				<!-- Header CTA Button -->
				<div class="header-cta flex-center">
					<a href="<?php echo $home_prefix; ?>#apply" class="btn btn-yellow radius-md">APPLY NOW</a>
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
								<a href="<?php echo $home_prefix; ?>#academics" class="mobile-link">ACADEMICS</a>
								<button class="mobile-dropdown-toggle" aria-label="Toggle Academics submenu">
									<svg class="mobile-dropdown-arrow" width="12" height="8" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L5 5L9 1" stroke="#9C5E91" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</button>
							</div>
							<ul class="mobile-submenu">
								<li><a href="<?php echo $home_prefix; ?>#our-approach">OUR APPROACH</a></li>
								<li><a href="<?php echo $home_prefix; ?>#daycare">DAYCARE</a></li>
								<li><a href="<?php echo $home_prefix; ?>#pre-primary">PRE-PRIMARY</a></li>
								<li><a href="<?php echo $home_prefix; ?>#primary">PRIMARY</a></li>
								<li><a href="<?php echo $home_prefix; ?>#middle">MIDDLE</a></li>
								<li><a href="<?php echo $home_prefix; ?>#after-school">AFTER SCHOOL</a></li>
							</ul>
						</li>
						<li class="mobile-nav-item"><a href="<?php echo $home_prefix; ?>#campus-life" class="mobile-link">CAMPUS LIFE</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $home_prefix; ?>#admissions" class="mobile-link">ADMISSIONS</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $gallery_url; ?>" class="mobile-link <?php echo $is_gallery ? 'active' : ''; ?>">GALLERY</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $faq_url; ?>" class="mobile-link <?php echo $is_faq ? 'active' : ''; ?>">FAQ</a></li>
						<li class="mobile-nav-item"><a href="<?php echo $home_prefix; ?>#contact" class="mobile-link">CONTACT US</a></li>
					</ul>
					<div class="mobile-cta-box">
						<a href="<?php echo $home_prefix; ?>#apply" class="btn btn-yellow radius-md btn-full">APPLY NOW</a>
					</div>
				</div>
			</div>
		</div>
	</header>
