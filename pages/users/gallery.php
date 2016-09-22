
<?php

    function debug($value)
    {
        echo '<pre>' . print_r($value, true) . '</pre>';
    }


    $auth = new \Core\Auth\Photos(App::getInstance()->getDb());
    $result = $auth->printPic($_SESSION['auth']);

    foreach($result as $post) : ?>
        <img class="bigpict" id="myBtn<?=$post->id?>" src="<?=$post->photo?>" />
        <div name="divimg" id="myModal" class="modal">
            <div class="modal-content">
                <span name="bclose" class="close">x</span>
                <img src="<?=$post->photo?>" />
                <form method='post'>
                    <input type="hidden" name="user" value="<?= $_SESSION['auth'];?>">
                    <input type="hidden" name="id_photo" value="<?= $post->id;?>">
                    Comment:<br />
                    <textarea name="text"></textarea>
                    <br />
                    <button name="subbtn">Envoyer</button>
                </form>
                <p style="position: relative; margin-right: 10px; ">Ceci est un test</p>
            </div>
        </div>
    <?PHP endforeach;?>

<script src="JS/Gallery.js"></script>