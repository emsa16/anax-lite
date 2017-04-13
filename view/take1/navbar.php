<?php
$urlHome   = $app->url->create("");
$urlAbout  = $app->url->create("about");
$urlReport = $app->url->create("report");
$urlWrong  = $app->url->create("some/route");

?><nav>
<a href="<?= $urlHome ?>">Hem</a> |
<a href="<?= $urlAbout ?>">Om</a> |
<a href="<?= $urlReport ?>">Redovisningar</a> |
<a href="<?= $urlWrong ?>">404-rutt</a>
</nav>
</header>
