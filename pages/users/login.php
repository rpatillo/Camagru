<?PHP
echo '<h1> LOGIN </h1>';
if (!empty($_POST)) {
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header('Location: index.php?p=photo');
    } else {
        ?>
            <div class="alert alert-danger">
                Indentifiants incorrect
            </div>
        <?PHP
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('username', 'Login'); ?>
    <?= $form->input('password', 'Password', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>