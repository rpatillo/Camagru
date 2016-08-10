<?PHP
$app = App::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);


if ($post === false) {
    $app->notFound();
}

$app->title = $post->titre;
?>

<H1><?= $post->titre; ?></H1>

<p><em><?= $post->categorie; ?></em></p>

<p><?= $post->contenu; ?></p>