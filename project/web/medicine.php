<?php


function show_medicineForPatient($patientID)
{
    include('../additional_files/pdo.inc.php');

    try {

      $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

      /*** echo a message saying we have connected ***/
        $sql = "SELECT name, first_name, time, quantity, medicamentID, note 
                 FROM patient, medicine
                 WHERE patient.patientID = medicine.patientID
                 AND patient.patientID = :patientID;";


        $statement = $dbh->prepare($sql);
        $statement->bindParam(':patientID', $patientID, PDO::PARAM_INT);
        $result = $statement->execute();


        while ($line = $statement->fetch()) {
            echo $line['time']." | ".$line['quantity']. " | ".$line['note'];
            // print_r($line);
            echo "<br>\n";
        }

    } catch (PDOException $e) {
        /*** echo the sql statement and error message ***/
        echo $e->getMessage();
    }
}
