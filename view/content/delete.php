<?php
$adminUrl = $app->url->create("content/admin");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form method="post">
    <fieldset>
    <legend>Delete</legend>

    <input type="hidden" name="contentId" value="<?= $app->filter->esc($content->id) ?>"/>

    <p>
        <label>Title:<br>
            <input type="text" name="contentTitle" value="<?= $app->filter->esc($content->title) ?>" readonly/>
        </label>
    </p>

    <p>
        <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>
