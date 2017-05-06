<?php
$changepassUrl = $app->url->create("change_password");
$profileUrl = $app->url->create("profile");
?>

<!doctype html>
<head>
    <meta charet="utf-8">
    <title>Change password</title>
</head>
<body>
    <form action="<?= $changepassUrl ?>" method="POST">
        <table>
            <legend><h3><?=$status?></h3></legend>
            <tr>
                <td>Gammalt lösenord</td><td><input type="password" name="old_pass"></td>
            </tr>
            <tr>
                <td>Nytt lösenord</td><td><input type="password" name="new_pass"></td>
            </tr>
            <tr>
                <td>Repetera nytt lösenord</td><td><input type="password" name="re_pass"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submitForm" value="Byt lösenord"></td>
            </tr>
        </table>
    </form>
    <p><a href='<?= $profileUrl ?>'>Tillbaka till profilen</a></p>

</body>
</html>
