<?php
$servername="localhost";
$username="root";
$password="";
$dbname="pfile";
$conn=mysqli_connect($servername,$username,$password,$dbname);

$sql="SELECT * From pload";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST["submit"]))
{
    $filename = $_FILES['file']['name'];
    $destination = 'upload/'.$filename;
    $extension = pathinfo($filename,PATHINFO_EXTENSION);
    $file=$_FILES['file']['tmp_name'];
    $size=$_FILES['file']['size'];
    
    if(!in_array($extension,['zip','pdf','jpg','jpeg']))
    {
        echo"your file extensio must be jpg,zip,pdf";
    }
    elseif($_FILES['file']['size'] > 10000000)
    {
        echo"file is to long";
    }
    else{
        if(move_uploaded_file($file,$destination))
        {
            $sql="INSERT INTO pload(file,size,downloads)VALUES('$filename','$size',0)";
            
            if(mysqli_query($conn,$sql))
            {
                echo"file uploaded successfully";
            }
            else
            {
                echo"error occured in uploading";
            }
        }
    }
}




if(isset($_GET['file_id']))
{
    $id=$_GET['file_id'];
    
    $sql="SELECT * FROM pload WHERE id=$id";
    
    $result = mysqli_query($conn,$sql);
    
    $file = mysqli_fetch_assoc($result);
    
    $filepath = 'upload/' . $file['file'];
    
    if(file_exists($filepath))
    {
        header ('Content-Type: application/octet-stream');
        
        header('Content-Description: File Transfer');
        
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        
        header('Expires: 0');
        
        header('Cache-control: must-revalidate');
        
        header('Pragma:public');
        
        header('Content-Length:' . filesize('upload/'.$file['file']));
        
        readfile('upload/'.$file['file']);
        
        $newcount=$file['downloads'] + 1;
        
        $updatQuery = "UPDATE pload SET downlaods=$newcount WHERE id=$id";
        
        mysqli_query($conn,$updatQuery);
        
        exit;
    }
}




















?>




<form enctype="multipart/form-data" method="post">
file upload:<input type="file" name="file">
    <input type="submit" name="submit" value="upload">
</form>
<div>
 <table>
    <thead>
        <th>ID</th>
        <th>FileName</th>
        <th>Size</th>
        <th>Downloads</th>
        <th>action</th>
     </thead>
     <tbody>
      <?php foreach($files as $file): ?>
         <tr>
         <td><?php echo $file['id'];?></td>
         <td><?php echo $file['file'];?></td>
         <td><?php echo $file['size'] / 1000 ."Kb";?></td>
         <td><?php echo $file['downloads'];?></td>
         <td>
             <a href="upload.php?file_id=<?php echo $file['id'];?>">Download</a>
         </td></tr>
         <?php endforeach ;?>
     </tbody>
    </table>
</div>