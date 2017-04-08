<?php

// Test if the user is logged in.
// If no : back to the login page!
if (!isset($_SESSION['staffID'])) {
    header('location: index.php');
    exit;
}


include('./additional_files/pdo.inc.php');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $patientID = (int)($_GET['id']);
    if ($patientID >0) {
        $sql0 = "SELECT name, first_name
FROM patient
WHERE patient.patientID = :patientID";

        $statement0 = $dbh->prepare($sql0);
        $statement0->bindParam(':patientID', $patientID, PDO::PARAM_INT);
        $result0 = $statement0->execute();


        while ($line = $statement0->fetch()) {
            echo "<div class='starter-template'>";
            echo "<h1 class='col-md-12'> Patient: ".$line['first_name']."  ".$line['name']."</h1>";
            echo "<p class='lead'>Vital Signs</p>";
            echo "</div>";
        }



    /*** echo a message saying we have connected ***/
        $sql = "SELECT name, first_name, value, time, sign_name
            FROM patient, vital_sign, sign
            WHERE patient.patientID = vital_sign.patientID
            AND vital_sign.signID = sign.signID 
            AND patient.patientID = :patientID";

        $statement = $dbh->prepare($sql);
        $statement->bindParam(':patientID', $patientID, PDO::PARAM_INT);
        $result = $statement->execute();

?>
        <div class='col-md-1'></div>
        <div class='col-md-5'>
        <table class='table table-hover'>
        <tr>
                <th>Sign name</th> 
                <th>value</th> 
                <th>time</th> 
                </tr>

<?php
while ($line = $statement->fetch()) {
    echo "<tr>";
    echo "<td>".$line['sign_name']."</td>";
    echo "<td>".$line['value']."</td>";
    echo "<td>".$line['time']."</td>";
    echo "</tr>";
}

?>
        </table>
        </div>


        <div class='col-md-1'></div>
        <div class='col-md-4'>
        <div class='panel panel-default'>

            <div class='panel-heading'>
                <h3 class='panel-title'>Insert new vital sign</h3>
            </div>
            <div class='panel-body'>

        <form action='sites/addsign.php' method='POST' class='form-horizontal'>
        <input type='hidden' name='patientID' value='<?=$patientID?>'>

        <div class='form-group'><div class='col-sm-12'><select class='form-control' name='signID'>

<?php
        $sql = "SELECT * FROM sign";

        $statement = $dbh->prepare($sql);
        $result = $statement->execute();

while ($line = $statement->fetch()) {
    echo "<option value='".$line['signID']."'>".$line['sign_name']."</option>\n";
}

?>
        </select></div></div>
        <div class='form-group'>
        <label class='col-sm-2 control-label'>Value</label>
        <div class='col-sm-10'><input class='form-control col-sm-10' type='text' name='val' placeholder='value'></div>
        </div>

        <div class='form-group'>
        <label class='col-sm-2 control-label'>Note</label>
        <div class='col-sm-10'><textarea class='form-control col-sm-10' name='note' placeholder='note'></textarea></div>
        </div>


        <div class='form-group'>
        <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-default" type='submit'>Add sign</button></form>
        </div>
        </div>

        </div>
        </div>
        </div>
        <div class='col-md-1'></div>

<?php
    } else {
        echo "<h1>The patient does not exist</h1>";
    }

    $dbh = null;
} catch (PDOException $e) {
    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}


?>