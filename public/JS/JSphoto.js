/**
 * Created by rpatillo on 9/13/16.
 */

(function () {

    var data = ''
    var x = ''
    var y = ''

    var streaming = false,
        video = document.querySelector('#video'),
        cover = document.querySelector('#cover'),
        canvas = document.querySelector('#canvas'),
        photo = document.querySelector('#photo'),
        startbutton = document.querySelector('#startbutton'),
        savebutton = document.querySelector('#savebutton'),
        modify = document.querySelector('#modify'),
        photo1 = document.querySelector('#photo1'),
        YVal = document.querySelector('#YVal'),
        width = 320,
        height = 0;
    navigator.getMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);
    navigator.getMedia(
        {
            video: true,
            audio: false
        },
        function (stream) {
            if (navigator.mozGetUserMedia) {
                video.mozSrcObject = stream;
            } else {
                var vendorURL = window.URL || window.webkitURL;
                video.src = vendorURL.createObjectURL(stream);
            }
            video.play();
        },
        function (err) {
            console.log("An error occured! " + err);
        }
    );
    video.addEventListener('canplay', function (ev) {
        if (!streaming) {
            height = video.videoHeight / (video.videoWidth / width);
            video.setAttribute('width', width);
            video.setAttribute('height', height);
            canvas.setAttribute('width', width);
            canvas.setAttribute('height', height);
            streaming = true;
        }
    }, false);

    startbutton.addEventListener('click', function (ev) {
        canvas.width = width;
        canvas.height = height;
        canvas.getContext('2d').drawImage(video, 0, 0, width, height);
        canvas.getContext('2d').drawImage(photo1, 10, 10);
        data = canvas.toDataURL();
        ev.preventDefault();
    }, false);

    modify.addEventListener('click', function (ev) {

    }, false);

    savebutton.addEventListener('click', function (ev) {
        var res = encodeURIComponent(data);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('result').innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "/includes/savepic.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('photo=' + res);
        ev.preventDefault();
    }, false);


    var XVal = document.getElementById('myRange');
    XVal.addEventListener("mousemove", function () {
        document.getElementById('XVal').innerHTML = this.value;
    });

    document.getElementById('XXVal').innerHTML = x;

})();