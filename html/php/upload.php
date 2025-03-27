<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1); // set second param to zero once development finished

    require('Track.php');

    if (isset($_POST['submit'])) {
        //Get the submitted form data
        $trackName = $_POST['title'];
        $genre = $_POST['genre'];
        $image = $_FILES['image'];
        $file = $_FILES['file']; 

        //create a new Track object
        $track = new Track(trackTitle:$trackName, picture:$image, genre:$genre);

        //run the query to save the track in the database
        $stmt = $pdo->query('INSERT INTO tracks (title, genre, filepath')

        //Get the data from the image file
        $imgName = $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        $imgError = $_FILES['image']['error'];
        $imgType = $_FILES['image']['type'];

        $imgExt = explode('.', $imgName);
        $imgActualExt = strtolower(end($imgExt));

        $imgAllowed = array('jpg', 'jpeg', 'png', 'gif', 'tiff');

        if (in_array($imgActualExt, $imgAllowed)) {
            if ($imgError === 0) {
                if ($imgSize < 5000000) {
                    $imgNameNew = uniqid('', true) . "." . $imgActualExt;
                    $imgDestination = '../uploads/' . $imgNameNew;
                    move_uploaded_file($imgTmpName, $imgDestination);
                    header("Location: ../index.php?uploadsuccess");
                } else {
                    echo "File is too large";
                }
            } else {
                echo "There was an error uploading your image";
            }
        } else {
            echo "Can only upload image format";
        }



        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('mp3');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: ../index.php?uploadsuccess");
                } else {
                    echo "File is too large";
                }
            } else {
                echo "There was an error uploading your file";
            }
        } else {
            echo "Can only upload .mp3 format";
        }
    } else {
        echo "something went wrong";
    }
?>