<?php
// Kết nối đến MySQL
include_once "nav.php";
require_once "config.php";


// Lấy thông tin sản phẩm từ giỏ hàng (giả sử là bảng cart)
$query = "SELECT * FROM cart as c 
INNER JOIN product as p ON p.id_product = c.id_productDT
INNER JOIN brand as b on b.id = p.id_brand 
INNER JOIN category as ct ON ct.id_category = p.id_category
INNER JOIN product_detail as pd ON pd.id_product = p.id_product
INNER JOIN color ON color.id_color = pd.id_color
WHERE c.id_customer = $userID

";
$result = mysqli_query($conn, $query);
$num = mysqli_fetch_row($result);


$cart = mysqli_query($conn, "SELECT * FROM cart
INNER JOIN product as p ON p.id_product = cart.id_productDT
WHERE cart.id_customer = $userID

");
$total = 0;
$totalPrice = 0;



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Shopping Cart </title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/cart.css">
	 <link rel="stylesheet" href="css/nav.css">

  </head>
  <body>
  
      
 <main>
 	
	
 <div class="main">
    <nav class="navbar">
  <div id="trapezoid">
    <a class="sub-home" href="index.php">Home</a>
    <a href="#About" class="expandHome">Shop</a>
     <div class="subnav">
     <button class="subnavbtn">Brand<i class="fa fa-caret-down"></i></button>
       <div class="subnav-content">
        <div id="subnav-trapezoid">
          <a href="nike.php">Nike</a>
          <a href="adidas.php">Adidas</a>
          <a href="puma.php">Puma</a>
        </div>
       </div>
    </div>
  
     <div class="subnav">
     <button class="subnavbtn">Category<i class="fa fa-caret-down"></i></button>
       <div class="subnav-content">
        <div class="subnav-trapezoid">
          <a href="men-shoe.php">Men</a>
          <a href="women-shoe.php">Women</a>
          <a href="children-shoe.php">Kids</a>
         </div>
       </div>
      </div>

	  <a class="sub-home" href="index.php?id">Home</a>
    	<a href="#Contact" class="expandHome">Contact</a>
       </div>
      </div>
  </div>
</nav>
</div>


	

	<div class="container_1" style="background: linear-gradient(#e66465, #9198e5);">

    
    <?php 
    if($num == 0){
      echo "<center><div style='color:white;font-size:30px; font-family: 'Times New Roman', Times, serif;'>Your cart is empty</div><center>";
    }else{
    
   foreach($result as $row) {
        $img = $row['img'];
        ?>


		<section id="cart" > 
			<article class="product" style="height: 230px;">
				<header  style="height: 200px;">
					<a class="remove" href="delete_cart.php?id_productDT=<?php echo $row['id_productDT'] ?>">
						<img src="img/<?php echo $img; ?>" alt="" style="margin-right: 100px;" width="235px" height="230px">

						<h3>Remove product</h3>
					</a>
				</header>
        
				<div class="content" style="height: 170px;">
					<h1 style="font-family: 'Times New Roman', Times, serif;" id="id_product" name="id_product"><?php echo $row['name']  ?></h1>
					<h3 style="font-family: 'Times New Roman', Times, serif;" id="id_product" name="id_product"><?php echo $row['Des']  ?></h3>
          <div style="float: left;">
					<label style="font-family:'Helvetica' ">Brand: <?php echo $row['name_brand']; ?><label>
          <br>
          <br>
          Size: <input type="number" style="width: 50px; " min="38" max="45" placeholder="size" value="<?php echo $row['size']; ?>"> 
          </div>
          <div style="float: right; margin-bottom: 30px;">
          <label style="font-family:'Helvetica' "><p style="margin-left: 30px;box-sizing: border-box; height: 30px; width: 30px; background-color: <?php echo $row['name_color']; ?>;"> </p><label>
            </div>
				</div>

				<footer class="content">
					<span class="qt-minus">-</span>
					<span class="qt" id="quantity" name="quantity"><?php echo $row['quantity']?></span>
					<span class="qt-plus">+</span>

					<h2 class="full-price">
          <?php echo $row['price']*$row['quantity'] ?> $
					</h2>

					<h2 class="price">
          <?php echo $row['price'] ?>$
					</h2>
				</footer>
			</article>
      <?php }
    }
      ?>
		</section>

	</div>
  

	<footer id="site-footer" >
		<div class="container clearfix">

			<div class="left">
				<h2 class="subtotal">Subtotal: <span><?php
            foreach ($cart as $item) {
            $total += ($item['price']*$item['quantity']);
         }
         echo $total;
        ?></span>$</h2>
				<h2 class="shipping">Shipping: <span>5.00</span>$</h2>
			</div>

			<div class="right" style="margin-left: 1000px;">
				<h1 class="total">Total: <span><?php
        if($total == 0){
            $totalPrice = 0;
        }else{
            foreach ($cart as $item) {
            $totalPrice += ($item['price']*$item['quantity']);
         }
        
         echo $totalPrice + 5;

        }
         ?></span>$</h1>
				<a class="button_7" href="payment.php?total=<?php echo $totalPrice ?>">Checkout</a>
			</div>

		</div>
	</footer>
     
 </main>

 

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


  <script  src="js/cart.js"></script> 
      
      
</head>
      
  </body>
</html>