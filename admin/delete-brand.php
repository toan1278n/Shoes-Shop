<?php 
    require_once "../config.php";
    include_once "nav.php";
    if(isset($_GET['id'])) {
        $id_brand = $_GET['id'];
        $sql = "DELETE FROM brand WHERE id = $id_brand";
        $result = mysqli_query($conn, $sql);
        if($result) {
            header("Location: brand.php");
        } else {
            echo "Error found.";
        }
    }
?>