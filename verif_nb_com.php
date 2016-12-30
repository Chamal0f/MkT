<?php include('connexionbdd.php');?>
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
    
$countlike= $bdd->prepare("SELECT COUNT(id) FROM likes WHERE id_fichier = ".$array[$i-1][0]."");
$countlike->execute();
$array_count_like=$countlike->fetch();
$value_count_like=$array_count_like[0];
$array[$i-1][2]=$value_count_like;   
}


$array = json_encode($array);
print_r ($array);

?>

