<?php
$urlStatus = $app->url->create("status");
$urlGuess  = $app->url->create("../../kmom01/guess");
$urlBook   = $app->url->asset("image/php.jpg");
?>

<h1>Om denna sida</h1>

<img class="book" src="<?= $urlBook ?>" alt="Boken: Beginning PHP and MySQL: From Novice to Professional" />

<p>Denna webbsida är en del <i>oophp</i>-kursen på BTH våren 2017.</p>
<p>Vi lär oss följande koncept och tekniker:</p>
<ul>
    <li>Objekt-orienterad programmering i PHP</li>
    <li>SQL genom MySQL/MariaDB</li>
    <li>Bygga ett mikro-ramverk i PHP</li>
    <li>Make-filer</li>
    <li>To be continued...</li>
</ul>

<p>
    <a href="https://github.com/emsa16/anax-lite">Denna sida på Github</a>
</p>
<p>
    <a href="<?= $urlStatus ?>">Få information om systemet som JSON</a>
</p>
<p>
    <a href="<?= $urlGuess ?>">Gissa numret-spel</a>
</p>
