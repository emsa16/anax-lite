<?php
$actionUrl = $app->url->create("handle_new_user");
$loginUrl = $app->url->create("login");
?>
<form action="<?= $actionUrl ?>" method="POST">
    <table>
        <legend><h3>Registrera ny användare</h3></legend>
        <tr>
            <td>Fyll i användarnamn</td><td><input type="text" name="new_name"></td>
        </tr>
        <tr>
            <td>Välj lösenord</td><td><input type="password" name="new_pass"></td>
        </tr>
        <tr>
            <td>Repetera lösenord</td><td><input type="password" name="re_pass"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitCreateForm" value="Registrera"></td>
        </tr>
    </table>
</form>
<p><a href='<?= $loginUrl ?>'>Tillbaka till inloggning</a></p>
