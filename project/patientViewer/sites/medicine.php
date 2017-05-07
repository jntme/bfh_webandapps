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
        $sql0 = "SELECT name, first_name, birthdate, MRN, gender
        FROM patient
        WHERE patient.patientID = :patientID";

        $statement0 = $dbh->prepare($sql0);
        $statement0->bindParam(':patientID', $patientID, PDO::PARAM_INT);
        $result0 = $statement0->execute();


        while ($line = $statement0->fetch()) {
          
            $gender = ""; 
                if ($line['gender'] == 1){
                    $gender = "M";
                } else {$gender = "W";}

            echo "<div class='center'>";

            echo "<h1 class='col-md-12'> Patient: ".$line['first_name']."  ".$line['name']."</h1>";
            echo "<p>Patienten MRN: ".$line['MRN']."<tab> | <tab>Geburtsdatum: ".$line['birthdate']."<tab> | <tab>Geschlecht: ".$gender."</p><br>";
            echo "<p class='lead'>Medicine</p>";
            echo "</div>";
        }

        $sql = "SELECT 	medicine.medicamentID, medicine.time, medicine.quantity, medicine.patientID, medicine.staffID_nurse, medicine.staffID_physician, medicine.note, 
                        staff.name as 'phyName', staff.first_name as 'phyFirstName',
                        medicament.medicament_name
                        FROM medicine
                        LEFT JOIN staff ON medicine.staffID_physician = staff.staffID
                        LEFT JOIN medicament ON medicine.medicamentID = medicament.medicamentID
                        where patientID =   :patientID
                        order by medicine.time DESC;";

        $statement = $dbh->prepare($sql);
        $statement->bindParam(':patientID', $patientID, PDO::PARAM_INT);
        $result = $statement->execute();

?>
        <div class='col-md-7'>
        <table class='table table-hover'>
        <tr>
                <th>medicament</th>
                <th>quantity</th> 
                <th>resp. physician</th> 
                <th>note</th> 
                <th>time</th> 
                </tr>

<?php

while ($line = $statement->fetch()) {
    echo "<tr>";
    echo "<td>".$line['medicament_name']."</td>";
    echo "<td>".$line['quantity']."</td>";
    echo "<td>".$line['phyFirstName']." ".$line['phyName']."</td>";
    echo "<td>".$line['note']."</td>";
    echo "<td>".$line['time']."</td>";
    echo "</tr>";
}

?>
        </table>
        </div>
  
<?php
    //insert another php file, so this one does not get
    //too large
    include("newDonationPanel.php");
    } else {
        echo "<h1>The patient does not exist</h1>";
    }

    $dbh = null;
} catch (PDOException $e) {
    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}

?>