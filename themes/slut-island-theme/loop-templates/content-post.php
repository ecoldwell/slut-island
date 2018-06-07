<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="entry-content">
		<section class="main-post-layout" id="location-content">
			<div class="post-text-content">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="post-text-content-body">
				 <p class="artist-link"><?php the_field('artist_link') ?> </p>
         <span> <?php the_content(); ?></span>
        </div>

			</div>
<!--       <div class="location-data-area">
        <em>content pending</em>
      </div> -->
			<!-- <div class="post-gallery-content slideshow">
				<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
				<?php if( $attachments->exist() ) : ?>
					<?php
					    $attachments_length = $attachments->total();
					    $className = "post-images";
					    if ($attachments_length > 1) {
					      $className = $className." multiple-images";
					    }
					  ?>

				  <ul class="post-images data-slick">
				    <?php while( $attachments->get() ) : ?>
				      <li class="post-images-image">
				        <img src= "<?php echo $attachments->src( 'lightbox' )  ?>" target="_blank" title="<?php echo $attachments->field( 'caption' ); ?>" rel="gallery" alt="">
				      </li>
				    <?php endwhile; ?>
				  </ul>
					<div class="slide-count-wrap">
         	<span class="left"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
           <span class="current"></span> /
           <span class="total"></span>
           <span class="right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
        </div>
				<?php endif; ?>
			</div> -->
		</section>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

