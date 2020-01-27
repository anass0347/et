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
        <form method="post" action="index.php?op=createReservering">
            <label>voornaam</label>
            <input type="text" name="voornaam" required>
            <label>achternaam</label>
            <input type="text" name="achternaam">
            <label>Datum:</label>
            <input type="date" name="datum" required>
            <label>Tijd:</label>
            <input type="time" name="tijd" required>
            <label>Tafelnummer:</label>
            <input type="text" name="tafelnummer" pattern="{3}" required>
            <label>Email: </label>
            <input type="text" name="email">
            <label>Telefoonnummer: </label>
            <input type="text" name="telefoonnummer" required>
            <button>Maak aan</button>
        </form>
    </div>
</div>


