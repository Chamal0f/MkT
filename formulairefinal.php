<?php include('connexionbdd.php'); ?>
	
	<?php session_start(); ?>
	
	
	<?php 	$requettenombre=$bdd->query('SELECT COUNT(pseudo) FROM membre');
			$nombre=$requettenombre->fetch(PDO::FETCH_OBJ);
			
		
	
	?>
	
	
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') { 
	
		$arraypseudo = $bdd->prepare('SELECT pseudo FROM membre');
		$arraypseudo ->execute(); 
		$result=$arraypseudo -> fetchAll(PDO::FETCH_COLUMN, 0);
		
		
		
		$requette =$bdd->prepare("INSERT INTO membre(nom, prenom, pseudo, mail, mot_de_passe) VALUES('".$_POST["name"]."','".$_POST["prenom"]."','".$_POST["pseudo"]."','".$_POST["mail"]."','".sha1($_POST["password"])."')");
	
		if( $_POST["password"] != $_POST["password2"] OR in_array($_POST["pseudo"],$result)){}
		else { $requette-> execute();
				
				
		}
		$requettenombre2=$bdd->query('SELECT COUNT(pseudo) FROM membre');
		$nombre2=$requettenombre2->fetch(PDO::FETCH_OBJ);
		
		if($nombre != $nombre2) { 
		header('location: bienvenue.php');}
		
		
		
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

	
	
	<?php include("header.php"); ?>
	
	
	
	<form id="inscription"  action="<?php echo $_SERVER['PHP_SELF']; ?>"
	
	method="post" >
	
		<span class="remplir">*</span>Nom:  </br>  <input type="text" name="name" required>  <br> </br> 
	
		<span class="remplir">*</span>Prénom:</br> <input type="text" name="prenom" required >  </br></br>
	
		<span class="remplir">*</span>Pseudo:</br> <input type="text" name="pseudo"
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){if ( in_array($_POST["pseudo"],$result) OR $nombre = $nombre2) {echo " placeholder=\"" , $_POST["pseudo"] ,"  déjà utilisé\" " ;}} ?> 
	required > </br></br>
	
		Mail:</br> <input type="email" name="mail" >  </br></br>
	
		<span class="remplir">*</span>Mot de passe:</br> <input type="password" name="password" 
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){if( $_POST["password"] != $_POST["password2"] ) { echo " placeholder=\"password identiques \" " ;}}?>	
	required > </br></br>
	
		<span class="remplir">*</span>Mot de passe: </br><input type="password" name="password2" 
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){if( $_POST["password"] != $_POST["password2"] ) { echo " placeholder=\"password identiques \" " ;}}?>
	required >  </br></br></br>
	
		<input id="submitform" type="submit" value="Rejoignez MkT !">
	
	</form>
	
	

	
	
	<?php include("footer.php"); ?>
	
</body>
</html>
	
	