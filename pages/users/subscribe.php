<?PHP
echo '<h1> SUBSCRIBE </h1>';
if (!empty($_POST)) {
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if ($auth->subscribe($_POST['login'], $_POST['password'])) {
        ?>
        <div class="alert alert-success">
            <strong>Account created.</strong> <br />
            A mail as been sent to you. TODO
        </div>
        <?PHP
    } else {
        ?>
        <div class="alert alert-danger">
            <strong>User already exist.</strong> <br />
            Please, choose another Login.
        </div>
        <?PHP
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('login', 'Login'); ?>
    <?= $form->input('password', 'Password', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>