/**
 * Created by rpatillo on 9/13/16.
 */

var pict = document.getElementsByClassName("bigpict");
var divimg = document.getElementsByName("divimg");
var bclose = document.getElementsByName("bclose");
var send = document.getElementsByName("subbtn");
var text = document.getElementsByName("text");
var user = document.getElementsByName("user");
var id_photo = document.getElementsByName("id_photo");

// When the user clicks on the button, open the modal
for (i = 0; i < pict.length; i++){
    (function(i){
        pict[i].onclick = function() {
            divimg[i].style.display = "block";
        };
    }(i));
}

// When the user clicks on <span> (x), close the modal
for (i = 0; i < pict.length; i++){
    (function(i){
        bclose[i].onclick = function() {
            divimg[i].style.display = "none";
        };
    }(i));
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    for (i = 0; i < pict.length; i++) {
        if (event.target == divimg[i]) {
            divimg[i].style.display = "none";
        }
    }
};

for (i = 0; i < pict.length; i++){
    (function(i){
        send[i].onclick = function(ev) {
            ev.preventDefault();
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/includes/savecom.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('t=' + text[i].value + '&u=' + user[i].value + '&id=' + id_photo[i].value);
        };
    }(i));
}