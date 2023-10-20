Amplitude.init({
    "bindings": {
      37: 'prev',
      39: 'next',
      32: 'play_pause'
    },
    "songs": [
      {
        "name": "quest?onmarc",
        "artist": "Live from Life Coach NY",
        "url": "https://res.cloudinary.com/dsnca11er/video/upload/v1555522250/Common_-_Be_Intro.mp3",
      },
      // {
      //   "name": "Ensemble Entendu",
      //   "artist": "Live from Life Coach NY",
      //   "url": "songs/ensemble.mp3",
      // },
    ]
  });

  window.onkeydown = function(e) {
      return !(e.keyCode == 32);
  };

  document.getElementById('song-played-progress').addEventListener('click', function( e ){
    var offset = this.getBoundingClientRect();
    var x = e.pageX - offset.left;

    Amplitude.setSongPlayedPercentage( ( parseFloat( x ) / parseFloat( this.offsetWidth) ) * 100 );
  });