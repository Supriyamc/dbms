<?php
session_start();
 if (!(isset($_SESSION['adusr'])))
 {
 	     header("Location:http://localhost/vinimaya/login1.php");
 	    // include($_SERVER['DOCUMENT_ROOT']."/databasem/l.php");
    
 }
 ?>

<!DOCTYPE html>
<html>
<title>admin page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://localhost/vinimaya/page2.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Library</h3>
  <a href="http://localhost/vinimaya/add%20book.php" class="w3-bar-item w3-button">Books</a>
  <a href="http://localhost/vinimaya/add%20video.php" class="w3-bar-item w3-button">Videos</a>
  <div class="dropdown">
  <a href="http://localhost/vinimaya/staff.php" class="w3-bar-item w3-button">staff</a>
  <div class="dropdown-content">
    <a href="http://localhost/vinimaya/issueop.html">issue</a>
    <a href="http://localhost/vinimaya/giveop.html">return</a>
  </div>
  </div>
  <div class="dropdown">
  <a  class="w3-bar-item w3-button">History</a>
  <div class="dropdown-content">
    <a href="http://localhost/vinimaya/transaction.php">book</a>
    <a href="http://localhost/vinimaya/transaction_vd.php">video</a>
  </div>
</div>
</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-teal">
  <h1 style="font-family:'Times New Roman', Times, serif; margin-top:20px;">Vinimaya</h1>
  <a href="http://localhost/vinimaya/page1.php" target="_blank"><i class="fa fa-home" style="size:20px;float:left;"></i></a>
   <a href="alogout.php" target="_blank"><i class="fa fa-sign-out" style="size:20px;float:right;color:white"></i></a>
</div>

<div class="w3-container" style="background-image:url(./images/d2.jpg); background-size: 100%;">
  <blockquote>
<p>
  A Library with collections of books and videos of variety of interests
</p>
</blockquote>
</div>

</div>
      


</body>
</html>
