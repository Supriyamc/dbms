<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password =$email_id="";
$username_err = $password_err = $confirm_password_err =$email_id_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM admin WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO admin(username,email_id,password) VALUES (?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_email_id,$password,$confirm_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } 
        }

    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
	    $email_id = $_POST['email_id'];
        $password = $_POST['password'];
    
 
        $query = "INSERT INTO admin(username, email_id, password) VALUES ('$username','$email_id','$password')";
        header("Location:http://localhost/vinimaya/page1.php");
        $result = mysqli_query($link, $query);
        if($result){
            $smsg = "Admin Registration Successful.";
        }else{
            $fmsg ="Admin Registration Failed";
        }
    }
    
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="http://localhost/vinimaya/usersignup.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:url(./images/pic60.jpg); background-size: 100%;">
<header>
<h2 style="text-allign:center;color:black; padding:20px; font-size:60px; font-style:bold;">Vinimaya</h2>
<div id="icon">
<a href="http://localhost/vinimaya/page1.php" ><i class="fa fa-home"></i></a>
</div>
</header>
    <div id="page-wrap">
        <h2 style="font-size:35px;">Admin Signin</h2>
        <form  method="post">
            <p>
                <input type="text" name="username" placeholder="enter username" value="<?php echo $username; ?>">
                <span class="error"><?php echo $username_err; ?></span>
            </p>
             <p>
        
                <input type="text" name="email_id" placeholder="enter email_id" value="<?php echo $email_id; ?>">
                <span class="error"><?php echo $email_id_err; ?></span>
            </p>
            <p>
                
                <input type="password" name="password" placeholder="enter password" value="<?php echo $password; ?>">
                <span class="error"><?php echo $password_err; ?></span>
            </p>
            <p>
    
                <input type="password" name="confirm_password" placeholder="confirm password" value="<?php echo $confirm_password; ?>">
                <span class="error"><?php echo $confirm_password_err; ?></span>
            </p>
             
          
             <a href="http://localhost/vinimaya/page1.php"><button type="button">Back</button></a> 
            <button type="submit">Submit</button>           
        </form>
    </div>    
</body>
</html>


 
