<?php
$conn = mysqli_connect('localhost','root', '', 'MyComments');

if(!$conn){
    die("Connectiion Faileed:".mysqli_connects_error());
}
?>