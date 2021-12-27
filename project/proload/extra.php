$file_name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $file_size=$FILES['file'] ['size'];
  $path="upload/".$file_name;
  $file1 =explode(".",$file_name);
  $ext=$file1[1];
  $allowed=array("jpg", "jpeg","png","gif","pdf","zip");
  if(in_array($ext,$allowed))
  {
      echo" your file extenion must be .zip, .pdf, .jpg, .jpeg, .png, .gif ";
      elseif($_FILES['file'] ['size'] > 10000000){
          echo"your file is too large"
      }
  move_uploaded_file($tmp_name,$path);
      $sql="INSERT INTO pload(file,size,downloads) VALUES('$file_name','$size',0)" ;
      
     if(mysqli_query($conn,$sql))
     {
         echo"file upload successfully";
     }
      else{
          echo"failed to upload file";
      }
       
  }
}
  