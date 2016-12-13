   function showhide(id) {
       
        if (document.getElementById(id).style.display == 'none') {
            setCookie(id, "block", 1)
        }
        else {
            setCookie(id, "none", 1)
        }
        document.getElementById(id).style.display = getCookie(id);
        console.log(id,getCookie(id));
    }