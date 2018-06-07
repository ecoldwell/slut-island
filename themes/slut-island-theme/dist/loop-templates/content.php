<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<a href="<?php the_permalink(); ?>">
	<div class="entry-content">
	<div class="single-cat">
	<div class="hover-overlay">
		<div class="grid-item"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></div>
		</div>
			
			<?php the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ),
			'</h2>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

			<?php endif; ?>
		
		
	</div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	</a>


	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
