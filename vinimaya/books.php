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
                header("location: page2.html");
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
    <title>Sign Up</title>
    <style type="text/css">
        body{ padding: 20px; font: 14px sans-serif; background-color:peachpuff; text-align:center; left:50%; border:5px solid black;}
        label{ display: block; }
        input[type="text"], input[type="password"]{ padding: 5px; }
        .error{ color: red; }

    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Book-details</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  style="background:url(./111.jpg)" method="post">
            <p>
                <label>Title:</label>
                <input type="text" name="title" value="<?php echo $title; ?>">
                <span class="error"><?php echo $title_err; ?></span>
            </p>
             <p>
                <label>Author:</label>
                <input type="text" name="author" value="<?php echo $author; ?>">
                <span class="error"><?php echo $author_err; ?></span>
            </p>
            <p>
                <label>Genre:</label>
                <input type="text" name="genre" placeholder="fiction/nonfiction" value="<?php echo $genre; ?>">
                <span class="error"><?php echo $genre_err; ?></span>
            </p>
            <p>
                <label>Language</label>
                <input type="text" name="language" value="<?php echo $language; ?>">
                <span class="error"><?php echo $language_err; ?></span>
            </p>
             <p>
                <label>Total_copies:</label>
                <input type="text" name="total_copies" value="<?php echo $total_copies; ?>">
                <span class="error"><?php echo $total_copies_err; ?></span>
            </p>
             <p>
                <label>Available_copies:</label>
                <input type="text" name="available_copies" value="<?php echo $available_copies; ?>">
                <span class="error"><?php echo $available_copies_err; ?></span>
            </p>
            <a href="http://localhost/vinimaya/page2.html"><button type="button" style="left:50%"> Back </button></a>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            
        </form>
    </div>    
</body>
</html>
