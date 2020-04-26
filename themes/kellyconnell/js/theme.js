jQuery(document).ready(function($) {
  // Responsive sidebar toggle
  const $button  = document.querySelector('#sidebar-toggle');
  const $wrapper = document.querySelector('#wrapper');

  // *** PLAY MUSIC ON HOMEPAGE
  var icon = $('.play');
  var audioFilePath = 'wp-content/themes/kellyconnell/audio/';
  var nameOfSong = 'andante_et_rondo_op._25__ii._rondo_2.mp3'; 
  var sound = new Howl({
    src: [audioFilePath + nameOfSong]
  });
  
  icon.click(function() {
    icon.hasClass('active') ?  sound.pause() : sound.play();
    icon.toggleClass('active');
  });

});

