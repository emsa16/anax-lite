<?php
$actionUrl = $app->url->create("admin/handle_update");
?>
<form action="<?= $actionUrl ?>" method="post">
    <fieldset>
    <legend>Uppdatera</legend>
    <input type="hidden" name="name" value="<?= $user->name ?>"/>

    <p>
        <label>Användarnamn<br>
        <input type="text" name="new_name" value="<?= $user->name ?>"/>
        </label>
    </p>

    <p>
        <label>Ange lösenord (ange endast om du vill byta lösenord)<br>
        <input type="text" name="new_pass" value=""/>
    </p>

    <p>
        <input type="submit" name="doSave" value="Uppdatera">
    </p>
    </fieldset>
</form>
