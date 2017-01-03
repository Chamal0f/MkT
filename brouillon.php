 <?php for(j=1;j <= result ; j++){
                    
                var elements = document.getElementsByName('nbpost'+j);    
                var idpost = elements[0].getAttribute('id');   
                var btn = document.getElementById("btnlike"+idpost);
                btn.innerHTML = return_data;
                }







$count = $bdd -> prepare("SELECT COUNT(id) FROM likes WHERE id_fichier = ".$idpost." AND pseudo = '".$pseudo."' ");
$count -> execute();
$count_like = $count->fetch();
$like_exist = $count_like[0]; 

if( $like_exist == 0){
    $insert = $bdd -> prepare ("INSERT INTO likes (pseudo,id_fichier) VALUES ('".$pseudo."','".$idpost."')");
    $insert -> execute();
    
    echo "Nope";
    
    
}else{
    $suppr = $bdd -> prepare ("DELETE FROM likes WHERE pseudo = '".$pseudo."'");
    $suppr -> execute();
    echo "Nice 1 !";
    
}
?>

 <div class='drop2content' id='drop2content".$x."'> Certain ? <button>Yes</button> </div>