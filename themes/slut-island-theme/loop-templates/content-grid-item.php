<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<li class="grid-item location" id="post-<?php the_ID(); ?>">
	<?php

		$post_image = get_the_post_thumbnail( $post->ID, 'large' );

	?>
	<a href="<?php the_permalink(); ?>">

		<div class="grid-item-image-wrap">
			<?php if ($post_image) {
				echo get_the_post_thumbnail( $post->ID, 'large' );
			} else {
				$attachments = new Attachments( 'attachments', $post->ID );
				if( $attachments->exist()) {
					$attachment = $attachments->get();

					$img_src = wp_get_attachment_image_url( $attachment->id, 'medium' );
					$img_srcset = wp_get_attachment_image_srcset( $attachment->id, 'medium' );

				  echo '<img src="' . $img_src . '" srcset="'. $img_srcset . '" sizes="(max-width: 800px) 95vw, 60vw">';
				} else {
					echo "<img />";
				}
			} ?>
		</div>
		<div class="grid-text">
		<?php the_title( sprintf( '<div class="grid-item-title">', esc_url( get_permalink() ) ),
			'</div>' ); ?>
			<div class="event-description">
             <?php the_content(); ?>
           </div>
           </div>
	</a>


</li>
