<html>
<body>
<form id="home_id" method="POST" action="<?php echo $_SERVER[PHP_SELF]?>">
<script>
function submitForm(action)
{
document.getElementById('home_id').action=action;
document.getElementById('home_id').submit();
}
</script>

<p align = right> Username: <input type ="text" name ="user" placeholder="Enter username">
<p align = right> Password: <input type ="password" name ="password" placeholder="Enter password">
<input type="submit" value="login"  name="submit" >

</body>
</html>

<?php
if (isset($_POST['submit'])){

        mysql_connect( "localhost" , "root" , "") or die(mysql_error());
        mysql_select_db("vinimaya") or die(mysql_error());

        $user=$_POST['user'];
        $pass=$_POST['password'];
        $user=stripslashes('$user');
        $pass=stripslashes('$password');
        $user=mysql_real_escape_string('$user');
        $pass=mysql_real_escape_string('$password');

        $query="SELECT * FROM signup WHERE username='$user' AND password='$password'";
        $result=mysql_query($query) or die ("error: ".mysql_error());

            if (mysql_num_rows($result)==1){

                session_start();
                $_SESSION["user"]=$user;
                $_SESSION["password"]=$password ;

                        $row=mysql_fetch_array($result);
                        if ($row['type']==0){
                        header("location:admin_home.php");
                        }
                        elseif ($row['usertype']==1) {
                        header("location:page2.php");
                        }

                       }
                else 
                echo "invalid password and username";

}//from isset(submit)
?>



