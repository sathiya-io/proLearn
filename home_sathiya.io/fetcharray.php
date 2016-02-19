<?php
include_once "security\server.php";
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "select * from users";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['name'].", ".$row['username']."<br />";
}

sqlsrv_free_stmt( $stmt);




?>