<?php include('connexionbdd.php');?>
<?php session_start(); ?>
<?php 
$idpost=$_POST["idpost"];
$nb_com = $_POST["nbcom"];
for($i=1; $i <= $nb_com ; $i++){
    ${"id_com$i"} = $_POST["com".$i.""];
}




$countcom= $bdd->prepare("SELECT COUNT(id) FROM commentaires WHERE id_fichier = ".$idpost."");
$countcom->execute();
$array_count_com=$countcom->fetch();
$value_count=$array_count_com[0];

$selectidcom = $bdd->prepare("SELECT id FROM commentaires WHERE id_fichier = ".$idpost."");
$selectidcom -> execute();
$tab_id_com = $selectidcom -> fetchAll();

if ($value_count != 0){
if( $value_count !== $nb_com){
    
    $selectcom = $bdd->prepare("SELECT id,pseudo,commentaires FROM commentaires WHERE id_fichier = ".$idpost."");
    $selectcom -> execute();

    $a=0;
    while($com_exist=$selectcom ->fetch()){
    $a++;
    $idcom=$com_exist["id"];
    echo "<div class='comm' id='post".$idpost."com".$a."' name='".$idcom."' > <span>
    <strong>  ". $com_exist['pseudo']." : </strong> 
    ".$com_exist['commentaires']."
    </span>
    </div>";   
}
    
}else{ $b=1;
      while($b != $value_count)
      {   $c=$b-1;
         
            if( ${"id_com$b"} != $tab_id_com[$c][0])
            {
                $selectcom = $bdd->prepare("SELECT id,pseudo,commentaires FROM commentaires WHERE id_fichier = ".$idpost."");
                $selectcom -> execute();

                $a=0;
                while($com_exist=$selectcom ->fetch()){
    $a++;
    $idcom=$com_exist["id"];
    echo "<div class='comm' id='post".$idpost."com".$a."' name='".$idcom."' > <span>
    <strong>  ". $com_exist['pseudo']." : </strong> 
    ".$com_exist['commentaires']."
    </span>
    </div>";   
} 
                
                    
                
              
            }
         $b++;
      }
     }
}else{
    echo " ";
}
?>