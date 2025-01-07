jQuery(document).ready(function($) {

  // Responsive sidebar toggle

  const $button  = document.querySelector('#sidebar-toggle');

  const $wrapper = document.querySelector('#wrapper');



  // *** PLAY MUSIC ON HOMEPAGE

  var icon = $('.play');

  var audioFilePath = 'wp-content/themes/kellyconnell/audio/';

  var nameOfSong = 'andante_et_rondo_op._25__ii._rondo_2.mp3'; 

  var sound = new Howl({
    src: [audioFilePath + nameOfSong],
    autoplay: true
  });

  

  icon.click(function() {

    icon.hasClass('active') ?  sound.pause() : sound.play();

    icon.toggleClass('active');

  });

  // hamburger menu

  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        $('.sidebar').toggleClass('active');
        $('#wrapper').toggleClass('active');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        $('.sidebar').toggleClass('active');
        $('#wrapper').toggleClass('active');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  

});
