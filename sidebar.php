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
        $userID = $_SESSION['user_id'];
        $result = mysqli_query($conn, "SELECT * FROM category WHERE level = 0");
        $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sport Sneakers </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
    /* Google Fonts Import Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 260px;
  background: #11101d;
  z-index: 100;
  transition: all 0.5s ease;
}
.sidebar.close{
  width: 78px;
}
.sidebar .logo-details{
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.sidebar .logo-details .logo_name{
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.sidebar.close .logo-details .logo_name{
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links{
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.sidebar.close .nav-links{
  overflow: visible;
}
.sidebar .nav-links::-webkit-scrollbar{
  display: none;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li:hover{
  background: #1d1b31;
}
.sidebar .nav-links li .iocn-link{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sidebar.close .nav-links li .iocn-link{
  display: block
}
.sidebar .nav-links li i{
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.sidebar .nav-links li.showMenu i.arrow{
  transform: rotate(-180deg);
}
.sidebar.close .nav-links i.arrow{
  display: none;
}
.sidebar .nav-links li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sidebar .nav-links li a .link_name{
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .link_name{
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li .sub-menu{
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: #1d1b31;
  display: none;
}
.sidebar .nav-links li.showMenu .sub-menu{
  display: block;
}
.sidebar .nav-links li .sub-menu a{
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.sidebar .nav-links li .sub-menu a:hover{
  opacity: 1;
}
.sidebar.close .nav-links li .sub-menu{
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.sidebar.close .nav-links li:hover .sub-menu{
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.sidebar .nav-links li .sub-menu .link_name{
  display: none;
}
.sidebar.close .nav-links li .sub-menu .link_name{
  font-size: 18px;
  opacity: 1;
  display: block;
}
.sidebar .nav-links li .sub-menu.blank{
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li:hover .sub-menu.blank{
  top: 50%;
  transform: translateY(-50%);
}
.sidebar .profile-details{
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #1d1b31;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details{
  background: none;
}
.sidebar.close .profile-details{
  width: 78px;
}
.sidebar .profile-details .profile-content{
  display: flex;
  align-items: center;
}
.sidebar .profile-details img{
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details img{
  padding: 10px;
}
.sidebar .profile-details .profile_name,
.sidebar .profile-details .job{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.sidebar.close .profile-details i,
.sidebar.close .profile-details .profile_name,
.sidebar.close .profile-details .job{
  display: none;
}
.sidebar .profile-details .job{
  font-size: 12px;
}
.home-section{
  position: relative;
  background: white;
  height: 100vh;
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.sidebar.close ~ .home-section{
  left: 78px;
  width: calc(100% - 78px);
}
.home-section .home-content{
  height: 60px;
  display: flex;
  align-items: center;
}
.home-section .home-content .bx-menu,
.home-section .home-content .text{
  color: #11101d;
  font-size: 35px;
}
.home-section .home-content .bx-menu{
  margin: 0 15px;
  cursor: pointer;
}
.home-section .home-content .text{
  font-size: 26px;
  font-weight: 600;
}
@media (max-width: 400px) {
  .sidebar.close .nav-links li .sub-menu{
    display: none;
  }
  .sidebar{
    width: 78px;
  }
  .sidebar.close{
    width: 0;
  }
  .home-section{
    left: 78px;
    width: calc(100% - 78px);
    z-index: 100;
  }
  .sidebar.close ~ .home-section{
    width: 100%;
    left: 0;
  }
}

   </style>
   <script src="js/category.js"></script>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      
      <img class="bx bxl" width="60px" height="60px" style="margin-left: 10px; margin-top:5px;"  src="img/logo-1.png" alt="">
      <span class="logo_name">Sport Sneakers</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Home</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="men-shoe.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Men</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        
        <ul class="sub-menu">
          <li><a class="link_name" href="men-shoe.php">Men</a></li>
          <?php  
                    $result1 = mysqli_query($conn, "SELECT * FROM category WHERE id_cha = 1");
                    foreach ($result1 as $category_con) :
                ?>
                    <li><a href='category.php?id_category=<?php echo $category_con['id_category'] ?>'><?php echo $category_con['name_category'] ?></a></li>
                <?php endforeach; ?>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="women-shoe.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Women</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        
        <ul class="sub-menu">
          <li><a class="link_name" href="women-shoe.php">Women</a></li>
          <?php  
                    $result1 = mysqli_query($conn, "SELECT * FROM category WHERE id_cha = 2");
                    foreach ($result1 as $category_con) :
                ?>
                    <li><a href='category.php?id_category=<?php echo $category_con['id_category'] ?>'><?php echo $category_con['name_category'] ?></a></li>
                <?php endforeach; ?>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="children-shoe.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Kids</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        
        <ul class="sub-menu">
          <li><a class="link_name" href="children-shoe.php">Kids</a></li>
          <?php  
                    $result1 = mysqli_query($conn, "SELECT * FROM category WHERE id_cha = 3");
                    foreach ($result1 as $category_con) :
                ?>
                    <li><a href='category.php?id_category=<?php echo $category_con['id_category'] ?>'><?php echo $category_con['name_category'] ?></a></li>
                <?php endforeach; ?>
        </ul>
      </li>
      
      
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Brand</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Brand</a></li>
          <li><a href="nike.php">Nike</a></li>
          <li><a href="adidas.php">Adidas</a></li>
          <li><a href="puma.php">Puma</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <img src="icon/color.png" alt="" width="25px" height="25px" style="margin-left: 30px;">
            <span class="link_name">Color</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Color</a></li>
          <?php  
                    $result2 = mysqli_query($conn, "SELECT * FROM color");
                    foreach ($result2 as $color) :
                ?>
                    <li><a href='color.php?id_color=<?php echo $color['id_color'] ?>'><?php echo $color['name_color'] ?></a></li>
                <?php endforeach; ?>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="cart.php">
            <i class='bx bx-cart' ></i>
            <span class="link_name">Cart</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="cart.php">Cart</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
  
      <div class="iocn-link">
      <li>
      <a href="logout.php"><i class='bx bx-log-out' ></i>
      <span class="link_name">Log out</span>
    </a>
    <ul class="sub-menu blank">
          <li><a class="link_name" href="logout.php">Log out</a></li>
        </ul>
    </div>
  </li>
</ul>
  </div>
  
  
</body>
</html>