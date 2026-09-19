<?php
/**
 * Maintenance Mode Template
 * B.D. Somani International School Theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo( 'name' ); ?> — Scheduled Maintenance</title>
	<meta name="theme-color" content="#49274A">
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	
	<!-- Favicon -->
	<?php if ( function_exists( 'has_site_icon' ) && has_site_icon() ) : ?>
		<?php wp_site_icon(); ?>
	<?php endif; ?>

	<style>
		:root {
			--clr-purple-primary: #49274A;
			--clr-purple-dark: #2F1730;
			--clr-purple-light: #683969;
			--clr-yellow-primary: #F1C822;
			--clr-brand-cream: #F4DECB;
			--clr-text-light: #FFFFFF;
			--clr-text-muted: rgba(255, 255, 255, 0.78);
			--font-heading: 'Montserrat', -apple-system, BlinkMacSystemFont, sans-serif;
			--font-body: 'Merriweather', Georgia, serif;
		}

		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			font-family: var(--font-body);
			background-color: var(--clr-purple-dark);
			background-image: 
				radial-gradient(circle at 15% 20%, rgba(241, 200, 34, 0.08) 0%, transparent 45%),
				radial-gradient(circle at 85% 80%, rgba(104, 57, 105, 0.4) 0%, transparent 50%),
				linear-gradient(135deg, var(--clr-purple-dark) 0%, var(--clr-purple-primary) 100%);
			color: var(--clr-text-light);
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			align-items: center;
			padding: 2rem 1.5rem;
			text-align: center;
			overflow-x: hidden;
			position: relative;
		}

		/* Decorative Animated Background Elements */
		.bg-shape {
			position: absolute;
			border-radius: 50%;
			filter: blur(80px);
			pointer-events: none;
			z-index: 0;
		}
		.bg-shape-1 {
			top: -100px;
			left: -100px;
			width: 350px;
			height: 350px;
			background: rgba(241, 200, 34, 0.12);
		}
		.bg-shape-2 {
			bottom: -120px;
			right: -120px;
			width: 450px;
			height: 450px;
			background: rgba(104, 57, 105, 0.35);
		}

		/* Content Container */
		.maintenance-container {
			position: relative;
			z-index: 1;
			max-width: 760px;
			width: 100%;
			margin: auto 0;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		/* Header & Logo */
		.school-logo {
			max-width: 260px;
			height: auto;
			margin-bottom: 2.5rem;
			filter: drop-shadow(0 8px 24px rgba(0,0,0,0.25));
			transition: transform 0.3s ease;
		}
		.school-logo:hover {
			transform: scale(1.02);
		}

		/* Status Pill Badge */
		.status-badge {
			display: inline-flex;
			align-items: center;
			gap: 0.6rem;
			background: rgba(255, 255, 255, 0.08);
			border: 1px solid rgba(241, 200, 34, 0.35);
			backdrop-filter: blur(12px);
			padding: 0.5rem 1.25rem;
			border-radius: 50px;
			font-family: var(--font-heading);
			font-size: 0.85rem;
			font-weight: 600;
			letter-spacing: 0.08em;
			text-transform: uppercase;
			color: var(--clr-yellow-primary);
			margin-bottom: 2rem;
			box-shadow: 0 4px 20px rgba(0,0,0,0.15);
		}

		.status-dot {
			width: 10px;
			height: 10px;
			background-color: var(--clr-yellow-primary);
			border-radius: 50%;
			box-shadow: 0 0 10px var(--clr-yellow-primary);
			animation: pulse 2s infinite ease-in-out;
		}

		@keyframes pulse {
			0% { transform: scale(0.9); opacity: 0.7; box-shadow: 0 0 4px var(--clr-yellow-primary); }
			50% { transform: scale(1.2); opacity: 1; box-shadow: 0 0 14px var(--clr-yellow-primary); }
			100% { transform: scale(0.9); opacity: 0.7; box-shadow: 0 0 4px var(--clr-yellow-primary); }
		}

		/* Typography */
		h1 {
			font-family: var(--font-heading);
			font-size: clamp(2rem, 4vw, 3.2rem);
			font-weight: 800;
			line-height: 1.2;
			margin-bottom: 1.25rem;
			color: #FFFFFF;
			letter-spacing: -0.02em;
		}

		h1 span {
			color: var(--clr-yellow-primary);
			display: inline-block;
		}

		p.description {
			font-size: clamp(1rem, 1.5vw, 1.15rem);
			line-height: 1.7;
			color: var(--clr-text-muted);
			margin-bottom: 2.5rem;
			max-width: 640px;
		}

		/* Contact Info Card Grid */
		.contact-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			gap: 1.25rem;
			width: 100%;
			margin-bottom: 2.5rem;
		}

		.contact-card {
			background: rgba(255, 255, 255, 0.05);
			border: 1px solid rgba(255, 255, 255, 0.12);
			backdrop-filter: blur(16px);
			border-radius: 16px;
			padding: 1.5rem;
			text-align: left;
			transition: all 0.3s ease;
		}

		.contact-card:hover {
			background: rgba(255, 255, 255, 0.09);
			border-color: rgba(241, 200, 34, 0.4);
			transform: translateY(-3px);
		}

		.contact-card-title {
			font-family: var(--font-heading);
			font-size: 0.95rem;
			font-weight: 700;
			color: var(--clr-yellow-primary);
			text-transform: uppercase;
			letter-spacing: 0.05em;
			margin-bottom: 0.5rem;
			display: flex;
			align-items: center;
			gap: 0.5rem;
		}

		.contact-card p, .contact-card a {
			font-family: var(--font-heading);
			font-size: 0.9rem;
			color: var(--clr-text-light);
			text-decoration: none;
			line-height: 1.5;
			display: block;
		}

		.contact-card a:hover {
			color: var(--clr-yellow-primary);
			text-decoration: underline;
		}

		/* Footer */
		.maintenance-footer {
			position: relative;
			z-index: 1;
			font-family: var(--font-heading);
			font-size: 0.85rem;
			color: rgba(255, 255, 255, 0.5);
			margin-top: 2rem;
		}
	</style>
</head>
<body>

	<div class="bg-shape bg-shape-1"></div>
	<div class="bg-shape bg-shape-2"></div>

	<main class="maintenance-container">
		<!-- School Logo -->
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/BD Somani Kharghar - White logo 1.webp' ); ?>" 
			 alt="<?php bloginfo( 'name' ); ?>" 
			 class="school-logo">

		<!-- Status Badge -->
		<div class="status-badge">
			<span class="status-dot"></span>
			<span>Scheduled Maintenance</span>
		</div>

		<!-- Title -->
		<h1>We Are Enhancing Your <span>Experience</span></h1>

		<!-- Description -->
		<p class="description">
			Our website is currently undergoing scheduled maintenance to upgrade our digital platform. We appreciate your patience and will be back online shortly.
		</p>

		<!-- Contact Information Grid -->
		<div class="contact-grid">
			<div class="contact-card">
				<div class="contact-card-title">
					<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
					General Enquiries
				</div>
				<a href="tel:+912222046830">+91 (22) 2204 6830</a>
				<a href="mailto:info@bdsomani.org">info@bdsomani.org</a>
			</div>

			<div class="contact-card">
				<div class="contact-card-title">
					<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
					Admissions Desk
				</div>
				<a href="tel:+912222046831">+91 (22) 2204 6831</a>
				<a href="mailto:admissions@bdsomani.org">admissions@bdsomani.org</a>
			</div>
		</div>
	</main>

	<footer class="maintenance-footer">
		&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
	</footer>

</body>
</html>
