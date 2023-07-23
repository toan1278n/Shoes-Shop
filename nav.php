<?php
session_start();
    if (isset($_SESSION['username'])) {
        $login = 1;
        $userID = $_SESSION['user_id'];
    }
    else{
        $login = 0;
        header("Location: login.php");
    }

?>

