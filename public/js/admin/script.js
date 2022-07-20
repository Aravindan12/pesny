$( document ).ready(function() {
  console.log('script loaded');
  $('.roles_down_arrow').toggle( 'blind' );
});

// Roles show permission animation
$('.roles_card_heading').hover(function(){
  $(this).children().toggle( 'blind' );
});


