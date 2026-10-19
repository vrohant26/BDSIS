<?php
/**
 * Template Part: Brand Values Marquee Banner Component
 *
 * @package BD_Somani
 */

$items = isset( $args['items'] ) && is_array( $args['items'] ) && ! empty( $args['items'] )
	? $args['items']
	: array(
		__( 'STUDENT-CENTRED LEARNING', 'bd-somani' ),
		__( 'GLOBAL OUTLOOK', 'bd-somani' ),
		__( 'NURTURING ENVIRONMENT', 'bd-somani' ),
		__( 'COLLABORATIVE CULTURE', 'bd-somani' ),
	);

$aria_label = isset( $args['aria_label'] ) && ! empty( $args['aria_label'] )
	? $args['aria_label']
	: __( 'Brand values marquee', 'bd-somani' );
?>

<!-- Brand Marquee Banner Component -->
<section class="academics-marquee-section" aria-label="<?php echo esc_attr( $aria_label ); ?>">
	<div class="marquee-track">
		<div class="marquee-content academics-marquee-content">
			<?php foreach ( $items as $item ) : ?>
				<span><?php echo esc_html( $item ); ?></span>
				<span class="marquee-star">★</span>
			<?php endforeach; ?>
		</div>
		<div class="marquee-content academics-marquee-content" aria-hidden="true">
			<?php foreach ( $items as $item ) : ?>
				<span><?php echo esc_html( $item ); ?></span>
				<span class="marquee-star">★</span>
			<?php endforeach; ?>
		</div>
	</div>
</section>
