<?php

include_once('Patient.php');

$hostname = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=medicalinformatics", $username, $password);

    echo "Connected to database.<br><br>";

    ####################

    echo "<b>FETCH_ASSOC</b><br>";
    $query = "select * from patient";

    $statement = $dbh->query($query);

    while($result = $statement->fetch(PDO::FETCH_ASSOC)) {
       print_r($result);
       echo "<br>";
    }

    ####################
    echo "<br><br>";
    echo "<b>FETCH_NUM</b><br>";
    $query = "select * from patient";

    $statement = $dbh->query($query);

    while($result = $statement->fetch(PDO::FETCH_NUM)) {
        print_r($result);
        echo "<br>";
    }

    ####################

    echo "<br><br>";
    echo "<b>FETCH_BOTH</b><br>";
    echo " <p>FETCH_BOTH fetches the content of the query numerically AND per name.</p>";
    $query = "select * from patient";

    $statement = $dbh->query($query);

    while($result = $statement->fetch(PDO::FETCH_BOTH)) {
        print_r($result);
        echo "<br>";
    }

    ####################

    echo "<br><br>";
    echo "<b>FETCH_INTO</b><br>";
    $query = "select * from patient";

    $statement = $dbh->query($query);

    $statement->setFetchMode(PDO::FETCH_INTO, new Patient);

    foreach($statement as $patient) {
        $patient->display();
    }

    ####################
    #
    ####################

    echo "<br><br>";
    echo "<b>FETCH_ALL</b><br>";
    echo " <p>FETCH_ALL fetches all items at once.</p>";
    $query = "select * from patient";

    $statement = $dbh->query($query);

    $result = $statement->fetchAll();

    print_r($result);

    ####################

    $dbh = null;

} catch (PDOException $e) {
    echo $e->getMessage();
}
