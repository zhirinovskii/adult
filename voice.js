var voice=document.getElementById("voice");
function toggleMute() {

    var video=document.getElementById("movie1");

    if(video.muted){
        video.muted = false;
    } else {
        video.muted = true;
        video.play()
    }

}

voice.addEventListener('click',function(){
toggleMute();
})