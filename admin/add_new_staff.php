<?php
    require_once "../config.php";
    include_once "nav.php";
    // Kiểm tra người dùng đã click vào button submit chưa
    if(isset($_POST['submit'])) {
        // Lấy dữ liệu mà người dùng nhập ở trong thẻ input có name là brand-name
        $username = $_POST['username'];
        $email = $_POST['email'];
        $id_author = $_POST['id_author'];
        $password = md5($_POST['pass']);
        // Viết câu lệnh truy vấn thêm dữ liệu vào bảng Thương hiệu
        $sql = "INSERT INTO staff(name_staff, email, id_author, password) VALUES ('$username', '$email', '$id_author', '$password')";
        // Thực thi câu lệnh truy vấn sql trên
        $result = mysqli_query($conn, $sql);
        // Kiểm tra câu lệnh Sql đã được thực thi thành công chưa
        if($result) {
            // Đã thực thi thành công thì điều hướng trang về danh sách thương hiệu
            header("Location: staff.php");
        } else {
            // Ngược lại truy vấn không thành công -> thì kiểm tra lỗi do đâu? thường là do câu truy vấn sql chưa đúng
            echo "Error";
        }
    }
?>

<style>
.main{
    background-image: linear-gradient( to right, #434343 0%, black 100%);
    width: 100%;
    height: 780px;
    box-sizing: border-box;
    border-radius: 10px;
}
.form-container {
  width: 400px;
  margin-left: 550px;
  background: linear-gradient(#212121, #212121) padding-box,
              linear-gradient(145deg, transparent 35%,#e81cff, #40c9ff) border-box;
  border: 2px solid transparent;
  padding: 32px 24px;
  font-size: 14px;
  font-family: inherit;
  color: white;
  display: flex;
  flex-direction: column;
  gap: 20px;
  box-sizing: border-box;
  border-radius: 16px;
}

.form-container button:active {
  scale: 0.95;
}

.form-container .form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-container .form-group {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.form-container .form-group label {
  display: block;
  margin-bottom: 5px;
  color: #717171;
  font-weight: 600;
  font-size: 12px;
}

.form-container .form-group input {
  width: 100%;
  padding: 12px 16px;
  border-radius: 8px;
  color: #fff;
  font-family: inherit;
  background-color: transparent;
  border: 1px solid #414141;
}

.form-container .form-group textarea {
  width: 100%;
  padding: 12px 16px;
  border-radius: 8px;
  resize: none;
  color: #fff;
  height: 96px;
  border: 1px solid #414141;
  background-color: transparent;
  font-family: inherit;
}

.form-container .form-group input::placeholder {
  opacity: 0.5;
}

.form-container .form-group input:focus {
  outline: none;
  border-color: #e81cff;
}

.form-container .form-group textarea:focus {
  outline: none;
  border-color: #e81cff;
}

.form-container .form-submit-btn {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  align-self: flex-start;
  font-family: inherit;
  color: #717171;
  font-weight: 600;
  width: 40%;
  background: #313131;
  border: 1px solid #414141;
  padding: 12px 16px;
  font-size: inherit;
  gap: 8px;
  margin-top: 8px;
  cursor: pointer;
  border-radius: 6px;
}

.form-container .form-submit-btn:hover {
  background-color: #fff;
  border-color: #fff;
}

</style>

<div class="main">
<div class="form-container">
      <form class="form" action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required="">
        </div>
        <div class="form-group">
          <label for="id_author">Position</label>
          <select id="input" name='id_author' style="width: 100%; height: 30px; box-sizing: border-box; border-radius: 3px; background: rgba(0,0,0,.6); color: #fff; ">
            <option value='0' style ="color: white">Position</option>
            <option>---------------</option>
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM authorized");
                foreach ($result as $author) {
                    echo "<option value='".$author['id_author']."'>".$author['name_author']."</option>";
                }
            ?>
        </select>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required="">
        </div>
        <div class="form-group">
          <label for="pass">Password</label>
          <input type="password" name="pass" id="pass" required>
        </div>
        <button class="form-submit-btn" name="submit" type="submit">Save</button>
      </form>
    </div>
    </div>