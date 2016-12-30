<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
<?php 
$modif = $_POST["modif"];
$idpost = $_POST["idpost"];

$modif_bdd = $bdd -> prepare("UPDATE  fichier_upload SET message = '".$modif."' WHERE id = ".$idpost." " );
$modif_bdd -> execute();

echo $modif;

?>