<?php
$blogUrl = $app->url->create("content/blog");
?>
<p><a href="<?= $blogUrl ?>">Tillbaka</a></p>
<article>
    <header>
        <h1><?= $app->filter->esc($content->title) ?></h1>
        <p><i>Published: <time datetime="<?= $app->filter->esc($content->published_iso8601) ?>" pubdate><?= $app->filter->esc($content->published_date) ?></time></i></p>
    </header>
    <?= $content->data ?>
</article>
