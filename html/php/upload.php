<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Upload Page</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <h1>Upload your song</h1>
    <body>
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <input type="file" id="file" name="file"><br>
            <button type="submit" name="submit">Upload</button>
        </form>
    </body>

</html> -->

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1); // set second param to zero once development finished

    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        print_r($file);

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
        echo "something wrong";
    }
?>