<?php
require "security\server.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
$user = 'sathiya';
$sql = "SELECT * FROM users where username = '$user'";
echo "Conn: ".$conn."<br>";
$stmt = sqlsrv_query( $conn, $sql );
$record = sqlsrv_has_rows ($stmt);
echo $record."<br>";
if($record) {
	echo "Exist<br>";
    //ie( print_r( sqlsrv_errors(), true) );
}
else {
	echo "Die";
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['name'].", ".$row['username']."<br />";
}

sqlsrv_free_stmt( $stmt);
?>