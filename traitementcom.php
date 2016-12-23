<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
        <?php 
$idpost=$_POST["idpost"];
$com=addslashes(htmlspecialchars( $_POST["message"]));
$pseudo=$_SESSION["pseudo"];
$insertcom= $bdd -> prepare("INSERT INTO commentaires (pseudo,commentaires,id_fichier) VALUES ('".$pseudo."','".$com."','".$idpost."')");
$insertcom -> execute();



?>