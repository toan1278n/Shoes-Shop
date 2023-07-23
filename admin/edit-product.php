<?php 
    require_once "../config.php";
    include_once "nav.php";
    if(isset($_GET['id_product'])){
    $id_product = $_GET['id_product'];
    $result0 = mysqli_query($conn, "SELECT * FROM brand"); 
    $result1 = mysqli_query($conn, "SELECT * FROM category WHERE level = 0");
    $result3 = mysqli_query($conn, "SELECT c1.name_category AS 'parent', c2.name_category AS 'child' FROM category c1 LEFT JOIN category c2 ON c2.id_cha = c1.id_category LIMIT 4 ");
    $sql = "SELECT *,brand.name_brand,c1.name_category AS 'parent', c2.name_category AS 'child' FROM product, brand, category c1 
    LEFT JOIN category c2 ON c2.id_cha = c1.id_category
    WHERE product.id_product = $id_product AND product.id_category = c2.id_category AND product.id_brand = brand.id;";
    $result2 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result2);
    }
    if(isset($_POST['submit'])){
        $name = addslashes($_POST['name']);
        $id_brand = $_POST['brand'];
        $id_parentCategory = $_POST['parent'];
        $id_categoryChild = $_POST['child'];
        $price = $_POST['price'];
        // $quantity = $_POST['quantity'];
        $sale_price = $_POST['sale_price'];
        $des = addslashes($_POST['Des']);
        $error = [];
        

        if(empty($name)){
            echo $error = "Plese fill the name";
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
           $sql2 = "UPDATE product SET name ='$name',img = '$file_name', id_brand = $id_brand, id_category = $id_categoryChild, price = $price, sale_price = $sale_price, Des = '$des' WHERE id_product = $id_product ";
           $result2 = mysqli_query($conn, $sql2);
           echo $sql2;
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
    width:  100%;
    height: 850px;
    box-sizing: border-box;
    border-radius: 10px;
}
</style>

<link rel="stylesheet" href="../css/add_new.css">

<div class="main">
<div class="login-box">
  <p>Update shoes</p>
  <form action='' method='post' enctype="multipart/form-data">
    <div class="user-box">
      <input required="" name="name" type="text" class="name" value="<?php echo $row['name']; ?>">
      
      <label>Name shoe</label>
    </div>
    
    
    <div class="user-box">
    <div class="wave-group">
    <select class="input_2" name='brand'>
    <option value='<?php echo $row['id'] ?>' style ="color: white"><?php echo $row['name_brand'] ?></option>
    <option value="0">------------</option>
    <?php foreach ($result0 as $brand) : ?>
            <option value='<?php echo $brand['id'] ?>'><?php echo $brand['name_brand'] ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>
    
   
    <br>
    <div class="user-box">
    <div class="wave-group">
    <select class="input_2" name='parent'>
    <option value='<?php echo $row['id_category'] ?>' style ="color: white"><?php echo $row['parent'] ?></option>
    <option value="0">------------</option>
    <?php foreach ($result1 as $category) : ?>
        
            <option value='<?php echo $category['id_category'] ?>'><?php echo $category['name_category'] ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>
    
    <br>
    <br>
    <div class="user-box">
    <div class="wave-group">
    <select class="input_2" name='child'>
    <option value='<?php echo $row['id_category'] ?>' style ="color: white"><?php echo $row['child'] ?></option>
    <option value="0">------------</option>
    <?php foreach ($result3 as $category) : ?>
            <option value='<?php echo $category['id_category'] ?>'><?php echo $category['child'] ?></option>
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
    
   
    <div class="user-box">
    <div class="input-container">
        <input required=""  class="input" id="input" type="number" name='price' value="<?php echo $row['price']; ?>">
        <label class="label" for="input">Price</label>
        <div class="underline"></div>
        <div class="sideline"></div>
        <div class="upperline"></div>
        <div class="line"></div>
    </div>
    </div>
    
    <br>
    <br>
    
    <div class="input-container">
        <input  required="" class="input" id="input" type="number" name="sale_price" value="<?php echo $row['sale_price']; ?>">
        <label class="label" for="input">Sale price</label>
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
    <textarea required="" name="Des" class="input" placeholder="Description"><?php echo $row['Des']; ?></textarea>
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
   