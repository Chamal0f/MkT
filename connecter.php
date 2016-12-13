<?php include('connexionbdd.php'); ?>
	
	<?php session_start(); ?>
    
    <?php if(isset($_SESSION['pseudo'])){
    header('location: dejaconnecter.php');
} ?>
	
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST') { 
	
	$pseudo = $_POST['pseudo'];
	$password= sha1($_POST['password']);
    
	
	$idconnection = $bdd->prepare('SELECT pseudo,mot_de_passe FROM membre WHERE pseudo = :pseudo AND mot_de_passe = :password');
	$idconnection ->execute(array(
		'pseudo'=> $pseudo,
		'password' => $password )); 
	
	$result=$idconnection -> fetch(); 
	
	
	
		
		if (!$result ) {
		}else{
			session_start();
			$_SESSION['pseudo']=$pseudo;
          
			header('location: http://localhost/Site/MkT/index.php');
           
			
		};
	
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
		
	
	 
	<?php include('header.php') ?>
		
		
	
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
	
	
		<?php include('footer.php'); ?>
	<?php if(isset($_SESSION['pseudo'])){ include("chat.php");} ?>
	</body>
</html>
