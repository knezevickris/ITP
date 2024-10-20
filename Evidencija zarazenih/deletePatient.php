<?php
    include "./connection.php";

    if(isset($_REQUEST['id'])) {
        $id=$_REQUEST['id'];

        $query = "DELETE FROM patients WHERE patients.id = '{$id}'";
        $result = $connection->query($query);

        if($result === true) {
            header("Location: /Evidencija zarazenih/index.php");
        } else {
            die("Delete patient failed.");
        }
    }
?>