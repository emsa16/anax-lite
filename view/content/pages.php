<?php
if (!$resultset) {
    return;
}
$contentUrl = $app->url->create("content");
$pageUrl = $app->url->create("content/pages");
?>

<p><a href="<?= $contentUrl ?>">Tillbaka</a></p>
<table>
    <tr class="first">
        <th>Id</th>
        <th>Title</th>
        <th>Published</th>
        <th>Updated</th>
    </tr>
<?php $id = -1; foreach ($resultset as $row) :
    $id++;
?>
    <tr>
        <td><?= $row->id ?></td>
        <td><a href="<?= $pageUrl ?>/<?= $row->path ? $row->path : $row->slug ?>"><?= $row->title ?></a></td>
        <td><?= $row->published ?></td>
        <td><?= $row->updated ?></td>
    </tr>
<?php endforeach; ?>
</table>
