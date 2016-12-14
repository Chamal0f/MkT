<?php include_once('connexionbdd.php'); ?>

	<?php session_start(); ?>
	
	
	<?php 	$requettenombre= db::query('SELECT COUNT(pseudo) FROM membre');
			$nombre=$requettenombre->fetch(PDO::FETCH_OBJ);
    ?>
	
	
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') { 
	
		$arraypseudo = db::query('SELECT pseudo FROM membre');
		$result=$arraypseudo -> fetchAll(PDO::FETCH_COLUMN, 0);
		
		
		

		if( $_POST["password"] == $_POST["password2"] AND !in_array($_POST["pseudo"],$result)){
		    $requette = db::query("INSERT INTO membre(nom, prenom, pseudo, mail, mot_de_passe) VALUES('".$_POST["name"]."','".$_POST["prenom"]."','".$_POST["pseudo"]."','".$_POST["mail"]."','".sha1($_POST["password"])."')");
        }

		$requettenombre2 = db::query('SELECT COUNT(pseudo) FROM membre');
		$nombre2=$requettenombre2->fetch(PDO::FETCH_OBJ);
		
		if($nombre != $nombre2) { 
		header('location: /bienvenue.php');}
		
		
		
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

	
	
	<?php include_once("header.php"); ?>
	
	
	
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
	
	

	
	
	<?php include_once("footer.php"); ?>
	
</body>
</html>
	
	