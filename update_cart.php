<?php
include_once "nav.php";
require_once "config.php";
if(isset($_GET['id_cart'])) {
    $id_cart = $_GET['id_cart'];
    $quantity = $_GET['quantity'];
    $sql = "UPDATE cart SET quantity = $quantity WHERE id_cart = $id_cart AND id_customer = $userID";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: cart.php");
    } else {
        echo "Error found.";
    }
}
?>


