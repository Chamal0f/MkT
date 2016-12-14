<?php include_once('connexionbdd.php');?>
	
	<?php session_start(); ?>
    
    <?php if(isset($_SESSION['pseudo'])){
    header('location: /dejaconnecter.php');
} ?>
	
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST') { 
	
	$pseudo = $_POST['pseudo'];
	$password= sha1($_POST['password']);
    

	$idconnection = db::query('SELECT pseudo,mot_de_passe FROM membre WHERE pseudo = ? AND mot_de_passe = ?', $pseudo, $password);

	$result=$idconnection -> fetch(); 
	
	
	
		
		if ($result ){
			session_start();
			$_SESSION['pseudo']=$pseudo;
          
			header('location: /index.php');
           
			
		}

	}
	
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="SiteMkT.css" />
        <title>Team MkT</title>
		
    </head>
 
    <body>
		
	
	 
	<?php include_once('header.php') ?>
		
		
	
	<div id="pageconnection"  >
		<div id="block1">
			<p> Déjà menbre ? </p>
			<form id="connect" action="connecter.php" method="post">
			  Pseudo : <input type="text" name="pseudo" required > </br></br>
			Password: <input type="password" name="password" 
			<?php if($_SERVER['REQUEST_METHOD'] == 'POST') { if (!$result){echo ' placeholder="password incorrect"' ;}} ?> 
			required  > </br></br>
			<input id="connexionform" type="submit" value="connexion">
			</form>
		</div>
		
		<div id="block2">
			<p> Vous êtes nouveau ? </p>
			<a href="formulairefinal.php"> <button type="button"> Devenez menbre !  </button> </a>
		</div>
		
	</div>
	
	
		<?php include_once('footer.php'); ?>
	<?php if(isset($_SESSION['pseudo'])){ include_once("chat.php");} ?>
	</body>
</html>
