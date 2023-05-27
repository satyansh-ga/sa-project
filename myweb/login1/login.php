<?php
require_once("conndb.php");

if(isset($_POST['sublogin']))
{

  if(!$conn){
     echo("connect to the database is failed due to " . mysqli_connect_error());
  }  
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $select = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    
    $result = mysqli_query($conn, $select);
    
    if(mysqli_num_rows($result) > 0){
        header("location: register.php");
        // echo"<script> alert('username alrea');</script>";
    }
    else{
         echo" invalid credentials";
    }
    
}
?>
<html>
    <head>
         <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css">
         <link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">    
    </head>
    <body>
    <div class="container">
        <div class="sign">
            <center>
       
     <form  action="" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password"placeholder="Password" />
            </div>
            <input type="submit" name="sublogin" value="Login" class="btn solid" />
        </form>
            </center>
           
            <p style="text-align: center; margin-top: 10px;"> <a href="forget.php" class="btne forg" text-align="center">Forget Password?</a></p><br>
            <p ><a href="register.php" class="btne creat">Create New Account</a></p>
        </div>
        </div>
    </body>
</html>