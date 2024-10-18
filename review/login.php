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
  
  <?php
  echo  "<form method='POST' action='".getLogin($conn)."'>
    <input type='text' name='uid'><br>
    <input type='password' name='pwd'><br>
    <button type='submit' name='loginSubmit'>LOGIN</button>
    </form>";

    
   
    
        ?>
    </body>
</html>