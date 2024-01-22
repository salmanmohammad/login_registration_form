<?php
session_start();

if(isset($_SESSION['username'])){
    header("location:index.php");
  }

require('header.php'); 
?>
  <div id="message"></div>
  <form class="form-signin" name="form1" id="signup_form" method="post" enctype="multipart/form-data">
    <h2 class="form-signin-heading">Create Account</h2>
    <label>Username <span style="color:red">*</span></label>
    <input name="username" id="username" type="name" class="form-control" placeholder="Name" autofocus>
    <label>Email <span style="color:red">*</span></label>
    <input name="email" id="email" type="email" class="form-control" placeholder="Email ID" autofocus>
    <label>Password <span style="color:red">*</span></label>
    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
    <label>Confirm Password <span style="color:red">*</span></label>
    <input name="retypepwd" id="retypepwd" type="password" class="form-control" placeholder="Confirm Password">
    <label>Profile Image <span style="color:red">*</span></label>
    <input name="profile" id="profile" type="file" class="form-control" placeholder="Profile">
    <button name="Submit" id="signup" class="btn btn-lg btn-primary btn-block">Signup</button>
    <p class="action_links">Already have account? <a href="login.php">Signin!</a></p>
  </form>   
<?php 
require('footer.php'); 
?>