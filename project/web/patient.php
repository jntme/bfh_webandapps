<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    session_start();

    // Test if the user is logged in.
    // If no : back to the login page!
    if (!isset($_SESSION['staffID'])) {
        header('location: index.php');
        exit;
    }


    include('../additional_files/pdo.inc.php');

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

            echo "<div class='container col-md-12'></div>";
            echo "<a href='logout.php'>Logout</a><br>\n";
            echo "<br><a href='home.php'>back</a><br>\n";
            echo "</div>";

            while ($line = $statement0->fetch()) {
                echo "<h1 class='col-md-12'> Patient: ".$line['first_name']."  ".$line['name']."</h1>";
                echo "<br>";
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

            echo "<div class='container col-md-12'>";
            
            echo "</div>";

            echo "<div class='container col-md-12'>";
            echo "<div class='container col-md-6'>";
            echo "<table class='table table-hover'>";
            echo "<tr>
                    <th>Sign name</th> 
                    <th>value</th> 
                    <th>time</th> 
                  </tr>";
            while ($line = $statement->fetch()) {
                echo "<tr>";
                echo "<td>".$line['sign_name']."</td>";
                echo "<td>".$line['value']."</td>";
                echo "<td>".$line['time']."</td>";
                echo "</tr>";

            }
            echo "</table></div>";
            
            echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'><h3 class='panel-title'>Insert new vital sign</h3></div>";
            echo "<div class='panel-body'>";
            echo "<form action='addsign.php' method='POST'>\n";
            echo "<input type='hidden' name='patientID' value='$patientID'>\n";

            echo "<select name='signID'>\n";
            $sql = "SELECT * FROM sign";

            $statement = $dbh->prepare($sql);
            $result = $statement->execute();

            while ($line = $statement->fetch()) {
                echo "<option value='".$line['signID']."'>".$line['sign_name']."</option>\n";
            }
            echo "</select><br>";
            echo "Value : <input type='text' name='val'><br>\n";
            echo "Note <textarea name='note'></textarea>";
            echo "<input type='submit' value='Add sign'></form>";
        } else {
            echo "<h1>The patient does not exist</h1>";
        }
        echo "</div>";

        $dbh = null;
    } catch (PDOException $e) {
        /*** echo the sql statement and error message ***/
        echo $e->getMessage();
    }

    echo "</div>";
    
    include("medicine.php");

    $patientID = (int)($_GET['id']);
    show_medicineForPatient($patientID);
    
     echo "</div>";
    ?>

</body>
</html>