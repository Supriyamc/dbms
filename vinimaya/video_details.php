<!DOCTYPE html>
<html>
<style>
th
 {
     width:250px;
     text-align:center;
     font-size:25px;
     padding:15px;
 }
 td
 {
     width:250px;
     text-align:center;
     font-size:20px;

 }
 body
 {
     background-image:url(./images/pic51.jpg);
     background-size:100%;
     margin-top:3%;
     text-align:left;
    
 }
</style>
<body>

<header style='text-align:center;'>
<h1> VIDEOS </h1>
</header>
<?php
require_once 'connection.php';
echo "<table style='border: solid 1px black; left:20%;'>";
  echo "<tr><th>Id</th><th>Title</th><th>Language</th><th>Duration</th><th>Genre</th><th>Available</th></tr><br/><br/>";
class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
         return "<td style='width:130px;'>" . parent::current(). "</td>";
     }

     function beginChildren() { 
         echo "<tr style='width:150px;'>"; 
     } 

     function endChildren() { 
         echo "</tr style='width:150px;'>" . "\n";
     } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vinimaya";

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT video_id,title,language,duration,genre,available_copies FROM video"); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>  
<br/>
<br/>

<div id=borrow>
 <a href="http://localhost/vinimaya/borrowersvd.php"><button type=button style="margin-left:40%; height:40px; width:70px;"> Borrow </button></a>
 <a href="http://localhost/vinimaya/page3.php"><button type=button style="height:40px;width:70px;">Cancel</button></a>

</div>
</body>
</html>