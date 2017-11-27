
<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$name= $book_name=$issue="";
$name_err = $book_name_err = $issue_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } 
    

    // Validate password
    if(empty(trim($_POST['book_name']))){
        $phone_no_err = "Please enter book_name.";     
    } 


 // Validate password
    if(empty(trim($_POST['borrow_date']))){
        $issue_err = "Please enter date.";     
    } 
  
    // Check input errors before inserting in database
    if(empty($name_err) && empty($book_name_err) && empty($issue_err))
    {
        
            
            // Set parameters
            $param_name = $name;
           $param_book_name= $book_name_no;           
             $param_borrow_date = $issue;
             
        }
    


    header("Location:http://localhost/vinimaya/colbk.html");
         
        // Close statement
        mysqli_stmt_close($stmt);


    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrow-book</title>
    <style type="text/css">
        body{ padding:30px; font: 14px sans-serif; background-image:url(./images/pic4.jpg); border:5px solid black;background-size:100%;}
        label{ float:left;display:block;font-size:20px; font-family:"Times-New-Roman";}
        input[type="text"], input[type="password"]{ padding:10px;  width:700px; margin-left:70px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body>
    <div class="wrapper">
  
        <h3 style="text-align:center; font-family:Times New Roman; font-size:30px;">Book-borrow</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       
            <p>
               <pre><label>Name :                </label></pre>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <br/><br/>
                <span class="error"><?php echo $name_err; ?></span>
            </p>
             <p>
                <pre><label>book-name :         </label></pre>
                <input type="text" name="address"  value="<?php echo $book_name; ?>">
                <br/><br/>
                <span class="error"><?php echo $book_name_err; ?></span>
            </p>
            <p>
                <pre><label>borrow-date:         </label></pre>
                <input type="date" name="phone_no"  style="width:50%;"value="<?php echo $issue; ?>">
                <br/><br/>
                <span class="error"><?php echo $issue_err; ?></span>
            </p>
            

            
            <div id="buttons">
            <a href="http://localhost/vinimaya/book_details.php"><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
             <br/><br/><br/><br/><br/>
        </form>
    </div>    
</body>
</html>

