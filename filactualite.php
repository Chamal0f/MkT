<?php include('connexionbdd.php'); ?>
    <form enctype="multipart/form-data">
        <input type="file" name="file1" id="file1" /> </form>
    <div id="blockactu">
        <div id="filactu" onscroll="javascript:scroll_down_show_post();">
            <?php   $x=1;
                        $grp_post= ($_COOKIE["compteur_post"])/10;
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
            ajax.open("POST", "ajaxfilactu.php");
            ajax.send(formdata);
        }
    </script>
    <script language="javascript" type="text/javascript" src="cookie.js"></script>
    <script language="javascript" type="text/javascript" src="show_post.js"></script>
    <script language="javascript" type="text/javascript">
        /* afficher post suivant */
        function scroll_down_show_post() {
            if (i < getCookie("compteur_post")) {
                if (filactu.scrollHeight - filactu.scrollTop === filactu.clientHeight) {
                    show_post();
                    console.log(getCookie("compteur_post"));
                }
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