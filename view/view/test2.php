<?php

$linkCar = $this->asset("img/car.png");
$linkViewTest1 = $this->url("view/test1");
$linkViewTest2 = $this->url("view/test2");
$linkGoogle = $this->url("https://google.se");

?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<p><?= $message ?></p>

<p>Here is a link to a static asset <a href="<?= $linkCar ?>">car.png</a>.</p>

<p>Here is the same car within a paragraph as an image <img src="<?= $linkCar ?>">, the image source is linked as a asset.</p>

<p>Here are two links to the test routes: <a href="<?= $linkViewTest1 ?>">view/test1</a> | <a href="<?= $linkViewTest2 ?>">view/test2</a></p>

<p>Here is a link to another site, like <a href="<?= $linkGoogle ?>">Google</a>.
