<?php
$adminUrl = $app->url->create("content/admin");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form method="post">
    <fieldset>
    <legend>Edit</legend>
    <input type="hidden" name="contentId" value="<?= $app->filter->esc($content->id) ?>"/>

    <p>
        <label>Title:<br>
        <input type="text" name="contentTitle" value="<?= $app->filter->esc($content->title) ?>"/>
        </label>
    </p>

    <p>
        <label>Path:<br>
        <input type="text" name="contentPath" value="<?= $app->filter->esc($content->path) ?>"/>
    </p>

    <p>
        <label>Slug:<br>
        <input type="text" name="contentSlug" value="<?= $app->filter->esc($content->slug) ?>"/>
    </p>

    <p>
        <label>Text:<br>
        <textarea name="contentData"><?= $app->filter->esc($content->data) ?></textarea>
     </p>

     <p>
         <label>Type:<br>
         <input type="text" name="contentType" value="<?= $app->filter->esc($content->type) ?>"/>
     </p>

     <p>
         <label>Filter:<br>
         <input type="text" name="contentFilter" value="<?= $app->filter->esc($content->filter) ?>"/>
     </p>

     <p>
         <label>Publish:<br>
         <input type="datetime" name="contentPublish" value="<?= $app->filter->esc($content->published) ?>"/>
     </p>

    <p>
        <button type="submit" name="doSave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
        <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>
