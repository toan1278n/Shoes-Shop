<?php
    include_once "head.php";
    require_once "../config.php";
    $result = mysqli_query($conn, "SELECT *,brand.name_brand,c1.name_category AS 'parent', c2.name_category AS 'child' FROM product, brand, category c1 
    LEFT JOIN category c2 ON c2.id_cha = c1.id_category
    WHERE product.id_category = c2.id_category AND product.id_brand = brand.id;")

    // $result = mysqli_query($conn, "SELECT * FROM product as p 
    // INNER JOIN brand as b ON b.id = p.id_brand 
    // INNER JOIN category as c ON c.id_category = p.id_category
    // -- INNER JOIN product_detail as pd ON pd.id_product = p.id_product
    //  ORDER BY p.id_product ASC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
.intro {
  height: 100%;
  margin-left: 70px;
  background-image: url(../img/bg_1.jpg);
  color: white;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  padding: 20px;
}

.mask-custom {
  background: rgba(24, 24, 16, .2);
  border-radius: 2em;
  backdrop-filter: blur(25px);
  border: 2px solid rgba(255, 255, 255, 0.05);
  background-clip: padding-box;
  box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}
</style>
</head>
<body>
  <link rel="stylesheet" href="../css/button.css">
<div class="main">
  <h3 style="margin-left: 100px; font-family: 'Times New Roman', Times, serif; font-size: 50px;">Shoes's List</h3>
  <a href="add_new_product.php" style="text-decoration-line: none;">
<button type="button" class="button_4" style="margin-left: 100px; margin-top: 50px; ">
  <span class="button_text">Add Item</span>
  <span class="button_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button></a>
  <br>
  <br>
</div>
<section class="intro">
  <div class="bg-image h-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card mask-custom">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-borderless text-white mb-0">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sale_price</th>
                        <th scope="col">Description</th>
                        <th></th>
                      </tr>
                    </thead>
                    <?php
            foreach ($result as $product) :?>
                    <tbody>
                      <tr>
                        
                        <td><?php echo $product['id_product'] ?></td>
                        <td>
                          <img style='width: 70px; height=70px' src='../img/<?php echo $product["img"] ?>'>
                        </td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo $product['name_brand'] ?></td>
                        <td><?php echo $product['parent'] ?></td>
                        <td><?php echo number_format($product['price']) ?></td>
                        <td><?php echo number_format($product['sale_price']) ?></td>
                        <td><?php echo $product['Des'] ?></td> 
                        <td>
                    <div><a href='delete-product.php?id_product=<?php echo $product['id_product'] ?>'>
                    <button type="button" class="button_3" onclick="return confirm('Are you sure to delete?')">
                    <span class="button__icon"><img src="../icon/trash.png" alt="">  </span>
                    </button>
                    </a>
                    </div>
                    <div style="margin-top: 10px;"><a href='edit-product.php?id_product=<?php echo $product['id_product'] ?>'>
                    <button class="edit-button">
                    <svg class="edit-svgIcon" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                  </svg>
                  </button></a>
                  </div>
                      </td>
                      </tr>
                    </tbody>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>


   