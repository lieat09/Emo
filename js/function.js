function check() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("warn1").innerHTML = this.responseText;
            }
        };
    xhttp.open("GET", "../php/check.php", true);
    xhttp.send();
}


function open_win() {
    window.open("../page/webcam.php",'webcam','height=500,width=500,toolbar=0,,menubar=0,resizable=0,location=0,scrollbars=0');
}


function open_win_index() {
    window.open("./page/webcam.php",'webcam','height=500,width=500,toolbar=0,,menubar=0,resizable=0,location=0,scrollbars=0');
}


function warn() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "../php/warn.php", true);
    xhttp.send();
}


function emotion_list() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("emotion_list").innerHTML = this.responseText;
            }
        };
    xhttp.open("GET", "../php/emotion_list.php", true);
    xhttp.send();
}








