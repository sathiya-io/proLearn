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
class userCreation extends dbConnection{
	function regUser() {
		try {
			echo "Reg user IN... <br>";
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
				if($result === false){
					die(print_r(sqlsrv_errors(),true));
				}
				else {
					echo "Insert successfully";
				}
			}
			sqlsrv_close($GLOBALS['conn']);

		}
		catch (Exception $e) {
			echo "Error:", $e->GetMessage(),"\n";
		}
	}
	function signUp(){
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
		if(isset($_POST['submit']))
		{
			echo "Submit call";
			signUp();
		}
	}
}
$user_creation = new userCreation();
$user_creation->signUp();
?>