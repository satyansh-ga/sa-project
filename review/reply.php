<?php
    date_default_timezone_set('asia/kolkata');
    include 'condb.php';
    include 'link.php'; 
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
  

   echo "<form method='POST' action='".replyComments($conn)."'>
        <input type='hidden' name='userid' value='".$userid."'>
        <input type='hidden' name='date' value='".$date."'>
    <textarea name='message'>".$message." </textarea><br>
    <button type='submit' name='replySubmit'> Reply </button>
    </form>" ;
       


?>        
    
    </body>

</html>