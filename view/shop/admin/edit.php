<?php
$adminUrl = $app->url->create("shop/admin");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form method="post">
    <fieldset>
    <legend>Edit</legend>
    <input type="hidden" name="productId" value="<?= $app->filter->esc($product->ProductNumber) ?>"/>

    <p>
        <label>Description:<br>
        <input type="text" name="productTitle" value="<?= $app->filter->esc($product->Description) ?>" required/>
        </label>
    </p>

    <p>
        <label>Image link:<br>
        <input type="text" name="productImage" value="<?= $app->filter->esc($product->ImageLink) ?>"/>
    </p>

    <p>
        <label>Price:<br>
        <input type="number" min=0 step="0.01" name="productPrice" value="<?= $app->filter->esc($product->Price) ?>"/>
    </p>

    <p>
        <label>Category:<br>
        <select name="productCategory">
            <?php foreach ($categories as $cat) : ?>
                <?php $selected = $cat->category === $product->Category ? "selected" : "" ; ?>
                <option <?= $selected ?> value="<?= $app->filter->esc($cat->id) ?>"><?= $app->filter->esc($cat->category) ?></option>
            <?php endforeach; ?>
        </select>
     </p>

     <p>
         <label>Amount in inventory:<br>
         <input type="number" min=0 name="productInventory" value="<?= $app->filter->esc($product->Inventory) ?>"/>
     </p>

    <p>
        <button type="submit" name="doSave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
        <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>
