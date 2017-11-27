<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$video_name = $borrower_name =$issue_date=$due_date=$sname="";
$borrower_name_err = $issue_date_err = $due_date_err =$sname_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["borrower_name"]))){
        $borrower_name_err = "Please enter name.";
    } 
    
    // Validate password
    if(empty(trim($_POST['issue_date']))){
        $issue_date_err = "Please enter issue_date.";     
    } 
    
    // Validate confirm password
    if(empty(trim($_POST["sname"]))){
        $sname_err = 'Please enter staff_name.';     
    } 


    if(empty(trim($_POST["due_date"]))){
        $due_date_err = 'Please enter due_date.';     
    } 

    



    // Check input errors before inserting in database
    if(empty($borrower_name_err) && empty($issue_date_err) && empty($due_date_err)&& empty($sname_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO issue_vd(video_name,borrower_name,issue_date,due_date,sname) VALUES ( ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_video_name,$param_borrower_name,$param_issue_date,$param_due_date,$param_sname);
            
            // Set parameters
            
           $param_video_name= $video_name;           
             $param_borrower_name= $borrower_name;
              $param_issue_date = $issue_date;
               $param_due_date = $due_date;
                $param_sname = $sname;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: page2.php");
            } 
        }
    

    // If the values are posted, insert them into the database.
if ( isset($_POST['video_name'])&& isset($_POST['borrower_name'])&&isset($_POST['issue_date'])&&isset($_POST['due_date'])&&isset($_POST['sname']))
    {
    
	    $video_name = $_POST['video_name'];
        $borrower_name = $_POST['borrower_name'];
        $issue_date=$_POST['issue_date'];
        $due_date=$_POST['due_date'];
        $sname=$_POST['sname'];
        $query = "INSERT INTO issue_vd ( video_name, borrower_name,issue_date,due_date,sname) VALUES ('$video_name','$borrower_name','$issue_date','$due_date','$sname')";
        header("Location:http://localhost/vinimaya/page2.php");
        $result = mysqli_query($link, $query);
        
       
        if($result){
            $smsg = "details entered successfully";
        }else{
            $fmsg ="failed to enter details";
        }
    }
    
         
          
          $sql= "UPDATE video SET available_copies=available_copies-1   WHERE title='$video_name'";
if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
    <title>issue_details</title>
    <style type="text/css">
        body{ padding:30px; font: 14px sans-serif; background-color:white; border:5px solid black;}
        label{ float:left;display:block;font-size:30px; font-family:"Times-New-Roman"; font-style:bold;}
        input[type="text"], input[type="password"]{ padding:10px;  width:600px; margin-left:60px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body style="background-image:url(./images/bck.jpg); background-size: 100%;">
    <div class="wrapper">
        <h3 style="text-align:center; font-family:Times New Roman; font-size:40px;">Issue-details</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           
             <p>
                <pre><label>Video-name  :         </label></pre>
                <input type="text" name="video_name" value="<?php echo $video_name; ?>">
                <br/><br/>
                
            </p>
            <p>
                <pre><label>Borrower-name  :   </label></pre>
                <input type="text" name="borrower_name"  value="<?php echo $borrower_name; ?>">
                <br/><br/>
                <span class="error"><?php echo $borrower_name_err; ?></span>
            </p>
                <p>
               <pre><label>staff-name :            </label></pre>
                <input type="text" name="sname" value="<?php echo $sname; ?>">
                <br/><br/>
                <span class="error"><?php echo $sname_err; ?></span>
            </p>
            <p>
                <pre><label >date-of-issue :         </label></pre>
                <input type="date" name="issue_date"  style="width:43%;" value="<?php echo $issue_date; ?>">
                <br/><br/>
                <span class="error"><?php echo $issue_date_err; ?></span>
            </p>
            
             <p>
                <pre><label>due-date  :              </label></pre>
                <input type="date" name="due_date" style="width:43%;" value="<?php echo $due_date; ?>">
                <br/><br/>
                <span class="error"><?php echo $due_date_err; ?></span>
            </p>
             
            <div id="buttons">
            <a href="http://localhost/vinimaya/page2.php" ><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
             
        </form>
    </div>    
</body>
</html>
