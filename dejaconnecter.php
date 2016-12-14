<?php include_once('connexionbdd.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="SiteMkT.css" />
        <title>Team MkT</title>
		
    </head>
 
    <body>


	<?php include_once("header.php"); ?>
	
	
	<p id="dejaconnecter">
	Vous êtes déjà connecté !  
	
	
	</p>
	
	
	
	
	
	<?php include_once("footer.php"); ?>
	
	
	<?php if(isset($_SESSION['pseudo'])){ include_once("chat.php");} ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>
</html>