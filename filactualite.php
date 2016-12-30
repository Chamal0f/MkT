<?php include('connexionbdd.php'); ?>
   
<?php $compteur = $bdd->prepare("SELECT COUNT(id) FROM fichier_upload");
$compteur->execute();
$array_post=$compteur->fetch();
$compteur_post=$array_post[0];
 ?>


    <form enctype="multipart/form-data">
        <input type="file" name="file1" id="file1" /> </form>
    <div id="blockactu">
        <div id="filactu" onscroll="javascript:scroll_down_show_post();" onload="javascript:show_nb_com()" >
            <?php   $x=1;
                        
                        $grp_post= ($compteur_post/10);
                        while($x-1 <= $grp_post ){
                        echo    "<div id='grpfilactu".$x."' ></div>";
                            $x++;
                            
                            
                        }       
                        
                        
                        ?> </div>
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
        /* upload post dans bdd + serveur */
        function ajaxpost() {
            var file = document.getElementById("file1").files[0];
            var mess = document.getElementById("txtrea").value;
            var formdata = new FormData();
            formdata.append("file1", file);
            formdata.append("txtrea", mess);
            var ajax = new XMLHttpRequest();
            ajax.open("POST", "ajaxfilactu.php",true);
            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    
                    
                    
                }
            
            }
            ajax.send(formdata);
        }
    </script>
    <script language="javascript" type="text/javascript" src="cookie.js"></script>
    <script language="javascript" type="text/javascript">
    var i = 0;
    var x = 0;
    var filactu = document.getElementById("filactu");

function show_post() {
    var xhr = new XMLHttpRequest();
    var url = "post_filactu.php";
    var vars = "var=" + i;
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            
            console.log('OK');
            var return_data = xhr.responseText;
            console.log("grpfilactu" + x);
            var grpactu = document.getElementById("grpfilactu" + x);
            grpactu.innerHTML = return_data;
            load_likes();
            up_nb_com();
        }
    }
    xhr.send(vars);
    
    i = i + 10;
    x += 1;
    console.log(i);
    
    
}


</script>
    <script language="javascript" type="text/javascript">
        /* afficher post suivant */
        var y = <?php echo $compteur_post; ?>;
        console.log(y);
        function scroll_down_show_post() {
            if (i < y && filactu.scrollHeight - filactu.scrollTop === filactu.clientHeight) {
                    show_post();
                    
                    console.log(y);
                
            }
        }
    </script>
    <script language="javascript" type="text/javascript">
        /* montrer cacher section commentaire */
        function showhidecom(x) {
            if (document.getElementById('commentpart' + x).style.display == 'none') {
                document.getElementById('commentpart' + x).style.display = 'block'
            }
            else {
                document.getElementById('commentpart' + x).style.display = 'none'
            }
        }
    </script>
    <script language="javascript" type="text/javascript">
        /* insertion commentaire bdd  */
        function ajax_com(x) {
            var xhr = new XMLHttpRequest();
            var url = "traitementcom.php";
            var mess = document.getElementById("entercom" + x).value;
            var idpost = x;
            var vars = "message=" + mess + "&idpost=" + idpost;
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {}
            }
            xhr.send(vars);
            clearelement('entercom' + x);
        }
    </script>
<script language="javascript" type="text/javascript">
     /* show com   */ 
    function show_com(x) {
         var xhr = new XMLHttpRequest();
        var url = "showcom.php";
        var idpost = x;
        var vars = "idpost=" + idpost;
        xhr.open("POST", url, true);
         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('OK');
                var return_data = xhr.responseText;
                var comments = document.getElementById("com" + x);
                comments.innerHTML = return_data;
                    
                }
            }
            xhr.send(vars);
        }
</script>
    <script language="javascript" type="text/javascript" src="valeur_min.js"></script>

<script language="javascript" type="text/javascript">
     
    /* update  nb comments if it change  */
   
    var update_nb_com = setInterval(up_nb_com,1000);
    
    function up_nb_com(){
        var result = valeur_min(i,y);
        create_array_nb_post();
        var xhr = new XMLHttpRequest();
        var url = "verif_nb_com.php";
        var vars = "nb_post="+result+"&array="+ JSON.stringify(arraysend) ;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var return_data = JSON.parse(xhr.responseText);
                for(j=1;j <= result ; j++){
                    if ( arraysend[j-1][1] != return_data[j-1][1] ){
                    document.getElementById("nbcom"+return_data[j-1][0]).innerHTML = return_data[j-1][1]+" commentaires";
                    }
                    if ( arraysend[j-1][2] != return_data[j-1][2] ){
                    document.getElementById("nblikes"+return_data[j-1][0]).innerHTML = return_data[j-1][2]+" likes";
                    }
                }
            }       
        }
        xhr.send(vars);
        
    }
</script>

<script language="javascript" type="text/javascript">
    /* create array for verif nb com  */
    function create_array_nb_post(){
        var result = valeur_min(i,y);
        var arraysend=[];
        for(j=1;j <= result ; j++){
            var elements = document.getElementsByName('nbpost'+j);    
            var idpost = elements[0].getAttribute('id');
            var innerspan = document.getElementById('nbcom'+idpost).innerHTML;
            var value_com = innerspan.substring(0,1);
            var innerspan_like = document.getElementById('nblikes'+idpost).innerHTML;
            var value_like = innerspan_like.substring(0,1);
            var arraypost= [idpost,value_com,value_like];
            arraysend.push(arraypost);
        }
        window.arraysend = arraysend;
    }
</script>


<script language="javascript" type="text/javascript">
var update_com = setInterval(update_com,1000);
    function update_com(){
         var result = valeur_min(i,y);
        array_com();
        var xhr = new XMLHttpRequest();
        var url = "verif_com.php";
        var vars = "nb_post="+result+"&array="+ JSON.stringify(arraysendcom) ;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var return_data = JSON.parse(xhr.responseText);
                
                for(j=1;j <= result ; j++){
                    if (document.getElementById('commentpart'+ return_data[j-1][0] ).style.display=='block'){
                    if (return_data[j-1][1] != arraysendcom[j-1][1]){
                        var comments = document.getElementById("com" + return_data[j-1][0]);
                        comments.innerHTML = "";
                        for(a=1;a <= return_data[j-1][1];a++ ){
                             comments.innerHTML += "<div class='comm' id='post" + return_data[j-1][0] + "com" + a + "' name='" + return_data[j-1][0] + "' > <span><strong>  " + return_data[j-1][2][a-1][1] + " : </strong> " + return_data[j-1][2][a-1][2] + "</span></div>";
                        }
                    }else{
                        for(b=1;b <= return_data[j-1][1];b++ ){
                            if(return_data[j-1][2][b-1][0] != arraysendcom[j-1][2][b-1]){
                                var comments = document.getElementById("com" + return_data[j-1][0]);
                        comments.innerHTML = "";
                            for(a=1;a <= return_data[j-1][1];a++ ){
                             comments.innerHTML += "<div class='comm' id='post" + return_data[j-1][0] + "com" + a + "' name='" + return_data[j-1][0] + "' > <span><strong>  " + return_data[j-1][2][a-1][1] + " : </strong> " + return_data[j-1][2][a-1][2] + "</span></div>";
                            
                                }
                            break;
                            }
                        }
                        
                    }
                    
                }
                }
                   
        }
        }
        xhr.send(vars);
        
    }

</script>




<script language="javascript" type="text/javascript">
   /* create array for verif content com */ 
    function array_com(){ 
        var result = valeur_min(i,y);
        var arraysendcom = [];
        
        for(j=1;j <= result ; j++){
            var elements = document.getElementsByName('nbpost'+j);    
            var idpost = elements[0].getAttribute('id');
                var a = 1;
            var allcom = [];
                while(document.getElementById("post"+idpost+"com"+a)){
                var com = document.getElementById("post"+idpost+"com"+a);
                var idcom = com.getAttribute('name');
                
                
                
                allcom.push(idcom);
                
                



                a++;
            }
            var nb_com= a-1;
            var array_com = [idpost,nb_com,allcom];
            arraysendcom.push(array_com);
        }
        
         window.arraysendcom = arraysendcom;
        
        
        
        
        
    }
    
    </script>
<script language="javascript" type="text/javascript">
    function insert_likes(x){
        var xhr = new XMLHttpRequest();
        var url = "insert_likes.php";
        var vars = "idpost=" + x ;
        xhr.open("POST",url,true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                var return_data = xhr.responseText;
                var btn = document.getElementById("btnlike"+x);
                btn.innerHTML = return_data;
                
            }
         }
         xhr.send(vars);
    }
    
    
    </script>

<script language="javascript" type="text/javascript">
    function load_likes(){
        var result = valeur_min(i,y);
        var xhr = new XMLHttpRequest();
        var url = "load_likes.php";
        var vars = "nbpost=" + result ;
        xhr.open("POST",url,true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var return_data = JSON.parse(xhr.responseText);
                for(j=1;j <= result ; j++){
                    var elements = document.getElementsByName('nbpost'+j);    
                    var idpost = elements[0].getAttribute('id');   
                    var btn = document.getElementById("btnlike"+idpost);
                    if(return_data[j-1][1] == 0){           
                    
                    btn.innerHTML ="Nice 1!" ;
                    }else{
                       btn.innerHTML ="Nope" ; 
                    }
                    
                }
                
                
                
               
            }
         }
         xhr.send(vars);
    }
    
    
   
    </script>

<script language="javascript" type="text/javascript">
    function show_supp(idpost){
        if(document.getElementById('drop1content' + idpost).style.display == 'flex'){
            document.getElementById('drop1content' + idpost).style.display = 'none';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'flex-end';
        }
        
        if(document.getElementById('drop2content' + idpost).style.display == 'none' || document.getElementById('drop2content' + idpost).style.display == '' ){
            document.getElementById('drop2content' + idpost).style.display = 'flex';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'space-between';
            
        }else{
            document.getElementById('drop2content' + idpost).style.display = 'none';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'flex-end';
            
        }
    }
    
</script>

  <script language="javascript" type="text/javascript">
    function show_modif(idpost){
        if(document.getElementById('drop2content' + idpost).style.display == 'flex'){
            document.getElementById('drop2content' + idpost).style.display = 'none';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'flex-end';
            
        }
    
        if(document.getElementById('drop1content' + idpost).style.display == 'none' || document.getElementById('drop1content' + idpost).style.display == '' ){
            document.getElementById('drop1content' + idpost).style.display = 'flex';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'space-between';
            
        }else{
            document.getElementById('drop1content' + idpost).style.display = 'none';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'flex-end';
            
        }
    }
    
</script>  
<script language="javascript" type="text/javascript">
     
    function xhr_modif_post(idpost){
    
    var xhr = new XMLHttpRequest();
        var url = "modif_post.php";
        var modif = document.getElementById("modif" + idpost).value;
        var vars = "idpost=" + idpost + "&modif=" + modif ;
        xhr.open("POST",url,true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var return_data = xhr.responseText;
                document.getElementById("message" + idpost).innerHTML = return_data + " - message modifié - ";
                document.getElementById('drop1content' + idpost).style.display = 'none';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'flex-end';
                
            }
        }
        xhr.send(vars);
    }
</script>
<script language="javascript" type="text/javascript">
     
    function xhr_supp_post(idpost){
    
    var xhr = new XMLHttpRequest();
        var url = "supp_post.php";
        
        var vars = "idpost=" + idpost ;
        xhr.open("POST",url,true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                document.getElementById("message" + idpost).innerHTML = " - Ce post a été suprimé - ";
                document.getElementById('drop2content' + idpost).style.display = 'none';
            document.getElementById('modifsupp' + idpost).style.justifyContent = 'flex-end';
                
            }
        }
        xhr.send(vars);
    }
</script>

