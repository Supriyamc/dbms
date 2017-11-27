
<!Doctype html>
<html>
    <head>
        <link href="http://localhost/vinimaya/login1.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>login form</title>
    </head>

<body style="background-image:url(./images/bimg.jpg); background-size:100%; margin-top:160px;">
<div id="page-wrap">
<h2 style="font-size:50px;color:Black;">Login to continue</h2>
<div id="icon">
<a href="http://localhost/vinimaya/page1.php"><i class="fa fa-home"></i></a>
</div>

<form   action=userlog.php method="POST">

   <div class="container">
    <label><b>Username  </b></label>
    <input type="text" placeholder="Enter Username" name="username" required="required">
	<br/>
    <label><b>Password  </b></label>
    <input type="password" placeholder="Enter Password" name="password" required="required">
    <br/><br/><br/>
     
    <input type="submit" value="Login"  target="_self" style="width:100px; height:50px; margin-left:70px; align-content:center;">
    
	<br/>
    </div>
</form>

</div>
</body>
</html>

