<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$name= $phone_no = $address =$email_id=$book_name=$video_name="";
$name_err = $phone_no_err = $address_err =$email_id_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } 
    
    // Validate phone_no
    if(empty(trim($_POST['phone_no']))){
        $password_err = "Please enter phone_no.";     
    } 
    
    // Validate address
    if(empty(trim($_POST["address"]))){
        $confirm_password_err = 'Please enter address.';     
    } 


    if(empty(trim($_POST["email_id"]))){
        $confirm_password_err = 'Please enter email_id.';     
    } 

     if(empty(trim($_POST["book_name"]))){
        $confirm_password_err = 'Please enter book_name.';     
    } 

    if(empty(trim($_POST["video_name"]))){
        $confirm_password_err = 'Please enter video_name.';     
    } 



    // Check input errors before inserting in database
    if(empty($name_err) && empty($phone_no_err) && empty($address_err)&& empty($email_id_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO lender(name,phone_no,address,email_id) VALUES (?, ?,?,?)";
       
        $sql1="INSERT INTO donate_book(lender_id,book_id) VALUES(??)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_phone_no,$param_address,$param_email_id);
            
            // Set parameters
            $param_name = $name;
           $param_phone_no= $phone_no;           
             $param_address = $address;
              $param_email_id = $email_id;
               

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location:loged%20user.html");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['name']) && isset($_POST['phone_no'])&& isset($_POST['address'])&& isset($_POST['email_id']))
    {
        $name = $_POST['name'];
	    $phone_no = $_POST['phone_no'];
        $address = $_POST['address'];
        $email_id=$_POST['email_id'];
        
        $query = "INSERT INTO lender (name, phone_no,address,email_id) VALUES ('$name','$phone_no','$address','$email_id')";
        header("Location:http://localhost/vinimaya/donate.html");
        $result = mysqli_query($link, $query);
        if($result){
            $smsg = "details entered successfully";
        }else{
            $fmsg ="failed to enter details";
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
    <title>Lender_details</title>
    <style type="text/css">
        body{ padding:30px; font: 14px sans-serif; background-image:url(./images/pic55.jpg); border:5px solid black;}
        label{ float:left;display:block;font-size:20px; font-family:"Times-New-Roman";}
        input[type="text"], input[type="password"]{ padding:10px;  width:700px; margin-left:50px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body>
    If registered <a href="http://localhost/vinimaya/donate.html" >continue here</a>
    <div class="wrapper">
        <h3 style="text-align:center; font-family:Times New Roman; font-size:30px;">Lender-details</h3>
       
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
               <pre><label>Name :              </label></pre>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <br/><br/>
                <span class="error"><?php echo $name_err; ?></span>
            </p>
             <p>
                <pre><label>phone_no :         </label></pre>
                <input type="tel" name="phone_no"  maxlength="10" size="100%" value="<?php echo $phone_no; ?>">
                <br/><br/>
                <span class="error"><?php echo $phone_no_err; ?></span>
            </p>
            <p>
                <pre><label>address :             </label></pre>
                <input type="text" name="address"  value="<?php echo $address; ?>">
                <br/><br/>
                <span class="error"><?php echo $address_err; ?></span>
            </p>
            <p>
                <pre><label>email_id :           </label></pre>
                <input type="text" name="email_id" value="<?php echo $email_id; ?>">
                <br/><br/>
                <span class="error"><?php echo $email_id_err; ?></span>
            </p>
             <p>
                <pre><label>book_name :      </label></pre>
                <input type="text" name="book_name" placeholder="enter if donating book" value="<?php echo $book_name; ?>">
                <br/><br/>
                
            </p>
             <p>
               <pre><label>video_name :    </label></pre>
                <input type="text" name="video_name" placeholder="enter  only if donating video" value="<?php echo $video_name; ?>">
                <br/><br/>
            </p>
            <div id="buttons">
            <a href="http://localhost/vinimaya/page3.php"><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
              
        </form>
    </div>    
</body>
</html>

