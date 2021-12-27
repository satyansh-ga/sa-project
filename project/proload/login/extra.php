<?php

if(isset($_POST['submit']))
{
$username=mysqli_real_escape_string($conn, $_POST["username"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$password=mysqli_real_escape_string($conn, $_POST["password"]);
$cpassword=mysqli_real_escape_string($conn, $_POST["cpassword"]);

$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$emailquery="SELECT * FROM registration WHERE email=$'email'";

$query=mysqli_query($conn,$emailquery);
$emailcount= mysqli_num_rows($query);

if($emailcount>1){
echo "email alredy exists";
}
else{
    if($password === $cpassword){
    $insertquery="INSERT INTO registration(username,email,password,cpassword) VALUES('$username','$email','$pass','$cpass',)";
        
        $iquery=mysqli_query($conn,$insertquery);
        
            if($iquery){
                  ?>
<script>
     alert("inserted successfull ");
</script>
<?php
}
else{
    ?>
<script>
     alert("no iserted ");
</script>
<?php
            }
        
    }else{
     ?>
<script>
     alert("pasword not matching ");
</script>
<?php
    }
}
}


?>