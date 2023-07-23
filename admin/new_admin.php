


<?php
require_once "../config.php";

$querry = "SELECT * FROM staff WHERE id_author = 1";
$result = mysqli_query($conn, $querry);
$row = mysqli_fetch_assoc($result);
// Xử lý khi nhận yêu cầu chỉnh sửa
if (isset($_POST['submit'])) {
    $admin_name = $_POST['username'];
    $email = $_POST['email'];
    $new_password = md5($_POST['new_pass']);

    // Cập nhật thông tin admin
    $sql_update_info = "UPDATE staff SET name_staff = '$admin_name',
        email = '$email'
     WHERE id_author = 1";
    $result_update_info = mysqli_query($conn, $sql_update_info);

    // Cập nhật mật khẩu admin
    $sql_update_password = "UPDATE staff SET password = '$new_password' WHERE id_author =1";
    $result_update_password = mysqli_query($conn, $sql_update_password);

    if ($result_update_info && $result_update_password) {
        echo "<script>
        alert('Update Successfully')
    </script>";
    } else {
        echo "Error found";
    }
}

// Form để nhập thông tin và mật khẩu mới
?>


<style>
.main{
    background-image: url(../img/background.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    height: 100%;
}

    .login {
  color: #000;
  text-transform: uppercase;
  letter-spacing: 2px;
  display: block;
  font-weight: bold;
  font-size: x-large;
}

.card {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 350px;
  width: 300px;
  flex-direction: column;
  gap: 35px;
  background: #e3e3e3;
  box-shadow: 16px 16px 32px #c8c8c8,
        -16px -16px 32px #fefefe;
  border-radius: 8px;
}

.inputBox {
  position: relative;
  width: 250px;
}

.inputBox input {
  width: 100%;
  padding: 10px;
  outline: none;
  border: none;
  color: #000;
  font-size: 1em;
  background: transparent;
  border-left: 2px solid #000;
  border-bottom: 2px solid #000;
  transition: 0.1s;
  border-bottom-left-radius: 8px;
}

.inputBox span {
  margin-top: 5px;
  position: absolute;
  left: 0;
  transform: translateY(-4px);
  margin-left: 10px;
  padding: 10px;
  pointer-events: none;
  font-size: 12px;
  color: #000;
  text-transform: uppercase;
  transition: 0.5s;
  letter-spacing: 3px;
  border-radius: 8px;
}

.inputBox input:valid~span,
.inputBox input:focus~span {
  transform: translateX(113px) translateY(-15px);
  font-size: 0.8em;
  padding: 5px 10px;
  background: #000;
  letter-spacing: 0.2em;
  color: #fff;
  border: 2px;
}

.inputBox input:valid,
.inputBox input:focus {
  border: 2px solid #000;
  border-radius: 8px;
}

.enter {
  height: 45px;
  width: 100px;
  border-radius: 5px;
  border: 2px solid #000;
  cursor: pointer;
  background-color: transparent;
  transition: 0.5s;
  text-transform: uppercase;
  font-size: 10px;
  letter-spacing: 2px;
  margin-bottom: 1em;
}

.enter:hover {
  background-color: rgb(0, 0, 0);
  color: white;
}


</style>
<div class="main">
<form action="" method="post" style="margin-left: 600px;">
<div class="container">
        <div class="card">
            <a class="login">UPDATE</a>
            <div class="inputBox">
                <input type="text" required="required" name="username" value="<?php echo $row['name_staff']; ?>">
                <span class="user">Username</span>
            </div>
            <div class="inputBox">
                <input type="email" required="required" name="email">
                <span class="user">Email</span>
            </div>

            <div class="inputBox">
                <input type="password" required="required" name="pass">
                <span>Old password</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="new_pass">
                <span>New password</span>
            </div>

            <button class="enter" type="submit" name="submit">Submit</button>

        </div>
    </div>
    </form>
    </div>