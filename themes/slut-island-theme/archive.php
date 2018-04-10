<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'main-nav-with-dropdowns', 'none' ); ?>


<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<?php
						//the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<ul class="grid">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content-grid-item' ); ?>
					<?php endwhile; ?>

					</ul><!-- .grid -->

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->


			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->
<?php get_footer(); ?>
