<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
        <?php 
$idpost=$_POST["idpost"];

$selectcom= $bdd->prepare("SELECT pseudo,commentaires FROM commentaires WHERE id_fichier = ".$idpost." ");
$selectcom -> execute();
$a=0;
while($com_exist=$selectcom ->fetch()){
    $a++;
    echo "<div class='comm' id='post".$idpost."com".$a."' > <span>
    <strong>  ". $com_exist['pseudo']." : </strong> 
    ".$com_exist['commentaires']. "
    
    
    
    
    </span>
    </div>";
    
    
    
}


?>