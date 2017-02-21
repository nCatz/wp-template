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
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
})(jQuery);
function shareBlog() {
  $('#modal-share').modal('open');
  
}