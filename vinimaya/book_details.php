<!DOCTYPE html>
<html>
<style>
 th
 {
     width:250px;
     text-align:center;
     font-size:25px;
     padding:15px;
     color:navy;
 }
 td
 {
     width:250px;
     text-align:center;
     font-size:22px;

 }
 body
 {
     background-image:url(./images/pic52.jpg);
     background-size:100%;
     margin-top:3%;
     text-align:left;
     
    
 }
</style>
<body>

<header>
<h1 style="text-align:center;"> BOOKS </h1>
</header>
<?php
require_once 'connection.php';
echo "<table style='border: solid 2px black; left:20%;'>";
  echo "<tr><th>Id</th><th>Title</th><th>Author</th><th>Genre</th><th>Language</th><th>Available</th></tr><br/><br/>";

class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
         return "<td style='width:130px;'>" . parent::current(). "</td>";
     }

     function beginChildren() { 
         echo "<tr style='width:170px;'>"; 
     } 

     function endChildren() { 
         echo "</tr style='width:170px;'>" . "\n";
     } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vinimaya";

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT book_id,title,author,genre,language,available_copies FROM book"); 
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
<br/>
 <a href="http://localhost/vinimaya/borrowers.php"><button type=button style="margin-left:50%; height:40px; width:70px;"> Borrow </button></a>
 <a href="http://localhost/vinimaya/page3.php"><button type=button style="height:40px;width:70px;">Cancel</button></a>

</body>
</html>