<?php
session_start();

// the state says where to go
//
// states possible:
// home ->home.php
// login -> login.php
// overview -> overview.php

$state = "";

// Test if the user is logged in.
// If no : back to the login page!
if(!isset($_SESSION['state'])){
  $state = "home";
}
else {
  $state = $_SESSION['state'];
}

// get state from GET
if(isset($_GET['state'])) {
  switch($_GET['state']) {
    case 'login': $state = "login"; break;
    case 'home': $state = "home"; break;
    case 'overview': $state = "overview"; break;
    case 'patient': $state = "patient"; break;
    case 'medicine': $state = "medicine"; break;
  }
}

// for debug purposes:
// echo $state;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>PatientViewer Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?state=home">PatientViewer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <?php
                if($state == 'home' && !isset($_SESSION['staffID'])) {
                  echo "<a href='?state=login'>Login</a>";
                }
                if(isset($_SESSION['staffID'])) {
                  echo "<a href='sites/logout.php'>Logout</a>";
                }
               ?>
              </li>
              <?php
                echo "<li>";
                  if(isset($_SESSION['staffID'])) {
                    echo "<a href='?state=overview'>Overview</a>";
                  }
                echo "</li>";
              ?>
              
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <?php
        switch($state) {
          case 'home': 
            include("sites/home.php");
            break;
          case 'login':
            include("sites/login.php");
            break;
          case 'overview':
            include("sites/overview.php");
            break;
          case 'patient':
            include("sites/patient.php");
            break;
          case 'medicine':
            include "sites/medicine.php";
            break;
        }
      ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
