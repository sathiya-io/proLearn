<?php
session_start();
require 'header.php';
include_once "security\server.php";
$error='';
if (isset($_SESSION['user'])!="") {
	header ("Location: index.php");
}

//$conn = sqlsrv_connect($serverName, $connectionInfo);

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Connection successfully established";
}
catch (PDOException $e) {
    //echo "Error: ". $e->getMessage();
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
    return $e->getMessage();
}

?>
<div class="container">
    <div class="row modal fade" display="none" id="login_reg" role="dialog">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="session.php"  id="login-form" method="post" role="form" style="display: block;">
                                <fieldset>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input name="_username" value="" type="text" id="username" tabindex="1" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" name="_password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-center remember">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <!-- Registration form section -->
                            <form action="register.php" id="register-form" method="POST" role="form" style="display: none;">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Full Name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>