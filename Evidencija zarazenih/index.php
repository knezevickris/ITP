<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="header">
        <span>
            <img src="img/logo.png" alt="header_logo_who">
        </span>
        <span class="right-side">
            <input class="add-button" onclick="newPatient()" type="button" value="Add">
        </span>
    </div>
    <div class="container">
        <?php
            include "./selectCountry.php";
        ?>
        <div id="patientTable">
            <?php
                include "./patientTable.php";
            ?>
        </div>
    </div>
</body>
</html>