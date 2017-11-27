<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$name= $address = $phone_no =$email_id=$department=$sem=$video_name="";
$name_err = $address_err = $phone_no_err =$email_id_err=$department_err=$sem_err=$video_name_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter name.";
    } 
    

    if(empty(trim($_POST['address']))){
        $address_err = "Please enter address.";     
    } 
    
    // Validate confirm password
    if(empty(trim($_POST["phone_no"]))){
        $phone_no_err = 'Please enter phone_no.';     
    } 


    if(empty(trim($_POST["email_id"]))){
        $email_id_err = 'Please enter email_id.';     
    } 

     if(empty(trim($_POST["department"]))){
        $department_err = 'Please enter department.';     
    } 

    if(empty(trim($_POST["sem"]))){
        $sem_err = 'Please enter sem.';  

       if(empty(trim($_POST["video_name"]))){
        $sem_err = 'Please enter video_name.'; 
    } 



    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($phone_no_err)&& empty($email_id_err)&& empty($department_err)&& empty($sem_err)&& empty($video_name_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO borrower(name,address,phone_no,email_id,department,sem) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_address,$param_phone_no,$param_email_id,$param_department,$param_sem);
            
            // Set parameters
            $param_name = $name;
           $param_address= $address;           
             $param_phone_no = $phone_no;
              $param_email_id = $email_id;
               $param_department = $department;
                $param_sem = $sem;
                 $param_video_name=$video_name;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: page3.html");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['name']) && isset($_POST['address'])&& isset($_POST['phone_no'])&&isset($_POST['email_id'])&&isset($_POST['department'])&&isset($_POST['sem']))
    {
        $name = $_POST['name'];
	    $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $email_id=$_POST['email_id'];
        $department=$_POST['department'];
        $sem=$_POST['sem'];
        $query = "INSERT INTO borrower (name, address,phone_no,email_id,department,sem) VALUES ('$name','$address','$phone_no','$email_id','$department','$sem')";
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
    <title>Borrower_details</title>
    <style type="text/css">
        body{ padding: 20px; font: 14px sans-serif; background-color:peachpuff; text-align:center; left:50%; border:5px solid black;}
        label{ display: block; }
        input[type="text"], input[type="password"]{ padding: 5px; }
        .error{ color: red; }

    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Borrower-details</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $name_err; ?></span>
            </p>
             <p>
                <label>Adress:</label>
                <input type="text" name="address" value="<?php echo $address; ?>">
                <span class="error"><?php echo $address_err; ?></span>
            </p>
            <p>
                <label>Phone_no:</label>
                <input type="text" name="phone_no"  value="<?php echo $phone_no; ?>">
                <span class="error"><?php echo $phone_no_err; ?></span>
            </p>
            <p>
                <label>email_id</label>
                <input type="text" name="email_id" value="<?php echo $email_id; ?>">
                <span class="error"><?php echo $email_id_err; ?></span>
            </p>
             <p>
                <label>Department:</label>
                <input type="text" name="department" value="<?php echo $department; ?>">
                <span class="error"><?php echo $department_err; ?></span>
            </p>
             <p>
                <label>Sem:</label>
                <input type="text" name="sem" value="<?php echo $sem; ?>">
                <span class="error"><?php echo $sem_err; ?></span>
            </p>

             <p>
                <label>video_name:</label>
                <input type="text" name="video_name" value="<?php echo $video_name; ?>">
                <span class="error"><?php echo $video_name_err; ?></span>
            </p>

            
            <a href="http://localhost/vinimaya/page2.html"><button type="button" style="left:50%"> Back </button></a>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            
        </form>
    </div>    
</body>
</html>

