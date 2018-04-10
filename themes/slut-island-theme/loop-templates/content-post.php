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
				<?php the_content(); ?>
				<a class="single-post-storage" href="#">Add</a>
			</div>
			<div class="post-gallery-content slideshow">
				<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
				<?php if( $attachments->exist() ) : ?>
					<?php
					    $attachments_length = $attachments->total();
					    $className = "post-images";
					    if ($attachments_length > 1) {
					      $className = $className." multiple-images";
					    }
					  ?>

				  <ul class="post-images data-slick product-photos">
				    <?php while( $attachments->get() ) : ?>
				      <li class="post-images-image">
				        <img src= "<?php echo $attachments->src( 'lightbox' )  ?>" target="_blank" title="<?php echo $attachments->field( 'caption' ); ?>" rel="gallery" alt="">
				         <div class="slide-count-wrap">
				         	<span class="left"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
				           <span class="current"></span> /
				           <span class="total"></span>
				           <span class="right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
				        </div>
				      </li>
				    <?php endwhile; ?>
				  </ul>
				<?php endif; ?>
			</div>
		</section>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
<script>
$(document).ready(function() {
    $('.data-slick').each(function() {
        if ( $(this).children().length <= 1 )
            $(this).parent().find('.slide-count-wrap').hide();
    });
});

var $gallery = $('.data-slick');
var slideCount = null;

	$(function(){
		$gallery.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 250,
        fade: true,
        cssEase: 'linear',
        swipe: true,
        swipeToSlide: true,
        arrows: false,
        touchThreshold: 10,
        focusOnSelect: true
    	});
	});
	$gallery.on('init', function(event, slick){
	  slideCount = slick.slideCount;
	  setSlideCount();
	  setCurrentSlideNumber(slick.currentSlide);
	});

	$gallery.on('beforeChange', function(event, slick, currentSlide, nextSlide){
	  setCurrentSlideNumber(nextSlide);
	});

	function setSlideCount() {
	  var $el = $('.slide-count-wrap').find('.total');
	  $el.text(slideCount);
	}

	function setCurrentSlideNumber(currentSlide) {
	  var $el = $('.slide-count-wrap').find('.current');
	  $el.text(currentSlide + 1);
	}
	$('.left').click(function(){
	  $('.data-slick').slick('slickPrev');
	})

	$('.right').click(function(){
	  $('.data-slick').slick('slickNext');
	})

	$('.data-slick').click(function() {
	  $gallery.slick('slickGoTo', parseInt($gallery.slick('slickCurrentSlide'))+1);
	});
	$('.hero-landing-location-page').on('click', function (e){
		$.smoothScroll({
			scrollTarget: '.whole-content'
		});
	});
	jQuery(document).ready(function($) {
		$(".single-post-storage").on('click', function(){
        alert( my_script_vars.postID );
        // console.log(my_script_vars.postID);
			
		});
});

</script>
