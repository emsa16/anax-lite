<?php
$adminUrl      = $app->url->create("admin");
$defaultRoute  = $app->url->create("admin/read?");
$hits2Url      = $app->mergeQueryString(["hits" => 2], $defaultRoute);
$hits4Url      = $app->mergeQueryString(["hits" => 4], $defaultRoute);
$hits8Url      = $app->mergeQueryString(["hits" => 8], $defaultRoute);
$orderNameUrl  = $app->orderby("name", $defaultRoute);
$orderLevelUrl = $app->orderby("level", $defaultRoute);

$pages = "";
for ($i = 1; $i <= $max; $i++) {
    $pageUrl = $app->mergeQueryString(["page" => $i], $defaultRoute);
    $pages  .= "<a href='$pageUrl'>$i</a> ";
}
?>

<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>

<p>Antal resultat per sida:
    <a href="<?= $hits2Url ?>">2</a> |
    <a href="<?= $hits4Url ?>">4</a> |
    <a href="<?= $hits8Url ?>">8</a>
</p>

<h3>Resultatet för din sökning "<?= $search ?>":</h3>
<table>
<tr>
    <th>Namn <?= $orderNameUrl ?></th>
    <th>Användarnivå <?= $orderLevelUrl ?></th>
    <th>Uppdatera</th>
    <th>Ta bort</th>
</tr>
<?= $accounts ?>
</table>

<p>
    Sidor:
    <?= $pages ?>
</p>
