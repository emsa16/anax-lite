<?php
// Get all available variables
// echo "<pre>";
// var_dump(get_defined_vars());
// echo "</pre>";

?><doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<p><?= $message ?></p>
<p>These variables are defined.</p>
<ul>
<?php foreach (get_defined_vars() as $key => $val) : ?>
    <li><?= $key ?></li>
<?php endforeach; ?>
</ul>
