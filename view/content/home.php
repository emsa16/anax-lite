<?php
$adminUrl = $app->url->create("content/admin");
$pagesUrl = $app->url->create("content/pages");
$blogUrl = $app->url->create("content/blog");
$blockUrl = $app->url->create("content/block");
?>

<p>
    Innehållet i dessa sidor är lagrade i en databas och kan hanteras i ett eget gränssnitt (kräver inloggning). Resultatet är att varje databasinlägg kan visas antingen som en sida, som en bloggpost eller som ett block av en sida och kan filtreras med diverse filter (bbcode, markdown etc.).
</p>

<div class="center">
    <ul>
        <li><a href="<?= $pagesUrl ?>">Sidor</a></li>
        <li><a href="<?= $blogUrl ?>">Blogg</a></li>
        <li><a href="<?= $blockUrl ?>">Exempelsida för block</a></li>
        <li><a href="<?= $adminUrl ?>">Innehållsadministration (kräver inloggning)</a></li>
    </ul>
</div>
