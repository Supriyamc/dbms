<?php
session_start();
 if (!(isset($_SESSION['adusr'])))
 {
 	     header("Location:http://localhost/vinimaya/login2.php");
 	    // include($_SERVER['DOCUMENT_ROOT']."/databasem/l.php");
    
 }
 ?>


<!DOCTYPE html>
<html>
<title> user </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://localhost/vinimaya/page2.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Library</h3>

  <div class="dropdown">
  <button class="w3-bar-item w3-button">Collections</button>
  <div class="dropdown-content">
    <a href="http://localhost/vinimaya/book_details.php">Books</a>
    <a href="http://localhost/vinimaya/video_details.php">Videos</a>
  </div>
</div>
  
  <a href="http://localhost/vinimaya/lender.php" class="w3-bar-item w3-button">Donate</a>
 
</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-teal">
  <h1>Vinimaya</h1>
  <a href="http://localhost/vinimaya/page1.php" ><i class="fa fa-home" style="size:20px;float:left;"></i></a>
  <a href="alogout.php"><i class="fa fa-sign-out" style="size:20px;float:right;"></i></a>
  <br/>
<hr/>
</div>

<div class="w3-container" style="background-color:black;">
  <blockquote>
<img src="http://localhost/vinimaya/images/pic37.jpg" style="width:100%;">
</blockquote>
</div>

</div>
      
</body>
</html>



