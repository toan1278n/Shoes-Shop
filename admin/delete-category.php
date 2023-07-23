<?php 
    require_once "../config.php";
    include_once "nav.php";
    // Kiểm tra sự tồn tại của biến $get id
    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $sql = "DELETE FROM category WHERE id_category = $id";
        $result = mysqli_query($conn, $sql);
        // Kiểm tra xem câu truy vấn đã đc thực thi thành công chưa
        if($result) {
            header("Location: category.php");
        } else {
            echo "Error found.";
        }
    }
?>