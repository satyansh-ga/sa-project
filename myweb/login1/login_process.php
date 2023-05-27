<?php
require_once("conndb.php");
if(isset($_POST['sublogin']))
{
    $login=$POST['email'];
    $password=$POST['password'];
    $query="SELECT * FROM users WHERE (email='$login')";
    $res=mysqli_query($conn,$query);
    $numrows=mysqli_num_rows($res);
    if($numrows==1){
       $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
            $_SESSION["login_sess"]="1";
            $_SESSION["login_email"]= $row['email'];
            header("location:index.html");
        }
        else{
           
            echo "login error";
        }
    }
    else{
        header("location:login.php?loginerror=".$login);
        echo "login error";
    }
}
?>