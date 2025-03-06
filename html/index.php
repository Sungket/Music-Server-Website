<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <title>Raj's Music App</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h1>Raj's Music App</h1>
      </div>
      <div class="row">
        <div class="col-3">
          <p>Options</p>
          <p>List here of options</p>
          <ul class="list-group">
            <li class="list-group-item">About</li>
            <li class="list-group-item">Contact</li>
            <?php
              if (isset($_SESSION["admin"])) {
                echo"<li class='list-group-item'>
                <a href='php/logout.php'>Logout</a></li>";
                echo"<li class='list-group-item'>
                <a href='upload.html'>Upload</a></li>";
              } else {
                echo "<li class='list-group-item'>
                <a href='php/admin.php'>Admin</a></li>";
              }
            ?>

          </ul>
        </div>
        <div class="col-6">
          <p>Main</p>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Track title</h5>
              <p class="card-text">The app needs to be able to dynamically add and remove cards</p>
              <a href="#" class="btn btn-primary">Select</a>
            </div>
          </div>
        </div>
        <?php
          if (isset($_SESSION["admin"])) {
            echo"
            <div class='card' style='width: 18rem;'>
              <img class='card-img-top' src='.../100px180/' alt='Card image cap'>
              <div class='card-body'>
                <h5 class='card-title'>Track title</h5>
                <p class='card-text'>The app needs to be able to dynamically add and remove cards</p>
                <a href='#' class='btn btn-primary'>Select</a>
              </div>
            </div>
            ";
          }
        ?>
        <div class="col-3">
          <p>Media Player</p>
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">Rewind</button>
            <button type="button" class="btn btn-secondary">Pause</button>
            <button type="button" class="btn btn-secondary">Play</button>
            <button type="button" class="btn btn-secondary">Stop</button>
            <button type="button" class="btn btn-secondary">FF</button>
          </div>
        </div>
      </div>
    </div>


  </body>

</html>