<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1); // set second param to zero once development finished
    
    require('config.php');


    class TestUpload extends Dbh{
        //run the query to save the track in the database
        public function saveToDb($trackName, $length, $genre, $filepath) {
            //Use prepared statements to prevent SQL injection
            $stmt = $this->connect()->prepare('INSERT INTO tracks (title, length, genre, filepath) 
            VALUES (?, ?, ?, ?)');
            $stmt->execute([$trackName, $length, $genre, $filepath]);
        }
    }

    //Data from form submission
    if (isset($_POST['submit'])) {
        //Get the submitted form data
        $trackName = preg_replace('/ /i', '_', $_POST['title']);
        //$trackName = preg_replace('/ /i', )$_POST['title'];
        $genre = $_POST['genre'];
        $image = $_FILES['image'];
        //$file = see below
        



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



        $fileName = $_FILES['file']['name']; //this is only used to extract the file extension
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
                    //$fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileNameNew = $trackName . "." . $fileActualExt;
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

    $file = $fileDestination;

    //Save the track name, genre and location in the database
    $trackObj = new TestUpload();
    $trackObj->saveToDb($trackName, "5.23", $genre, $file);
?>