<?php
/**
 * Created by PhpStorm.
 * User: rpatillo
 * Date: 8/19/16
 * Time: 2:32 PM
 */


define('ROOT', dirname(dirname(__DIR__)));
//date_default_timezone_set('Europe/Paris');

require ROOT . '/app/App.php';
App::load();

if (!empty($_POST)) {
    $auth = new \Core\Auth\Photos(App::getInstance()->getDb());
    if ($auth->savePic($_POST['photo'], $_SESSION['auth'], NULL)) {
        echo 'Success';
    } else {
        echo 'Something went terribly wrong ...';
    }
}