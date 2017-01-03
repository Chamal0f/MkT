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
    echo "<div class='commentsuppr' id='comment".$idpost.$a."' onmouseover='javascript:show_btn_suppr_com(".$idpost.
        ",".$a.");'  onmouseout='javascript:hide_btn_suppr_com(".$idpost.
        ",".$a.");'  >
    <div class='comm' id='post".$idpost."com".$a."' name='".$idcom."' > <span>
    <strong id='post".$idpost."com".$a."pseudo' >". $com_exist['pseudo']." : </strong> <span id='post".$idpost."com".$a."content'>".$com_exist['commentaires']."</span></span></div>
    <div class='btnsuppr' id='btnsuppr".$idpost.$a."'> <img src='pics/btnsuppr.png'/> </div>
    
    </div>
    "
        ;   
}


?>