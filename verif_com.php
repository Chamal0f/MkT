<?php include('connexionbdd.php');?>
<?php session_start(); ?>
<?php
$nb_post = $_POST["nb_post"];
$array = $_POST["array"];
$array = json_decode($array);
for($i=1;$i <= $nb_post;$i++){
    $countcom= $bdd->prepare("SELECT COUNT(id) FROM commentaires WHERE id_fichier = ".$array[$i-1][0]."");
    $countcom->execute();
    $array_count_com=$countcom->fetch();
    $value_count=$array_count_com[0];
    $array[$i-1][1]=$value_count;
    $selectcom = $bdd->prepare("SELECT id,pseudo,commentaires FROM commentaires WHERE id_fichier = ".$array[$i-1][0]."");
    $selectcom -> execute();
    
    array_pop($array[$i-1]);
    $array_temp = array();
    while($com_exist=$selectcom ->fetch()){
    array_push($array_temp,array($com_exist["id"],$com_exist["pseudo"],$com_exist["commentaires"]));

    }
    array_push($array[$i-1],$array_temp);
}
$array = json_encode($array);
print_r ($array);
?>
    
