<?php
session_start();
require 'header.php';
include_once "security\server.php";
$error='';
if (isset($_SESSION['user'])!="") {
	header ("Location: index.php");
}
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection successfully established";
}
catch (PDOException $e) {
    error_log($e->getMessage(),3,"/log/error.log");
}
try {
    if(isset($_POST['register-submit'])) {
    	if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = md5($_POST['password']);
            $usrStatus = '1';
            #Create statement to insert the data
            //$stmt = $conn->prepare("INSERT INTO user (email, display_name, password, usr_status) VALUES (:email,:name,:password,:usrStatus)");
            #Insert the data by statment
            //$insrt = $stmt->execute(array(':email' => $email, ':name' => $name, ':password' => $password, ':usrStatus' => $usrStatus));
            $insrt = $conn->exec("INSERT INTO user (email, display_name, password, usr_status) VALUES ('$email','$name', '$password', '$usrStatus')");
            if($insrt) {
                ?><script type="text/javascript">alert("Successfully registered '<?php echo $email."' with ".strtoupper($_SERVER["HTTP_HOST"]);?>");</script> <?php
            }
            else {
                ?><script type="text/javascript">alert("Email is registered already! <?php echo $insrt;?>");</script> <?php
            }
    	}
        $conn=null;
    }
}
catch (PDOException $e) {
    error_log($e->getMessage(),3,"/log/error.log");
}

?>
