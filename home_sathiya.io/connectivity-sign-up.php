<?php 

$serverName = "localhost, 1433"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"php", "UID"=>"sa", "PWD"=>"sa@123");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}
else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
function regUser() {
	echo "Reg User";
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$fullname = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = "INSERT INTO USERS (username, password, email) VALUE ('$username','$password','$email')";
		$result = sqlsrv_query($conn, $query) or die(sqlsrv_connect());
		echo "Insert into";
		if($result){
			echo "User Created Successfully.";
		}
	}
}
function signUp(){
	if (!empty($_POST['user'])){
		$queryGet = "select * from '$connectionInfo=>$Database' where username = '$_POST[user]' and 
			password = '$_POST[password]'";
		$query = sqlsrv_query($conn, $queryGet, 
			) 
			or die(sqlsrv_connect());
		if(!$row = sqlsrv_connect($query)){
			regUser();
		}
		else {
			echo "Sorry! You are already registered.";
		}
	}
	if(isset($_POST['submit']))
	{
		signUp();
	}
}
?>