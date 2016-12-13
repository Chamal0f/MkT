<?php include('connexionbdd.php'); ?>
	
	<?php session_start(); ?>
	
	<?php $_SESSION = array();
	session_destroy(); ?>
	

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="SiteMkT.css" />
        <title>Team MkT</title>
		
    </head>
 
    <body>
		
	
	 
	<?php include('header.php') ?>
		
		
		
		<div id="deconnexionsuccess">
	 Vous vous êtes correctement déconnecté ! 
	
	
	</div>
		
		
		
		
		
		
	
	
	<?php include('footer.php'); ?>
	<?php if(isset($_SESSION['pseudo'])){ include("chat.php");} ?>
	</body>
</html>
