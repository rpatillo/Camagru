<!-- Trigger/Open The Modal -->
<!--<button id="myBtn">Open Modal</button>-->

<!-- The Modal -->
<!--<div id="myModal" class="modal">-->
<!---->
<!--    <!-- Modal content -->
<!--    <div class="modal-content">-->
<!--        <span class="close">x</span>-->
<!--        <p>Some text in the Modal..</p>-->
<!--    </div>-->
<!---->
<!--</div>-->


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
                Comment:<br />
                <textarea></textarea>
            </form>
        </div>
    </div>
<?PHP endforeach;?>

<script src="JS/modalBox.js"></script>