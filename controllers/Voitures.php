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
                'brand' => '/^[\w\s]$/'
            ];
            // appel de la méthode valideForm de l'abstractController permettant la validation du formulaire et la génération d'éventuels message d'erreur, stockage du retour
            // dans une variable
            $formError = $this->validForm($regex, $_POST);
            // s'il n'y a pas d'erreur
            if (count($formError) === 0) {
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

}