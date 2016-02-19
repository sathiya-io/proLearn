<?php 
require 'header.php';
session_start();
/*include_once 'security\server.php';
if (isset($_SESSION['user'])!="") {
    header ("Location: index.php");
}*/
$db_host = "mycentos"; //serverName\instanceName, portNumber (default is 1433)
$db_user = "mysqladmin";
$db_password = "P@ss123";
$db_database = "mysqladmin_php";
mysql_set_charset('utf8');
$conn = new mysqli_connect($db_host, $db_user, $db_password, $db_database);
//mysql_select_db($dbName, $conn);
if ($conn->connect_error) {
    die ("Could not connect: ". mysqli_connect_error());
}
if(isset($_POST['register-submit'])) {    
    if (isset($_POST['email'])) {
        $checkUser = $_POST['email'];
        $query = "select * from users where username = '$checkUser'";
        $stmt = mysqli_query($GLOBALS['conn'], $query); 
        $record = sqlsrv_has_rows ($stmt);
        if(!$record) {
            $fullname = $_POST['Name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $active = 'true';
            $query = "INSERT INTO USERS 
            (name, username, password, email, active) VALUES 
            ('$fullname','$username','$password','$email','$active')";
            $result = sqlsrv_query($GLOBALS['conn'], $query);
            if($result === false){
                ?> <script>alert("User already exist!");</script>
            <?php
            }
            else {
                ?> <script>alert("Successfully registered");</script>
            <?php
            header("Location: login.php");
            }
        }
    }
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
<div class="container">
    <div class="row">
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
                            <form action="login.php"  id="login-form" method="post" role="form" style="display: block;">
                                <fieldset>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="_username" value="" type="text" id="username" tabindex="1" class="form-control" placeholder="Username or Email">
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
                            <form action="login.php" id="register-form" method="POST" role="form" style="display: none;">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="Name" id="username" tabindex="1" class="form-control" placeholder="Full Name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
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
<?php require 'footer.php'; 
?>
<div class="modal fade" tabindex="-1" role="dialog" id="reg_warning">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Error user registration!</h4>
            </div>
            <div class="modal-body">
                <form action="register.php" id="userExist" value ="exist">
                <input type="radio" name="foo" value="bar" <?php if($_POST['foo'] == "bar")?> />
                <div dispaly="none">
                <p>Successfully registered with <?php echo strtoupper($_SERVER['SERVER_NAME']); ?></p>
                </div>
                </form>
                <form action="register.php" id="userNot_Exist" value ="not_exist" dispaly="none">
                <div dispaly="none">
                <p>User name or email address is already registered with <?php echo strtoupper($_SERVER['SERVER_NAME']); ?></p>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
