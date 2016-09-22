<?PHP
$auth = new \Core\Auth\Photos(App::getInstance()->getDb());
$result = $auth->printPic($_SESSION['auth']);
?>
<article>
    <div id="image_area">
        <video id="video"></video>
        <canvas id="feed"></canvas>
        <canvas id="canvas"></canvas>
        </br>
    </div>
    <button id="startbutton">Take a picture</button>
    <button id="savebutton">Save</button>
    <br />
    <button id="modify">Pimp it !</button>

    <div id="result"></div>

    <br/>
    <br/>
    <br/>

    <input type="range" id="myRangeX" value="90">
    <input type="range" id="myRangeY" value="90">
    <div id="XVal"></div>
    <div id="XXVal"></div>
    <div id="YVal"></div>

    <img class='photos' id="photo1" src="/img/photo.png">
    <img class='photos' id="photo2" src="/img/hat.png">
    <img class='photos' id="photo3" src="/img/Eyes.png">
</article>

<aside style="max-height: 750px; overflow-y:scroll; width: 40%">
    <br />
    <?PHP foreach($result as $post) : ?>
    <img src="<?=$post->photo?>" />
    <?PHP endforeach;?>
</aside>

<script src="JS/JSphoto.js"></script>



