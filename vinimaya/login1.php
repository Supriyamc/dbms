
<!Doctype html>
<html>
    <head>
        <link href="http://localhost/vinimaya/login1.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>login form</title>
    </head>

<body style="background-image:url(./images/pic14.jpg); background-size: 100%; border:3px solid; box-sizing:border-box; margin-bottom:0px;">
<header>
<h2 style="text-allign:center;color:purple; padding:20px; font-size:60px; font-style:bold;">Vinimaya</h2>
<div id="page-wrap">
<h2 style="text-allign:center;">  Welcome Admin  </h2>

<div id="icon">
<a href="http://localhost/vinimaya/page1.php" ><i class="fa fa-home"></i></a>
</div>

<form   action=adlog.php method="POST">

   <div class="container">
    <label><b>Username  </b></label>
    <input type="text"  name="username" required="required">
	<br/>
    <label><b>Password  </b></label>
    <input type="password" name="password" required="required">
    <br/><br/><br/>
     
    <input type="submit" value="Login" style="width:100px; height:50px; margin-left:70px; align-content:center;">
    
	<br/>
    <br/><br/><br/><br/><br/>
    </div>
</form>

</div>
</body>
</html>

