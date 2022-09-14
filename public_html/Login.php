<?php 
/**
 * Verify user credentials and allow/deny in to the admin portal
 */

class Login{
	protected string $username = "user@gmail.com";
	protected string $password = "Test1234";

	protected string $givenEmail;
	protected string $givenPassword;

	function __construct($email, $password) {
		$this->givenPassword = $password;
		$this->givenEmail = $email;
	}

	function vetifyLogin(){
		// Validate the credentials
		if($this->username == trim($this->givenEmail) && $this->password == trim($this->givenPassword)){
			// Set session
			session_start();
			$_SESSION["isLogin"]=true;
			return true;
		}else{
			return false;
		}
	}
}

// Get posted data
if(!empty($_POST)){
	$email = $_POST['email']?:false;
	$password = $_POST['password']?:false;

	$canAllow = new Login($email, $password);

	if($canAllow->vetifyLogin()){
		echo "true";
		return 1;
	}else{
		echo "false";
		return 0;
	}
}else{
	echo "Can be called from form submit";
}
?>