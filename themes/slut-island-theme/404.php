<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>
<div class="main-nav">
    <?php wp_nav_menu( array(
      'menu' => 'main-menu',
      'container' => false,
      'theme_location' => 'primary'
    )); ?>
</div>
<div class="wrapper" id="404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found entry-content">

						<header class="page-header">

						</header><!-- .page-header -->

						<div class="page-content">

							<h2 class="error"><?php esc_html_e( 'Page not found.',
							'understrap' ); ?></h2>

							<div class="search">

							<?php get_search_form(); ?>
							</div>



						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
