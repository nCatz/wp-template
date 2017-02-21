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

    $('input#submit').addClass('btn');
    
  });
})(jQuery);
function shareBlog() {
  $('#modal-share').modal('open');
  
}