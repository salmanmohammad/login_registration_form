<?php
  session_start();

  if(isset($_SESSION['username'])){
    header("location:index.php");
  }
  
require('common/header.php'); 
?> 
<div class="login_form_wrapper"> 
  <div id="message"></div> 
  <form class="form-signin" id="signin_form" name="form1" method="post">
    <h2 class="form-signin-heading">Please log in</h2>
    <input name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus>
    <input name="password" id="login_password" type="password" class="form-control" placeholder="Password">
    <button name="Submit" type="button" id="login" class="btn btn-lg btn-primary btn-block">Log in</button>
    <p class="action_links">New User? <a href="signup.php">Signup!</a></p>
  </form>
</div>
</div> <!-- /container -->

<?php require('common/footer.php'); ?>
