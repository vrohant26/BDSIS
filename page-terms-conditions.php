<?php
/**
 * Template Name: Terms & Conditions Page
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
			<span class="breadcrumb-current"><?php esc_html_e( 'Terms & Conditions', 'bd-somani' ); ?></span>
		</nav>

		<!-- Hero Section -->
		<section class="legal-hero-section">
			<div class="legal-hero-content text-center">
				<span class="legal-badge"><?php esc_html_e( 'ACADEMIC POLICIES & FEES', 'bd-somani' ); ?></span>
				<h1 class="legal-hero-title"><?php esc_html_e( 'Terms & Conditions', 'bd-somani' ); ?></h1>
				<p class="legal-hero-subtitle"><?php esc_html_e( 'Fee structure, admission guidelines, and administrative policies for B.D. Somani International School, Kharghar.', 'bd-somani' ); ?></p>
			</div>
		</section>

		<!-- Main Content Card -->
		<section class="legal-content-section">
			<div class="legal-card">

				<!-- Academic Fees Table Block -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:currency-inr-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Academic Fees for the Year 2024-25', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-table-wrapper" style="overflow-x: auto; margin-top: 1.25rem;">
						<table class="legal-table" style="width: 100%; border-collapse: collapse; text-align: left;">
							<thead>
								<tr style="background-color: var(--clr-primary-purple, #49274A); color: #FFFFFF;">
									<th style="padding: 14px 18px; font-family: var(--font-heading); font-weight: 700; border-top-left-radius: 12px;"><?php esc_html_e( 'Grade', 'bd-somani' ); ?></th>
									<th style="padding: 14px 18px; font-family: var(--font-heading); font-weight: 700;"><?php esc_html_e( 'One-time Registration Fees', 'bd-somani' ); ?></th>
									<th style="padding: 14px 18px; font-family: var(--font-heading); font-weight: 700;"><?php esc_html_e( 'One-time Admission Fees', 'bd-somani' ); ?></th>
									<th style="padding: 14px 18px; font-family: var(--font-heading); font-weight: 700; border-top-right-radius: 12px;"><?php esc_html_e( 'Academic Fees (AY 2024-25)', 'bd-somani' ); ?></th>
								</tr>
							</thead>
							<tbody style="background-color: #FFFFFF; font-family: var(--font-body); font-size: 0.98rem; color: #333333;">
								<tr style="border-bottom: 1px solid #EAE2D8;">
									<td style="padding: 14px 18px; font-weight: 600;">Play Group</td>
									<td style="padding: 14px 18px;">₹2,000.00</td>
									<td style="padding: 14px 18px;">₹25,000.00</td>
									<td style="padding: 14px 18px; font-weight: 700; color: var(--clr-primary-purple, #49274A);">₹1,75,000.00</td>
								</tr>
								<tr style="border-bottom: 1px solid #EAE2D8; background-color: #FAF8F5;">
									<td style="padding: 14px 18px; font-weight: 600;">Nursery to Sr. KG</td>
									<td style="padding: 14px 18px;">₹2,000.00</td>
									<td style="padding: 14px 18px;">₹50,000.00</td>
									<td style="padding: 14px 18px; font-weight: 700; color: var(--clr-primary-purple, #49274A);">₹1,93,500.00</td>
								</tr>
								<tr style="border-bottom: 1px solid #EAE2D8;">
									<td style="padding: 14px 18px; font-weight: 600;">Grade 1 to 5</td>
									<td style="padding: 14px 18px;">₹2,000.00</td>
									<td style="padding: 14px 18px;">₹50,000.00</td>
									<td style="padding: 14px 18px; font-weight: 700; color: var(--clr-primary-purple, #49274A);">₹2,36,500.00</td>
								</tr>
								<tr style="background-color: #FAF8F5;">
									<td style="padding: 14px 18px; font-weight: 600;">Grade 6 to 8</td>
									<td style="padding: 14px 18px;">₹2,000.00</td>
									<td style="padding: 14px 18px;">₹50,000.00</td>
									<td style="padding: 14px 18px; font-weight: 700; color: var(--clr-primary-purple, #49274A);">₹2,50,000.00</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Fee Structure & Slabs -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:receipt-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'School Fee Structure & Slabs', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'Our fee structure is divided into slabs, with revisions occurring at specific grade transitions:', 'bd-somani' ); ?></p>
						<ul style="margin-bottom: 1rem; padding-left: 1.5rem; line-height: 1.8;">
							<li>Play Group to Nursery</li>
							<li>Sr. KG to Grade 1</li>
							<li>Grade 5 to Grade 6</li>
							<li>Grade 8</li>
						</ul>
						<p><strong><?php esc_html_e( 'When a student transitions to a new slab, the applicable academic fee structure for that particular slab will be applicable.', 'bd-somani' ); ?></strong></p>
						<p><?php esc_html_e( 'In addition to slab-based revisions, the school implements an annual fee increase ranging from ', 'bd-somani' ); ?><strong>7.5% to 10%</strong>.</p>
					</div>
				</div>

				<!-- Additional Fees -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:bus-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Additional Fees & Expenses', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'The following expenses are not included in tuition fees and must be paid separately as required:', 'bd-somani' ); ?></p>
						<ul style="padding-left: 1.5rem; line-height: 1.8;">
							<li>Transportation</li>
							<li>Uniforms</li>
							<li>Books and Learning Materials</li>
							<li>Overnight Educational Trips</li>
							<li>Canteen & Dining Services</li>
						</ul>
					</div>
				</div>

				<!-- Admission Fees Policy -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:student-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Admission Fees Policy', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'Upon accepting admission at B.D. Somani International School, the admission fee must be paid along with the first instalment as specified in the Admission Offer Letter. Subsequent academic fee payments are due in June, September, and December.', 'bd-somani' ); ?></p>
						<ul style="padding-left: 1.5rem; line-height: 1.8;">
							<li>A <strong>one-time, non-refundable Application Fee of ₹2,000</strong> must be submitted along with the printed application form. This initiates the admission process but does not guarantee acceptance.</li>
							<li>A <strong>one-time, non-refundable Admission Fee</strong> is payable upon acceptance:
								<ul>
									<li><strong>₹25,000</strong> for Play Group</li>
									<li><strong>₹50,000</strong> for Nursery to Grade 7</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>

				<!-- Refund Policy -->
				<div class="legal-block">
					<div class="legal-block-header flex align-center gap-xs">
						<iconify-icon icon="ph:hand-coins-bold" class="legal-icon"></iconify-icon>
						<h2 class="legal-block-title"><?php esc_html_e( 'Refund Policy', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><?php esc_html_e( 'The school does not have a general fee refund policy. However, in case of withdrawal due to relocation, the following procedure applies:', 'bd-somani' ); ?></p>
						<ol style="padding-left: 1.5rem; line-height: 1.8;">
							<li>A written request stating the reason for withdrawal must be submitted to the Principal.</li>
							<li>Refunds may be considered if a valid reason for cancellation is provided.</li>
							<li>Supporting <strong>documentary evidence</strong> justifying the transfer must be submitted.</li>
							<li>The school holds the <strong>final authority</strong> on whether to approve the cancellation and refund.</li>
							<li>If a refund is approved, the following terms apply:
								<ul>
									<li>The <strong>admission fee is non-refundable</strong>.</li>
									<li>Withdrawal applications must be submitted <strong>by March 15, 2025</strong>. Applications received after this date will not be eligible for a refund.</li>
									<li>If the withdrawal is approved before <strong>March 15, 2025</strong>, the <strong>full first installment</strong> will be refunded.</li>
									<li>The refund process requires a <strong>minimum of 45 days</strong> for completion.</li>
								</ul>
							</li>
						</ol>
					</div>
				</div>

				<!-- Transparent Admission Policy Notice -->
				<div class="legal-notice-block" style="background: #FFF5F5; border-left: 4px solid #D9534F; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
					<div class="legal-block-header flex gap-xs align-center" style="margin-bottom: 10px;">
						<iconify-icon icon="ph:warning-circle-bold" class="legal-icon" style="color: #D9534F;"></iconify-icon>
						<h2 class="legal-block-title" style="color: #D9534F;"><?php esc_html_e( 'Important Notice: Transparent Admission Policy', 'bd-somani' ); ?></h2>
					</div>
					<div class="legal-block-body">
						<p><strong>B.D. Somani International School strictly does not accept donations for admissions.</strong> <?php esc_html_e( 'We uphold a transparent and merit-based admission process. If you encounter any request for a donation in exchange for admission, please report the incident immediately to', 'bd-somani' ); ?> <a href="mailto:info@bdsiskharghar.org" style="color: #D9534F; font-weight: 700;">info@bdsiskharghar.org</a>.</p>
					</div>
				</div>

				<!-- Contact / Inquiries Note -->
				<div class="legal-contact-footer">
					<p><strong><?php esc_html_e( 'Have questions regarding fee structure or terms?', 'bd-somani' ); ?></strong> <?php esc_html_e( 'Please get in touch with our admissions desk at', 'bd-somani' ); ?> <a href="mailto:info@bdsiskharghar.org">info@bdsiskharghar.org</a> <?php esc_html_e( 'or call', 'bd-somani' ); ?> <a href="tel:+912268066697">+91 22 68066697</a>.</p>
				</div>

			</div>
		</section>

	</div>
</main>

<?php
get_footer();
