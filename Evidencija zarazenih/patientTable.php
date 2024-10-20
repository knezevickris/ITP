<?php
    if(isset($_REQUEST['country'])) {
        $country = $_REQUEST['country'];

        include "./connection.php";

        $query = "SELECT patients.id as PatientId, patients.country_id, patients.first_name, patients.last_name, patients.birth_year, patients.infected, countries.id as CountryId, countries.country_code, countries.country_name FROM patients JOIN countries ON countries.id = patients.country_id";
        if(!$country == 0) {
            $query .= " WHERE patients.country_id = ".$country;

            $infected = "SELECT count(*) FROM patients JOIN countries ON countries.id = patients.country_id WHERE patients.country_id = ".$country." AND patients.infected = 1;";
            $notInfected = "SELECT count(*) FROM patients JOIN countries ON countries.id = patients.country_id WHERE patients.country_id = ".$country." AND patients.infected = 0;";
            $countryName = "SELECT * FROM countries WHERE countries.id = ".$country;

            $patientCountryName = $connection->query($countryName);
            $infectedResult = $connection->query($infected);
            $notInfectedResult = $connection->query($notInfected);

            $numberCountryName = mysqli_fetch_assoc($patientCountryName)['country_name'];
            $numberInfected = mysqli_fetch_assoc($infectedResult)['count(*)'];
            $numberNotInfected = mysqli_fetch_assoc($notInfectedResult)['count(*)'];
        }
        $query .= " ORDER BY patients.id DESC LIMIT 5";

        $result = $connection->query($query);
        ?>
        <div class="center-table">
            <table>
                <thead>
                <tr>
                    <th>First and last name</th>
                    <th>Birth year</th>
                    <th>Country</th>
                    <th>Infected</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php
                    if($result->num_rows>0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?=$row['first_name']." ".$row['last_name']?></td>
                                <td><?php
                                        echo date('Y', strtotime($row['birth_year']));
                                    ?></td>
                                <td><?=$row['country_name']?></td>
                                <td><?php
                                        if($row['infected'] == 0) {
                                            echo "No";
                                        } else {
                                            echo "Yes";
                                        }
                                    ?></td>
                                <td class="delete"> <a href="./deletePatient.php?id=<?=$row['PatientId']?>" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No data</td>
                        </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>
        </div>
        <?php
            if(!$country == 0) {
                ?>
                <br>
                <div class="number-infected">
                    <span class="left-side">All infected in <?=$numberCountryName?>:</span>
                    <span class="right-side"><b><?=$numberInfected?></b></span>
                </div>
                <br>
                <div class="number-infected">
                    <span class="left-side">All uninfected in <?=$numberCountryName?>:</span>
                    <span class="right-side"><b><?=$numberNotInfected?></b></span>
                </div>
                <?php
            }
        ?>
        <?php
    }
?>
