<?php 
    include_once "nav.php";
    require_once "config.php";
    if($login==1) {
        // Lấy được userID đang đăng nhập
        // Các em tự làm các bước như check mật khẩu cũ nhập đúng không
        // so sánh 2 mật khẩu mới nhập vào có trùng không
        // Thực hiện cập nhật mật khẩu vào DB
        if (isset($_POST['submit'])) {
          $currentPassword = md5($_POST['old-password']);
          $newPassword = $_POST['new-password'];
          $confirmPassword = $_POST['rpt-password'];
          
          // Kiểm tra xem mật khẩu hiện tại có đúng không
          $query = "SELECT password FROM customer WHERE id = $userID"; // thay đổi 'users' và 'id' theo cấu trúc bảng và dữ liệu thực tế
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          
          if ($currentPassword != $row['password']) {
              echo '<script>
              alert("Incorrect password");
            </script>';
          } elseif ($newPassword != $confirmPassword) {
              echo "<script>
              alert('Password are not matched. Please try again!')
            </script>";
          } else {
            $newPassword = md5($newPassword);
              // Cập nhật mật khẩu mới
              $query = "UPDATE customer SET password = '$newPassword' WHERE id = $userID"; // thay đổi 'users' và 'id' theo cấu trúc bảng và dữ liệu thực tế
              if (mysqli_query($conn, $query)) {
                  echo "<script>
                  alert('Change password successfully');
                </script>";
                header("Location: login.php");
              } else {
                  echo "<script>
                  alert('Error found');
                </script> ";
              }
          }
      }
    }else{
      header("Location: login.php");
    }
     
?>


<style>
    form {
  --bg-light: #efefef;
  --bg-dark: #707070;
  --clr: #58BC82;
  --clr-alpha: #9c9c9c60;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
  width: 500px;
}

.form .input-span {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: .5rem;
}

form input[type="password"],
form input[type="password"] {
  border-radius: 0.5rem;
  padding: 1rem 0.75rem;
  width: 100%;
  border: none;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background-color: var(--clr-alpha);
  outline: 2px solid var(--bg-dark);
}

form input[type="password"]:focus,
form input[type="password"]:focus {
  outline: 2px solid var(--clr);
}

.label {
  align-self: flex-start;
  color: var(--clr);
  font-weight: 600;
}

form .submit {
  padding: 1rem 0.75rem;
  display: flex;
    width: 150px;
    padding-left: 50px;
  gap: 0.5rem;
  border-radius: 3rem;
  background-color: var(--bg-dark);
  color: var(--bg-light);
  border: none;
  cursor: pointer;
  transition: all 300ms;
  font-weight: 600;
  font-size: .9rem;
}

form .submit:hover {
  background-color: var(--clr);
  color: var(--bg-dark);
}

.span {
  text-decoration: none;
  color: var(--bg-dark);
}

.span a {
  color: var(--clr);
}
.container{
    background-image: linear-gradient( to right, #434343 0%, black 100%);
    width: 100%;
    height: 780px;
    box-sizing: border-box;
    border-radius: 10px;
    margin-top: 0px;

}
</style>

<div class="container">
<center>

<center> <h1 style="color: white;">Change password</h1></center>
<form class="form" action="" method="post" style="margin-top: 190px;">

  <span class="input-span">
  <label for="old-password" class="label">Old password</label>
  <input type="password" name="old-password" id="old-password"></span>
  <span class="input-span">
  <label for="new-password" class="label">New password</label>
  <input type="password" name="new-password" id="new-password"></span>
  <label for="rpt-password" class="label">Repeat password</label>
  <input type="password" name="rpt-password" id="rpt-password"></span>
  <button class="submit" type="submit" name="submit" >Submit</button>

</form>
</center>
</div>