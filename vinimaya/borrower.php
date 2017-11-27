<!DOCTYPE html>
<html>
<style>
 th,td
 {
     width:200px;
     text-align:center;
     font-size:15px;
 }
 body
 {
     background-color:#99ccff;
     margin-top:3%;
 }
</style>
<body>

<?php
require_once 'connection.php';
echo "<table style='border: solid 1px black; left:20%;'>";
  echo "<tr><th>Id</th><th>Title</th><th>Author</th><th>Genre</th><th>Language</th><th>Available</th></tr><br/><br/>";
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
 <button type=button style="margin-left:50%;"> Borrow </button>

</body>
</html>