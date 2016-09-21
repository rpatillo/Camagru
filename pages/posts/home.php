<?PHP
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
<div class="container">
    <div class="row">
        <div class="col-xs-6"><img src="img/home_photo.png" alt="home_photo" height=80% width=80%></div>
        <div class="col-xs-6">
            <h1>Camagru</h1>
            <h3>Create an account and take / share pictures !</h3>
            <form method="post">
                <?= $form->input('login', 'Username'); ?>
                <?= $form->input('password', 'Password', ['type' => 'password']); ?>
                <button class="btn btn-primary">Subscribe</button>
            </form> <br />
            Already got an account ? <a href="index.php?p=login">Log in.</a>
        </div>
    </div>
</div>