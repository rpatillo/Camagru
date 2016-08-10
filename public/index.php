<?PHP
//phpinfo();


define('ROOT', dirname(__DIR__));
//date_default_timezone_set('Europe/Paris');

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}

ob_start();
if ($page === 'home') {
    require ROOT . '/pages/posts/home.php';
} elseif ($page === 'home' && isset($_SESSION['auth'])) {
    require ROOT . '/pages/users/photo.php';
} elseif ($page === 'posts.category') {
    require ROOT . '/pages/posts/category.php';
} elseif ($page === 'posts.show') {
    require ROOT . '/pages/posts/show.php';
} elseif ($page === 'login') {
    require ROOT . '/pages/users/login.php';
} elseif ($page === 'subscribe') {
    require ROOT . '/pages/users/subscribe.php';
} elseif ($page === 'photo') {
    require ROOT . '/pages/users/photo.php';
} elseif ($page === 'logout') {
    require ROOT . '/pages/users/logout.php';
}
$content = ob_get_clean();
require ROOT . '/pages/template/default.php';
