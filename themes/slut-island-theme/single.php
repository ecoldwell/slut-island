
<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
<?php if( $attachments->exist() ) : ?>
<?php
    $attachments_length = $attachments->total();
    $className = "post-images";
    if ($attachments_length > 1) {
      $className = $className." multiple-images";
    }
  ?>
<div class="intro-slide location-intro-slide">
  <ul class="post-images slideshow">
    <?php while( $attachments->get() ) : ?>
    	<?php
      		$introImagesrc = wp_get_attachment_image_url( $attachments->id(), 'medium' );
					$introImagesrcset = wp_get_attachment_image_srcset( $attachments->id(), 'medium' );
			?>
      <img src= "<?php echo $introImagesrc  ?>" target="_blank" srcset="<?php echo $introImagesrcset ?>" sizes="100vw" title="<?php echo $attachments->field( 'caption' ); ?>" rel="gallery" alt="">
    <?php endwhile; ?>
  </ul>
  <?php if ($attachments_length > 1) { ?>
  	<a class="location-intro-slide-control forwards">→</a>
  	<a class="location-intro-slide-control backwards">←</a>
  <?php } ?>
  <a class="location-intro-skip">↓</a>
</div>
<?php endif; ?>

<?php

$images = get_field('gallery');

if( $images ): ?>
    <div class="intro-slide location-intro-slide gallery">
    <ul class="post-images slideshow">
        <?php foreach( $images as $image ): ?>
            <img src="<?php echo $image['url']; ?>" />
        <?php endforeach; ?>
      
    </ul>
    <a class="location-intro-slide-control forwards">→</a>
    </div>
<?php endif; ?>

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

<script>
  $('.forwards').click(function(){
    $('.slideshow').slick('slickNext');
  })
</script>
