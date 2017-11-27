<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$title= $author = $genre =$language="";
$title_err = $author_err = $genre_err =$language_err="";
 
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

     


    // Check input errors before inserting in database
    if(empty($title_err) && empty($author_err) && empty($genre_err)&& empty($langauge_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO book(title,author,genre,language,total_copies,available_copies) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_title, $param_author,$param_genre,$param_language);
            
            // Set parameters
            $param_title = $title;
           $param_author= $author;           
             $param_genre = $genre;
              $param_language = $language;
              
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: page2.php");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['title']) && isset($_POST['author'])&& isset($_POST['genre'])&&isset($_POST['language']))
    {
        $title = $_POST['title'];
	    $author = $_POST['author'];
        $genre = $_POST['genre'];
        $language=$_POST['language'];
       
        $query = "INSERT INTO book (title, author, genre,language,total_copies,available_copies) VALUES ('$title','$author','$genre','$language',1,1)";
        header("location:http://localhost/vinimaya/thank.html");
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
    <title>book_details</title>
    <style type="text/css">
        body{ padding:30px; font: 14px sans-serif; background-image:url(./images/pic52.jpg); border:5px solid black; background-size:100%;}
        label{ float:left;display:block;font-size:20px; font-family:"Times-New-Roman";}
        input[type="text"], input[type="password"]{ padding:10px;  width:700px; margin-left:50px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body>
    <div class="wrapper">
        <h3 style="text-align:center; font-family:Times New Roman; font-size:30px;">Book-details</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
               <pre><label>Title :                </label></pre>
                <input type="text" name="title" value="<?php echo $title; ?>">
                <br/><br/>
                <span class="error"><?php echo $title_err; ?></span>
            </p>
             <p>
                <pre><label>Author :             </label></pre>
                <input type="text" name="author" value="<?php echo $author; ?>">
                <br/><br/>
                <span class="error"><?php echo $author_err; ?></span>
            </p>
            <p>
                <pre><label>Genre :                </label></pre>
                <input type="text" name="genre" placeholder="fiction/nonfiction" value="<?php echo $genre; ?>">
                <br/><br/>
                <span class="error"><?php echo $genre_err; ?></span>
            </p>
            <p>
                <pre><label>Language :           </label></pre>
                <input type="text" name="language" value="<?php echo $language; ?>">
                <br/><br/>
                <span class="error"><?php echo $language_err; ?></span>
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
