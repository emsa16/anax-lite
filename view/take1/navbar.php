<?php
$urlHome  = $app->url->create("");
$urlAbout = $app->url->create("about");
$urlWrong = $app->url->create("some/route");

?><navbar>
<a href="<?= $urlHome ?>">Home</a> |
<a href="<?= $urlAbout ?>">About</a> | 
<a href="<?= $urlWrong ?>">Some/Route</a>
</navbar>
