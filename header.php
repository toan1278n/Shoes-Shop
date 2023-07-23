<?php
    require_once "config.php";
    session_start();

// Kiểm tra xem đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    $login = 0;
    // Chưa đăng nhập, điều hướng đến trang đăng nhập
    header("Location: login.php");
}else{
  $login = 1;
  $sql0 = "SELECT SUM(quantity) as count FROM cart WHERE id_customer =".$_SESSION['user_id'];
        $result0 = mysqli_query($conn, $sql0);
        $count = mysqli_fetch_assoc($result0);
        if(isset($_POST['search'])) {
          $keyword = $_POST['keyword'];
          $sql = "SELECT * FROM product as p INNER JOIN product_detail as pd ON pd.id_product = p.id_product WHERE name LIKE '%$keyword%'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
        
      }
      
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Load Jquery lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
           <li><img src="img/logo-1.png" alt="" width="70px" height="70px"></li>
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li class="menu"><a href="#" class="nav-link px-2 text-white">Categories</a>
              <ul class="sup-menu">
                <li><a href="Men-shoe.php">Men</a></li>
                <li><a href="Women-shoe.php">Women</a></li>
                <li><a href="Children-shoe.php"> Children </a></li>
              </ul>
          </li>
          <li class="menu"><a href="#" class="nav-link px-2 text-white">Brands</a>
              <ul class="sup-menu">
                <li><a href="Nike.php">Nike</a></li>
                <li><a href="Adidas.php">Adidas</a></li>
                <li><a href="Puma.php"> Puma </a></li>
              </ul>
          </li>
          <li><a href="#" class="nav-link px-2 text-white">Contact</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About us</a></li>
          <a href="cart.php"><img src="icon/cart.png" alt="" width="40px" height="40px"><span id='lblCartCount' style="color: red;"><?php echo $login==1? $count['count']: 0 ?></span></a>
          
        </ul>
        
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="nike.php" method="POST">
          <input onclick="search()" type="search" class="form-control form-control-dark text-bg-dark" id="searchInput" placeholder="Search..." name="keyword" aria-label="Search">
    
        </form>

        <div class="text-end">
          <?php 
          if($login = 1){ ?>
          
          <ul class="nav-links">
          <li class="nav-link dropdown">Xin chào, <a  class="dropdown"><?php echo $_SESSION['username'] ?><i class="bi bi-chevron-compact-down"></i></a>
          <ul class="dropdown-list">
              <li class="nav-link"><a href="profile.php">Profile</a>
              <li class="nav-link"><a href="history.php">History</a>
              <li class="nav-link"><a href="logout.php?logout=true">Logout</a>
          </ul>
          </li>
      </ul>
          <?php }
           else{
            echo '<button type="button" class="btn btn-outline-light me-2">Login</button>';
           }
        ?>
        
        </div>
      </div>
    </div>
  </header>
  </div>
  <div class="div-1">
       <div class="div-2">
        <h1 class="h1-1" >Sportsneaker</h1>
        <h2 class="h2-1"><i>The ultimate destination for shoes</i></h2>
        </div>
    </div>
  
    <script>
        function search() {
            var input = document.getElementById("searchInput").value; // Lấy từ khoá tìm kiếm từ input

            // Thực hiện xử lý tìm kiếm ở đây (gọi API hoặc xử lý logic tìm kiếm)

            // Hiển thị kết quả tìm kiếm
            var searchResults = document.getElementById("searchResults");
            searchResults.innerHTML = "Kết quả tìm kiếm cho: " + input;}

    </script>
  
</body>
</html>