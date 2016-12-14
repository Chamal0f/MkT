<?php include_once('connexionbdd.php') ?>
    <?php 

     
    $message=$_POST['message'];

     $req1= $bdd -> prepare('SELECT pseudo,message FROM minichat ORDER BY id DESC LIMIT 0, 50');
    $req1->execute();
    $tab=$req1->fetchAll();
    
    if (!isset($tab[0][1]) and !isset($tab[0][0]) ) { $req =  db::query("INSERT INTO minichat  (pseudo,message) 
    VALUES  ('". $_SESSION["pseudo"].",".$_POST['message']."')");
            }else{
    
    
    if($tab[0][0]==$_SESSION["pseudo"] ){
        $req =  db::query("INSERT INTO minichat  (message) 
    VALUES  ('".$_POST['message']."')");
            }
    
    if($tab[0][0]!=$_SESSION["pseudo"] and isset($tab[0][0]) ){
         $req =  db::query("INSERT INTO minichat  (pseudo,message) 
    VALUES  ('".$_SESSION["pseudo"].",".$_POST['message']."')");
           }
    
    
    
     if (isset($tab[0][1]) and !isset($tab[0][0] )) {
        $i=0; 
        while( !isset($tab[$i][0])){$i++;}
    
    if($tab[$i][0]==$_SESSION["pseudo"] ){ $req =  db::query("INSERT INTO minichat  (message) 
    VALUES  ('".$_POST['message']."')");

            }
         
         
         if($tab[$i][0]!=$_SESSION["pseudo"]) {
                  
  
    
    $req =  db::query("INSERT INTO minichat  (pseudo,message) 
    VALUES  ('".$_SESSION["pseudo"].",".$_POST['message']."')");

    } }}


   

   ?>