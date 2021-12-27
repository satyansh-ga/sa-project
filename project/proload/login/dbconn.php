<?php

$server="localhost";
$user="root";
$password="";
$dbname="signup";

$conn=mysqli_connect($server,$user,$password,$dbname);

if($conn)
{
    ?>
<script>
     alert("connection successfull ");
</script>
<?php
}
else{
    ?>
<script>
     alert("connection failed ");
</script>
<?php
}
?>