<?php 
    require_once "../config.php";
    include_once "nav.php";
    if(isset($_GET['id_customer'])) {
        $id_customer = $_GET['id_customer'];
        $sql = "DELETE FROM customer WHERE id_customer = $id_customer";
        $result = mysqli_query($conn, $sql);
        if($result) {
            header("Location: customer.php");
        } else {
            echo "Error found.";
        }
    }
?>