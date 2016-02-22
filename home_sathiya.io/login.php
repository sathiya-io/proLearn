<?php 
require 'header.php';
session_start();
include_once "security\server.php";

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection successfully established";
}
catch (PDOException $e) {
    error_log($e->getMessage(),3,"/log/error.log");
}
//Login form
if(isset($_POST['login-submit'])) {
    $username = $_POST['_username'];
    $email = $_POST['_username'];
    $password = md5($_POST['_password']);
    //echo $password."<br>".$_POST['_password']."<br>";
    $query = "select username, email, password from users where email ='$email' or username = '$username'";
    $stmt = sqlsrv_query ($GLOBALS['conn'], $query);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    if( sqlsrv_fetch( $stmt ) === false) {
        die( print_r( sqlsrv_errors(), true));
    }
    //echo $query." result: ".$stmt."<br>";
    $dbPass = sqlsrv_get_field($stmt, 2);
    //echo "DB Pass: ".$dbPass."Form Pass: ".$password."<br";
    if ($dbPass == $password) {
        $_SESSION['user'] = $row['username'];
        header("Location: index.php");
    }
    else {
        ?>
        <script type="text/javascript">alert("Invalid combination of User name or email or password!");</script>
        <?php
    }
}
?>
