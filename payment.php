<?php 
  include_once "nav.php";
  require_once "config.php";
  if(isset($_GET['total'])) {
    $total = $_GET['total'];
  } else {
    $total = 0;
  }
  $today = date("Y-m-d");

  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $payment = $_POST['payment'];
    $card = $_POST['card_number'];
    
    // Viết câu lệnh truy vấn thêm thông tin vào bảng đơn hàng
    if($payment == 1){
      $sql = "INSERT INTO `order` (id_customer, name, phone,card_number,	address, note, id_payment, updated_time, status) VALUES ( $userID, '$name', '$phone','$card', '$address', '$note', $payment, '$today', 0)";

    }else{
    $sql = "INSERT INTO `order` (id_customer, name, phone,	address, note, id_payment, updated_time, status) VALUES ( $userID, '$name', '$phone', '$address', '$note', $payment, '$today', 0)";
    }
    $result = mysqli_query($conn, $sql);
    // Kiểm tra kết quả
    if($result) {
      // Hàm lấy ra id của đơn hàng cuối cùng được thêm vào bảng
      $id_order = mysqli_insert_id($conn);
    } else {
      echo "Fail";
    }
    //Viết câu lệnh truy vấn lấy ra các id sản phẩm + số lượng, innerjoin vào bảng sản phẩm lấy ra giá tiền trong giỏ hàng của user đó
    $sql1 = "SELECT * FROM cart INNER JOIN product ON product.id_product = cart.id_productDT WHERE id_customer = $userID";
    $result1 = mysqli_query($conn, $sql1);
    
    foreach ($result1 as $row) {
      // Kiểm tra sản phẩm đó có sale không
      if($row['gia_sale'] == 0) {
          $sql2 = "INSERT INTO order_detail(id_order, id_product, quantity, price) VALUES ($id_order, {$row['id_product']}, {$row['quantity']}, {$row['price']})";
      } else {
        $sql2 = "INSERT INTO order_detail(id_order, id_product, quantity, price) VALUES ($id_order, {$row['id_product']}, {$row['quantity']}, {$row['sale_price']})";
      }
      $result2= mysqli_query($conn, $sql2);
    }
    // Kiểm tra kết quả
    if($result2) {
      // Sau khi thêm thành công vào 2 bảng đơn hàng và đơn hàng chi tiết thì Xóa các sản phẩm ở giỏ hàng của user đi
      $result3 = mysqli_query($conn, "DELETE FROM cart WHERE id_customer = $userID");
      header("Location: confirmation.php");
    } else {
      echo "<script>
      alert('Fail');
  </script>";
    }
    
  }
?>

<link rel="stylesheet" href="css/payment.css" >
<div class="container">



<div class="d-flex">
  <form action="" method="POST">
    <div class="form">
    <label>
      <span>Name<span class="required">*</span></span>
      <input type="text" name="name" required>
    </label>
    <label>
      <span>Phone number<span class="required">*</span></span>
      <input type="text" name="phone" required>
    </label>
    <label>
      <span>Address<span class="required">*</span></span>
      <input type="text" name="address" required>
    </label>
    <label>
      <span>Note</span>
      <textarea name="note"></textarea>
    </label>
    </div>
  
  <div class="order">
    <table>
      <tr>
        <th colspan="2">Order</th>
      </tr>
      <tr>
        <td>Total price</td>
        <td><?php echo $total ?>$</td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>5$</td>
      </tr>
    </table><br>
    <div>
      <input type="radio" name="payment" value="1" checked> Banking
    </div>
    Bank: <input type="text" > 
    <br>
    Card number: <input type="text" name="card_number">
    <div>
      <input type="radio" name="payment" value="2"> COD
    </div>
    <div>
      <input type="radio" name="payment" value="3"> Paypal <span>
      <img src="img/paypal.png" alt="" width="30" height="30px">
      </span>
    </div>
       
    <button type="submit" name ="submit">Confirm</button>
    </form>
  </div>
 </div>
</div>