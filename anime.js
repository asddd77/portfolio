$('.btn_nav').click(function() {
  // animate content
  $('.page_style').addClass('animate_content');
  $('.page_description').fadeOut(100).delay(2800).fadeIn();

  setTimeout(function() {
    $('.page_style').removeClass('animate_content');
  }, 3200);

  //remove fadeIn class after 1500ms
  setTimeout(function() {
    $('.page_style').removeClass('fadeIn');
  }, 1500);

});

// on click show page after 1500ms
$('.home_btn').click(function() {
  setTimeout(function() {
    $('.home').addClass('fadeIn');
  }, 1500);
});

$('.about_btn').click(function() {
  setTimeout(function() {
    $('.about').addClass('fadeIn');
  }, 1500);
});

$('.contents_btn').click(function() {
  setTimeout(function() {
    $('.contents').addClass('fadeIn');
  }, 1500);
});
