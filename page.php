<?php
/**
 * The template for displaying all pages.
 */

if ( is_page( 'about' ) || is_page( 'about-us' ) || is_page_template( 'page-about.php' ) ) {
	include get_template_directory() . '/page-about.php';
	return;
}

if ( is_page( 'faq' ) || is_page( 'faqs' ) || is_page_template( 'page-faq.php' ) ) {
	include get_template_directory() . '/page-faq.php';
	return;
}

if ( is_page( 'approach' ) || is_page( 'our-approach' ) || is_page_template( 'page-approach.php' ) ) {
	include get_template_directory() . '/page-approach.php';
	return;
}

if ( is_page( 'academics' ) || is_page_template( 'page-academics.php' ) ) {
	include get_template_directory() . '/page-academics.php';
	return;
}


get_header();
?>

<main class="site-main site-container py-xl">
	<?php
	while ( have_posts() ) :
		the_post();
		echo '<h1>' . get_the_title() . '</h1>';
		the_content();
	endwhile;
	?>
</main>

<?php
get_footer();
