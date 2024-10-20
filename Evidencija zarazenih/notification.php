<?php
if(isset($_COOKIE['notification'])) {
    ?>
    <div class="notice">
        <?= $_COOKIE['notification'] ?>
    </div>
    <?php
    setcookie("notification", "", time()-3600, "/");
}
?>