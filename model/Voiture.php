<?php

require_once('entities/VoitureEntity.php');

class Voiture extends Model
{
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
        $query = 'SELECT ' . $this->table . '.`id`, `voit_prix`, `voit_model`, `marque_nom` FROM ' . $this->table .' INNER JOIN `marque` ON ' . $this->table . '.`marque_id` = `marque`.`id`';
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
        $query = 'SELECT ' . $this->table . '.`id`, `voit_prix`, `voit_model`, `marque_nom`, `marque_id` FROM ' . $this->table .' INNER JOIN `marque` ON ' . $this->table . '.`marque_id` = `marque`.`id`';
        $result = $this->_con->prepare($query);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function updateCar($id) {
        $query = 'UPDATE ' . $this->table . ' SET `voit_prix` = :price, `voit_model` = :model, `marque_id` = :marque';
        $result = $this->_con->prepare($query);
        $result->bindValue(':voit_prix', $this->voit_prix, PDO::PARAM_INT);
}

}