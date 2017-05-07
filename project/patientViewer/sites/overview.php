<div class="center">

<?php // Zeilen 13, 21, 33

// Test if the user is logged in.
// If no : back to the login page!
if (!isset($_SESSION['staffID'])) {
    header('location: index.php');
    exit;
}


include('./additional_files/pdo.inc.php');
// the following is just for test purposes
// echo "Password: ".$password."<br>";
// echo "DB Name: ".$dbname."<br>";
// echo "Username: ".$username."<br>";
// echo "Hostname: ".$hostname."<br>";

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    echo "<h1>".$_SESSION['first_name']." ".$_SESSION['name']."</h1>\n";

    /*** echo a message saying we have connected ***/
    echo '<p class="lead">List of patients</p>';
    $sql = "select * from patient";

    $result = $dbh->query($sql);

    echo "<div class='col-md-4'></div>";
    echo "<ul class='list-group col-md-4'>";
    
    while ($line = $result->fetch()) {
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

    <a href="index.php?state=medicine&id=<?=$line['patientID']?>" class="btn btn-default" role="button">
    <span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>
    </a>
</div>


<?php
echo "</div>";
      echo "</li>";
    }

    echo "</ul>";
    echo "<div class='col-md-4'></div>";
    
    $dbh = null;
?>

<!-- Eingabeformular: add new Patient -->

    </table>
        </div>

        <div class='col-md-1'></div>
        <div class='col-md-4'>
        <div class='panel panel-default'>
        
        <div class='panel-heading'>
                <h3 class='panel-title'>Add new Patient</h3>
            </div>
            
        <div class='panel-body'>


        <form action='sites/addPatient.php' method='POST' class='form-horizontal'>   


        <div class='form-group'>
        <label class='col-sm-2 control-label'>MRN</label>
        <div class='col-sm-10'><input class='form-control col-sm-10' type='text' name='MRN' placeholder='MRN'></div>
        </div>

        <div class='form-group'>
        <label class='col-sm-2 control-label'>Name</label>
        <div class='col-sm-10'><input class='form-control col-sm-10' name='name' placeholder='name'></div>
        </div>

        <div class='form-group'>
        <label class='col-sm-2 control-label'>Firstname</label>
        <div class='col-sm-10'><input class='form-control col-sm-10' name='first_name' placeholder='first_name'></div>
        </div>

        <div class='form-group'>
        <label class='col-sm-2 control-label'>Gender</label>
        <div class='col-sm-10'>Mann <input type="radio" name="gender" value="1" checked="true" /> Frau <input type="radio" name="gender" value="2"/>
        <br />
        </div>

        <div class='form-group'>
        <label class='col-sm-2 control-label'>Birthdate</label>
        <div class='col-sm-10'><input class='form-control col-sm-10' type='text' name='birthdate' placeholder='birthdate'></div>
        </div>

        <div class='form-group'>
        <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-default" type='submit'>Add patient</button></form>
        </div>
        </div>


<?php

} catch (PDOException $e) {
    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}

?> 


</div>