<?php
if (!$resultset) {
    return;
}
$imgUrl = $app->url->asset("img/webshop/");
$editUrl = $app->url->create("shop/admin/edit");
$deleteUrl = $app->url->create("shop/admin/delete");
$resetUrl = $app->url->create("shop/admin/reset");
$createUrl = $app->url->create("shop/admin/create");
$contentUrl = $app->url->create("");
?>

<p><a href="<?= $contentUrl ?>">Tillbaka</a></p>
<p><a href="<?= $resetUrl ?>">Återställ databasen</a></p>
<p><a href="<?= $createUrl ?>">Lägg till produkt</a></p>
<table>
    <tr class="first">
        <th>Id</th>
        <th>Produkt</th>
        <th>Bild</th>
        <th>Pris</th>
        <th>Kategori</th>
        <th>I Lager</th>
        <th>Inställningar</th>
    </tr>
<?php foreach ($resultset as $row) : ?>
    <tr>
        <td><?= $row->ProductNumber ?></td>
        <td><?= $row->Description ?></td>
        <td><img class="thumb" src="<?= $imgUrl ?>/<?= $row->ImageLink ?>"></td>
        <td><?= $row->Price ?></td>
        <td><?= $row->Category ?></td>
        <td><?= $row->Inventory ?></td>
        <td>
            <a class="icons" href="<?= $editUrl ?>?id=<?= $row->ProductNumber ?>" title="Edit this content">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a class="icons" href="<?= $deleteUrl ?>?id=<?= $row->ProductNumber ?>" title="Delete this content">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
