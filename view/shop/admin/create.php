<?php
$adminUrl = $app->url->create("shop/admin");
?>
<p><a href="<?= $adminUrl ?>">Tillbaka</a></p>
<form method="post">
    <fieldset>
    <legend>Create</legend>

    <p>
        <label>Produkt:<br>
        <input type="text" name="productTitle" placeholder="Skriv in produkten här" required/>
        </label>
    </p>

    <p>
        <label>Bildlänk:<br>
        <input type="text" name="productImage" placeholder="Skriv in sökväg till bild här"/>
        </label>
    </p>

    <p>
        <label>Pris:<br>
        <input type="number" min=0 step="0.01" name="productPrice" value="10.00"/>
        </label>
    </p>

    <p>
        <label>Kategori:<br>
        <select name="productCategory">
            <?php foreach ($categories as $cat) : ?>
                <option value="<?= $app->filter->esc($cat->id) ?>"><?= $app->filter->esc($cat->category) ?></option>
            <?php endforeach; ?>
        </select>
        </label>
    </p>

    <p>
        <label>Mängd i lager:<br>
        <input type="number" min=0 name="productInventory" value="0" required/>
        </label>
    </p>

    <p>
        <button type="submit" name="doCreate"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
    </p>
    </fieldset>
</form>
