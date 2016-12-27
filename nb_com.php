<?php include('connexionbdd.php');?>
<?php 
$idpost=$_POST["idpost"];
$countcom= $bdd->prepare("SELECT COUNT(id) FROM commentaires WHERE id_fichier = ".$idpost."");
$countcom->execute();
$array_count_com=$countcom->fetch();
$value_count=$array_count_com[0];
echo $value_count." commentaires";
?>