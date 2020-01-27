<?php
/**
 * Created by PhpStorm.
 * User: anass
 * Date: 17-1-2020
 * Time: 10:26
 */
include 'header.php';

var_dump($result);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
<div class="container">
    <div class="row">
        <h2>Wijzig Drank</h2>

        <form method="post" action="index.php?op=updateDranken&id=<?php echo $row['gerechtCode']?>">
            <label>Naam</label>
            <input type="text" name="naam" value="<?php echo $row['gerechtNaam']?>">
            <label>Prijs</label>
            <input type="text" name="prijs" value="<?php echo $row['gerechtPrijs']?>">
            <label>Categorie</label>
            <select name="subCategorie">
                <?php while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=" . $row['subCategorieCode'] . ">" . $row['subCategorie']. ">" .$row['categorie']. "</option>";
                } ?>
            </select>
            <button>Maak aan</button>
        </form>
    </div>
</div>


<?php
}

?>
