<?php 
    require_once "../config.php";
    include_once "nav.php";
    if(isset($_GET['id_product'])) {
        $id_product = $_GET['id_product'];
        $sql = "DELETE FROM product WHERE id_product = $id_product";
        $result = mysqli_query($conn, $sql);
        if($result) {
            header("Location: product.php");
        } else {
            echo "Error found.";
        }
    }
?>