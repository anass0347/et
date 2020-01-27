<?php

require_once "datahandler.php";


class logictwee
{


    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "exellent_taste", "root", "");
    }

    public function __destruct()
    {
    }

    public function barmanoverzicht(){
        try{
            $sql = "SELECT bestelID, gerechtCode, TIME(bestel_tijd), afgerond,
             gerechtNaam, tafelNummer
             FROM bestelling
             NATURAL JOIN reservering
             NATURAL JOIN gerechten 
             NATURAL JOIN subcategorie 
             NATURAL JOIN categorie 
             WHERE afgerond = '0' AND 
             categorie = 'dranken'";

            $result = $this->DataHandler->readData($sql);

            $html = "";
            $id = '';

            $html .= "<table>";
            $html .= "<tr>";
            $html .= "<th>bestelID</th>";
            $html .= "<th>Tijdstip</th>";
            $html .= "<th>Afgerond?</th>";

            $html .= "<th>Gerecht naam</th>";
            $html .= "<th>Tafel nummer</th>";
            $html .= "<th>Klaar</th>";
            $html .= "</tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $html .= "<tr>";

                foreach ($row as $key => $value) {
                    if($key == 'bestelID'){
                        $html .= "<td>" . $value . "</td>";
                        $id = $value;


                    }elseif ($key == 'gerechtNaam'){
                        $html .= "<td>" . $value . "</td>";
                    }elseif ($key == 'TIME(bestel_tijd)'){
                        $html .= "<td>" . $value . "</td>";
                    }elseif ($key == 'tafelNummer'){
                        $html .= "<td>" . $value . "</td>";
                        $html .= "<td><a class='btn btn-success' href='index.php?op=barmanKlaar&bestelID=$id'>Klaar</a></td>";
                    }elseif ($key == 'afgerond'){
                        if($value == "0"){
                            $value = 'nee';
                        }else{
                            $value = "ja";
                        }
                        $html .= "<td>" . $value . "</td>";
                    }


                }
                $html .= "</tr>";

            }


            $html .= "</table>";

            return $html;
        }catch(Exception $e){
            throw $e;
        }
    }

    public function barmanKlaar(){
        $bestelID = $_GET['bestelID'];
        var_dump($bestelID);

        $sql = "UPDATE `bestelling` 
        SET `afgerond` = '1' 
        WHERE `bestelID` = $bestelID";


        $result = $this->DataHandler->readData($sql);
        //header('Location: http://prephardwineasy.com/documentatie/');

        var_dump($sql);
    }


    public function kokoverzicht(){
        try{
            $sql = "SELECT gerechtCode, TIME(bestel_tijd), afgerond,
             gerechtNaam, tafelNummer, bestelID
             FROM bestelling
             NATURAL JOIN reservering
             NATURAL JOIN gerechten 
             NATURAL JOIN subcategorie 
             NATURAL JOIN categorie 
             WHERE afgerond = 0 AND 
             NOT categorie = 'dranken'";

            $result = $this->DataHandler->readData($sql);

            $html = "";
            $id = "";
            $html .= "<table>";
            $html .= "<tr>";
            $html .= "<th>Gerecht naam</th>";
            $html .= "<th>Tijdstip</th>";
            $html .= "<th>Tafel nummer</th>";
            $html .= "<th>Klaar</th>";
            $html .= "</tr>";
            $html .= "<tr>";

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                foreach($row as $key => $value){

                    if($key == 'bestelID'){
                        $id = $value;
                    }elseif ($key == 'gerechtNaam'){
                        $html .= "<td>" . $value . "</td>";
                    }elseif ($key == 'TIME(bestel_tijd)'){
                        $html .= "<td>" . $value . "</td>";
                    }elseif ($key == 'tafelNummer'){
                        $html .= "<td>" . $value . "</td>";
                        $html .= "<td><a class='btn btn-success' href='index.php?op=barmanKlaar&bestelID=$id'>Klaar</a></td>";
                    }


                }
                $html .= "</tr>";

            }

            $html .= "</table>";

            return $html;
        }catch(Exception $e){
            throw $e;
        }
    }
    public function kokKlaar(){
        $bestelID = $_GET['bestelID'];
        var_dump($bestelID);

        $sql = "UPDATE `bestelling` 
        SET `afgerond` = '1' 
        WHERE `bestelID` = $bestelID";


        $result = $this->DataHandler->bestellingKlaar($sql);

        var_dump($sql);
    }
}

?>