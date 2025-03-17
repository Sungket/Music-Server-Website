$(document).ready(function() {
    // populate the front-end by reading in the uploads directory
    $.ajax({
        url: "../php/scanDirectory.php",
        type: "GET",
        success: function(result){
            alert(result);
        }
    })
})