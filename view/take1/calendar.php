<?php

$prevLink = $app->url->create("kalender/previous");
$nextLink = $app->url->create("kalender/next");
$links    = "<a class='left' href='$prevLink'>Föregående månad</a>
             <a class='right' href='$nextLink'>Nästa månad</a>";
$calendar = $app->calendar->getMonthCal($year, $month, $app->url, "asset");

echo $links;
echo $calendar;
echo "<p class='center'>Alla bilder tillhör public domain och är hämtade från <a href='https://pixabay.com/'>pixabay.com</a>.</p>";
