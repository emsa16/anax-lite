<?php
$adminUrl = $app->url->create("shop/admin");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form method="post">
    <fieldset>
    <legend>Delete</legend>

    <input type="hidden" name="productId" value="<?= $app->filter->esc($product->ProductNumber) ?>"/>

    <p>
        <label>Title:<br>
            <input type="text" name="productTitle" value="<?= $app->filter->esc($product->Description) ?>" readonly/>
        </label>
    </p>

    <p>
        <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>

<p>
    <b>VARNING!</b> Om du tar bort en produkt ur databasen kommer den även att tas bort från alla ordrar som gjorts, vilket kan vara en oönskad konsekvens.
</p>
