<?php
  
  require_once "../config.php";
  session_start();

  // Kiểm tra xem đã đăng nhập chưa
  if (!isset($_SESSION['name'])) {
    $login = 0;
    // Chưa đăng nhập, điều hướng đến trang đăng nhập
    header("Location: login.php");
  }else{
  $login = 1;
  $userID = $_SESSION['id_user'];
  $name = $_SESSION['name'];
  }
    
?>