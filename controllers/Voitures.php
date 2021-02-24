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
        // appel de la méthode getAll() de l'abstractController
        $voitureList = $voiture->getAll();
        // envoie des données vers la vue
        $this->render('index', ['voitures' => $voitureList]);
    }

    /**
     * affichage du détail d'une voiture selon son id
     * @param $id
     */
    public function getOneCar($id)
    {
        $car = $this->loadModel('Voiture');
        $oneCar = $car->getOne($id);
        $this->render('getOneCar', ['voiture' => $oneCar]);
    }
}