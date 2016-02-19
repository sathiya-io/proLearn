<?php require 'header.php'; 
include("register.php");
if (isset($_SESSION['login_user'])) {
	header("Location: home.php");
}
?>
<div id="wrapper">
    <div calss="background-img profile" style="height: 688px; background:url(source/images/hero.jpg); background-position-y: -170px;">
    	<div id="about_me">
        	<h3>Bio ????</h3>
            <p>I'm a software professional and passionate with the wildlife / lifestyle photographer. Between 2011 to at present, I worked as a software engineer in various terminologies like System admin, Network engineer, SharePoint 2010/2013 Admin and part time PHP web developer. Much interested in photography to shoot wildlife, travel and lifestyle and blog writer.</p>
            <a href="login.php">Login</a>
        </div>
        
	</div>
</div>
<?php require "footer.php" ?>