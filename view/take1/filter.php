<?php

$unfilteredText = <<<EOD
Denna rad är [b]formaterad[/b] med [i]bbcode-filtret[/i] och man kan även [url=https://dbwebb.se]länka[/url] med den.

Vi kan skapa klickbara länkar direkt från texten, såsom denna: https://dbwebb.se

Länkar kan också skapas med [Markdown-formatering](https://dbwebb.se).

Denna text har använt sig av följande filter:

* bbcode
* markdown
* link
EOD;
$filteredText       = $app->filter->format($unfilteredText, "bbcode,markdown,link");
$filteredTextSource = $app->filter->format($filteredText, "esc");

$nlExample         = <<<EOD
I detta stycke används istället filtret nl2br.\nDet är bra att använda om inte markdown-filtret används.
Så är det med den saken.
EOD;
$filteredNlExample = $app->filter->format($nlExample, "nl2br");
$filteredNlExampleSource = $app->filter->format($filteredNlExample, "esc");
?>

<h2>Ofiltrerad text:</h2>
<p><pre><?= $unfilteredText ?></pre></p>
<p><?= $nlExample ?></p>

<h2>Filtrerad text som källkod:</h2>
<p><pre><?= $filteredTextSource ?></pre></p>
<p><pre><?= $filteredNlExampleSource ?></pre></p>

<h2>Filtrerad text:</h2>
<?= $filteredText ?>
<p><?= $filteredNlExample ?></p>
