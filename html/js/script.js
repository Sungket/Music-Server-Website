//let playTrack = document.getElementById("playTrack");
//let curr_track = document.createElement("audio");
//curr_track.setAttribute("src", "uploads/Hello_World.mp3");
//curr_track.src = "../uploads/Hello_World.mp3";
//curr_track.load();

function playTrack() {
    //play the loaded track
    const curr_track = new Audio("../uploads/Hello_World.mp3");
    curr_track.play();
}



//playTrack.addEventListener("click", playTrack);