<?php
include_once "security\server.php";
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Connection successfully established";
}
catch (PDOException $e) {
    //echo "Error: ". $e->getMessage();
}
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
#Login

if(isset($_POST['login-submit'])) {
    ?><script type="text/javascript">alert("Submit login");</script><?php
    if(isset($_POST['_username']) && isset($_POST['_password'])) {
        ?><script type="text/javascript">alert("user and password set");</script><?php
        $checkUsr = $_POST['_username'];
        $query="select * from user where email ='$checkUsr'";
        $stmt = $conn->query($query);
        $obj = $stmt->fetch(PDO::FETCH_OBJ);
        $loginUsr = $obj->email;
        $loginPwd = $obj->password;
        $loginUsrStatus = $obj->usr_status;
        //echo $loginUsr." Pwd:".$loginPwd."<br>";
        //echo "-------".$_POST['_username']." Pwd:".$_POST['_password']."<br>";
        if (($loginUsr == $_POST['_username']) && ($loginPwd == md5($_POST['_password'])))
        {    
            if (($loginUsrStatus == 1))
            {
                $login_session = $loginUsr;
                if(!isset($login_session)){
                	$conn=null;
               		header ("Location: home.php");
            }       
            else {
                ?><script type="text/javascript">alert("<?php echo $loginUsr;?> is currently inactive.");</script><?php
            }
        }
        else {
            ?><script type="text/javascript">alert("Invalid combination of email and password");</script><?php
        }

    }
    $conn=null;
}
?>