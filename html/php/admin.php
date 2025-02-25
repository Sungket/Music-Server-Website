<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <h1>Welcome, Admin</h1>
    <body>
        <form method="post" action="admin.php">
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname"><br>
            <label for="pword">Password:</label><br>
            <input type="text" id="pword" name="pword"><br><br>
            <input type="submit" value="Submit" class="loginBtn" name="login">
        </form>
    </body>

</html>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1); // set second param to zero once development finished

    function customErrorHandler($errno, $errstr, $errfile, $errline) {
        echo "Error: [$errno] $errstr - $errfile:$errline";
    }

    set_error_handler("customErrorHandler");

    $executionStartTime = microtime(true);

    if (isset($_POST['login'])) {
        $username = $_POST['uname'];
        $password = $_POST['pword'];
    }

    $conn = new mysqli();
    
?>