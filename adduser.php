<?php
  session_start();
if(isset($_SESSION['username'])){
    header("location:index.php");
  }
  
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css?reload=122" rel="stylesheet" media="screen">
  </head>
  
  <body>
  <div class="bg_image"></div>
    <div class="container" style="padding-top:40px">
      <div id="message" class="form-signin"></div>

      <form class="form-signin" name="form1" id="signup_form" method="post" action="createuser.php" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Create Account</h2>
        <label>Username <span style="color:red">*</span></label>
        <input name="myusername" id="myusername" type="name" class="form-control" placeholder="Name" autofocus>
        <label>Email <span style="color:red">*</span></label>
        <input name="myemail" id="myemail" type="email" class="form-control" placeholder="Email ID" autofocus>
        <label>Password <span style="color:red">*</span></label>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Confirm Password">
        <label>Confirm Password <span style="color:red">*</span></label>
        <input name="retypepwd" id="retypepwd" type="password" class="form-control" placeholder="Re-Type Password">
        <label>Profile Image</label>
        <input name="profile" id="profile" type="file" class="form-control" placeholder="Profile">
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
        <p><a href="main_login.php">Goto Signin!</a></p>
      </form>
  </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/create.js?time=211334444546"></script>
        
  </body>
</html>
