<button type="button" id="openclose" onclick="javascript:showhide('lechat');"> messagerie </button>
<div id="lechat" style='display:<?php if (isset($_COOKIE["lechat"]))
{ echo $_COOKIE["lechat"];}else{echo "block";} ?>'>
    <div id="messagechat">
        <?php include('mess.php'); ?>
    </div>
    <div id="inputchat">
        <textarea name="message" id="txtArea"></textarea>
        <button name="submit" type="submit" id="envoimessage" onclick="javascript:ajax_post();autoscrolldown('messagechat');clearelement('txtArea');"> Envoyer </button>
    </div>
</div>
<script language="javascript" type="text/javascript">
    function ajax_post() {
        var xhr = new XMLHttpRequest();
        var url = "recupajaxchat.php";
        var mess = document.getElementById("txtArea").value;
        var vars = "message=" + mess;
        xhr.open("POST", url, false);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('OK');
            }
        }
        xhr.send(vars);
    }
</script>

<script language="javascript" type="text/javascript" src="clearelement.js"></script>
<script language="javascript" type="text/javascript" src="cookie.js"></script>
<script language="javascript" type="text/javascript" src="showhide.js"></script>
<script language="javascript" type="text/javascript" src="autoscrolldown.js"></script>
<script language="javascript" type="text/javascript">
    autoscrolldown('messagechat');
</script>
<script language="javascript" type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
    new Ajax.PeriodicalUpdater('refresh', 'mess.php', {
        frequency: 1
    });
</script>