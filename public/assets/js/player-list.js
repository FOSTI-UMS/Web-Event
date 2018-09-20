// This Javascript Made By HematMedia::
// Team : - Bintang Citra Kusumaatmaja, Anas Setiawan.s
$(document).ready(function(){
 	var song;
    var tracker = $('#handle');
    var fillBar = document.getElementById("fill");

    function initAudio(elem, autoplay=null) {
        var url = elem.attr('audiourl');
        $(".download").prop("href", url);
        song = new Audio(url);
        song.addEventListener('timeupdate',function(){ 
            var position = song.currentTime / song.duration; 
            // fillBar.style.width = position * 100 +'%';
            fillBar.slider('value', position);
        });
        $('#list #select-music').removeClass('active');
        elem.addClass('active');

        if (autoplay==1) {
            playAudio();
        }
        
    }


    initAudio($('#list #select-music:first-child'));


    function playAudio() {
        song.play();
        $('#play').addClass('hidden');
        $('#stop').removeClass('hidden');
    }

    function stopAudio() {
        song.pause();
        $('#stop').addClass('hidden');
        $('#play').removeClass('hidden');
    }

 	$('#play').click(function(e){
        e.preventDefault();
        playAudio();
    });


    $('#next').click(function(e){
        e.preventDefault();
        stopAudio();
        var next = $('#list #select-music.active').next();
        if (next.length == 0) {
            next = $('#list #select-music:first-child');
        }
        initAudio(next, autoplay=1);
    });

    $('#prev').click(function(e){
        e.preventDefault();
        stopAudio();
        var next = $('#list #select-music.active').prev();
        if (next.length == 0) {
            next = $('#list #select-music:last-child');
        }
        initAudio(next);
    });

    $('#stop').click(function(e){
        e.preventDefault();
        stopAudio();
    });

    $('#list #select-music').click(function () {
        stopAudio();
        initAudio($(this), autoplay=1);
    });

    fillBar.slider({
        range: 'min'
        , min: 0
        , max: 10
        , start: function (event, ui) {}
        , slide: function (event, ui) {
            song.currentTime = ui.value;
        }
        , stop: function (event, ui) {}
    });
}); 