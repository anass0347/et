<?php
include 'header.php';
var_dump($result);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


    ?>
    <div class="container">
        <div class="row">
            <h2>Wijzig categorie</h2>
            <form method="post" action="index.php?op=updateCategorie">
                <label>categorie code</label>
                <input type="text" name="categoriecode" value="<?php echo $row['categorieCode'] ?>">
                <label>categorie</label>
                <input type="text" name="categorie" value="<?php echo $row['categorie'] ?>">
                <button>Wijzig</button>
            </form>
        </div>
    </div>
    <?php
}

?>

