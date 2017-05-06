<?php
$logoutUrl = $app->url->create("logout");
$changepassUrl = $app->url->create("change_password");
?>
<h1>Välkommen!</h1>
<p>Du är inloggad som <b><?= $name ?></b></p>
<p><a href='<?= $changepassUrl ?>'>Byt lösenord</a></p>
<p><a href='<?= $logoutUrl ?>'>Logga ut</a></p>
<p>Cookien innehåller:</p>
<pre><?= $cookie ?></pre>
