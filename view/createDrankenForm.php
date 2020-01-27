<?php
/**
 * Created by PhpStorm.
 * User: anass
 * Date: 17-1-2020
 * Time: 10:26
 */
include 'header.php';
?>
<div class="container">
    <div class="row">
        <h2>Drank aanmaken</h2>
        <form method="post" action="index.php?op=createDranken">
            <label>Naam</label>
            <input type="text" name="naam">
            <label>Prijs</label>
            <input type="text" name="prijs">
            <label>Categorie</label>
            <select name="subCategorie">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=" . $row['subCategorieCode'] . ">" . $row['subCategorie'] . "</option>";
                } ?>
            </select>
            <button>Maak aan</button>
        </form>
    </div>
</div>


