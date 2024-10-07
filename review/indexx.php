<?php
    date_default_timezone_set('asia/kolkata');
    include 'condb.php';
    include 'link.php'; 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comments</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <?php
  echo  "<form method='POST' action='".getLogin($conn)."'>
    <input type='text' name='uid'>
    <input type='password' name='pwd'>
    <button type='submit' name='loginSubmit'>LOGIN</button>
    </form>";
echo  "<form method='POST' action='".userLogout()."'>
        <button type='submit' name='logoutSubmit'>LOGOUT</button>
    </form>";
    
    if(isset($_SESSION['id'])){
        echo "You are logged in ";
    }else{
        echo "you are LOGGED OUT";
    }
    
        ?>
    <br><br>
 <?php  
     if(isset($_SESSION['id'])){
        echo "<form method='POST' action='".setComments($conn)."'>
        <input type='hidden' name='userid' value='".$_SESSION['id']."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'>Place your comment here </textarea><br>
    <button type='submit' name='commentSubmit'> COMMENT  </button>
    </form>" ;
    }else{
        echo "You Have To LOGGED In for adding Comments<br><br>";
    }
   
       
getComments($conn);

?>        
    
    </body>

</html>