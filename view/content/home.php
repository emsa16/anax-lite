<?php
$adminUrl = $app->url->create("content/admin");
$pagesUrl = $app->url->create("content/pages");
$blogUrl = $app->url->create("content/blog");
?>

<p><a href="<?= $adminUrl ?>">Admin</a></p>
<p><a href="<?= $pagesUrl ?>">Sidor</a></p>
<p><a href="<?= $blogUrl ?>">Blogg</a></p>
