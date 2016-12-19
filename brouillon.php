while($file_exist=$file_filactu->fetch()){
    if(isset($file_exist["message"])){
        echo $file_exist["message"];
    }
    
}











?>