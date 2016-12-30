<?php  include('connexionbdd.php');
	
    session_start();
   
if(isset($_FILES["file1"])){
$file=$_FILES["file1"];
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$type_autorisees = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png','video/mp4','audio/mp3','video/avi','video/mov','video/mpg','video/mpeg','video/wmv');
   
$extension = strrchr($_FILES["file1"]["name"], '.');

    
$lastid=$bdd->prepare('SELECT id FROM fichier_upload ORDER BY id DESC LIMIT 0, 1');
$lastid->execute();
$lastidtab=$lastid->fetch();
$newnameid=$lastidtab[0]+1 ;
$newname="fichier$newnameid$extension";
    
    

}
if(!empty($_POST["txtrea"])){$mess=addslashes($_POST["txtrea"]);}

$pseudo=$_SESSION['pseudo'];
$date=date('Y-m-d H:i:s');


if(isset($file) and !empty($mess)){
     if($fileErrorMsg == 0){
         if ($fileSize <= 100000000 and in_array($fileType, $type_autorisees)){
         
            $ins=$bdd->prepare("INSERT INTO fichier_upload (pseudo,name_file,new_name_file,message,date_upload) VALUES ('$pseudo','$fileName','$newname','$mess','$date')");

            $ins->execute();
            move_uploaded_file($fileTmpLoc, "upload/$newname");
     }}}

if(isset($file) and empty($mess)){
     if($fileErrorMsg == 0){
         if ($fileSize <= 100000000 and in_array($fileType, $type_autorisees)){
         
            $ins=$bdd->prepare("INSERT INTO fichier_upload (pseudo,name_file,new_name_file,date_upload) VALUES ('$pseudo','$fileName','$newname','$date')");

            $ins->execute();
            move_uploaded_file($fileTmpLoc, "upload/$newname");
     }}}
if(!isset($file) and !empty($mess)){
    $ins=$bdd->prepare("INSERT INTO fichier_upload (pseudo,message,date_upload) VALUES ('$pseudo','$mess','$date')");

        $ins->execute();
    
}






?>