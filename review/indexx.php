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
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    </head>
<body>
    <header class="heading2">
    <nav>
        <a href="Nav-bar.html">HOME</a>
    </nav>


    </header>
    
    
    <?php
     if(isset($_SESSION['id'])){
        echo "You are logged in ";
    }else{
        echo "you are LOGGED OUT";
    }
  echo  "<form method='POST' action='".userLogout()."'>
        <button type='submit' name='logoutSubmit'>LOGOUT</button>
    </form>";
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
        echo "You Have To <b>LOGGED IN</b> for adding Comments<br><br>";
    }
   
       
getComments($conn);
////
?>        
    
    </body>

</html>
