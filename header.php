<?php if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST["deco"]) ){ if($_POST["deco"]=="deconnexion"){
	$_SESSION = array();
	session_destroy();}}?>
    <header>
        <nav>
            <ul>
                <li> <a href="#"> Actualités </a> </li>
                <li> <a href="#"> Joueurs </a> </li>
                <li> <a href="video.php"> Vidéos </a> </li>
                <li> <a href="espacemembre.php"> espace membre </a> </li>
                <li> <a href="#"> Contact </a> </li>
            </ul>
        </nav>
      
            <a href="index.php"> <img id="LogoMkT" src="pics/logorougef.png" onmouseover="this.src='pics/logoblancf.png'" onmouseout="this.src='pics/logorougef.png'" alt="logo MkT" /> </a>
    
        <?php if(isset($_SESSION['pseudo'])){
		echo '<div id="dropdown">
		<button type="button" id="bouton1" >',htmlspecialchars($_SESSION["pseudo"]),'
		</button> 
	<div id="dropdown-content">
		<a href="#" id="dp1">Paramètres</a>
		<form action="',$_SERVER['PHP_SELF'],'" method="post" >
			<button id="dp2" type="submit" name="deco" value="deconnexion"> Déconnexion </button>
		</form>
  </div>
	
    
  </div>' ;
		
		} else {
		
		echo '<div id="backbouton">
	<a href="connecter.php"> <button id="bouton" type="button" > se connecter
		</button> </a>
	</div>' ;}?>
    </header>