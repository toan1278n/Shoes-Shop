<?php 
    require_once "../config.php";
    include_once "nav.php";
    if(isset($_GET['id_staff'])) {
        $id_staff = $_GET['id_staff'];
        $sql = "DELETE FROM staff WHERE id_staff = $id_staff";
        $result = mysqli_query($conn, $sql);
        if($result) {
            header("Location: staff.php");
        } else {
            echo "Error found.";
        }
    }
?>