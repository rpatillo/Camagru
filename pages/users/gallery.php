<?php

    function debug($value)
    {
        echo '<pre>' . print_r($value, true) . '</pre>';
    }

    $auth = new \Core\Auth\Photos(App::getInstance()->getDb());
    $result = $auth->printPic($_SESSION['auth']);
    debug($result);
