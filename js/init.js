(function ($) {
  $(function () {

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.grid-blog').masonry({
      // options...
      itemSelector: '.grid-blog-item',
      columnWidth: 200
    });
    $('.modal').modal();
  });
})(jQuery);
function shareBlog() {
  $('#modal-share').modal('open');
  
}