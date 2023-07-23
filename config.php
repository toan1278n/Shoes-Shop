<?php 
    //Định nghĩa các trường dữ liệu để kết nối tới CSDL
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'shop');

    // Kết nối đến CSDL
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Set dữ liệu Tiếng Việt
    mysqli_set_charset($conn, 'utf8');

    // Kiểm tra kết nối
    if($conn == FALSE) {
        die('ERROR: Could not connect. '.mysqli_connect_error());
    }
    
?>