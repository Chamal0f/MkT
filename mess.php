<?php include('connexionbdd.php');?>
    <div id="refresh">
        <?php $requete= $bdd -> prepare('SELECT pseudo,message FROM minichat ORDER BY id DESC LIMIT 0, 50');		
            $requete->execute();
               
       
        while ($donnees = $requete->fetch())
            {if (isset($donnees['pseudo'])){  echo '<div class="mess" > <strong>    ' . htmlspecialchars($donnees['pseudo']) . '</strong>  </br> ' . htmlspecialchars($donnees['message']) . '</br></div>';
                
            }else{
            echo '<div>  ' . htmlspecialchars($donnees['message']) . '</br></div>';
                
            }}

           $requete->closeCursor();
        
	
	?> </div>