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
   $sid = $_POST['sid'];
   $userid = $_POST['userid'];
   $date = $_POST['date'];
   $message = $_POST['message']; 
   echo "<form method='POST' action='".editComments($conn)."'>
        <input type='hidden' name='sid' value='".$sid."'>
        <input type='hidden' name='userid' value='".$userid."'>
        <input type='hidden' name='date' value='".$date."'>
    <textarea name='message'>".$message." </textarea><br>
    <button type='submit' name='commentSubmit'> EDIT </button>
    </form>" ;
       


?>        
    
    </body>

</html>