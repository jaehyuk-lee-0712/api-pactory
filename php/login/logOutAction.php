<?php
    include "../connection/connection.php";

    unset($_SESSION['userID']);
    unset($_SESSION['userName']);

    Header("Location: /");
?>