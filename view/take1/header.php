<?php
$urlCSS = $app->url->asset("css/style.css");
?>

<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title><?= $title ?> | oophp</title>
    <link rel="stylesheet" href="<?= $urlCSS ?>">
</head>
<body>
    <header>
        <div class="site-title">Me-sidan</div>
        <div class="site-slogan">Att lära sig objektorienterad PHP</div>
