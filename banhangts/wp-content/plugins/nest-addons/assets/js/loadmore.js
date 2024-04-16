jQuery(function($) {

    "use strict";

 
    $('body').on('click', '.loadmoreproduct .woocommerce-pagination  a', function(e) {
      e.preventDefault();
      if ($(this).data('requestRunning')) {
        return;
      }
  
      $(this).data('requestRunning', true);
  
      var $ser_post_list = $('ul.products'),
          $paginationser = $(this).parents('.loadmoreproduct .woocommerce-pagination'),
          $parent = $(this).parent();
  
      $parent.addClass('loader');
  
      $.ajax({
        url: $(this).attr('href'),
        type: 'GET',
        dataType: 'html',
        success: function(response) {
          var $contentser = $(response).find('ul.products').children('.product'),
              ser_pagination = $(response).find('.loadmoreproduct .woocommerce-pagination').html();
  
          $paginationser.html(ser_pagination);
          $ser_post_list.append($contentser);
  
          $contentser.imagesLoaded(function () {
            $contentser;
            $paginationser.find('.next').data('requestRunning', false);
            $parent.removeClass('loader');
            $parent.addClass('donefinish');
          });
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error: ' + errorThrown);
        }
      });
    });

  
});