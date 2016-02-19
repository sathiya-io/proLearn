<?php
require "security\server.php";
$conn = sqlsrv_connect($serverName, $connectionInfo);
class dbConnection {
	
	public function initialize() {
		global $conn;	
		if($this->conn) {
			echo "Connection established...";
	    }
	    else{
	        /* Error logging for php-errors.log*/
	        error_log(__FUNCTION__);
	        error_log("Connection could not be established.");
	        $err=print_r( sqlsrv_errors(), true);
	        error_log($err);
	    }
	    parent::initialize();
	}
}
class userCreation{
	function regUser() {
		if(isset($_POST['action'])){
			if ($_POST['action']=="login"){
				$username = sqsrv_featch ($conn, $_POST['username']);
				$email = sqsrv_featch ($GLOBALS['conn'], $_POST['email']);
				$password = sqsrv_featch ($conn, $_POST['password']);
				$strSQL = sqlsrv_query($GLOBALS['conn'], "select name from users where email='".$email."' or username ='".$username."' and password ='".$password."'");\
				$result = sqlsrv_has_rows($strSQL);
				if ($result){
					$message = $results['name']."Login successfully!";
				}
				else {
					$message = "Invalid combination of user name or email or password !"
				}
			}
			elseif($_POST['action']=="signup") {
				if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
					$fullname = $_POST['Name'];
					$username = $_POST['username'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$active = 'true';
					$query = "INSERT INTO USERS 
					(name, username, password, email, active) VALUES 
					('$fullname','$username','$password','$email','$active')";
					$result = sqlsrv_query($GLOBALS['conn'], $query);
					//echo "Result :".$result." <br>";
					if($result === false){
						$message = "User name or email address is already exist!"
						return $value;
						die(print_r(sqlsrv_errors(),true));
					}
					else {
						$message = "Signup successfully!";
					}
				}
			}
		}
		sqlsrv_close($GLOBALS['conn']);
	}
	function signUp(){
		if(isset($_POST['submit']))
		{
			//echo "Submit call";
			//signUp();
			if(isset($_POST['submit'])) {
				$ok = true;
				$message = "<p><strong>There are errors with this form.</strong> Please correct the following:</p>\n<ul>\n";
			 
				if(trim($_POST['name']) == "") {
					$message .= "<li>You did not provide your name.</li>\n";
					$ok = false;
				}
				if(trim($_POST['username']) == "") {
					$message .= "<li>You did not select a username.</li>\n";
					$ok = false;
				}
				if(!preg_match('/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/', $_POST['email'])) {
					$message .= "<li>You did not enter a properly formatted e-mail address.</li>\n";
					$ok = false;
				}

				if(empty($_POST['password'])) {
					$message .= "<li>You did not select a password.</li>\n";
					$ok = false;
				}
				if(!$ok) {
					$message .= "</ul>\n";
					echo $message;
				}
				else {
					foreach($_POST as $key => $value) {
					$fields .= "$key=$value&";
				}
				rtrim($fields, "&");
				unset($_POST);
			 
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL, "http://plainphp.sathiya.com/login.php");
				curl_setopt($ch,CURLOPT_POST, count($_POST));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
				$result = curl_exec($ch); //remove the space in curl_e xec
				curl_close($ch);
			   }
			}
		}
		if (!empty($_POST['username'])){
			$checkUser = $_POST['username'];
			unset ($query);
			$query = "select * from users where username = '$checkUser'";
			$stmt = sqlsrv_query($GLOBALS['conn'], $query); 
			$record = sqlsrv_has_rows ($stmt);
			if(!$record){
				$this->regUser();
			}
			else {
				//echo "Sorry! You are already registered.";
				sqlsrv_close($GLOBALS['conn']);
				die( print_r( sqlsrv_errors(), true) );
				
			}
		}
	}
}
$user_creation = new userCreation();
$user_creation->signUp();
?>