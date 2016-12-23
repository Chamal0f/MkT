<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
        <?php 
$idpost = $_POST["idpost"];
$countcom= $bdd->prepare("SELECT COUNT(id) FROM commentaires WHERE id_fichier = ".$idpost."");
$countcom -> execute();
$array_count_com=$countcom->fetch();
$count_com = $array_count_com[0]; 

$selectcom = $bdd->prepare("SELECT id,pseudo,commentaires FROM commentaires WHERE id_fichier = ".$idpost."");
$selectcom -> execute();

$a=0;
while($com_exist=$selectcom ->fetch()){
    $a++;
    $idcom=$com_exist["id"];
    echo "<div class='comm' id='post".$idpost."com".$a."' > <span>
    <strong>  ". $com_exist['pseudo']." : </strong> 
    ".$com_exist['commentaires']."
    
    
    
    
    </span>
    </div>";
    
    
    
    
    
    setcookie("post".$idpost."com".$a,$idcom);
    
    
}
setcookie("post".$idpost,$count_com);

?>