<?php

class dbactions
{
    private $host, $username, $password, $dbname, $tblname, $salt;
    function __construct()
    {
        $this->host="localhost"; // Host name 
        $this->username="root"; // Mysql username 
        $this->password=""; // Mysql password 
        $this->dbname="login"; // Database name 
        $this->tblname="users"; // Table name
        $this->salt = "this is assignment" ;// For SHA1 hashing      
    }

    private function getConnection()
    {
        // Connect to server and select databse.
        $conn = mysqli_connect($this->host, $this->username, $this->password)or die("cannot connect");
        mysqli_select_db($conn, "$this->dbname")or die("cannot select DB");
        return $conn;
    }

    public function checkLogin($username, $password )
    {
        $conn = $this->getConnection();

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($conn,$username);
        $password = mysqli_real_escape_string($conn,$password);
        $password = sha1($password.$this->salt);

        $sql = "SELECT * FROM $this->tblname WHERE username=? and password=?";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param('ss',$username,$password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); 

        if(isset($user['username']))
        {
            return array('success'=>'true', 'row' => $user);
        }
        else
        {
            return array('success' => 'false');
        }
    }

    public function checkUserExist($userEmail)
    {
        $conn = $this->getConnection();

        $userEmail = stripslashes($userEmail);	
        $userEmail = mysqli_real_escape_string($conn,$userEmail);

        $sql = "SELECT * FROM $this->tblname WHERE email=?";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param('s',$userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); 

        return $result->num_rows;
    }

    public function signupUser($username, $password, $email, $img_name)
    {
        $conn = $this->getConnection();
        
        $username = mysqli_real_escape_string($conn,$username);	
	    $password = mysqli_real_escape_string($conn,$password);
	    $email = mysqli_real_escape_string($conn,$email);
	    
	    $password = sha1($password.$this->salt);

        $stmt = $conn->prepare("INSERT INTO $this->tblname  (`username`, `password`,`email`,`profile_image`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $email, $img_name);

		if($stmt->execute())
        {
            return 1;
        }
        else
        {
            return 0;
        }					
    }
}