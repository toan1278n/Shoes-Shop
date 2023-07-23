<?php
  session_start();
    require_once "../config.php";
    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $repeat_password = $_POST["rpt_password"];
        if($password != $repeat_password) {
            echo "<p style='color: red'>Password are not matched. Please try again!</p>";
        } else {
            $password = md5($password);
            // Kiểm tra username đã tồn tại trong DB chưa
            $sql = "SELECT * FROM staff WHERE name_staff = '$username'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 0) {
                // Nếu chưa tồn tại username đó, thì thực hiện thêm mới tài khoản
                $result1 = mysqli_query($conn, "INSERT INTO staff (name_staff, password, email, id_author, status) VALUES ('$username', '$password', '$email', 2, 1)");
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

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<style>
.main{
    background-image: linear-gradient(109.6deg, rgba(156,252,248,1) 11.2%, rgba(110,123,251,1) 91.1%);
    width: 100%;
    height: 780px;
}
    .form {
  display: flex;
  flex-direction: column;
  width: 500px;
  height: 400px;
  gap: 10px;
  margin-left: 500px;
  background-color: white;
  padding: 2.5em;
  border-radius: 25px;
  transition: .4s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.4) 1px 2px 2px;
  background-color: pink;
}

.form:hover {
  transform: translateX(-0.5em) translateY(-0.5em);
  border: 1px solid #171717;
  box-shadow: 10px 10px 0px #666666;
}

.heading {
  color: black;
  padding-bottom: 2em;
  text-align: center;
  font-weight: bold;
}

.input {
  border-radius: 5px;
  border: 1px solid whitesmoke;
  background-color: whitesmoke;
  outline: none;
  padding: 0.7em;
  transition: .4s ease-in-out;
}

.input:hover {
  box-shadow: 6px 6px 0px #969696,
             -3px -3px 10px #ffffff;
}

.input:focus {
  background: #ffffff;
  box-shadow: inset 2px 5px 10px rgba(0,0,0,0.3);
}

.form .btn {
    width: 200px;
    font-size: 18px;
    font-family: 'Times New Roman', Times, serif;
  margin-top: 2em;
  align-self: center;
  padding: 0.7em;
  padding-left: 1em;
  padding-right: 1em;
  border-radius: 10px;
  border: none;
  color: black;
  transition: .4s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.4) 1px 1px 1px;
}

.form .btn:hover {
  box-shadow: 6px 6px 0px #969696,
             -3px -3px 10px #ffffff;
  transform: translateX(-0.5em) translateY(-0.5em);
}

.form .btn:active {
  transition: .2s;
  transform: translateX(0em) translateY(0em);
  box-shadow: none;
}
.form p{
  font-size: 20px;
  padding-left: 130px;
}
</style>
<div class="main">
<form class="form" method="post">
    <h1 class="heading">Sign up</h1>
    <input required class="input" name="username" placeholder="Username" type="text">
    <input required class="input" name="email" placeholder="Email" type="email">
    <input required class="input" name="password" placeholder="Password" type="password"> 
    <input required class="input" name="rpt_password" placeholder="Repeat password" type="password"> 
    <button class="btn" type="submit" name="register">Submit</button>
</form>
</div>
</body>
</html>