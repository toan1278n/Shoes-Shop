<?php
 include_once "head.php";

 include_once "../config.php";
 $sql6 = "SELECT * FROM category WHERE level = 0";
 $result6 = mysqli_query($conn, $sql6);
?>
<style>
  .menu{
    background-image: url(../img/category_bg.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
  }
</style>

<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script defer src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/button.css">

<div class="menu">
<div class="main" style="margin-left:50px;">
  <h2  style="margin-left: 100px;text-transform: uppercase; color:aliceblue; font-family: 'Times New Roman', Times, serif; font-size: 50px;">Category</h2>
  <a href="add_new_category.php"  style="text-decoration-line: none;">
<button type="button" class="button_4" style="margin-left: 100px; margin-top: 50px; background-image: linear-gradient(to right, #fc5c7d, #6a82fb);">
  <span class="button_text" style="text-align: center; padding-left: 20px; ">Add</span>
  <span class="button_icon" style="background-image: linear-gradient(to right, #fc5c7d, #6a82fb);"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button></a>
  <br>
  <br>
  <table id='parent' class="table table-striped" style=" padding: 30px;margin-left: 400px; width: 700px;">
  <tr>
    <th>ID</th>
    
    <th>Category</th>
    <th>Action</th>
  </tr>
  <?php 
    foreach ($result6 as $category) :
  ?>
    <tr>
        <td><?php echo $category['id_category'] ?></td>
        <td><?php echo $category['name_category'] ?></td>
        <td>
        <div>
          <a href='delete-category.php?id=<?php echo $category['id_category'] ?>'>
              <button type="button" class="button_3" onclick="return confirm('Are you sure to delete?')">
              <span class="button__icon"><img src="../icon/trash.png" alt="">  </span>
              </button>
          </a>
        </div>
        <div style="margin-top: 10px;"><a href='edit-category.php?id=<?php echo $category['id_category'] ?>'>
               <button class="edit-button">
               <svg class="edit-svgIcon" viewBox="0 0 512 512">
                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                </svg>
                </button></a>
        </div>
        </td>
    </tr>
    <?php
        $parent = $category['id_category'];
        $result1= mysqli_query($conn, "SELECT * FROM category WHERE id_cha = $parent");
        foreach($result1 as $child) :
    ?>
            <tr>
                <td></td>
                <td >
                    <table>
                        <tr>
                            <td style='width: 10%'><?php echo $child['id_category'] ?></td>
                            <td style='width: 70%'><?php echo $child['name_category'] ?></td>
                            <td >
                            <div><a href='delete-category.php?id=<?php echo $child['id_category'] ?>'>
                            <button type="button" class="button_3" onclick="return confirm('Are you sure to delete?')">
                            <span class="button__icon"><img src="../icon/trash.png" alt="">  </span>
                            </button>
                                </a>
                            </div>
                            
                            <div style="margin-top: 10px;"><a style="text-decoration-line: none;" href='edit-category.php?id=<?php echo $child['id_category'] ?>'>
                            <button class="button_6">
                              <svg class="svg-icon" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><g stroke="#a649da" stroke-linecap="round" stroke-width="2"><path d="m20 20h-16"></path><path clip-rule="evenodd" d="m14.5858 4.41422c.781-.78105 2.0474-.78105 2.8284 0 .7811.78105.7811 2.04738 0 2.82843l-8.28322 8.28325-3.03046.202.20203-3.0304z" fill-rule="evenodd"></path></g></svg>
                          <span class="lable">Edit</span>
                          </button>
                            </a>

                        </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
  <?php endforeach;
    endforeach; ?>
</table>
</div>
</section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

</div>

 </body>
 </html>

