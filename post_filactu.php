<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
        <?php 
$i=$_POST["var"];

$compteur = $bdd->prepare('SELECT COUNT(id) FROM fichier_upload');
$compteur->execute();
$array_post=$compteur->fetch();
$compteur_post=$array_post[0];
setcookie("compteur_post",$compteur_post);
$file_filactu = $bdd->prepare('SELECT id,pseudo,message,new_name_file FROM fichier_upload ORDER BY date_upload DESC LIMIT '.$i.', 10');
$file_filactu->execute();


$extimage=array(".png",".jpg",".jepg",".gif",".PNG",".JPG",".JPEG",".GIF");
$extvideo=array(".mp4",".avi",".mov",".mpg",".mpeg",".mvw",".MP4",".AVI",".MOV",".MPG",".MPEG",".MVW");
$extaudio=array(".mp3",".MP3");
$a=0;

    
    while($file_exist=$file_filactu->fetch()){
        $a++;
        $nbpost=$i+$a;
        $x=$file_exist['id'];
        echo "<div class='postfilactu' id='".$x."'>";
        
        if ($_SESSION['pseudo']==$file_exist['pseudo']){
        echo "<div class='modifsupp'> <button>modifier</button><button>suprimer</button> </div> ";
        }
        
        echo " <div> <strong> " .htmlspecialchars($file_exist['pseudo']). "</p></strong> </div>    ";
        if(isset($file_exist["message"])){
        echo " <div> <p>" .htmlspecialchars($file_exist["message"]). "</p> </div>  ";
        }
        if(in_array(strrchr($file_exist["new_name_file"], "."),$extimage)){
        echo "<img src='upload/" .$file_exist["new_name_file"]."' />";
        }
        
         if(in_array(strrchr($file_exist["new_name_file"], "."),$extvideo)){
        echo "<video controls preload='metadata' src='upload/" .$file_exist["new_name_file"]."' ></video>";
        }
        
        if(in_array(strrchr($file_exist["new_name_file"], "."),$extaudio)){
        echo "<audio controls src='upload/" .$file_exist["new_name_file"]."' ></audio> ";
        }
        
        echo " <div class='likecomment'><button>Nice 1 ! </button> <span> ? likes </span> <button  onclick='javascript:showhidecom(".$x.");show_com(".$x.")'>commentaires</button> <span> ? commentaires </span></div> ";
        
        echo " <div id='commentpart".$x."' style='display:none'> 
        <div class='comms' id='com".$x."'>
        </div>
        
        
        <div class='formcom' ><textarea id='entercom".$x."' ></textarea> 
            <button onclick='javascript:ajax_com(".$x.");'>Commenter!</button>
        </div>
        
        </div> ";
        
        
        echo "</div>";
        
    }


    

?>