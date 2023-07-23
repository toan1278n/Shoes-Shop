<?php
  include_once "nav.php";
    require_once "../config.php";
    // Kiểm tra người dùng đã click vào button submit chưa
    if(isset($_POST['submit'])) {
        // Lấy dữ liệu mà người dùng nhập ở trong thẻ input có name là brand-name
        $brand = $_POST['brand-name'];
        // Viết câu lệnh truy vấn thêm dữ liệu vào bảng Thương hiệu
        $sql = "INSERT INTO brand(name_brand) VALUES ('$brand')";
        // Thực thi câu lệnh truy vấn sql trên
        $result = mysqli_query($conn, $sql);
        // Kiểm tra câu lệnh Sql đã được thực thi thành công chưa
        if($result) {
            // Đã thực thi thành công thì điều hướng trang về danh sách thương hiệu
            header("Location: brand.php");
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

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  margin: 20px auto;
  transform: translate(-50%, -55%);
  background: rgba(0,0,0,.9);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box p {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
  font-size: 1.5rem;
  font-weight: bold;
  letter-spacing: 1px;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #fff;
  font-size: 12px;
}

.login-box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  font-weight: bold;
  color: #aaa;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 3px
}

.login-box button:hover {
  background: #fff;
  color: #272727;
  border-radius: 5px;
}


</style>
<div class="main">
<div class="login-box">
  <p>Thêm mới thương hiệu</p>
  <form action='' method='POST'>
    <div class="user-box">
      <input required="" name="brand-name" type="text">
      <label>Tên thương hiệu</label>
    </div>
    <button  type='submit' href="brand.php" name='submit'>
      SAVE
    </button>
  </form>
</div>
</div> 
</body>
</html> 
