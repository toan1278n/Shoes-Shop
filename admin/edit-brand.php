<?php
    require_once "../config.php";
    include_once "nav.php";
    if(isset($_GET['id'])) {
        // Lấy id brand từ url thông qua biến $_GET
        $id_brand = $_GET['id'];
        // Viết câu lệnh truy vấn sql
        $sql = "SELECT * FROM brand WHERE id = $id_brand";
        // Thực thi câu truy vấn sql trên
        $result = mysqli_query($conn, $sql);
        // Lấy dữ liệu từ việc thực thi truy vấn dưới dạng mảng gồm key (là tên cột trong bảng) -> value(dữ liệu tương ứng với các cột) và lưu vào biến $row
        $row = mysqli_fetch_assoc($result);
    }

    // Kiểm tra xem người dùng đã click vào nút submit chưa
    if(isset($_POST['submit'])) {
        $brand = $_POST['brand-name'];
        $sql1 = "UPDATE brand SET name_brand = '$brand' WHERE id = $id_brand";
        $result1 = mysqli_query($conn, $sql1);
        if($result1) {
            // Đã thực thi thành công thì điều hướng trang về danh sách thương hiệu
            header("Location: brand.php");
        } else {
            // Ngược lại truy vấn không thành công -> thì kiểm tra lỗi do đâu? thường là do câu truy vấn sql chưa đúng
            echo "Error";
        }
    }
    
?>
<style>
    .group {
  position: relative;
}

.form {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  border: 1px solid white;
  padding: 120px 40px;
  padding-top: 60px;
  padding-bottom: 90px;
  padding-right: 40px;
  padding-left: 40px;
  background-color: black;
  border-radius: 20px;
  position: relative;
  width: 500px;
  top: 200px;
  left: 500px;
}

.form p {
  padding-bottom: 20px;
  font-size: 24px;
  font-weight: bold;
  letter-spacing: .5px;
  color: white;
}

.main-input {
  font-size: 16px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 185px;
  border: none;
  border-bottom: 1px solid #6c6c6c;
  background: transparent;
  color: #ffffff;
}

.main-input:focus {
  outline: none;
  border-bottom-color: #42ff1c;
}

.lebal-email {
  color: #999999;
  font-size: 18px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}

.main-input:focus ~ .lebal-email,
.main-input:valid ~ .lebal-email {
  top: -20px;
  font-size: 14px;
  color: #42ff1c;
}

.highlight-span {
  position: absolute;
  height: 60%;
  width: 0px;
  top: 25%;
  left: 0;
  pointer-events: none;
  opacity: 0.5;
}

.main-input:focus ~ .highlight-span {
  -webkit-animation: input-focus 0.3s ease;
  animation: input-focus 0.3s ease;
}

@keyframes input-focus {
  from {
    background: #42ff1c;
  }

  to {
    width: 185px;
  }
}

.submit {
  margin-top: 1.2rem;
  padding: 10px 20px;
  border-radius: 10px;
  border-color: #42ff1c;
}
.main{
    background-image: linear-gradient( to right, #434343 0%, black 100%);
    width: 100%;
    height: 780px;
    box-sizing: border-box;
    border-radius: 10px;
}
</style>


<div class="main">
<form class="form" action='' method='post'>
<p>Update Brand</p>
  <div class="group">
    <input required="true" class="main-input" type="text" name='brand-name' value='<?php echo $row['name_brand'] ?>'>
    <span class="highlight-span"></span>
    <label class="lebal-email">Brand's name</label>
  </div>
  <button type='submit' name='submit' class="submit">Save</button>
</form>
</div>

</body>
</html> 
