<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
        <?php
$pseudo = $_SESSION["pseudo"];
$nbpost = $_POST["nbpost"];


$select = $bdd -> prepare ("SELECT id FROM fichier_upload ORDER BY date_upload DESC LIMIT ".$nbpost."");
$select -> execute();
$array = $select -> fetchAll();
$tab = array();

for($i=0;$i < $nbpost;$i++){

$count = $bdd -> prepare("SELECT COUNT(id) FROM likes WHERE id_fichier = ".$array[$i][0]." AND pseudo = '".$pseudo."' ");
$count -> execute();
$count_like = $count->fetch();
$like_exist = $count_like[0]; 

if( $like_exist == 0){
    $temp = array();
    array_push($temp,$array[$i][0],0);
    array_push($tab,$temp);   
    
    
    
}else{
    $temp = array();
    array_push($temp,$array[$i][0],1);
    array_push($tab,$temp); 

}


}





$tab = json_encode($tab);
print_r($tab);









?>