<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

      <?php

        $args = array(
          'name'        => 'our-story',
          'post_type'   => 'page',
          'post_status' => 'publish',
          'numberposts' => 1
        );
        $story_posts = get_posts($args);

        if ( $story_posts ) :
          $story_post = $story_posts[0];
        endif
      ?>

      <?php if ($story_post) { ?>
        <section class="our-story">
          <h2><?php echo $story_post->post_title ?></h2>
          <?php echo $story_post->post_content; ?>
        </section>
      <?php } ?>


<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12 footer-home">

				<footer class="site-footer" id="colophon">

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>
</html>

