(function ($) {
  $(function () {

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

    var $container = $('#masonry-blog');
    // initialize
    $container.masonry({
      columnWidth: '.col',
      itemSelector: '.col',
    });
    
  });
})(jQuery);
function shareBlog() {
  $('#modal-share').modal('open');
  
}