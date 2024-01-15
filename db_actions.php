<?php

class db_actions
{
    function __construct()
    {
        $this->host="localhost"; // Host name 
        $this->username="root"; // Mysql username 
        $this->password=""; // Mysql password 
        $this->db_name="login"; // Database name 
        $this->tbl_name="users"; // Table name
        $this->salt = "this is assignment" ;// For SHA1 hashing
        
    }

    private function getConnection()
    {
        // Connect to server and select databse.
        $conn = mysqli_connect($this->host, $this->username, $this->password)or die("cannot connect");
        mysqli_select_db($conn, "$this->db_name")or die("cannot select DB");
        return $conn;
    }

    public function checkLogin($username, $password )
    {
        $conn = $this->getConnection();

        $myusername = stripslashes($username);
        $mypassword = stripslashes($password);
        $myusername = mysqli_real_escape_string($conn,$myusername);
        $mypassword = mysqli_real_escape_string($conn,$password);
        $mypassword = sha1($mypassword.$this->salt);

        $sql="SELECT * FROM $this->tbl_name WHERE email='$myusername' and password='$mypassword'";

        $result=mysqli_query($conn,$sql);

        // rowCount() is counting table row
        $count=mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if($count == 1)
        {
            return array('success'=>'true', 'row' => $row);
        }
        else
        {
            return array('success' => 'false');
        }
    }

    public function checkUserExist($myemail)
    {
        $conn = $this->getConnection();

        $myemail = stripslashes($myemail);	
        $myemail = mysqli_real_escape_string($conn,$myemail);

        $sql="SELECT * FROM $this->tbl_name WHERE email='$myemail'";		
        $result=mysqli_query($conn, $sql);

        $count=mysqli_num_rows($result);

        return $count;
	
    }

    public function signupUser($myusername, $mypassword, $myemail, $img_name)
    {
        $conn = $this->getConnection();
        
        $myusername = mysqli_real_escape_string($conn,$myusername);	
	    $mypassword = mysqli_real_escape_string($conn,$mypassword);
	    $myemail = mysqli_real_escape_string($conn,$myemail);
	    
	    $mypassword = sha1($mypassword.$this->salt);

        $sql = "INSERT INTO $this->tbl_name (`username`, `password`,`email`,`profile_image`) VALUES ('$myusername', '$mypassword', '$myemail', '$img_name')";
				
		if(mysqli_query($conn, $sql))
        {
            return 1;
        }
        else
        {
            return 0;
        }
				
				
    }
}