<?php
include "./connection.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SZO – Dodaj osobu</title>
    <link rel="stylesheet" href="css/newPatient.css">
    <script src="js/script.js"></script>
</head>
<body>
<?php
    include "./notification.php";
?>
<div class="patient-form">
    <form action="./validateNewPatient.php" method="get" onsubmit="return validateForm()">
        <table class="space">
            <tr>
                <td class="input-table" colspan="3">
                    <img src="img/logo.png" alt="logo_of_who">
                </td>
            </tr>
            <tr>
                <td class="label-table"><label for="firstname">First name: </label></td>
                <td class="input-table" colspan="2"><input class="width-form" type="text" name="firstname" id="firstname"></td>
            </tr>
            <tr>
                <td class="label-table"><label for="lastname">Last name: </label></td>
                <td class="input-table" colspan="2"><input class="width-form" type="text" name="lastname" id="lastname"></td>
            </tr>
            <tr>
                <td class="label-table"><label for="birthdate">Birth date: </label></td>
                <td class="input-table" colspan="2"><input class="width-form" type="date" name="birthdate" id="birthdate"></td>
            </tr>
            <tr>
                <td class="label-table"><label for="country">Country: </label></td>
                <td class="input-table" colspan="2">
                    <?php
                        include "./selectCountry.php";
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label-table"><label for="infected">Infected:</label></td>
                <td class="input-table">
                    <label for="isInfected"><input type="radio" name="infected" value="1" id="isInfected">Yes</label>
                    <label for="notInfected"><input type="radio" name="infected" value="0" id="notInfected">No</label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="custom-button" type="submit" value="Add"></td>
                <td><input class="custom-button" onclick="resetForm()" type="button" value="Reset form"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>