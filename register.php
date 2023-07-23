<?php
 require_once "config.php";
 if(isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $repeat_password = $_POST["psw-repeat"];
    if($password != $repeat_password) {
        echo "<p style='color: red'>Password are not matched. Please try again!</p>";
    } else {
        $password = md5($password);
        // Kiểm tra username đã tồn tại trong DB chưa
        $sql = "SELECT * FROM customer WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 0) {
            // Nếu chưa tồn tại username đó, thì thực hiện thêm mới tài khoản
            $result1 = mysqli_query($conn, "INSERT INTO customer (username, password, email, status) VALUES ('$username', '$password', '$email', 1)");
            if($result1) {
                header("location: login.php");
                exit;
            } else {
                echo "<p style='color: red'> Error found. Pls try again later.</p>";
            }
        } else {
            // Trường hợp username đã tồn tại rồi. Yêu cầu nhập username khác
            echo "<p style='color: red'>This username is taken. Please input another one.</p>";
        }
    }
}

?>


<link rel="stylesheet" href="css/register_style.css">
<div class="container">
<form action="" class="form" method="post">
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
        
        <label>
            <input required="" placeholder="" type="text" class="input" name="username">
            <span>Username</span>
        </label>
    
            
    <label>
        <input required="" placeholder="" type="email" class="input" name="email">
        <span>Email</span>
    </label> 
        
    <label>
        <input required="" placeholder="" type="password" class="input" name="password">
        <span>Password</span>
    </label>
    <label>
        <input required="" placeholder="" type="password" class="input" name="psw-repeat">
        <span>Confirm password</span>
    </label>
     <button class="submit" type="submit"  name="register" > 
     Submit</button>
     
    <p class="signin">Already have an acount ? <a href="login.php">Sign In</a> </p>
</form>
</div>