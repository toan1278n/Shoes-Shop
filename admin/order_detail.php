<?php
    include_once "head.php";
    require_once "../config.php";
    if(isset($_GET['id_order'])) {
        $id_don = $_GET['id_order'];
        $result = mysqli_query($conn, "SELECT * FROM `order` as o INNER JOIN payment as p ON p.id_payment = o.id_payment WHERE o.id = $id_don");
        $row = mysqli_fetch_assoc($result);
    } else {
        header ("Location: product.php");
    }
    
?>
<style>
    .main{
        margin-left: 100px;
        width: 100%;
        height: 740px;
        
    }
  .colorful-form {
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f5f5f5;
  border-radius: 10px;
}

.form-group {
  margin-bottom: 20px;
}

.form-label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #333;
}

.form-input {
  width: 100%;
  padding: 10px;
  border: none;
  background-color: #fff;
  color: #333;
  border-radius: 5px;
}

textarea.form-input {
  height: 100px;
}

.form-button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #ff6f69;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-button:hover {
  background-color: #ff5f59;
}
.form-input select{
    width: 100%;
}
.order{
    float: right;
    width: 100%;
}
</style>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<div class="main">
    <h2>Information of order <?php echo $row['id'] ?> </h2>
    <form class="colorful-form">
  <div class="form-group">
    <label class="form-label">Date</label>
    <div class="form-input" > <?php echo $row['updated_time'] ?>
  </div>
  <div class="form-group">
    <label class="form-label">ID</label>
    <div class="form-input" > <?php echo $row['id_customer'] ?>
  </div>
  <div class="form-group">
    <label class="form-label">Fullname</label>
    <div class="form-input"  ><?php echo $row['name'] ?>
  </div>
  <div class="form-group">
    <label class="form-label">Phone</label>
    <div class="form-input"  ><?php echo $row['phone'] ?>
  </div>
  <div class="form-group">
    <label class="form-label">Address</label>
    <div class="form-input"  ><?php echo $row['address'] ?>
  </div>
  <div class="form-group">
    <label class="form-label">Payment</label>
    <div class="form-input"  ><?php echo $row['name_payment'] ?>
  </div>
  <div class="form-group">
    <label class="form-label">Note:</label>
    <textarea required="" placeholder="Enter your message" class="form-input" name="message" id="message"><?php echo $row['note'] ?></textarea>
  </div>
  <div class="form-group">
    <label class="form-label">Status</label>
    <div class="form-input">
            <select name="status">
                <option value="0" <?php echo $row['status'] == 0 ? "selected" : "" ?>>Mới tạo</option>
                <option value="1" <?php echo $row['status'] == 1 ? "selected" : "" ?>>Vận chuyển</option>
                <option value="2" <?php echo $row['status'] == 2 ? "selected" : "" ?>>Hoàn thành</option>
                <option value="3" <?php echo $row['status'] == 3 ? "selected" : "" ?>>Đã hủy</option>
            </select>
            </div>
        </div>
  </div>
  <button class="form-button">Submit</button>
</form>
</div>
<br>
    <div class="order">
    <h2>Order detail</h2>
    <table class="table table-hover">
        <tr>
            <th>STT</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php
            $result2 = mysqli_query($conn, "SELECT * FROM order_detail as od 
            INNER JOIN product as p ON p.id_product = od.id_product
            INNER JOIN cart as c ON c.id_productDT = p.id_product
            WHERE od.id_order = $id_don");
            $i = 1;
            foreach ($result2 as $row) :
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['size'] ?></td>
                <td><?php echo $row['price'] ?>$</td>
                <td><?php echo $row['quantity']*$row['price'] ?>$</td>
            </tr>
        <?php $i++; endforeach; ?>
    </table>
    </div>

   
</body>
</html>