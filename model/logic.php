<?php

require_once "datahandler.php";

class logic
{

    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "exellent_taste", "root", "");
    }

    public function __destruct()
    {
    }

    public function test(){

        $html = "clean mvc";


        $result = $html;
        return $result;
    }

    public function categorie(){

        try{
            $sql ="SELECT * FROM categorie";

            $result = $this->DataHandler->readData($sql);

            $html = "";
            $html .= "<table>";
            $html .= "<th>Code</th>";
            $html .= "<th>Categorie</th>";
            $html .= "<th >Acties</th>";


            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                foreach ($row as $key => $value) {
                    if ($key == "categorieCode") {
                        $html .= "<tr>";

                        $html .= "<td>". $value . "</td>";
                        $id = $value;
                    } elseif ($key == "categorie") {
                        $html .= "<td>". $value . "</td>";
                        $html .= "<td><a href='index.php?op=deleteCategorie&id=$id'>delete</a> </td>";
                        $html .= "<td><a href='index.php?op=updateCategorieForm&id=$id'>wijzig</a> </td>";
                        $html .= "<tr>";


                    }

                }
                //$html .= "</tr>";


            }

            $html .= "</table>";
            $result = $html;
            return $result;

        }catch(Exception $e){
            throw $e;
        }

    }

    public function deleteCategorie(){
        $id = $_GET['id'];
        //var_dump($id);
        $sql = "DELETE FROM `categorie` WHERE categorieCode = '$id'";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);



    }

    public function createCategorie(){
        $code = $_POST['categoriecode'];
        $categorie = $_POST['categorie'];

        $sql = "INSERT INTO `categorie`(`categorieCode`, `categorie`) VALUES ('$code','$categorie')";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);

    }

    public function updateCategorie(){
        $code = $_POST['categoriecode'];
        $categorie = $_POST['categorie'];

        $sql = "UPDATE `categorie` SET `categorieCode`='$code',`categorie`='$categorie' WHERE categorieCode = '$code'";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);

    }

    public function updateCategorieForm(){
        $id = $_GET['id'];

        $sql = "SELECT * FROM categorie WHERE categorieCode = '$id'";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);

        return $result;

    }

    public function subCategorie(){

        try{
            $sql ="SELECT `subCategorieCode`, `subCategorie`, `categorie` FROM `subcategorie` NATURAL JOIN categorie
";

            $result = $this->DataHandler->readData($sql);

            $html = "";
            $html .= "<table>";
            $html .= "<th>Code</th>";
            $html .= "<th>SubCategorie</th>";
            $html .= "<th >Valt onder</th>";
            $html .= "<th >Acties</th>";


            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                foreach ($row as $key => $value) {
                    if ($key == "subCategorieCode") {
                        $html .= "<tr>";
                        $html .= "<td>". $value . "</td>";
                        $id = $value;
                    } elseif ($key == "subCategorie") {
                        $html .= "<td>". $value . "</td>";
                    }elseif($key == "categorie"){
                        $html .= "<td>$value</td>";
                        $html .= "<td><a href='index.php?op=deleteSubCategorie&id=$id'>delete</a> </td>";
                        $html .= "<td><a onclick='return confirm(Delete???);' href='index.php?op=updateSubCategorieForm&id=$id'>wijzig</a> </td>";
                        $html .= "<tr>";
                    }

                }
                //$html .= "</tr>";


            }

            $html .= "</table>";
            $result = $html;
            return $result;

        }catch(Exception $e){
            throw $e;
        }

    }

    public function createSubCategorie(){
        $subcode = $_POST['subcategoriecode'];
        $subcategorie = $_POST['subcategorie'];
        $hoofd = $_POST['categorieCode'];
        var_dump($_REQUEST);

        $sql = "INSERT INTO `subcategorie`(`subCategorieCode`, `subCategorie`, `categorieCode`) VALUES ('$subcode','$subcategorie', '$hoofd')";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);

    }
    public function createSubCategorieForm(){

        $sql = "SELECT categorie, categorieCode from categorie ";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);
        return $result;

    }

    public function deleteSubCategorie(){
        $id = $_GET['id'];
        //var_dump($id);
        $sql = "DELETE FROM `subCategorie` WHERE subCategorieCode = '$id'";
        var_dump($sql);
        $result = $this->DataHandler->readData($sql);



    }

    public function updateSubCategorieForm(){
        $id = $_GET['id'];

        $sql = "SELECT subCategorieCode, subCategorie, categorieCode, categorie FROM subCategorie
 NATURAL JOIN categorie WHERE subCategorieCode = '$id'";

        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);

        return $result;

    }

    public function updateSubCategorieFormSELECT(){
        $id = $_GET['id'];

        $sql = "SELECT categorieCode, categorie FROM categorie";
        //var_dump($sql);
        $select = $this->DataHandler->readData($sql);

        return $select;

    }

    public function updateSubCategorie(){
        $subCode = $_POST['subCategoriecode'];
        $subCategorie = $_POST['subCategorie'];
        $categorie = $_POST['categorieCode'];
        var_dump($subCode);
        var_dump($subCategorie);
        var_dump($categorie);

        $sql = "UPDATE `subcategorie` SET `subCategorieCode`='$subCode',`subCategorie`='$subCategorie',`categorieCode`='$categorie' WHERE `subCategorieCode` = $subCode";
        var_dump($sql);
        $result = $this->DataHandler->readData($sql);

    }

    public function dranken(){
        $sql = "SELECT gerechtCode, gerechtNaam, gerechtPrijs, subcategorie, categorie FROM gerechten natural join categorie natural join subcategorie WHERE categorie = 'dranken'";
        $result = $this->DataHandler->readData($sql);


        $html = "";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<th>Code</th>";
        $html .= "<th>Naam</th>";
        $html .= "<th >Prijs</th>";
        $html .= "<th >Categorie</th>";
        $html .= "<th >Acties</th>";
        $html .= "</tr>";


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>";

            foreach ($row as $key => $value) {
                if ($key == "gerechtCode") {
                    $html .= "<td>". $value . "</td>";
                    $id = $value;
                } elseif ($key == "gerechtNaam") {
                    $html .= "<td>". $value . "</td>";
                } elseif ($key == "gerechtPrijs") {
                    $html .= "<td>". $value . "</td>";
                }elseif($key == "subcategorie"){
                    $html .= "<td>$value</td>";
                    $html .= "<td><a href='index.php?op=deleteDranken&id=$id'>delete</a> </td>";
                    $html .= "<td><a href='index.php?op=updateDrankenForm&id=$id'>wijzig</a> </td>";
                }

            }
            $html .= "</tr>";

            //$html .= "</tr>";


        }

        $html .= "</table>";
        $result = $html;
        return $result;




}

    public function deleteDranken(){
        $id = $_GET['id'];
        //var_dump($id);
        $sql = "DELETE FROM `gerechten` WHERE gerechtCode = '$id'";
        var_dump($sql);
        $result = $this->DataHandler->readData($sql);



    }

    public function createDrankenForm(){

        $sql = "SELECT gerechtCode, gerechtNaam, gerechtPrijs, subCategorieCode, subCategorie from gerechten NATURAL JOIN subcategorie ";
        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);
        return $result;

    }

    public function createDranken(){
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $sub = $_POST['subCategorie'];
    //var_dump($_REQUEST);

    $sql = "INSERT INTO `gerechten`(`gerechtCode`, `gerechtNaam`, `gerechtPrijs`, `subCategorieCode`) VALUES ('','$naam','$prijs','$sub')";
    var_dump($sql);
    $result = $this->DataHandler->readData($sql);

}

    public function updateDrankenForm(){
        $id = $_GET['id'];

        $sql = "SELECT gerechtCode, gerechtNaam, gerechtPrijs, subCategorieCode, subCategorie FROM gerechten
 NATURAL JOIN subcategorie WHERE gerechtCode = '$id'";

        //var_dump($sql);
        $result = $this->DataHandler->readData($sql);

        return $result;

    }

    public function updateDrankenFormSELECT(){
        $id = $_GET['id'];

        $sql = "SELECT subCategorieCode, subCategorie, categorie FROM subCategorie
        NATURAL JOIN categorie";
        //var_dump($sql);
        $select = $this->DataHandler->readData($sql);

        return $select;

    }

    public function updateDranken(){
        $id = $_GET['id'];

        $naam = $_POST['naam'];
        $prijs= $_POST['prijs'];
        $subCategorie = $_POST['subCategorie'];
        var_dump($naam);
        var_dump($prijs);
        var_dump($subCategorie);

        $sql = "UPDATE `gerechten` 
        SET `gerechtCode`='',`gerechtNaam`='$naam',`gerechtPrijs`='$prijs',`subCategorieCode`='$subCategorie' 
        WHERE gerechtCode = '$id'";
        var_dump($sql);
        $result = $this->DataHandler->readData($sql);

    }

    public function kaart(){
        $reserveringID = $_GET['id'];
        //var_dump($reserveringID);
        //$sql = "SELECT gerechtNaam, gerechtPrijs, subCategorie FROM gerechten NATURAL JOIN subcategorie";
        $sql = "SELECT categorieCode, categorie FROM categorie";

        $categorie = $this->DataHandler->readsData($sql);



        $html = "";

        $html .= "<table>";

        while ($row = $categorie->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                if ($key == "categorie") {
                    $html .= "<tr><th colspan='5'><b>$value</b></th></tr>";
                } elseif ($key == "categorieCode") {
                    $subitemsql = "SELECT subCategorie, subCategorieCode FROM subcategorie WHERE categorieCode = '$value'";
                    $subitems = $this->DataHandler->readsData($subitemsql);
                    while ($subitemrow = $subitems->fetch(PDO::FETCH_ASSOC)) {
                        foreach ($subitemrow as $key => $value) {
                            if ($key == "subCategorie") {
                                $html .= "<tr><td></td><td colspan='4'><b>$value</b></td></tr>";
                            } elseif ($key == "subCategorieCode") {
                                $itemsql = "SELECT gerechtCode, subCategorieCode, gerechtNaam, gerechtPrijs FROM gerechten WHERE subCategorieCode = '$value'";
                                $items = $this->DataHandler->readsData($itemsql);
                                while ($itemrow = $items->fetch(PDO::FETCH_ASSOC)) {
                                    $item = $itemrow['gerechtNaam'];
                                    $prijs = $itemrow['gerechtPrijs'];
                                    $itemID = $itemrow['gerechtCode'];

                                    $html .= "<tr><td></td><td></td><td>$item</td><td>$prijs</td>";
                                    $html .= "<td><form action='index.php?op=createBestelling&id=$reserveringID' method='POST'>";
                                    $html .= "<input type='hidden' value=$itemID name='gerechtCode'>";
                                    $html .= "<button>+</button>";
                                    $html .= "</form></td>";
                                    $html .= "</tr>";
                                }
                            }
                        }
                    }
                }
            }
        }
        $html .= "</table>";
        return $html;

    }

    public function bestelling(){
        $id= $_GET['id'];
        //var_dump($id);

        $sql = "SELECT gerechtCode, gerechtNaam, COUNT(gerechtNaam) ,gerechtPrijs ,bestelID 
        FROM bestelling 
        NATURAL JOIN gerechten 
        NATURAL JOIN reservering 
        WHERE reserveringID =$id 
        GROUP BY gerechtNaam 
        
";
        $result = $this->DataHandler->readsData($sql);

        $prijs = "";
        $html = "";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<th>Naam</th>";
        $html .= "<th >Aantal</th>";
        $html .= "<th >Prijs</th>";
        $html .= "</tr>";


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>";

            foreach ($row as $key => $value) {
                if ($key == "gerechtNaam") {
                    $html .= "<td>". $value . "</td>";
                    $id = $value;
                } elseif ($key == "gerechtPrijs") {
                    $html .= "<td>". $value . "</td>";
                    $prijs += $value;
                }elseif ($key == "COUNT(gerechtNaam)") {
                    $html .= "<td>". $value . "</td>";
                }

            }
            $html .= "</tr>";

            //$html .= "</tr>";


        }

        $html .= "</table>";
        $subtotaal = $prijs;
        $prijs = $subtotaal *
        $html .= "<h3>Totaal: €  $prijs  </h3>";
        $result = $html;
        return $result;






    }

    public function createBestelling(){
        echo $_POST['gerechtCode'];
        echo $_POST['id'];
        $tijd = date("Y/m/d h:i:s");
        var_dump($tijd);


        $gerechtCode = $_POST['gerechtCode'];
        $reserveringID = $_GET['id'];

        var_dump($gerechtCode);
        var_dump($reserveringID);

        $sql = "INSERT INTO `bestelling`(`bestelID`, `gerechtCode`, `reserveringID`, `bestel_tijd`, `afgerond`) 
        VALUES ('','$gerechtCode','$reserveringID','$tijd','0')";

        $result = $this->DataHandler->readsData($sql);
        header('Location: index.php?op=bestelling&id=' . $reserveringID);


        //var_dump($sql);


    }

    public function reservering(){
        $sql = "SELECT * FROM reservering";

        $result = $this->DataHandler->readsData($sql);

        $html = "";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<th>reserveringCode</th>";
        $html .= "<th >tafelnr</th>";
        $html .= "<th >datum</th>";
        $html .= "<th >tijd</th>";
        $html .= "<th >voornaam</th>";
        $html .= "<th >achternaam</th>";
        $html .= "<th >telefoonnummer</th>";
        $html .= "<th >email</th>";
        $html .= "<th >Bestellen</th>";
        $html .= "</tr>";


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>";

            foreach ($row as $key => $value) {
                if ($key == "reserveringID") {
                    $html .= "<td>". $value . "</td>";
                    $id = $value;
                } elseif ($key == "tafelNummer") {
                    $html .= "<td>". $value . "</td>";
                } elseif ($key == "datum") {
                    $html .= "<td>". $value . "</td>";
                }elseif($key == "tijd"){
                    $html .= "<td>$value</td>";
                }elseif($key == "voornaam"){
                    $html .= "<td>$value</td>";
                }elseif($key == "achternaam"){
                    $html .= "<td>$value</td>";
                }elseif($key == "telefoonnummer"){
                    $html .= "<td>$value</td>";
                }elseif($key == "email"){
                    $html .= "<td>$value</td>";
                    $html .="<td><a class='btn btn-success' href='index.php?op=bestelling&id=$id'>Maak bestelling aan</a></td>";

                }

            }
            $html .= "</tr>";

            //$html .= "</tr>";


        }

        $html .= "</table>";
        $result = $html;
        return $result;


    }

    public function createReserveringForm(){

    }

    public function createReservering(){
        try{
            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $datum = $_POST['datum'];
            $tafelnr = $_POST['tafelnummer'];
            $tijd = $_POST['tijd'];
            $email = $_POST['email'];
            $tel = $_POST['telefoonnummer'];
            //var_dump($_REQUEST);
            $sql = "INSERT INTO `reservering`(`reserveringCode`, `tafelNummer`, `datum`, `tijd`, `voornaam`, `achternaam`, `telefoonnummer`, `email`) 
        VALUES ( '', '$tafelnr','$datum','$tijd','$voornaam','$achternaam','$tel','$email')";

            /*$sql = "INSERT INTO `reservering`(`reserveringCode`, `tafelNummer`, `datum`, `tijd`, `voornaam`, `achternaam`, `telefoonnummer`, `email`)
            VALUES ('',[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";*/
            //var_dump($sql);
            $result = $this->DataHandler->readsData($sql);

        }catch(Exception $e){
            //throw $e;
            $result = "Deze datum en tafel is al bezet!!";
            $result .= "<a class='btn btn-success' href='index.php?op=createReserveringForm'>Ga terug</a>";

            return $result;

        }


    }








}

?>

<?php /* $sql = "SELECT Continent FROM continent";

$result = $this->DataHandler->readData($sql);
while ($result = $result->fetch(PDO::FETCH_ASSOC)) {


foreach ($result as $key => $value) {

if ($key == "Continent") {

$result = $value;


} else {
echo "Geen continenten";
}

}

print $result;

}

//$result = $continent;*/
?>