<?php
include_once "nav.php";
require_once "config.php";
if(isset($_GET['id_productDT'])) {
    $id_product = $_GET['id_productDT'];
    $sql = "DELETE FROM cart WHERE id_productDT = $id_product and id_customer = $userID";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: cart.php");
    } else {
        echo "Error found.";
    }
}
?>


