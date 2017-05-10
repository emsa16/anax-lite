<?php
$readUrl  = $app->url->create("admin/read");
$createUrl = $app->url->create("admin/create");
?>

<form action="<?= $readUrl ?>" class="search">
    <input class="search-bar" type="search" name="search" value="" placeholder="Skriv in vad du letar efter...">
    <br />
    <input type="submit" value="Sök">
</form>

<p><a href="<?= $readUrl ?>?search=%">Visa alla konton</a></p>
<p><a href="<?= $createUrl ?>">Skapa ett nytt konto</a></p>
