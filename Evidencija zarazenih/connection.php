<?php
    $connection = mysqli_connect("localhost", "root", "", "corona");

    if(!$connection) {
        die("Connection failed!");
    }
?>