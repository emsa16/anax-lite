<?php
if (!$resultset) {
    return;
}
$contentUrl = $app->url->create("content");
$blogUrl = $app->url->create("content/blog");
?>

<p><a href="<?= $contentUrl ?>">Tillbaka</a></p>

<article>

<?php foreach ($resultset as $row) : ?>
<section>
    <header>
        <h1><a href="<?= $blogUrl."/".$app->filter->esc($row->slug) ?>"><?= $app->filter->esc($row->title) ?></a></h1>
        <p><i>Published: <time datetime="<?= $app->filter->esc($row->published_iso8601) ?>" pubdate><?= $app->filter->esc($row->published_date) ?></time></i></p>
    </header>
    <?= $app->filter->esc($row->data) ?>
</section>
<?php endforeach; ?>

</article>
