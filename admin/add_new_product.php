<?php 
    require_once "../config.php";
    include_once "nav.php";
    $querry = "SELECT * FROM brand";
    $result = mysqli_query($conn, $querry);
    $querry1 = "SELECT * FROM category";
    $result1 = mysqli_query($conn, $querry1);
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $id_brand = $_POST['brand'];
        $id_category = $_POST['category'];
        $price = $_POST['price'];
        // $quantity = $_POST['quantity'];
        $sale_price = $_POST['sale_price'];
        $des = $_POST['Des'];
        $error = [];

        if(empty($name)){
            echo $error = "Ten khong duoc trong";
        }
        if(empty($_FILES['image']['name'])){
            echo $error = "Ban chua chon anh";
        }
        else{
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $types = ['image/jpg', 'image/png', 'image/jpeg'];
            if(in_array($file_type, $types)){
                move_uploaded_file($file_tmp, '../img/'.$file_name);
            }
            else{
                echo $error = 'File ko hop le';
            }
        }
        if(empty($error)){
           $sql2 = "INSERT INTO product (name, img, id_brand, id_category, price, sale_price, des) 
                   VALUES (`$name`, `$file_name`, $id_brand, $id_category, $price, $sale_price, `$des`)";
           $result2 = mysqli_query($conn, $sql2);
            if($result2){
                header("Location: product.php");
            }
            else{
                echo "ERROR FOUND";
            }
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
</style>

<link rel="stylesheet" href="../css/add_new.css">

<div class="main">
<div class="login-box">
  <p>Add new shoes</p>
  <form action='' method='post' enctype="multipart/form-data">
    <div class="user-box">
      <input required="" name="name" type="text" class="name">
      <label>Name shoes</label>
    </div>
    <div class="user-box">
    
    </select>
    </div>
    <div class="user-box">
    <div class="wave-group">
    <select class="input_2" name='brand'>
    <option value='0' style ="color: white">Choose brand</option>
    <option>---------------</option>
    <?php foreach ($result as $brand) : ?>
            <option value='<?php echo $brand['id'] ?>'><?php echo $brand['name_brand'] ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>
    <br>
    <br>
    <div class="user-box">
    <div class="wave-group">
    <select class="input_2" name='category'>
    <option value='0' style ="color: white">Choose category</option>
    <option>---------------</option>
    <?php foreach ($result1 as $category) : ?>
            <option value='<?php echo $category['id_category'] ?>'><?php echo $category['name_category'] ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>
    <br>
    <br>
    
    <!-- <div class="input-container">
        <input required=""  class="input" id="input" type="number" name='quantity'>
        <label class="label" for="input">Quantity</label>
        <div class="underline"></div>
        <div class="sideline"></div>
        <div class="upperline"></div>
        <div class="line"></div>
    </div> -->
    
    <br>
    <br>
   
    <div class="input-container">
        <input required=""  class="input" id="input" type="number" name='price'>
        <label class="label" for="input">Price</label>
        <div class="underline"></div>
        <div class="sideline"></div>
        <div class="upperline"></div>
        <div class="line"></div>
    </div>
    
    <br>
    <br>
    
    <div class="input-container">
        <input  required="" class="input" id="input" type="number" name="sale_price">
        <label class="label" for="input">Sale</label>
        <div class="underline"></div>
        <div class="sideline"></div>
        <div class="upperline"></div>
        <div class="line"></div>
    </div>
    
    <br>
    <br>
    <div class="user-box">
    <div class="input-div">
    <input class="input-1" name="image" type="file" >
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon"><polyline points="16 16 12 12 8 16"></polyline><line y2="21" x2="12" y1="12" x1="12"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
    </div>
    </div>
    <br>
    <div class="user-box">
    <textarea required="" name="Des" class="input" placeholder="Description" ></textarea>
    </div>
    <br>
    <br>
    <div class="user-box">
    <button type="submit" name='submit'>
        Save
    </button>
    </div>
  </form>
</div>
</div>
</div>
</body>
</html> 
   