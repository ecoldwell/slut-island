<?php

	$post_image = get_the_post_thumbnail( $post->ID, 'large' );

?>
<div class="intro-slide homepage-intro-slide">
		<?php
			if (get_post_thumbnail_id($post->ID)) {
				$introImageId = get_post_thumbnail_id($post->ID);
			} else {
				$attachments = new Attachments( 'attachments', $post->ID );
				if( $attachments->exist()) {
					$introImageId = $attachments->get()->ID;
				}
			}

			if ($introImageId) {
				$introImagesrc = wp_get_attachment_image_url( $introImageId, 'medium' );
				$introImagesrcset = wp_get_attachment_image_srcset( $introImageId, 'medium' );
			}

			if ($introImageId) {
			  echo '<img class="intro-slide-image" src="' . $introImagesrc . '" srcset="'. $introImagesrcset . '" sizes="100vw">';
			}
	?>
</div>
<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'main-nav', 'none' ); ?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'post' ); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
