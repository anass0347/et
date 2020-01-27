<?php
/**
 * Created by PhpStorm.
 * User: anass
 * Date: 17-1-2020
 * Time: 10:26
 */
include 'header.php';

    //var_dump($result);

?>

<div class="container">
    <div class="row">
        <h2>Subcategorie aanmaken</h2>
<form method="post" action="index.php?op=createSubCategorie">
    <label>categorie code</label>
    <input type="text" name="subcategoriecode">
    <label>categorie</label>
    <input type="text" name="subcategorie">
    <label>Valt onder</label>
    <select name="categorieCode">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $row['categorieCode'] . ">" . $row['categorie'] . "</option>";
        } ?>
    </select>
    <button>Maak aan</button>
</form>
    </div>
</div>
