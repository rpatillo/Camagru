<div class="row">
    <div class="col-sm-8">

        <?PHP foreach(App::getInstance()->getTable('Post')->last() as $post) : ?>

            <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>

            <p><em><?= $post->categorie; ?></em></p>

            <p><?= $post->extrait; ?></p>

        <?PHP endforeach; ?>

    </div>

    <div class="col-sm-4">

        <ul>

            <?PHP foreach(App::getInstance()->getTable('Category')->all() as $categorie) : ?>

                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>

            <?PHP endforeach; ?>

        </ul>
    </div>
</div>
