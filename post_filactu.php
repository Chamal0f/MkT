<?php include('connexionbdd.php');?>
    <?php session_start(); ?>
        <?php 
$i=$_POST["var"];




$file_filactu = $bdd->prepare('SELECT id,pseudo,message,new_name_file FROM fichier_upload ORDER BY date_upload DESC LIMIT '.$i.', 10');
$file_filactu -> execute();


$extimage=array(".png",".jpg",".jepg",".gif",".PNG",".JPG",".JPEG",".GIF");
$extvideo=array(".mp4",".avi",".mov",".mpg",".mpeg",".mvw",".MP4",".AVI",".MOV",".MPG",".MPEG",".MVW");
$extaudio=array(".mp3",".MP3");
$a=0;

    
    while($file_exist=$file_filactu->fetch()){
        $a++;
        $nbpost=$i+$a;
        $x=$file_exist['id'];
        
        
        
        
        echo "<div class='postfilactu' id='".$x."' name='nbpost".$nbpost."'>";
    
        if ($_SESSION['pseudo']==$file_exist['pseudo']){
        echo " 
        <div class='modifsupp' id='modifsupp".$x."'> <div class='drop1content'id='drop1content".$x."'> <input type='text' id='modif".$x."' /> <button onclick='xhr_modif_post(".$x.");' >modifier</button> </div>  <div class='drop2content' id='drop2content".$x."'> êtes-vous sur de supprimer ? <button onclick='xhr_supp_post(".$x.");' >Yes</button> </div>   <div class='btnmodifsupp'><button onclick='javascript:show_modif(".$x.");'>modifier</button><button onclick='javascript:show_supp(".$x.");'>suprimer</button> </div></div> ";
        }
        
        echo " <div> <strong> " .htmlspecialchars($file_exist['pseudo']). "</p></strong> </div>    ";
        if(isset($file_exist["message"])){
        echo " <div class='msg_post' id='message".$x."'> <p>" .htmlspecialchars($file_exist["message"]). "</p> </div>  ";
        }else{
        echo     "<div class='msg_post' id='message".$x."'></div> ";
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
        
        echo " <div class='likecomment'><button id='btnlike".$x."' onclick='javascript:insert_likes(".$x.");' ></button> <span id='nblikes".$x."'> </span> <button  onclick='javascript:showhidecom(".$x.");show_com(".$x.")'>commentaires</button> <span id='nbcom".$x."' >  </span></div> ";
        
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
