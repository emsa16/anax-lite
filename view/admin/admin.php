<?php
$readUrl  = $app->url->create("admin/read");
$createUrl = $app->url->create("admin/create");
?>

<h1>Administrera användarkonton</h1>

<form action="<?= $readUrl ?>" class="search">
    <input class="search-bar" type="search" name="search" value="" placeholder="Skriv in användare">
    <br />
    <input type="submit" value="Sök">
</form>

<p><a href="<?= $readUrl ?>?search=%">Visa alla användarkonton</a></p>
<p><a href="<?= $createUrl ?>">Skapa ett nytt användarkonto</a></p>
