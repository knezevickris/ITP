<?php
    include "./connection.php";

    $query = "SELECT * FROM countries;";
    $result = $connection->query($query);
?>

<select name="country" id="country" onchange="selectionChanged(this)">
    <option value="0"> --- Select country ---</option>
    <?php
        if($result->num_rows>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                <option value="<?=$row['id']?>"><?=$row['country_name']?></option>
                <?php
            }
        }
    ?>
</select>