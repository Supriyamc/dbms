<?php

require_once 'connection.php';
     $username =$_POST['username'];
     $password =$_POST['password'];
     
     $username=stripcslashes($username);
     $password=stripcslashes($password);

     $username=mysqli_real_escape_string($username);
     $password=mysqli_real_escape_string($password);

   

     $result=mysqli_query("select username,password from signup where username='$username' and password='$password'");
     $row=mysqli_fetch_array($result);
     if($row['username']==$username &&$row['password']==$password)
     {
         echo "login success!!!";
         header('Location: http://localhost/vinimaya/page2.html');
     }
     else
     {
         echo "failed to login";
     }

    
?>
