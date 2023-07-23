<?php 
 include_once "nav.php";
    require_once "../config.php";
    if(isset($_POST['category-name']) && isset($_POST['category-parent'])) {
        $name = $_POST['category-name'];
        $parent = $_POST['category-parent'];
        if($parent == 0) {
            $sql1 = "INSERT INTO category(name_category, id_cha, level) VALUES ('$name', NULL, 0)";
        } else {
            $sql1 = "INSERT INTO category(name_category, id_cha, level) VALUES ('$name', $parent, 1)";
        }
        $result1 = mysqli_query($conn, $sql1);
        // Kiểm tra xem câu truy vấn đã đc thực thi thành công chưa
        if($result1) {
            header("Location: category.php");
        } else {
            echo "Error found.";
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
  transform: translate(-50%, -50%);
  background: rgba(24, 20, 20, 0.987);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
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
  color: #bdb8b8;
  font-size: 12px;
}

.login-box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: white;
  background: rgba(24, 20, 20, 0.987);
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box button :hover {
  background: #03f40f;
  color: black;
  border-radius: 5px;
  box-shadow: 0 0 5px #03f40f,
              0 0 25px #03f40f,
              0 0 50px #03f40f,
              0 0 100px #03f40f;
}

.login-box button span {
  position: absolute;
  display: block;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }

  50%,100% {
    left: 100%;
  }
}

.login-box button span:nth-child(1) {
  bottom: 2px;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, black, #03f40f);
  animation: btn-anim1 2s linear infinite;
}
</style>
<div class="main">
<div class="login-box">
    <h3 style="color: white; font-family: 'Times New Roman', Times, serif;">ADD NEW CATEGORY</h3>
    <br>
    <br>
  <form action="" method="post">
    <div class="user-box">
      <input type="text" name="category-name" required="">
      <label>Name category</label>
    </div>
    <div class="user-box">
        <select name='category-parent' style="width: 100%; height: 30px; box-sizing: border-box; border-radius: 3px; background: rgba(0,0,0,.6); color: #fff; ">
            <option value='0' style ="color: white">Choose main category</option>
            <option>---------------</option>
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM category WHERE level = 0");
                foreach ($result as $category) {
                    echo "<option value='".$category['id_category']."'>".$category['name_category']."</option>";
                }
            ?>
        </select>
    </div><center>
    <button type="submit" name="add-new">
           SAVE
       <span></span>
    </button></center>
  </form>
</div>
</div>
   
</body>
</html> 
