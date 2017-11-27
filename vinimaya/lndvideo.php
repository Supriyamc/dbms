<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$title=$language=$duration=$genre="";
$title_err=$language_err=$duration_err=$genre_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate title
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter a title.";
    } 
    

   if(empty(trim($_POST["language"]))){
        $language_err = 'Please enter language.';     
    } 

     // Validate confirm password
    if(empty(trim($_POST["duration"]))){
        $duration_err = 'Please enter duration';     
    } 

     // Validate confirm password
    if(empty(trim($_POST["genre"]))){
        $genre_err = 'Please enter genre.';     
    } 

     


    // Check input errors before inserting in database
    if(empty($title_err) && empty($language_err) && empty($duration_err)&& empty($genre_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO video(title,language,duration,genre,total_copies,available_copies) VALUES (?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_title, $param_language,$param_duration,$param_genre);
            
            // Set parameters
            $param_title = $title;
           $param_language= $language;           
             $param_duration = $duration;
              $param_genre = $genre;
               

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: page2.php");
            } 
        }
    

    // If the values are posted, insert them into the database.
if (isset($_POST['title']) && isset($_POST['language'])&& isset($_POST['duration'])&&isset($_POST['genre']))
    {
        $title = $_POST['title'];
	    $language= $_POST['language'];
        $duration = $_POST['duration'];
        $genre=$_POST['genre'];
        
        $query = "INSERT INTO video(title,language,duration,genre,total_copies,available_copies) VALUES ('$title','$language','$duration','$genre',1,1)";
        header("Location:http://localhost/vinimaya/thank.html");
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
    <title>Video_details</title>
    <style type="text/css">
        body{ padding:30px; font: 14px sans-serif; background-image:url(./images/pic55.jpg); border:5px solid black;background-size:100%;}
        label{ float:left;display:block;font-size:20px; font-family:"Times-New-Roman";}
        input[type="text"], input[type="password"]{ padding:10px;  width:700px; margin-left:50px; display:block;}
        .error{ color: red; }
        #buttons{ margin-left:30%;}

    </style>
</head>
<body>
    <div class="wrapper">
        <h3 style="text-align:center; font-family:Times New Roman; font-size:30px;">Video-details</h3>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>
               <pre><label>Title :                 </label></pre>
                <input type="text" name="title" value="<?php echo $title; ?>">
                <br/><br/>
                <span class="error"><?php echo $title_err; ?></span>
            </p>
             <p>
                <pre><label>Language :          </label></pre>
                <input type="text" name="language" value="<?php echo $language; ?>">
                <br/><br/>
                <span class="error"><?php echo $language_err; ?></span>
            </p>
            <p>
                <pre><label>Duration :            </label></pre>
                <input type="text" name="duration"  value="<?php echo $duration; ?>">
                <br/><br/>
                <span class="error"><?php echo $duration_err; ?></span>
            </p>
            <p>
                <pre><label>Genre :                 </label></pre>
                <input type="text" name="genre" placeholder="action/horor/romance/mystery etc" value="<?php echo $genre; ?>">
                <br/><br/>
                <span class="error"><?php echo $genre_err; ?></span>
            </p>
            
            <div id="buttons">
            <a href="http://localhost/vinimaya/page3.php"><button type="button" style="left:50%; text-align:center; padding:10px; width:60px;"> Back </button></a>
             <input type="submit"  value="Submit" style="left:50%; text-align:center; padding:10px; width:70px;">
            <input type="reset" value="Reset" style="left:50%; text-align:center; padding:10px; width:70px;">
            </div>
              
        </form>
            
        </form>
    </div>    
</body>
</html>
