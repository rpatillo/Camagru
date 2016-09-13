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



foreach($result as $post) {
    echo '<img id="myBtn" src="' . $post->photo . '" />';
    echo '<div id="myModal" class="modal">';
    echo '<div class="modal-content">';
    echo '<span class="close">x</span>';
    echo '<img src="' . $post->photo . '" />';
    echo '</div>';
    echo '</div>';
}
?>

<script src="JS/modalBox.js"></script>




