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
<?php require "footer.php" ?>