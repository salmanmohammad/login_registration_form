<?php

	header('Content-Type: application/json');
	require '../dbactions.php';

	$db_action = new dbactions();

	// Define $myusername and $mypassword 
	$myusername = $_POST['username']; 
	$mypassword = $_POST['password']; 
	$myemail = $_POST['email']; 
	
	// To protect MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myemail = stripslashes($myemail);	

	$emailCount = $db_action->checkUserExist($myemail, "email");

	$usernameCount = $db_action->checkUserExist($myusername, "username");

	if($emailCount != 0){
		echo json_encode(array("success"=> 0, "message" => "User with email already exist. Please use other email address"));
		exit;
	}
	elseif($usernameCount != 0){
		echo json_encode(array("success"=> 0, "message" => "User with username already exist. Please use other username"));
		exit;
	}
	else {
	
		$target_dir = "../uploads/";
		$img_name = str_replace(" ","_",$_FILES["profile"]["name"]);
		$target_file = $target_dir . basename($img_name);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["profile"]["tmp_name"]);

		if($check == false) {
			echo json_encode(array("success"=> 0, "message"=> "File is not an image."));
			exit;

			$uploadOk = 0;
		} 

		// Check if file already exists
		if (file_exists($target_file)) {
			echo json_encode(array("success"=> 0, "message"=> "File already exist."));
			exit;

			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["profile"]["size"] > 500000) {
			echo json_encode(array("success"=> 0, "message"=> "Sorry, your file is too large"));
			exit;

			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo json_encode(array("success"=> 0, "message"=> "Sorry, only JPG, JPEG, PNG or GIF files are accpeted"));
			exit;

			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo json_encode(array("success"=> 0, "message"=> "File was not uploaded."));
			exit;
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
				
				//insert user in database
				$success=$db_action->signupUser($myusername, $mypassword, $myemail, $img_name);

				if($success)
				{
					echo json_encode(array("success"=> 1,"message" => "User registered successfully!"));
					exit;
				}
				else
				{
					echo json_encode(array("success"=> 0, "message"=> "Error occured at DB."));
					exit;
				}

			} else {
				echo json_encode(array("success"=> 0, "message"=> "Error occured while uploading a file."));
				exit;
			}
		}
}

?>
