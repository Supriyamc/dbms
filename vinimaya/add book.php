<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$title= $author = $genre =$language=$total_copies=$available_copies="";
$title_err = $author_err = $genre_err =$language_err=$total_copies_err=$available_copies_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter a title.";
    } 
    
    // Validate password
    if(empty(trim($_POST['author']))){
        $password_err = "Please enter author name.";     
    } 
    
    // Validate confirm password
    if(empty(trim($_POST["genre"]))){
        $confirm_password_err = 'Please enter genre.';     
    } 


    if(empty(trim($_POST["language"]))){
        $confirm_password_err = 'Please enter language.';     
    } 

     if(empty(trim($_POST["total_copies"]))){
        $confirm_password_err = 'Please enter total_copies.';     
    } 

    if(empty(trim($_POST["available_copies"]))){
        $confirm_password_err = 'Please enter available_copies.';     
    } 



    // Check input errors before inserting in database
    if(empty($title_err) && empty($author_err) && empty($genre_err)&& empty($langauge_err)&& empty($total_copies_err)&& empty($available_copies_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO book(title,author,genre,language,total_copies,available_copies) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_title, $param_author,$param_genre,$param_language,$param_total_copies,$param_available_copies);
            
            // Set parameters
            $param_title = $title;
           $param_author= $author;           
             $param_genre = $genre;
              $param_language = $language;
               $param_total_copies = $total_copies;
                $param_available_copies = $available_copies;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: page2.php");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['title']) && isset($_POST['author'])&& isset($_POST['genre'])&&isset($_POST['language'])&&isset($_POST['total_copies'])&&isset($_POST['available_copies']))
    {
        $title = $_POST['title'];
	    $author = $_POST['author'];
        $genre = $_POST['genre'];
        $language=$_POST['language'];
        $total_copies=$_POST['total_copies'];
        $available_copies=$_POST['available_copies'];
        $query = "INSERT INTO book (title, author, genre,language,total_copies,available_copies) VALUES ('$title','$author','$genre','$language','$total_copies','$available_copies')";
        $result = mysqli_query($link, $query);
        header("Location:booksuccess.html");
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
    <title>book_details</title>
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
        <h3 style="text-align:center; font-family:Times New Roman; font-size:40px;">Book-details</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
               <pre><label>Title   :                  </label></pre>
                <input type="text" name="title" value="<?php echo $title; ?>">
                <br/><br/>
                <span class="error"><?php echo $title_err; ?></span>
            </p>
             <p>
                <pre><label>Author  :               </label></pre>
                <input type="text" name="author" value="<?php echo $author; ?>">
                <br/><br/>
                <span class="error"><?php echo $author_err; ?></span>
            </p>
            <p>
                <pre><label>Genre  :                 </label></pre>
                <input type="text" name="genre" placeholder="fiction/nonfiction" value="<?php echo $genre; ?>">
                <br/><br/>
                <span class="error"><?php echo $genre_err; ?></span>
            </p>
            <p>
                <pre><label>Language  :           </label></pre>
                <input type="text" name="language" value="<?php echo $language; ?>">
                <br/><br/>
                <span class="error"><?php echo $language_err; ?></span>
            </p>
             <p>
                <pre><label>Total_copies  :       </label></pre>
                <input type="text" name="total_copies" value="<?php echo $total_copies; ?>">
                <br/><br/>
                <span class="error"><?php echo $total_copies_err; ?></span>
            </p>
             <p>
               <pre><label>Available_copies :  </label></pre>
                <input type="text" name="available_copies" value="<?php echo $available_copies; ?>">
                <br/><br/>
                <span class="error"><?php echo $available_copies_err; ?></span>
            </p>
            <div id="buttons">
            <a href="http://localhost/vinimaya/page2.php"><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
           
        </form>
    </div>    
</body>
</html>
