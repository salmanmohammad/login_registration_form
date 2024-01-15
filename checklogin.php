<?php
	
	ob_start();
	session_start();
	
	require 'db_actions.php';

	$db_action = new db_actions();

	$myemail = isset($_POST['myusername']) ? $_POST['myusername'] : '';
	// Define $myusername and $mypassword 
	$mypassword = isset($_POST['mypassword']) ? $_POST['mypassword'] : ''; 
	// To protect MySQL injection
	$result = $db_action->checkLogin($myemail, $mypassword);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($result['success'] == 'true'){
		// Register $myusername, $mypassword and print "true"
		$_SESSION['username'] = $result['row']['username'];
		$_SESSION['password'] = 'mypassword';
		$_SESSION['profile_image'] = $result['row']['profile_image'];

		echo "<script> window.location='index.php'; </script>";	
	}
	else {
		//return the error message
		echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Wrong Username or Password</div>";
	}

	ob_end_flush();
?>
