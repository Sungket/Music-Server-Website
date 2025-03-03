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
    include("config.php");

    error_reporting(E_ALL);
    ini_set('display_errors', 1); // set second param to zero once development finished

    $conn = new mysqli($cd_host, $cd_user, $cd_password, $cd_dbname, $cd_port, $cd_socket);

    // function customErrorHandler($errno, $errstr, $errfile, $errline) {
    //     echo "Error: [$errno] $errstr - $errfile:$errline";
    // }

    // set_error_handler("customErrorHandler");

    $executionStartTime = microtime(true);

    if (mysqli_connect_errno()) {
        mysqli_close($conn);

        exit;
    }

    if (isset($_POST['login'])) {
        $username = $_POST['uname'];
        $password = $_POST['pword'];

        $query = $conn->prepare("SELECT username, password 
                                 FROM admin 
                                 WHERE username = ? AND password = ?");

        $query->bind_param("ss", $username, $password);

        $query->execute();

        $result = $query->get_result(); //result is an object, it cannot be true or false

    } 

    if ($result->num_rows === 0) {
        echo "Wrong password";
    }


    // var_dump($result);
    
?>