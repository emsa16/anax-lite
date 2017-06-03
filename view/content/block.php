<?php
$contentUrl = $app->url->create("content");
?>
<p><a href="<?= $contentUrl ?>">Tillbaka</a></p>
<div class="flash">
    <?= $blocks["flash"]->data ?>
</div>
<aside>
    <?= $blocks["sidebar"]->data ?>
</aside>
<p>
    Detta är huvudtexten. Den ligger inte i något block utan är sparad direkt i sidans dokument.
</p>
<p>
    På denna sida finns två block-element som båda är lagrade i databasen. Ovan finns en flash-ruta, kodad med bbcode. Till höger finns en sidoruta, kodad i Markdown.
</p>
