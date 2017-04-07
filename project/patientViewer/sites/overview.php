<div class="starter-template">

<?php

// Test if the user is logged in.
// If no : back to the login page!
if(!isset($_SESSION['staffID'])){
  header('location: index.php');
  exit;
 }


include('../additional_files/pdo.inc.php');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    echo "<h1>".$_SESSION['first_name']." ".$_SESSION['name']."</h1>\n";

    /*** echo a message saying we have connected ***/
    echo '<p class="lead">List of patients</p>';
    $sql = "select * from patient";

    $result = $dbh->query($sql);

    echo "<div class='col-md-4'></div>";
    echo "<ul class='list-group col-md-4'>";
    while($line = $result->fetch()){
      echo "<li class='list-group-item'>";
      echo "<div class='row'>";
      echo "<div class='col-sm-8 text-center'>";


      echo $line['first_name']." ".$line['name'];

      echo "</div>";
?>

<div class="text-center col-sm-4">
    <a href="index.php?state=patient&id=<?=$line['patientID']?>" class="btn btn-default" role="button">
        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
    </a>

    <a href="index.php?state=patient&id=<?=$line['patientID']?>" class="btn btn-default" role="button">
    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
    </a>
</div>

<?php
echo "</div>";
      echo "</li>";
    }

    echo "</ul>";
    echo "<div class='col-md-4'></div>";
    
    $dbh = null;
}
catch(PDOException $e)
{

    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}


?> 

</div>