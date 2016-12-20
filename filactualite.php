<?php include('connexionbdd.php'); ?>
    
       

  
            <form enctype="multipart/form-data">
                <input type="file" name="file1" id="file1" /> </form>
            
            
            <div id="blockactu">
                
                    <div id="filactu" onscroll="javascript:scroll_down_show_post();" >
                <?php   $x=1;
                        $grp_post= ($_COOKIE["compteur_post"])/5;
                        while($x-1 <= $grp_post ){
                        echo    "<div id='grpfilactu".$x."' ></div>";
                            $x++;
                            
                            
                        }       
                        
                        
                        ?>
                        
                </div>
                
                <div id="inputcontent">
                    <textarea id="txtrea"></textarea>
                    <div id="sendbox">
                        <button type="button" onclick="javascript:upfile()">upload</button>
                        <button type="button" onclick="javascript:ajaxpost();clearelement('txtrea');">Envoyer</button>
                    </div>
                </div>
            </div>
        
        <script language="javascript" type="text/javascript" src="clearelement.js"></script>
        <script language="javascript" type="text/javascript">
            function upfile() {
                document.getElementById('file1').click();
            }
        </script>
        <script language="javascript" type="text/javascript">
            function ajaxpost() {
                var file = document.getElementById("file1").files[0];
                var mess = document.getElementById("txtrea").value;
                var formdata = new FormData();
                formdata.append("file1", file);
                formdata.append("txtrea", mess);
                var ajax = new XMLHttpRequest();
                ajax.open("POST", "ajaxfilactu.php");
                ajax.send(formdata);
                
            }
        </script>
<script language="javascript" type="text/javascript" src="cookie.js"></script>
<script language="javascript" type="text/javascript" src="show_post.js"></script>
<script language="javascript" type="text/javascript">
function scroll_down_show_post(){
    if(i < getCookie("compteur_post")){
    if(filactu.scrollHeight - filactu.scrollTop === filactu.clientHeight){
     show_post(); 
         console.log(getCookie("compteur_post"));
        
    
   
        
    
    
        
    }
}
}

</script>




