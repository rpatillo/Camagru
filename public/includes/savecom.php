<?php
/**
 * Created by PhpStorm.
 * User: rpatillo
 * Date: 9/22/16
 * Time: 3:10 PM
 */

define('ROOT', dirname(dirname(__DIR__)));

require ROOT . '/app/App.php';
App::load();

function RetCom($id, $user) {
    $auth = new \Core\Auth\Photos(App::getInstance()->getDb());
    $com = $auth->printCom($_POST['id']);
    foreach ($com as $posts) {
        echo '<tr>';
        echo '<td><strong>' . $posts->username . ' :</strong></td>';
        echo '<td>' . $posts->comment . '</td>';
        echo '</tr>';
    }
}

if (!empty($_POST)) {
    $auth = new \Core\Auth\Photos(App::getInstance()->getDb());
    $auth->saveCom($_POST['t'], $_POST['u'], $_POST['id']);
    return RetCom($_POST['id']);
}