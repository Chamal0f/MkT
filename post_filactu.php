 <?php include('connexionbdd.php');?>


<?php 
$file_filactu = $bdd->prepare('SELECT pseudo,message,new_name_file FROM fichier_upload ORDER BY date_upload DESC LIMIT 0, 3');
$file_filactu->execute();
$extimage=array(".png",".jpg",".jepg",".gif",".PNG",".JPG",".JPEG",".GIF");
$extvideo=array(".mp4",".avi",".mov",".mpg",".mpeg",".mvw",".MP4",".AVI",".MOV",".MPG",".MPEG",".MVW");
$extaudio=array(".mp3",".MP3");
    while($file_exist=$file_filactu->fetch()){
        echo "<div class='postfilactu'>";
        
        echo "<div class='modifsupp'> <button>modifier</button><button>suprimer</button> </div> ";
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
        
        echo " <div class='likecomment'><button>Nice 1 ! </button> <span> ? likes </span> <button>commentaires</button> <span> ? commentaires </span></div> ";
        echo "</div>";
    }


    

?>

