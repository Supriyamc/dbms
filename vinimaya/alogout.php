<html>
<head>
<title>logout</title>
</head>

<body style="background:url(./18.jpg); background-size: 100% auto; background-repeat:no repeat;">
<?php
if (isset($_SESSION['adusr']))
{
	unset($_SESSION['adusr']);
	$_SESSION['adusr']="";
	session_destroy();
}
echo "<script type=\"text/javascript\"> 
        alert(\"Sucessfully Logged Out\");
        window.location.assign(\"page1.php\")  </script>";
?>

</body>
</html>