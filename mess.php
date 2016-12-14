<?php include_once('connexionbdd.php');?>

    <div id="refresh">
        <?php
        $requete = db::query('SELECT pseudo,message FROM minichat ORDER BY id DESC LIMIT 0, 50');
        while ($donnees = $requete->fetch()){
            if (isset($donnees['pseudo'])){
                echo '<div id="mess" > <strong>'.htmlspecialchars($donnees['pseudo']).'</strong></br>'.htmlspecialchars($donnees['message']) . '</br></div>';
            }else{
                echo '<div>'.htmlspecialchars($donnees['message']).'</br></div>';
            }
        }
        $requete->closeCursor();
	    ?>
    </div>