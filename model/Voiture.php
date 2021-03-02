<?php

class Voiture extends VoituresEntity
{
//    public string $id = '';
//
//    public string $voit_prix = '';
//
//    public string $voit_model = '';
//
//    public string $marque_id = '';

    public function __construct()
    {
        $this->table = 'voiture';
        $this->getConnection();
    }

    /**
     * récupération de toutes les données des voiture
     * @return array
     */
    public function getCarsInformations(): array
    {
        $query = 'SELECT ' . $this->table . '.`id`, `voit_prix`, `voit_model`, `marque_nom` FROM ' . $this->table . ' INNER JOIN `marque` ON ' . $this->table . '.`marque_id` = `marque`.`id`';
        $result = $this->_con->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);

    }

    /**
     * récupération des données d'une voiture selon son id
     * @param $id
     * @return mixed
     */
    public function getOneCarById($id)
    {
        $query = 'SELECT ' . $this->table . '.`id`, `voit_prix`, `voit_model`, `marque_nom`, `marque_id` FROM ' . $this->table . ' INNER JOIN `marque` ON ' . $this->table . '.`marque_id` = `marque`.`id` WHERE ' . $this->table . '.`id` = :id';
        $result = $this->_con->prepare($query);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    /**
     * modification des données dans la table voiture
     * @param $id
     * @return bool
     */
    public function updateCar($id): bool
    {
        $query = 'UPDATE ' . $this->table . ' SET `voit_prix` = :price, `voit_model` = :model, `marque_id` = :marque WHERE `id` = :id';
        $result = $this->_con->prepare($query);
        $result->bindValue(':price', $this->voit_prix, PDO::PARAM_STR);
        $result->bindValue(':model', $this->voit_model, PDO::PARAM_STR);
        $result->bindvalue(':marque', $this->marque_id, PDO::PARAM_INT);
        $result->bindValue(':id', $id, PDO::PARAM_STR);
//        var_dump($this);
//        die();
        return $result->execute();
    }

    /**
     * ajout de données dans la table voiture
     * @return bool
     */
    public function addCar(): bool
    {
        $query = 'INSERT INTO `voiture` (`voit_prix`, `voit_model`, `marque_id`) VALUES (:price, :model, :brand)';
        $result = $this->_con->prepare($query);
        $result->bindValue(':price', $this->voit_prix, PDO::PARAM_STR);
        $result->bindValue(':model', $this->voit_model, PDO::PARAM_STR);
        $result->bindValue(':brand', $this->marque_id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Suppression d'une ligne de la table voiture
     * @param $id
     * @return bool
     */
    public function delCar($id): bool
    {
        $query = 'DELETE FROM `voiture` WHERE `id` = :id';
        $result = $this->_con->prepare($query);
        $result->bindValue(':id', $id, PDO::PARAM_STR);
        return $result->execute();
    }

    public function getCarByModel($model)
    {
        $query = 'SELECT COUNT(*) AS `count` FROM ' . $this->table . ' WHERE `voit_model` = :model';
        $result = $this->_con->prepare($query);
        $result->bindValue(':model', $model, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
}