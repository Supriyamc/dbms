<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$name= $phone_no = $address =$email_id=$department=$sem="";
$name_err = $phone_no_err = $address_err =$email_id_err=$department_err=$sem_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } 
    
     // Validate confirm password
    if(empty(trim($_POST["address"]))){
        $address_err = 'Please enter address.';     
    } 


    // Validate password
    if(empty(trim($_POST['phone_no']))){
        $phone_no_err = "Please enter phone_no.";     
    } 


 // Validate password
    if(empty(trim($_POST['email_id']))){
        $email_id_err = "Please enter email_id.";     
    } 

 
     if(empty(trim($_POST["department"]))){
        $department_err = 'Please enter department.';     
    } 
     // Validate password
    if(empty(trim($_POST['sem']))){
        $sem_err = "Please enter semester.";     
    }    

     
    // Check input errors before inserting in database
    if(empty($name_err) && empty($phone_no_err) && empty($address_err)&& empty($email_id_err)&& empty($department_err)&& empty($sem_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO borrower(name,address,phone_no,email_id,department,sem) VALUES (?, ?,?,?,?,?)";
             
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_address,$param_phone_no,$param_email_id,$param_department,$param_sem);
            
            // Set parameters
            $param_name = $name;
           $param_phone_no= $phone_no;           
             $param_address = $address;
              $param_email_id = $email_id;
               $param_department = $department;
              $param_sem = $sem;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location:loged%20user.html");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['name']) && isset($_POST['phone_no'])&& isset($_POST['address'])&& isset($_POST['email_id'])&& isset($_POST['department'])&& isset($_POST['sem']))
    {
        $name = $_POST['name'];
	    $phone_no = $_POST['phone_no'];
        $address = $_POST['address'];
        $email_id=$_POST['email_id'];
        $department = $_POST['department'];
        $sem=$_POST['sem'];
        
        $query = "INSERT INTO borrower (name,address,phone_no,email_id,department,sem) VALUES ('$name','$address','$phone_no','$email_id','$department','$sem')";
        $result = mysqli_query($link, $query);
         header("Location:borrowvd.php");
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
        body{ padding:30px; font: 14px sans-serif; background-image:url(./images/pic46.jpg); border:5px solid black;background-size:100% ; color:white;}
        label{ float:left;display:block;font-size:20px; font-family:"Times-New-Roman";}
        input[type="text"], input[type="password"]{ padding:10px;  width:700px; margin-left:70px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body>
    <div class="wrapper">
    If already a registered borrower then <a href= "http://localhost/vinimaya/borrowvd.php">continue here </a>
        <h3 style="text-align:center; font-family:Times New Roman; font-size:30px;">Borrower-details</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       
            <p>
               <pre><label>Name :             </label></pre>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <br/><br/>
                <span class="error"><?php echo $name_err; ?></span>
            </p>
             <p>
                <pre><label>address :           </label></pre>
                <input type="text" name="address" value="<?php echo $address; ?>">
                <br/><br/>
                <span class="error"><?php echo $address_err; ?></span>
            </p>
            <p>
                <pre><label>phone_no :        </label></pre>
                <input type="text" name="phone_no"  value="<?php echo $phone_no; ?>">
                <br/><br/>
                <span class="error"><?php echo $phone_no_err; ?></span>
            </p>
            <p>
                <pre><label>email_id :           </label></pre>
                <input type="text" name="email_id" value="<?php echo $email_id; ?>">
                <br/><br/>
                <span class="error"><?php echo $email_id_err; ?></span>
            </p>

             <p>
                <pre><label>department :       </label></pre>
                <input type="text" name="department" value="<?php echo $department; ?>">
                <br/><br/>
                <span class="error"><?php echo $department_err; ?></span>
            </p>

            <p>
                <pre><label>sem:                    </label></pre>
                <input type="text" name="sem" placeholder="1-8" value="<?php echo $sem; ?>">
                <br/><br/>
                <span class="error"><?php echo $sem_err; ?></span>
            </p>

            
            <div id="buttons">
            <a href="http://localhost/vinimaya/video_details.php" ><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
             
        </form>
    </div>    
</body>
</html>

