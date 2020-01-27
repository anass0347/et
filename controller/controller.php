<?php
require_once 'model/logic.php';
require_once 'model/logic2.php';


class controller{

    public function __construct()
    {
        $this->logic = new logic();
        $this->logictwee = new logictwee();
        //$this->htmlElements = new htmlElements();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }


    public function handleRequest()
    {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
            switch ($op) {
               default:
                    $this->test();
                    break;
                case 'test2':
                    $this->test2();
                    break;
                case 'overzicht':
                    $this->overzicht();
                    break;
                    case 'categorie':
                    $this->categorie();
                    break;
                case 'reservering':
                    $this->reservering();
                    break;
                case 'deleteCategorie':
                $this->deleteCategorie();
                break;
                case 'createCategorieForm':
                    $this->createCategorieForm();
                    break;

                case 'createCategorie':
                    $this->createCategorie();
                    break;
                case 'updateCategorieForm':
                    $this->updateCategorieForm();
                    break;

                case 'updateCategorie':
                    $this->updateCategorie();
                    break;
                case 'subCategorie':
                    $this->subCategorie();
                    break;
                case 'createSubCategorieForm':
                    $this->createSubCategorieForm();
                    break;
                case 'createSubCategorie':
                    $this->createSubCategorie();
                    break;
                case 'deleteSubCategorie':
                    $this->deleteSubCategorie();
                    break;
                case 'updateSubCategorieForm':
                    $this->updateSubCategorieForm();
                    break;
                case 'dranken':
                    $this->dranken();
                    break;
                case 'deleteDranken':
                    $this->deleteDranken();
                    break;
                case 'createDrankenForm':
                    $this->createDrankenForm();
                    break;
                case 'createDranken':
                    $this->createDranken();
                    break;
                case 'updateDranken':
                    $this->updateDranken();
                    break;
                case 'updateDrankenForm':
                    $this->updateDrankenForm();
                    break;
                case 'bestelling':
                    $this->bestelling();
                    break;

                case 'createBestelling':
                    $this->createBestelling();
                    break;
                case 'createReserveringForm':
                    $this->createReserveringForm();
                    break;
                case 'createReservering':
                    $this->createReservering();
                    break;
                case 'kokoverzicht':
                    $this->kokoverzicht();
                    break;
                case 'barmanoverzicht':
                    $this->barmanoverzicht();
                    break;
                case 'barmanKlaar':
                    $this->barmanKlaar();
                    break;
                case 'kokKlaar':
                    $this->kokKlaar();
                    break;


            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }

    }

    public function test(){
        $result = $this->logic->test();
        include 'view/test.php';
    }
    public function test2(){
        //$result = $this->logic->test2();
        include 'view/test2.php';
    }

    public function overzicht(){
        //$result = $this->logic->overzicht();
        include 'view/overzicht.php';
    }

    public function reservering(){
        $result = $this->logic->reservering();
        include 'view/reserveringen.php';
    }

    public function categorie(){
        $result = $this->logic->categorie();
        include 'view/categorie.php';
    }

    public function deleteCategorie(){
        $result = $this->logic->deleteCategorie();
        include 'view/categorie.php';
    }

    public function createCategorie(){
        $result = $this->logic->createCategorie();
        include 'view/categorie.php';
    }

    public function createCategorieForm(){
    //$result = $this->logic->createCategorie();
    include 'view/createCategorieForm.php';
    }

    public function updateCategorieForm(){
        $result = $this->logic->updateCategorieForm();
        include 'view/updateCategorieForm.php';
    }

    public function updateCategorie(){
        $result = $this->logic->updateCategorie();
        include 'view/categorie.php';
    }

    public function subCategorie(){
        $result = $this->logic->subCategorie();
        include 'view/subCategorie.php';
    }

    public function createSubCategorieForm(){
        $result = $this->logic->createSubCategorieForm();
        include 'view/createSubCategorieForm.php';
    }

    public function createSubCategorie(){
        $result = $this->logic->createSubCategorie();
        include 'view/subCategorie.php';
    }

    public function deleteSubCategorie(){
        $result = $this->logic->deleteSubCategorie();
        include 'view/subCategorie.php';
    }
    public function updateSubCategorieForm(){
        $result = $this->logic->updateSubCategorieForm();
        $select = $this->logic->updateSubCategorieFormSELECT();
        include 'view/updateSubCategorieForm.php';
    }

    public function updateSubCategorie(){
        $result = $this->logic->updateSubCategorie();
        include 'view/subCategorie.php';
    }

    public function dranken(){
        $result = $this->logic->dranken();
        include 'view/dranken.php';
    }

    public function deleteDranken(){
        $result = $this->logic->deleteDranken();
        include 'view/dranken.php';
    }

    public function createDrankenForm(){
        $result = $this->logic->createDrankenForm();
        include 'view/createDrankenForm.php';

    }

    public function createDranken(){
        $result = $this->logic->createDranken();
        include 'view/dranken.php';

    }

    public function updateDranken(){
        $result = $this->logic->updateDranken();
        include 'view/dranken.php';

    }
    public function updateDrankenForm(){
        $result = $this->logic->updateDrankenForm();
        $select = $this->logic->updateDrankenFormSELECT();

        include 'view/updateDrankenForm.php';

    }

    public function bestelling(){
        $bestelling = $this->logic->bestelling();
        $kaart = $this->logic->kaart();

        include 'view/bestelling.php';

    }

    public function createBestelling(){
        $bestelling = $this->logic->createBestelling();
        //header('Location: index.php?op=bestelling');
        include 'view/bestelling.php';

    }

    public function createReserveringForm(){
        include 'view/createReserveringForm.php';

    }
    public function createReservering(){
        $result = $this->logic->createReservering();

        include 'view/reserveringen.php';

    }

    public function barmanoverzicht(){
        $result = $this->logictwee->barmanoverzicht();
        include 'view/barmanoverzicht.php';

    }

    public function barmanKlaar(){
        $result = $this->logictwee->barmanKlaar();
        include 'view/barmanoverzicht.php';

    }
    public function kokoverzicht(){
        $result = $this->logictwee->kokoverzicht();
        include 'view/kokoverzicht.php';

    }
    public function kokKlaar(){
        $result = $this->logictwee->kokKlaar();
        include 'view/kokoverzicht.php';

    }














}

?>