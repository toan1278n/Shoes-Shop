<?php
require_once "config.php";


    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    $query = "SELECT * FROM product as p 
    INNER JOIN brand as b on b.id = p.id_brand 
    INNER JOIN category as c ON c.id_category = p.id_category
    WHERE b.name_brand = 'Adidas' ORDER BY price $sort";
    $result = mysqli_query($conn, $query);
?>




<!DOCTYPE html>
<html>
<head>
    <title>Sắp xếp sản phẩm theo giá</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="test.php?sort=asc"><svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 500px;" width="50" height="50" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
      <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
      </svg>
</a>
    <a href="test.php?sort=desc">Sắp xếp giảm dần</a>

    <table cellspacing="5" cellpadding="50">
    <?php
            $sort = 'asc'; // Mặc định sắp xếp tăng dần
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'] === 'desc' ? 'desc' : 'asc';
            }
        ?>
    <?php  $count = 0;
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)):
          if ($count % 3 == 0) {
            echo "<tr>";
        }
       ?>
       <?php echo "<td>"; ?>
      <div class="card">
        <div class="shoe"><a href="product-detail.php?id=<?php echo $row['id_product'] ?>"> <img src="img/<?php echo $row['img']; ?>"  alt="" width= "374px;" height= "374px;"></a></div>
        <br>
        <div class="name" name="name"><a  style="text-decoration: none; font-family: 'Times New Roman', Times, serif; color: black" href="product-detail.php?id=<?php echo $row['id_product'] ?>"> <?php echo $row['name']; ?> </a></div>
        <div class="des" name="description"><?php echo $row['Des']; ?></div>
        <div class="price" name="price">$<?php echo $row['price']; ?></div>
        
        <div>
        <a target="_blank" href="product-detail.php?id=<?php echo $row['id_product'] ?>"> <button class="btn">
              DETAILS
        </button>
        </a>
        <button class="cartBtn" name="cart" onclick="addToCart(<?php echo $row['id_product']?>)">
          <svg class="cart" fill="white" viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
            ADD TO CART
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" class="product"><path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"></path></svg>
        </button></a>
        </div>
     </div>
  </div>
  <?php echo "</td>" ?>
  <?php $count++;
        if ($count % 3 == 0) {
            echo "</tr>";
        }
      endwhile;
    ?>
      
  </table>
  </section>
</body>
</html>



