function playTrack(path) {
    //play the loaded track
    // $.ajax({
    //     URL: '../index.php',
    //     success: function(path) {
    //         console.log(path);
    //         const curr_track = new Audio(path);
    //         curr_track.play();
    //     }
    // })
    console.log(path);
    const curr_track = new Audio(path);
    curr_track.play();

}