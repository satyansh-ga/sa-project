<?php
function setComments($conn){
    if(isset($_POST['commentSubmit'])){
        //echo"SATYANSH";
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO comments (userid, date, message) VALUES ('$userid', '$date','$message')";
        $result = $conn->query($sql);
    }
    
}
function getComments($conn) {
    // Fetch all comments
    $sql = "SELECT comments.*, user.uid FROM comments JOIN user ON comments.userid = user.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='comment-box'><p>";
            echo $row['uid'] . "<br>";
            echo $row['date'] . "<br>";
            echo $row['message'];
            echo "</p>";

            if (isset($_SESSION['id']) && $_SESSION['id'] == $row['userid']) {
                echo "<form class='delete-form' method='POST' action='" . deleteComments($conn) . "'>
                        <input type='hidden' name='sid' value='" . $row['sid'] . "'>
                        <button type='submit' name='commentDelete'>Delete</button>
                      </form>
                      <form class='edit-form' method='POST' action='editComment.php'>
                        <input type='hidden' name='sid' value='" . $row['sid'] . "'>
                        <input type='hidden' name='userid' value='" . $row['userid'] . "'>
                        <input type='hidden' name='date' value='" . $row['date'] . "'>
                        <input type='hidden' name='message' value='" . $row['message'] . "'>
                        <button>Edit</button>
                      </form>";
            }else{
                  echo" <form class='reply-form' method='POST' action='reply.php'>
                          <input type='hidden' name='sid' value='".$row['sid']."'>
                           <input type='hidden' name='userid' value='" . $row['userid'] . "'>
                        <input type='hidden' name='date' value='" . $row['date'] . "'>
                        <input type='hidden' name='message' value='" . $row['message'] . "'>
                       
                          <button>Reply </button>
                          </form>";
                }
            echo "</div>";
        }
    } else {
        echo "No comments found.";
    }
}
function editComments($conn){
    if(isset($_POST['commentSubmit'])){
        $userid = $_POST['sid'];
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "UPDATE comments SET message='$message' WHERE sid='$sid'";
        $result = $conn->query($sql);
        header("Location:indexx.php");
    }
    
}
function deleteComments($conn){
     if(isset($_POST['commentDelete'])){
        $sid = $_POST['sid'];
       
        
        $sql = "DELETE FROM comments WHERE sid='$sid'";
        $result = $conn->query($sql);
        header("Location:indexx.php");
    }
}
function replyComments($conn){
    if(isset($_POST['replySubmit'])){
        $sid = $_POST['sid'];
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO comments (userid, date, message) VALUES ('$userid', '$date','$message')";
        $result = $conn->query($sql);
    }
    else{
        echo"ERROR OCCURED";
    }
    
}
function getLogin($conn){
    if(isset($_POST['loginSubmit'])){
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        $sql = "SELECT * FROM user where uid='$uid' AND pwd='$pwd'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0){
            if($row = $result->fetch_assoc()){
                $_SESSION['id'] = $row['id'];
                header("Location:index.php?loginsuccess");
                exit();
            }
        }else{
           echo '<script> 
                window.location.href = "login.php";
                alert "Login failed. invalid username and password";
                </script>';
                exit();
    }
    }
}
function userLogout(){
    if(isset($_POST['logoutSubmit'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: Nav-bar.html");
        exit();
    }
}
?>

 