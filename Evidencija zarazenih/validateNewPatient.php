<?php
    include "./connection.php";

    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $birthdate = $_REQUEST['birthdate'];
    $country = $_REQUEST['country'];
    $infected = $_REQUEST['infected'];

    if($firstname == "" || $lastname == "" || $birthdate == "0" || $country == "0" || $infected == "") {
        setcookie("notification", "All fields are required!", time()+60*60*24, "/");
        header("Location: /Evidencija_zarazenih/newPatient.php");
    }

    $id = 0;
    $query = "SELECT * FROM patients ORDER BY patients.id DESC;";
    $result = $connection->query($query);

    if($result->num_rows>0) {
        $id = $result->fetch_assoc()['id'];
        $id++;
    }

    $query2 = "INSERT INTO patients (id, country_id, first_name, last_name, birth_year, infected) VALUES ('{$id}', '{$country}','{$firstname}', '{$lastname}', '{$birthdate}', '{$infected}');";
    $result2 = $connection->query($query2);

    if($result2 === true) {
        header("Location: /Evidencija zarazenih/index.php");
    } else {
        die("Failed insert new patient in database!");
    }
?>
