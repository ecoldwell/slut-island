<?php get_header();  ?>
  <?php if (get_theme_mod('understrap_intro_image')) { ?>
    <div class="intro-slide homepage-intro-slide">
      <div class="intro-slide-image" style="background-image:url('<?php echo get_theme_mod('understrap_intro_image') ?>')"></div>
    </div>
  <?php get_template_part( 'main-nav' ); ?>
  <?php } ?>

<?php get_footer() ?>
