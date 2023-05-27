<?php
require_once("conndb.php");

if(isset($_POST['submit']))
{
    extract($_POST);
    if(strlen($username)<3)
    {
       echo "<script> alert( 'please enter first name using 3 character atleast');</script>";
       
    }
        if(strlen($username)>20){
             echo"<script> alert( 'max length 20 character not allowed');</script>";
        }
       if(!preg_match("/^[A-Za-z_]*[A-Za-z]+[A-Za-z_]*$/",$username)) 
       {
           echo"<script> alert('invalid entry Please start with 3 characters');</script>";
       }
    
    
    if(strlen($lname)<3)
    {
        echo"<script> alert('Please enter atleast 3 characters');</script>";
    }
        if(strlen($lname)>20){
             echo"<script> alert( 'max length 20 character not allowed');</script>";
        }
       if(!preg_match("/^[A-Za-z_]*[A-Za-z]+[A-Za-z_]*$/",$lname)) 
       {
         echo"<script> alert('invalid entry Please start with 3 characters');</script>";
       }
    
    
    if(strlen($email)>50)
    {
        echo "<script> alert( 'email max length 50 character not allowed');</script>";
    }
    if($confirm_password == '')
    {
        echo"<script> alert('please confirm password');</script>";
    }
    if($password != $confirm_password)
    {
         echo"<script> alert( 'passsword not match');</script>";
    }
    if(strlen($password)<5)
    {
         echo"<script> alert( 'password should be atleast 6 characters');</script>";
    }
     if(strlen($password)>20)
    {
         echo"<script> alert( 'password should be less then 20 characters');</script>";
    }
    $sql= "SELECT *FROM users WHERE (username='$username' or email='$email')";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_assoc($res);
        
        if($username==$row['username'])
        {
            echo"<script> alert('username already exists');</script>";
        }
        if($email==$row['email'])
        {
            echo"<script> alert('email already exists');</script>";
        }
    }
   else{
        $date=date('Y-m-d');
        $option = array("cost=>4");
        $password = password_hash($password,PASSWORD_BCRYPT,$option);
        $result = mysqli_query($conn,"INSERT INTO users VALUES('','$username','$lname','$email','$password','$date')");
        if($result)
        {
            echo   "<script> alert('You have successfully registred');</script>";
            header('location:login.php');
        }
        else{
           
            echo"<script> alert('Failed: something went wrong; ');</script>";
        
        }
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
     <form action="" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Firstname" name="username"  required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Lastname" name="lname" required/>
            </div>
         <!--<div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required/>
            </div>-->
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required/>
            </div>
              <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required/>
            </div>
           <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="confirm_password" required/>
            </div>
            <input type="submit" class="btn" value="Sign up" name="submit"/>
        </form>
            </center>
        </div>
        </div>
    </body>
</html>