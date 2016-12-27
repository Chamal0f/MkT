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
    var update_com = setInterval(fakerealtimeajax,1000);   
    
    function fakerealtimeajax(){
        var result = valeur_min(i,y);
        for(j=1;j <= result ; j++){
        var elements = document.getElementsByName('nbpost'+j);    
        var idpost = elements[0].getAttribute('id');
        if(document.getElementById('commentpart'+ idpost).style.display=='block' )
        {   nb_element(idpost);
        
       
        
        var xhr = new XMLHttpRequest();
        var url = "verif_com.php";
        var vars = variables + "nbcom="+nb_com+"&idpost="+idpost ;
        
        xhr.open("POST", url, false);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
               
                var return_data = xhr.responseText;
                var comments = document.getElementById("com" + idpost);
                if(return_data){
                comments.innerHTML = return_data  ;
                }
               
            }
        }
        xhr.send(vars);
            
            
        }
            
        }
    }

            
    
</script>
<script language="javascript" type="text/javascript">
    function nb_element(idpost){ 
        var a = 1;
        var variables = "";
        while(document.getElementById("post"+idpost+"com"+a)){
            
            var com = document.getElementById("post"+idpost+"com"+a);
            var idcom = com.getAttribute('name');
            
            
            variables += "com"+a+ "=" +idcom+"&" ;
            
            a++;
        }
        
        var nb_com= a-1;
        window.variables = variables;
        window.nb_com = nb_com;
    }
    </script>




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
            var value = innerspan.substring(0,1);
            var arraypost= [idpost,value];
            arraysend.push(arraypost);
        }
        window.arraysend = arraysend;
    }
</script>

