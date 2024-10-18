<?php
include"link.php";
include"condb.php";
session_start();


// Check if the user is logged in
if (!isset($_SESSION['id']) || !$_SESSION['id']) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit;
}

// Function to prevent unauthorized navigation
function preventUnauthorizedNavigation() {
    if (isset($_GET['url']) && !empty($_GET['url'])) {
        // User tried to access a different URL
        header('Location: Nav-bar.html'); // Redirect to the main page or an error page
        exit;
    }
}

// Call the function to prevent unauthorized navigation
preventUnauthorizedNavigation();

// Rest of your PHP code for the logged-in user
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="nav-style.css">
        <link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
    </head>
    <body>
      <header class="concept-9">
        <center>  <h1 class="heading">MICROVISION</h1>
          <h3>ADVANCE TECHNOLOGY INSTITUTE</h3></center>
          <nav class="navbar">
            <CENTER> 
            <ul>
                <li>  <a href="Nav-bar.html">HOME</a></li>
                <li>   <a href="Courses.html">COURSES</a></li>
                <li> <a href="indexx.php">REVIEW</a></li>
                <li> <a href="#">BEST PERFORMERS</a></li>
                <li>   <a href="#">ALUMINI</a></li>
               <li> <?php   echo  "<form method='POST' action='".userLogout()."'>
        <button type='submit' class='btn' name='logoutSubmit'>LOGOUT</button>
    </form>"; ?></li>
          </ul>
             </CENTER>
          </nav>
         
        </header>
        <footer>
         <h2 class="welcome">Welcome in MICROVISION  </h2><br>
         <P class="best">Best place to learn about computer and its softwares<br> We prioritize quality over quantity.
        </P>
        </footer>
    </body>
</html>
