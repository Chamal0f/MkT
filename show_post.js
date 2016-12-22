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
}