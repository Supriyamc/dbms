<?php
$prev=$_SERVER['HTTP_REFERER'];
echo $prev;
if($prev=="http://localhost/vinimaya/login1.php")
 { 
	 $mysql= new mysqli("localhost","root","","vinimaya");
	if($mysql->connect_error)
	{
		die("connection failed:" .$mysql->connect_error);
	}

/*    $mysql=mysql_connect("localhost","root","")or die(mysql_error());
    mysql_select_db("airline",$mysql) or die(mysql_error());*/
  
  $id=$_POST['username'];
  $psd=$_POST['password'];
  $qu=$mysql->query("select * from admin where username='$id' and password='$psd';");
  $n=mysqli_num_rows($qu);
  if($n)
  {
 // echo "<script type=\"text/javascript\">alert(\"logged in\"); window.history.go(-1)
   //   </script>"; 
    session_start();
		$_SESSION['adusr']=$id;   	
		$_SESSION['passwd']=$psd;
	  header("Location:http://localhost/vinimaya/page2.php");
  }
  else
  {
  echo "<script type=\"text/javascript\">alert(\"unregistered admin,please register\"); window.history.go(-1)
      </script>"; 

  }
 } 
?>