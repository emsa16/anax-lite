<?php
$urlCSS = $app->url->asset("css/style.css");
$profileUrl = $app->url->create("profile");

$loggedIn = $app->session->has("name")
    ? "Inloggad som:<br /><a title='Visa profil' href='$profileUrl'>".$app->session->get('name')."</a> (<a href='".$app->url->create('logout')."'>Logga ut</a>)"
    : "<a href='".$app->url->create('login')."'>Logga in</a>";

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
        <div class="user"><?= $loggedIn ?></div>
        <div class="site-title">Me-sidan</div>
        <div class="site-slogan">Att lära sig objektorienterad PHP</div>
