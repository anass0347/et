<?php
include 'header.php';
//var_dump($result);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$categorieCode = $row['categorieCode'];
//echo $categorieCode;

    ?>
    <div class="container">
        <div class="row">
            <h2>Wijzig subcategorie</h2>

            <form method="post" action="index.php?op=updateSubCategorie">
                <label>categorie code</label>
                <input type="text" name="subCategorieCode" value="<?php echo $row['subCategorieCode'] ?>">
                <label>categorie</label>
                <input type="text" name="subCategorie" value="<?php echo $row['subCategorie'] ?>">
                <label>Hoort onder</label>
                <select name="categorieCode">
                    <?php while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option>". $row['categorie'] ."</option>";
                    } ?>
                </select>
                <button>Wijzig</button>
            </form>
        </div>
    </div>
    <?php
}

?>

