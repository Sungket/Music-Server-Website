$(document).ready(function() {
    // populate the front-end by reading in the uploads directory

})

let curr_track = document.createElement("audio");

let playTrack = document.getElementById("playTrack");

function playTrack() {
    //play the loaded track
    let audio = new Audio("../uploads/Hello_World.mp3");
    audio.play();
}

playTrack.addEventListener("click", playTrack);