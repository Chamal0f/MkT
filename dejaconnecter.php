<?php include('connexionbdd.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="SiteMkT.css" />
        <title>Team MkT</title>
		
    </head>
 
    <body>


	<?php include("header.php"); ?>
	
	
	<p id="dejaconnecter">
	Vous êtes déjà connecté !  
	
	
	</p>
	
	
	
	
	
	<?php include("footer.php"); ?>
	
	
	<?php if(isset($_SESSION['pseudo'])){ include("chat.php");} ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>
</html>