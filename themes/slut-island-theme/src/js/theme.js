var introSlides = function () {
  $(".intro-slide").click(function (event){
    $slide = $(event.currentTarget);
    $('html, body').animate({scrollTop: $slide.outerHeight()}, 400);
  })

  if ($(".intro-slide").first().hasClass("homepage-intro-slide") && document.referrer.indexOf(window.location.origin) === 0) {
    $('html, body').scrollTop($(".intro-slide").first().outerHeight());
  }
}

$( document ).ready(function() {
  if ($(".intro-slide").length) {
    introSlides()
  }

});
