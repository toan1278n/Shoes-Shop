
<?php
    include_once "sidebar.php";
    require_once "config.php";
    if(isset($_GET['id'])){
      $id = $_GET['id'];
    $sql = "SELECT * FROM product as p
    INNER JOIN product_detail as pd ON pd.id_product = p.id_product
    INNER JOIN brand as b ON b.id = p.id_brand
    INNER JOIN category as c ON c.id_category = p.id_category
    INNER JOIN image as i ON i.id_product = p.id_product
    INNER JOIN size as s ON s.id_size = pd.id_size
    WHERE p.id_product =".$id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
  }
  else{
    echo "<h1> Not found product </h1>";
  }
  if(isset($_POST['add-cart'])) {
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $result2 = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = $userID AND id_productDT = $id");
    $row2 = mysqli_fetch_assoc($result2);
    $num2 = mysqli_num_rows($result2);
    
    if($num2 == 0) {
        // TH1: chưa tồn tại sản phẩm đó trong giỏ hàng -> thêm mới sản phẩm vào giỏ
        $result1 = mysqli_query($conn, "INSERT INTO cart (id_customer, id_productDT, size, quantity) VALUES ($userID, $id, $size, $quantity)");
    } else {
        // TH2: đã có sản phẩm này trong giỏ hàng rồi -> lấy ra số lượng cũ + số lượng mới và update trong bảng
        $quantity = $quantity + $row2['quantity'];
        $result1 = mysqli_query($conn, "UPDATE cart SET quantity = $quantity, size = $size WHERE id_customer = $userID AND id_productDT = $id");
    }
    if($result1) {
        echo "<script> alert('Add product successfully') </script>";
    } else {
        echo "<script> alert('Add product fail') </script>";
    }
}

?>

<style>
 /* ----- Variables ----- */
/* ----- Global ----- */
* {
	 box-sizing: border-box;
}
 html, body {
  background-image: linear-gradient(-20deg, #00cdac 0%, #8ddad5 100%);
	 height: 100%;

}
 body {
	 display: grid;
	 grid-template-rows: 1fr;
	 font-family: "Raleway", sans-serif;
	 /* background-color: #01e37f; */
}
 h3 {
	 font-size: 0.7em;
	 letter-spacing: 1.2px;
	 color: #a6a6a6;
}
 img {
	 max-width: 100%;
	 filter: drop-shadow(1px 1px 3px #a6a6a6);
}
/* ----- Product Section ----- */
 .product {
	 display: grid;
	 grid-template-columns: 0.9fr 1fr;
	 margin: auto;
	 padding: 2.5em 0;
	 min-width: 800px;
	 background-color: white;
	 border-radius: 5px;
}
/* ----- Photo Section ----- */
 .product__photo {
	 position: relative;
}
 .photo-container {
	 position: absolute;
	 left: -2.5em;
	 display: grid;
	 grid-template-rows: 1fr;
	 width: 100%;
	 height: 100%;
	 border-radius: 6px;
	 box-shadow: 4px 4px 25px -2px rgba(0, 0, 0, 0.3);
}
 .photo-main {
	 border-radius: 6px 6px 0 0;
	 /* background-color: #9be010; */
	 /* background: radial-gradient(#e5f89e, #96e001); */
     background-image: linear-gradient(95.2deg, rgba(173,252,234,1) 26.8%, rgba(192,299,246,1) 64%);
}
 .photo-main .controls {
	 display: flex;
	 justify-content: space-between;
	 padding: 0.8em;
	 color: #fff;
}
 .photo-main .controls i {
	 cursor: pointer;
}
 .photo-main img {
	 position: absolute;
	 left: -3.5em;
	 top: 2em;
	 max-width: 110%;
	 filter: saturate(150%) contrast(120%) hue-rotate(10deg) drop-shadow(1px 20px 10px rgba(0, 0, 0, 0.3));
}
 .photo-album {
	 padding: 0.7em 1em;
	 border-radius: 0 0 6px 6px;
	 background-color: #fff;
     
}
 .photo-album ul {
	 display: flex;
	 justify-content: space-around;
     list-style: none;
}
 .photo-album li {
	 float: left;
	 width: 70px;
	 height: 55px;
	 border: 1px solid #a6a6a6;
	 border-radius: 3px;
     list-style: none;
}
/* ----- Informations Section ----- */
 .product__info {
	 padding: 0.8em 0;
}
 .title h1 {
	 margin-bottom: 0.1em;
	 color: #4c4c4c;
	 font-size: 1.5em;
	 font-weight: 900;
}
 .title span {
	 font-size: 0.7em;
	 color: #a6a6a6;
}
 .price {
	 margin: 1.5em 0;
	 color: #ff3f40;
	 font-size: 1.2em;
}
 .price span {
	 padding-left: 0.15em;
	 font-size: 2.9em;
}

 .size {
	 clear: left;
	 margin: 2em 0;
}
 .size h3 {
	 margin-bottom: 1em;
     color: #4c4c4c;
     font-size: 20px;
}
 .size ul {
	 font-size: 0.8em;
	 list-style: disc;
	 margin-left: 1em;
}
 .size li {
	 text-indent: -0.6em;
	 margin-bottom: 0.5em;
}

.product-quantity h2 {
  font-size: 20px;
  padding: 0 21px;
  margin-top: 15px;
  padding-bottom: 10px;
  text-transform: uppercase;
}


.product-quantity:before,
.product-quantity:after {
  content: '';
  display: block;
  clear: both;
}
.input {
  max-width: 190px;
  padding: 12px;
  border: none;
  border-radius: 4px;
  box-shadow: 2px 2px 7px 0 rgb(0, 0, 0, 0.2);
  outline: none;
  color: dimgray;
}

.input:invalid {
  animation: justshake 0.3s forwards;
  color: red;
}

@keyframes justshake {
  25% {
    transform: translateX(5px);
  }

  50% {
    transform: translateX(-5px);
  }

  75% {
    transform: translateX(5px);
  }

  100% {
    transform: translateX-(5px);
  }
}
.radio-inputs {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  border-radius: 0.5rem;
  background-color: #EEE;
  box-sizing: border-box;
  box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
  padding: 0.25rem;
  width: 300px;
  font-size: 14px;
}

.radio-inputs .radio {
  flex: 1 1 auto;
  text-align: center;
}

.radio-inputs .radio input {
  display: none;
}

.radio-inputs .radio .name {
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 0.5rem;
  border: none;
  padding: .5rem 0;
  color: rgba(51, 65, 85, 1);
  transition: all .15s ease-in-out;
}

.radio-inputs .radio input:checked + .name {
  background-color: #fff;
  font-weight: 600;
}

</style>

<link rel="stylesheet" href="css/button.css">
<script src="js/cart.js"></script>

<section class="product">

  <div class="product__photo">
    <div class="photo-container">
      <div class="photo-main">
        <img src="img/<?php echo $row['img']; ?>" alt="" width="400px" height="400px">
      </div>
      <div class="photo-album">
        <ul>
          <?php foreach($result as $row): ?>
          <li><img src="upload/<?php echo $row['name_image']; ?>" alt=""></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="product__info">
    
    <div class="title">
      <h1><?php echo $row['name'] ?></h1>
      <span><?php echo $row['Des']; ?></span>
    </div>
    <div class="price">
      $<span><?php echo $row['price'] ?></span>
    </div>
    <form action="" method="post">
    <div class="product-properties">
      <span class="product-quantity">
                <h2>Quantity</h2>
                <input type="number" required class="input" pattern="\d+" placeholder="Quantity" name="quantity">
              </span>
    </div>
    
    <div class="size">
      <h3>Size</h3>
      <div class='radio-inputs'>
       
   <label class="radio">
    <input type="radio" name="size" checked="" value="38">
    <span class="name">38</span>
   </label>
  <label class="radio">
    <input type="radio" name="size" value="39">
    <span class="name">39</span>
  </label>
      
  <label class="radio">
    <input type="radio" name="size" value="40">
    <span class="name">40</span>
  </label>
  <label class="radio">
    <input type="radio" name="size" value="41">
    <span class="name">41</span>
  </label>
      </div>
   <div class="radio-inputs">
  <label class="radio">
    <input type="radio" name="size" value="42">
    <span class="name">42</span>
  </label>
  <label class="radio">
    <input type="radio" name="size" value="43">
    <span class="name">43</span>
  </label><label class="radio">
    <input type="radio" name="size" value="44">
    <span class="name">44</span>
  </label>
  <label class="radio">
    <input type="radio" name="size" value="45">
    <span class="name">45</span>
  </label>

</div>
    </div>
    <form action="" method="post">
    <button class="Button_5" name="add-cart" type="submit">
  Add to cart
  <svg class="svgIcon" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
</button>
</form>
  </div>
</section>

