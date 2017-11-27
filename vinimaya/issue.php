<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$book_name= $video_name = $borrower_name =$issue_date=$due_date=$staff_name="";
$borrower_name_err =$issue_date_err=$due_date_err=$staff_name_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["borrower_name"]))){
        $name_err = "Please enter a name.";
    } 
    
     // Validate confirm password
    if(empty(trim($_POST["issue_date"]))){
        $address_err = 'Please enter date.';     
    } 


    // Validate password
    if(empty(trim($_POST['due_date']))){
        $phone_no_err = "Please enter date.";     
    } 


 // Validate password
    if(empty(trim($_POST['staff_name']))){
        $email_id_err = "Please enter name.";     
    } 

     if(empty(trim($_POST["book_name"]))){
        $address_err = 'Please enter book_name.';     
    } 


    // Validate password
    if(empty(trim($_POST['video_name']))){
        $phone_no_err = "Please enter video_name.";     
    } 

    // Check input errors before inserting in database
    if(empty($borrower_name_err) && empty($issue_date_err) && empty($due_date_err)&& empty($staff_name_err)&& empty($book_name_err)&& empty($video_name_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO issue((select book_id from book  where title=book_name;),(select video_id from video where title=video_name;),(select borrower_id from borrower where name=borrower_name;),issue_date,due_date,(select staff_id from staff where name=staff_name;)) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_book_name, $param_video_name,$param_borrower_name,$param_issue_date,$param_due_date,$param_staff_name);
            
            // Set parameters
            $param_book_name = $book_name;
           $param_video_name= $video_name;           
             $param_borrower_name = $borrower_name;
              $param_issue_date = $issue_date;
               $param_due_date = $due_date;
              $param_staff_name = $staff_name;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location:loged%20user.html");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['book_name']) && isset($_POST['video_name'])&& isset($_POST['borrower_name'])&& isset($_POST['issue_date'])&& isset($_POST['due_date'])&& isset($_POST['staff_name']))
    {
        $book_name = $_POST['book_name'];
	    $video_name = $_POST['video_name'];
        $borrower_name = $_POST['borrower_name'];
        $issue_date=$_POST['issue_date'];
        $due_date = $_POST['due_date'];
        $staff_name=$_POST['staff_name'];
        
        $query = "INSERT INTO issue (book_id,video_id,borrower_id,issue_date,due_date,staff_id) VALUES ((select book_id from book where title='$book_name';),(select video_id from video where title='$video_name';),(select borrower_id from borrower where name='$borrower_name';),'$issue_date','$due_date',(select staff_id from staff where name='$staff_name';)";
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
    <title>issue_details</title>
    <style type="text/css">
        body{ padding:30px; font: 14px sans-serif; background-color:white; border:5px solid black;}
        label{ float:left;display:block;font-size:20px; font-family:"Times-New-Roman";}
        input[type="text"], input[type="password"]{ padding:10px;  width:700px; margin-left:70px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body>
    <div class="wrapper">
        <h3 style="text-align:center; font-family:Times New Roman; font-size:30px;">Issue-details</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
               <pre><label>: Book_name:            </label></pre>
                <input type="text" name="book_name" value="<?php echo $book_name; ?>">
                <br/><br/>
                
            </p>
             <p>
                <pre><label>Video_name :             </label></pre>
                <input type="text" name="video_name" value="<?php echo $video_name; ?>">
                <br/><br/>
                
            </p>
            <p>
                <pre><label>borrower_name :                </label></pre>
                <input type="text" name="borrower_name"  value="<?php echo $borrower_name; ?>">
                <br/><br/>
                <span class="error"><?php echo $borrower_name_err; ?></span>
            </p>
            <p>
                <pre><label>date-of-issue :           </label></pre>
                <input type="date" name="issue_date" value="<?php echo $issue_date; ?>">
                <br/><br/>
                <span class="error"><?php echo $issue_date_err; ?></span>
            </p>

             <p>
                <pre><label>due-date :           </label></pre>
                <input type="date" name="due_date" value="<?php echo $due_date; ?>">
                <br/><br/>
                <span class="error"><?php echo $due_date_err; ?></span>
            </p>

            <p>
                <pre><label>staff-name:           </label></pre>
                <input type="text" name="staff_name" placeholder="staff who issued book" value="<?php echo $staff_name; ?>">
                <br/><br/>
                <span class="error"><?php echo $staff_name_err; ?></span>
            </p>

            
            <div id="buttons">
            <a href="http://localhost/vinimaya/page3.php" target="_blank"><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
              <a href="http://localhost/vinimaya/colbk.html" target="_blank" style="float:right"> finish</a>
        </form>
    </div>    
</body>
</html>

