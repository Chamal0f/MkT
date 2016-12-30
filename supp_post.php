<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
<?php 

$idpost = $_POST["idpost"];

$supp_com_bdd = $bdd -> prepare("DELETE FROM commentaires WHERE id_fichier = ".$idpost." " );
$supp_com_bdd ->execute();

$supp_like_bdd = $bdd -> prepare("DELETE FROM likes WHERE id_fichier = ".$idpost." " );
$supp_like_bdd ->execute();

$supp_bdd = $bdd -> prepare("DELETE FROM fichier_upload WHERE id = ".$idpost." " );
$supp_bdd -> execute();



?>
