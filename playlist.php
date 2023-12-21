<audio id="song-1" preload class="songs">
    <source src="images/start.mp3" type="audio/mpeg" />
</audio>
<audio id="song-2" preload class="songs">
    <source src="images/2.mp3" type="audio/mpeg" />
</audio>
<audio id="song-3" preload class="songs">
    <source src="images/3.mp3" type="audio/mpeg" />
</audio>
<audio id="song-4" preload class="songs">
    <source src="images/4.mp3" type="audio/mpeg" />
</audio> 
<audio id="song-4" preload class="songs">
    <source src="images/end.mp3" type="audio/mpeg" />
</audio> 
<audio id="song-4" preload class="songs">
    <source src="images/1.mp3" type="audio/mpeg" />
</audio> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function (){
var audioArray = document.getElementsByClassName('songs');
var i = 0;
audioArray[i].play();
for (i = 0; i < audioArray.length - 1; ++i) {
    audioArray[i].addEventListener('ended', function(e){
        var currentSong = e.target;
        var next = $(currentSong).nextAll('audio');
        if (next.length) $(next[0]).trigger('play');
    });
}
});
</script>