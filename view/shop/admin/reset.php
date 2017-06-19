<?php
$adminUrl = $app->url->create("shop/admin");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form method="post">
    <input type="submit" name="reset" value="Reset database">
    <?= $output ?>
</form>
