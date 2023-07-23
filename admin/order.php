<?php
    include_once "head.php";
    require_once "../config.php";
    
    if(isset($_GET['filter'])) {
        $filter = $_GET['filter'];
        if($filter != 5) {
            $result = mysqli_query($conn, "SELECT * FROM `order` as o INNER JOIN payment as p ON p.id_payment = o.id_payment WHERE p.status = $filter ORDER BY updated_time DESC");
        } else {
            $result = mysqli_query($conn, "SELECT * FROM `order` as o INNER JOIN payment as p ON p.id_payment = o.id_payment ORDER BY updated_time DESC");
        }
        
    } else {
        $result = mysqli_query($conn, "SELECT * FROM `order` as o INNER JOIN payment as p ON p.id_payment = o.id_payment ORDER BY updated_time DESC");
    }
?>


<style>
  h2{
    margin-left: 100px;
    font-family: 'Times New Roman', Times, serif;
  }
  .menu{
    background-image: url(../img/staff_bg.jpg);
    background-size: 100% 790px;
    background-repeat: no-repeat;
    width: 100%;
    height: 790px;
  }
  .input {
  max-width: 190px;
  background-color: #f5f5f5;
  color: #242424;
  padding: .15rem .5rem;
  min-height: 30px;
  border-radius: 4px;
  outline: none;
  border: none;
  line-height: 1.15;
  box-shadow: 0px 10px 20px -18px;
}

input:focus {
  border-bottom: 2px solid #5b5fc7;
  border-radius: 4px 4px 2px 2px;
}

input:hover {
  outline: 1px solid lightgrey;
}
</style>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/button.css">
    <script src="../js/bootstrap.min.js"></script>
    <script defer src="../js/bootstrap.bundle.min.js"></script>
  <div class="menu">
  <h2 style="color: white;">Order's List</h2>
  <input style="margin-left: 100px;" class="input" name="keyword" placeholder="Search..." type="search">

            <div style="float: right" class="filter-div">
       
        <?php if (isset($_GET['filter'])) { ?>
            <select style="margin-right: 100px;" class="input" onchange="javascript:handleSelect(this)">
                <option value='5' <?php echo $filter == 5 ? "selected" : "" ?>>Tất cả</option>
                <option value='0' <?php echo $filter == 0 ? "selected" : "" ?>>Mới tạo</option>
                <option value='1' <?php echo $filter == 1 ? "selected" : "" ?>>Vận chuyển</option>
                <option value='2' <?php echo $filter == 2 ? "selected" : "" ?>>Hoàn thành</option>
                <option value='3' <?php echo $filter == 3 ? "selected" : "" ?>>Đã hủy</option>
            </select>
        <?php } else { ?>
            <select style="margin-right: 100px;" class="input" onchange="javascript:handleSelect(this)">
                <option value='5'>Tất cả</option>
                <option value='0'>Mới tạo</option>
                <option value='1'>Vận chuyển</option>
                <option value='2'>Hoàn thành</option>
                <option value='3'>Đã hủy</option>
            </select>
        <?php } ?>
    </div>
  <div style="margin-left: 100px; margin-top:100px;">
  <table class="table table-hover table-dark">
  <tr>
  <th scope="col">ID_order</th>
            <th scope="col">Date</th>
            <th scope="col">ID_customer</th>
            <th scope="col">Name</th>
            <th scope="col">Phone number</th>
            <th scope="col">Address</th>
            <th scope="col">Payment</th>
            <th scope="col">Status</th>
            <th></th>
  </tr>
  <?php
            foreach ($result as $row) :
            if($row['status']==0) {
                $status = "Mới tạo";
            } else if($row['status']==1) {
                $status = "Vận chuyển";
            } else if($row['status']==2) {
                $status = "Hoàn thành";
            } else {
                $status = "Đã hủy";
            }
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['updated_time'] ?></td>
                <td><?php echo $row['id_customer'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['name_payment'] ?></td>
                <td><?php echo $status ?></td>
                <td>
                    <a href='order_detail.php?id_order=<?php echo $row['id'] ?>'>View detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>
</div>
</div>

<script type="text/javascript">
  function handleSelect(elm)
  {
    window.location = "order.php?filter=" + elm.value;
    
  }
</script>

</body>
</html>