<?php
$adminUrl  = $app->url->create("admin");
$actionUrl = $app->url->create("admin/handle_new_user");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form action="<?= $actionUrl ?>" method="POST">
    <table>
        <legend><h3>Registrera ny användare</h3></legend>
        <tr>
            <td>Fyll i användarnamn</td><td><input type="text" name="new_name"></td>
        </tr>
        <tr>
            <td>Fyll i lösenord</td><td><input type="text" name="new_pass"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitCreateForm" value="Registrera"></td>
        </tr>
    </table>
</form>
