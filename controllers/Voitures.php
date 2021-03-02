<?php

/**
 * Class Voitures
 */
class Voitures extends AbstractController
{
    /**
     * affichage de la liste des voitures
     */
    public function index()
    {
        // accès à la méthode loadModel() de abstractController, qui permet de charger le model voulu
        $voiture = $this->loadModel('Voiture');
        // appel de la méthode getCarsInformations()
        $voitureList = $voiture->getCarsInformations();
        // envoie des données vers la vue
        $this->render('index', ['voitures' => $voitureList]);
    }

    /**
     * affichage du détail d'une voiture selon son id
     * validation du formulaire
     * @param $id
     */
    public function updateCar($id)
    {
        // définition variable de confirmation et tableau d'erreur
        $formError = [];
        $success = '';
        // chargement des models
        $car = $this->loadModel('Voiture');
        $brand = $this->loadModel('Marque');
        //appel des méthodes permettant l'affichage des différentes données
        $allBrand = $brand->getAll();
        $oneCar = $car->getOneCarById($id);
        // si le formulaire est validé
        if (isset($_POST['update'])) {
            // définition d'un tableau associatif contenant les regex
            $regex = [
                'model' => '/^[\w\s]+$/',
                'price' => '/^[\d]+$/',
                'brand' => '/^[\w]+$/'
            ];
            // appel de la méthode valideForm de l'abstractController permettant la validation du formulaire et la génération d'éventuels message d'erreur, stockage du retour
            // dans une variable
            $formError = $this->validForm($regex, $_POST);
            // s'il n'y a pas d'erreur
            if (count($formError) === 0) {
                // accès aux accesseur
                $car->setVoitPrix($_POST['price']);
                $car->setVoitModel($_POST['model']);
                $car->setMarque($_POST['brand']);
                $car->updateCar($id);
                $success = 'Update success !!!';
            }
        }
        // appel de la fonction render de l'abstractController permettant l'affichage d'une vue
        $this->render('updateCar', [
            'voiture' => $oneCar,
            'marques' => $allBrand,
            'error' => $formError,
            'success' => $success
        ]);
    }

    public function addCar()
    {
        // définition variable de confirmation et tableau d'erreur
        $formError = [];
        $success = '';
        // chargement des models
        $car = $this->loadModel('Voiture');
        $brand = $this->loadModel('Marque');
        $allBrand = $brand->getAll();

        if (isset($_POST['add'])) {
            // définition d'un tableau associatif contenant les regex
            $regex = [
                'model' => '/^[\w\s]+$/',
                'price' => '/^[\d]+$/',
                'brand' => '/^[\w]+$/'
            ];
            // appel de la méthode valideForm de l'abstractController permettant la validation du formulaire et la génération d'éventuels message d'erreur, stockage du retour
            // dans une variable
            $formError = $this->validForm($regex, $_POST);
            // s'il n'y a pas d'erreur
            if (count($formError) === 0) {
                $car->setVoitPrix($_POST['price']);
                $car->setVoitModel($_POST['model']);
                $car->setMarque($_POST['brand']);
                $car->addCar();
                $success = 'Add success !!!';
            }
        }
        $this->render('addCar', [
            'marques' => $allBrand,
            'error' => $formError,
            'success' => $success
        ]);
    }

    public function delCar($id)
    {
        $success = '';
        $error = '';
        // accès à la méthode loadModel() de abstractController, qui permet de charger le model voulu
        $car = $this->loadModel('Voiture');
        if ($car->delCar($id)) {
            $success = 'Voiture supprimée avec succès';
        } else {
            $error = 'Erreur lors de la suppression';
        }
        // appel de la méthode getCarsInformations()
        $carsList = $car->getCarsInformations();
        // envoie des données vers la vue
        $this->render('index', [
            'voitures' => $carsList,
            'success' => $success,
            'error' => $error
        ]);
    }

    /**
     * méthode permettant de voir si un véhicule est présent dans la base, fonction avec ajax (cf script.js)
     * @param $model
     */
    public function getCarByModel($model) {
        // chragement du model
        $car = $this->loadModel('Voiture');
        // appel de la méthode
        $carModel = $car->getCarByModel($model);
        // s'il y au moins un résultat dans la base
        if ($carModel->count >= 1) {
            // affichage d'un message
            echo 'Ce modèle est déjà existant dans la base';
        } else {
            echo 'Véhicule non existant';
        }
    }
}