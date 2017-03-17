
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>select all vital data of a specific patient</title>
</head>
<body>

<?php

$hostname = "localhost";
$username = "root";
$password = "";

try {
  $dbh = new PDO("mysql:host=$hostname;dbname=medicalinformatics", $username, $password);

  //| patientID | MRN   | name      | first_name | gender | birthdate  |
  $query = "select p.patientID, p.MRN, p.name, p.first_name, p.gender, p.birthdate from `patient` p where p.patientID = :patID";


  $stmt = $dbh->prepare($query);
  $stmt->bindParam(':patID', $_GET['patID'], PDO::PARAM_INT);
  $stmt->execute();

  $result = $stmt->fetchAll();

  foreach($result as $p) {
    echo "<h3>$p[first_name]"." $p[name]</h3>";
    carriage_return();
    echo "PID: ".$p['patientID'];
    carriage_return();
    echo "MRN: ".$p['MRN'];
    carriage_return();
    echo "Gender: ".($p['gender'] == 1 ? "male" : "female"); //is not true anyway :D
    carriage_return();
    echo "Birthday: ".$p['birthdate'];
    carriage_return();
  }

  carriage_return();
  carriage_return();
  echo "<a href='05_patientTool.php'>back</a>";

}
catch(PDOException $ex) {
  echo $ex;
}


function getGender($gender) {
  echo $gender;
  if($gender == 'm') return "male";
  else if($gender == 'f') return "woman";
  else return null;
}

function carriage_return() {
  echo "<br>";
}
?>
</body>
</html>
