	<?php include_once('connexionbdd.php'); ?>
	<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="SiteMkT.css" />
        <title>Team MkT</title>
		
    </head>
 
    <body>
		
	<?php include_once("header.php"); ?>
	
	
	<div id="video">
			
		<div id="video3">
			<iframe width="854" height="480" src="https://www.youtube.com/embed/-c9eQzQSErc" frameborder="0" allowfullscreen></iframe> </br>
			<p>Top MkT Fun and Fail</p>
		</div>
		
		<div id="video2">
			<iframe width="854" height="480" src="https://www.youtube.com/embed/CqZfGP8Qtdc" frameborder="0" allowfullscreen></iframe></br>
			<p>Top 5 Mkt Plays Ep 2 </p>
		</div>
		
		<div id="video1">
			<iframe width="854" height="480" src="https://www.youtube.com/embed/l95ba6NS94A" frameborder="0" allowfullscreen></iframe></br>
			<p>Top 5 MkT Plays Ep 1</p>
		</div>
		
		
		
		
		
		
		
	
	</div>
		
	<?php include_once("footer.php"); ?>
<?php if(isset($_SESSION['pseudo'])){ include_once("chat.php");} ?>
	
	</body>
</html>



