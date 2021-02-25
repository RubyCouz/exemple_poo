<?php


class Voiture extends Model
{
    public function __construct()
    {
        $this->table = 'voiture';
        $this->getConnection();
    }

    public function getCarsInformations() {
        $query = 'SELECT * FROM ' . $this->table .' INNER JOIN `marque` ON ' . $this->table .'.`marque_id` = `marque`.`id`';
        $result = $this->_con->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);

    }


}