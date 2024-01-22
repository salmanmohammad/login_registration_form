<?php
	
	ob_start();
	session_start();
	
	require 'dbactions.php';

	$dbaction = new dbactions();

	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : ''; 
	

	$result = $dbaction->checkLogin($username, $password);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($result['success'] == 'true'){
		// Register $myusername, $mypassword and print "true"
		$_SESSION['username'] = $result['row']['username'];
		$_SESSION['password'] = 'password';
		$_SESSION['profile_image'] = $result['row']['profile_image'];

		echo "<script> window.location='index.php'; </script>";	
	}
	else {
		//return the error message
		echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Wrong Username or Password</div>";
	}

	ob_end_flush();
?>
