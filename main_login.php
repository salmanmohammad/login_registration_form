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
    <link href="css/main.css?reload=121" rel="stylesheet" media="screen">
  </head>
  
  <body>
  <div class="bg_image"></div>
    <div class="container" style="padding-top:40px">
    <div id="message" class="form-signin"></div>
      <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="myemail" id="myusername" type="email" class="form-control" placeholder="Email ID" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p>New User? <a href="adduser.php">Signup Here!</a></p>
      </form>
    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>
    
  </body>
</html>
