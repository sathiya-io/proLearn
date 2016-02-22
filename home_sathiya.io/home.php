<?php require 'header.php'; 
include('session.php');
/*
if (isset($_SESSION['user'])!="") {
    header ("Location: index.php");
}
$has_session = session_status() == PHP_SESSION_ACTIVE;*/
?>
<div id="wrapper">
    <div calss="background-img profile" style="height: 688px; background:url(source/images/hero.jpg); background-position-y: -170px;">
    	<div id="about_me">
        	<h3>Bio <?php echo $login_session; ?></h3>
            <p>I'm a software professional and passionate with the wildlife / lifestyle photographer. Between 2011 to at present, I worked as a software engineer in various terminologies like System admin, Network engineer, SharePoint 2010/2013 Admin and part time PHP web developer. Much interested in photography to shoot wildlife, travel and lifestyle and blog writer.</p>
            <a href="logout.php">Log out!</a>
        </div>
        
	</div>
</div>
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
<?php require "footer.php" ?>