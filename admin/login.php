<?php
  
    require_once "../config.php";
    session_start();
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $result = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email' AND password = '$password'");
    
      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_user'] = $row['id_staff'];
        $_SESSION['name'] = $row['name_staff'];
        header("Location: index.php");
      } else {
        echo "The account is not existed. <a style='color:red' href='register.php'>Register here</a>";
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<style>
.main{
    background-image: linear-gradient(109.6deg, rgba(156,252,248,1) 11.2%, rgba(110,123,251,1) 91.1%);
    width: 100%;
    height: 780px;
}
    .form {
  display: flex;
  flex-direction: column;
  width: 500px;
  height: 370px;
  gap: 10px;
  margin-left: 500px;
  background-color: white;
  padding: 2.5em;
  border-radius: 25px;
  transition: .4s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.4) 1px 2px 2px;
  background-color: pink;
}

.form:hover {
  transform: translateX(-0.5em) translateY(-0.5em);
  border: 1px solid #171717;
  box-shadow: 10px 10px 0px #666666;
}

.heading {
  color: black;
  padding-bottom: 2em;
  text-align: center;
  font-weight: bold;
}

.input {
  border-radius: 5px;
  border: 1px solid whitesmoke;
  background-color: whitesmoke;
  outline: none;
  padding: 0.7em;
  transition: .4s ease-in-out;
}

.input:hover {
  box-shadow: 6px 6px 0px #969696,
             -3px -3px 10px #ffffff;
}

.input:focus {
  background: #ffffff;
  box-shadow: inset 2px 5px 10px rgba(0,0,0,0.3);
}

.form .btn {
    width: 200px;
    font-size: 18px;
    font-family: 'Times New Roman', Times, serif;
  margin-top: 2em;
  align-self: center;
  padding: 0.7em;
  padding-left: 1em;
  padding-right: 1em;
  border-radius: 10px;
  border: none;
  color: black;
  transition: .4s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.4) 1px 1px 1px;
}

.form .btn:hover {
  box-shadow: 6px 6px 0px #969696,
             -3px -3px 10px #ffffff;
  transform: translateX(-0.5em) translateY(-0.5em);
}

.form .btn:active {
  transition: .2s;
  transform: translateX(0em) translateY(0em);
  box-shadow: none;
}
.form p{
  font-size: 20px;
  padding-left: 130px;
}
</style>
<div class="main">
<form class="form" action="" method="post">
    <h1 class="heading">Sign in</h1>
    <input required class="input" name="email" placeholder="Email" type="email">
    <input required class="input" name="password" placeholder="Password" type="password"> 
    <button class="btn" type="submit" name="login">Login</button>
    <p>Don't have an account yet? <a href="register.php">Sign up</a></p>
</form>
</div>
</body>
</html>