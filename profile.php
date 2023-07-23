<?php 
    include_once "nav.php";
    require_once "config.php";
    if($login==1) {
        $result = mysqli_query($conn, "SELECT * FROM customer WHERE id = $userID");
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: login.php");
    }
    if(isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $sql = "UPDATE customer SET username = '$name', email = '$email' WHERE id = $userID";
        $result = mysqli_query($conn, $sql);
        header("Location: login.php");
    }
?>
<style>
    form {
  --bg-light: #efefef;
  --bg-dark: #707070;
  --clr: #58BC82;
  --clr-alpha: #9c9c9c60;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
  width: 500px;
}

.form .input-span {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: .5rem;
}

form input[type="text"],
form input[type="email"] {
  border-radius: 0.5rem;
  padding: 1rem 0.75rem;
  width: 100%;
  border: none;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background-color: var(--clr-alpha);
  outline: 2px solid var(--bg-dark);
}

form input[type="text"]:focus,
form input[type="email"]:focus {
  outline: 2px solid var(--clr);
}

.label {
  align-self: flex-start;
  color: var(--clr);
  font-weight: 600;
}

form .submit {
  padding: 1rem 0.75rem;
  display: flex;
  flex-direction: row;

  gap: 0.5rem;
  border-radius: 3rem;
  background-color: var(--bg-dark);
  color: var(--bg-light);
  border: none;
  cursor: pointer;
  transition: all 300ms;
  font-weight: 600;
  font-size: .9rem;
}

form .submit:hover {
  background-color: var(--clr);
  color: var(--bg-dark);
}

.span {
  text-decoration: none;
  color: var(--bg-dark);
}

.span a {
  color: var(--clr);
}
.container{
    background-image: linear-gradient( to right, #434343 0%, black 100%);
    width: 100%;
    height: 780px;
    box-sizing: border-box;
    border-radius: 10px;
    margin-top: 0px;

}
</style>

<div class="container">
<center>

<center> <h1 style="color: white;">Update profile</h1></center>
<form class="form" action="" method="POST" style="margin-top: 190px;">

  <span class="input-span">
  <label for="username" class="label">Fullname</label>
  <input type="text" name="username" id="username" value="<?php echo $row['username']?>"></span>
  <span class="input-span">
  <label for="email" class="label">Email</label>
  <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>"></span>
  <button class="submit" type="submit" name="submit" >Update profile</button>
  <a class="submit" style="text-decoration-line: none;" href="change_pass.php"  >Change password</a>

</form>
</center>
</div>