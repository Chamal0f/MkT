<?php include('connexionbdd.php'); ?>
	<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="SiteMkT.css" />
        <title>Team MkT</title>
		
    </head>
 
    <body>
	
		<?php include("header.php"); ?>
		
		<div id="conteneur2">
			
			<a href="#"><img src="pics/overwatch1.png" alt="image overwatch"  />  </a>
			
			
			
			
			<a href="#"><img src="pics/lol1.png" alt="image lol"/></a>
			
			
			
			
			
			<a href="#"><img src="pics/csgo1.png" alt="image csgo"/></a>
			
			
		</div>
      	<?php if(isset($_SESSION['pseudo'])){ include("chat.php");} ?>
        <?php include("footer.php"); ?>
		
	
	
	</body>
</html>

