<?php
$pagesUrl = $app->url->create("content/pages");
?>
<p><a href="<?= $pagesUrl ?>">Tillbaka</a></p>
<article>
    <header>
        <h1><?= $app->filter->esc($content->title) ?></h1>
        <p><i>Latest update: <time datetime="<?= $app->filter->esc($content->modified_iso8601) ?>" pubdate><?= $app->filter->esc($content->modified) ?></time></i></p>
    </header>
    <?= $content->data ?>
</article>
