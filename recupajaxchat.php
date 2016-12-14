<?php 
    include_once('connexionbdd.php');
	
    session_start();
     
    $message= addslashes($_POST['message']);

    if(!empty($message)) {$req1= db::query('SELECT pseudo,message FROM minichat ORDER BY id DESC LIMIT 0, 50');
    $tab=$req1->fetchAll();

    
    if (!isset($tab[0][1]) and !isset($tab[0][0]) ) {
        $req =  db::query("INSERT INTO minichat  (pseudo,message)  VALUES  ('". $_SESSION["pseudo"]."','$message')");
            }else{
    
    
    if($tab[0][0]==$_SESSION["pseudo"] ){
        $req =  db::query("INSERT INTO minichat  (message) 
    VALUES  ('$message')");
            }
    
    if($tab[0][0]!=$_SESSION["pseudo"] and isset($tab[0][0]) ){
         $req =  db::query("INSERT INTO minichat  (pseudo,message) 
    VALUES  ('".$_SESSION["pseudo"]."','$message')");
             }
    
    
    
     if (isset($tab[0][1]) and !isset($tab[0][0] )) {
        $i=0; 
        while( !isset($tab[$i][0])){$i++;}
    
    if($tab[$i][0]==$_SESSION["pseudo"] ){ $req =  db::query("INSERT INTO minichat  (message) 
    VALUES  ('$message')");

            }
         
         
         if($tab[$i][0]!=$_SESSION["pseudo"]) {
                  
  
    
    $req =  db::query("INSERT INTO minichat  (pseudo,message) 
    VALUES  ('".$_SESSION["pseudo"]."','$message')");

    } }}}


   

   ?>