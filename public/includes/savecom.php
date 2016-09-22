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

if (!empty($_POST)) {
    $auth = new \Core\Auth\Photos(App::getInstance()->getDb());
    $auth->saveCom($_POST['t'], $_POST['u'], $_POST['id']);
}