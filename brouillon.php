else{ for($b=1;$b=$value_count;$b++ )
        { $c=$b-1;
            if($_COOKIE["post".$idpost."com".$b] != $tab_id_com[$c])
            {
                $selectcom = $bdd->prepare("SELECT id,pseudo,commentaires FROM commentaires WHERE id_fichier = ".$idpost."");
                $selectcom -> execute();

                $a=0;
                while($com_exist=$selectcom ->fetch()){
                    $a++;
                    $idcom=$com_exist["id"];
                    echo "<div class='comm' id='post".$idpost."com".$a."' > <span><strong>  ". $com_exist['pseudo']." : </strong> ".$com_exist['commentaires']."</span></div>";
                }
                
            }
        }
     }