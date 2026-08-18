<?php
/**
 * Template Name: Privacy Policy Page
 * Template Post Type: page
 *
 * @package BD_Somani
 */

get_header();
?>

<main id="primary" class="site-main legal-page-custom">
	<div class="site-container">

		<!-- Breadcrumbs Navigation -->
		<nav class="legal-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bd-somani' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Home', 'bd-somani' ); ?>">
				<?php 
				$home_svg_path = get_template_directory() . '/assets/svgs/home svg.svg';
				if ( file_exists( $home_svg_path ) ) {
					include $home_svg_path;
				} else {
					echo esc_html__( 'Home', 'bd-somani' );
				}
				?>
			</a>
			<span class="breadcrumb-separator">/</span>
			<span class="breadcrumb-current"><?php esc_html_e( 'Privacy Policy', 'bd-somani' ); ?></span>
		</nav>

		<!-- Hero Section -->
		<section class="legal-hero-section">
			<div class="legal-hero-content text-center">
				<span class="legal-badge"><?php esc_html_e( 'DATA PROTECTION & PRIVACY', 'bd-somani' ); ?></span>
				<h1 class="legal-hero-title"><?php esc_html_e( 'Privacy Policy', 'bd-somani' ); ?></h1>
				<p class="legal-hero-subtitle"><?php esc_html_e( 'At B.D. Somani International School, Kharghar, we are committed to protecting your personal data and ensuring transparency in how information is collected, used, and safeguarded.', 'bd-somani' ); ?></p>
			</div>
		</section>

		<!-- Policy Content Card -->
		<section class="legal-content-section">
			<div class="legal-card">

				<!-- Section: Who We Are -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:buildings-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Who We Are', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'Our website address is:', 'bd-somani' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener"><?php echo esc_url( home_url( '/' ) ); ?></a></p>
						<p><?php esc_html_e( 'B.D. Somani International School, Kharghar is an educational institution dedicated to providing holistic, inquiry-based learning and fostering student well-being.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: Comments -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:chats-circle-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Comments', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.', 'bd-somani' ); ?></p>
						<p><?php esc_html_e( 'An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: ', 'bd-somani' ); ?><a href="https://automattic.com/privacy/" target="_blank" rel="nofollow noopener">https://automattic.com/privacy/</a>. <?php esc_html_e( 'After approval of your comment, your profile picture is visible to the public in the context of your comment.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: Media -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:image-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Media', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: Cookies -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:cookie-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Cookies', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.', 'bd-somani' ); ?></p>
						<p><?php esc_html_e( 'If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.', 'bd-somani' ); ?></p>
						<p><?php esc_html_e( 'When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.', 'bd-somani' ); ?></p>
						<p><?php esc_html_e( 'If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: Embedded Content -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:code-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Embedded Content from Other Websites', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'Articles and pages on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.', 'bd-somani' ); ?></p>
						<p><?php esc_html_e( 'These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: Who We Share Your Data With -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:share-network-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Who We Share Your Data With', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'If you request a password reset, your IP address will be included in the reset email. We do not sell or trade your personal data to third parties.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: How Long We Retain Your Data -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:clock-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'How Long We Retain Your Data', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.', 'bd-somani' ); ?></p>
						<p><?php esc_html_e( 'For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: What Rights You Have Over Your Data -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:user-focus-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'What Rights You Have Over Your Data', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Section: Where We Send Your Data -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:shield-check-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Where We Send Your Data', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'Visitor comments may be checked through an automated spam detection service.', 'bd-somani' ); ?></p>
					</div>
				</div>

				<!-- Contact / Inquiries Note -->
				<div class="legal-contact-footer">
					<p><strong><?php esc_html_e( 'Questions or Concerns?', 'bd-somani' ); ?></strong> <?php esc_html_e( 'If you have any questions regarding this Privacy Policy or data privacy at B.D. Somani International School, Kharghar, please contact us at', 'bd-somani' ); ?> <a href="mailto:info@bdsiskharghar.org">info@bdsiskharghar.org</a>.</p>
				</div>

			</div>
		</section>

	</div>
</main>

<?php
get_footer();
