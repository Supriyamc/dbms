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
     background-image:url(./images/pic64.jpg);
     background-size:100%;
     margin-top:3%;
     text-align:left;
     
    
 }
</style>
<body>

<header>
<h1 style="text-align:center; font-size:40px;"> Trasaction-history </h1>
<h2 style="text-align:center">Videos</h2>
</header>
<?php
require_once 'connection.php';
echo "<table style='border: solid 2px black; left:20%;'>";
  echo "<tr><th>video</th><th>borrower</th><th>issue_date</th><th>due_date</th><th>return_date</th></tr><br/><br/>";
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
     $stmt = $conn->prepare("SELECT i.video_name,i.borrower_name,i.issue_date,i.due_date,r.ret_date FROM issue_vd i,submit_vd r where i.video_name=r.video_name and i.borrower_name=r.borrower_name order by issue_date");
    
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
  <a href="http://localhost/vinimaya/page2.php"><button type=button style="height:40px;width:80px;margin-left:50%;">Back</button></a>

</body>
</html>