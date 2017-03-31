<?php


function show_medicineForPatient($id) {
    include('../additional_files/pdo.inc.php');

    try {




        
    } catch (PDOException $e) {
        /*** echo the sql statement and error message ***/
        echo $e->getMessage();
    }
}


?>