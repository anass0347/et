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
        <h2>Categorie aanmaken</h2>
<form method="post" action="index.php?op=createCategorie">
    <label>categorie code</label>
    <input type="text" name="categoriecode" pattern="{A-Z}" maxlength="4" required autofocus>
    <label>categorie</label>
    <input type="text" name="categorie" required>
    <button>Maak aan</button>
</form>
    </div>
</div>


