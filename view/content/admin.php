<?php
if (!$resultset) {
    return;
}
$editUrl = $app->url->create("content/edit");
$deleteUrl = $app->url->create("content/delete");
$resetUrl = $app->url->create("content/reset");
$createUrl = $app->url->create("content/create");
$contentUrl = $app->url->create("content");
?>

<p><a href="<?= $contentUrl ?>">Tillbaka</a></p>
<p><a href="<?= $resetUrl ?>">Återställ databasen</a></p>
<p><a href="<?= $createUrl ?>">Skapa innehåll</a></p>
<table>
    <tr class="first">
        <th>Id</th>
        <th>Path</th>
        <th>Slug</th>
        <th>Title</th>
        <th>Type</th>
        <th>Filter</th>
        <th>Status</th>
        <th>Published</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Deleted</th>
        <th>Actions</th>
    </tr>
<?php foreach ($resultset as $row) : ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->filter ?></td>
        <td><?= $row->status ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td>
            <a class="icons" href="<?= $editUrl ?>?id=<?= $row->id ?>" title="Edit this content">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a class="icons" href="<?= $deleteUrl ?>?id=<?= $row->id ?>" title="Delete this content">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
