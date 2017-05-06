<?php
$actionUrl = $app->url->create("validate");
$registerUrl = $app->url->create("register");
?>
<form action="<?= $actionUrl ?>" method="POST">
    <table>
        <legend><h3>Logga in</h3></legend>
        <tr>
            <td>Användarnamn</td><td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Lösenord</td><td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitForm" value="Logga in"></td>
        </tr>
    </table>
</form>
<p><a href="<?= $registerUrl ?>">Registrera ny användare</a></p>
