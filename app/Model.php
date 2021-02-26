<?php
// abstract => ne pourra pas être instancier directement, mais sera utiliser par héritage
abstract class Model
{
// informations de bdd
    private string $host = 'localhost:3306';
    private string $user = 'root';
    private string $password = 'root';
    private string $dbname = 'garage';
// propriété contenant la connexion
    protected $_con;
//propriété contenant les information de requêtes

    public string $table;
    public string $id;

    /**
     * connexion à la base de données
     */
    public function getConnection()
    {
        $this->_con = null;
        try {
            $this->_con = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
            $this->_con->exec('set names utf8');
        } catch (PDOException $exception) {
            echo 'Erreur :' . $exception->getMessage();
        }
    }

    /**
     * méthode qui permet de récupérer toutes les données d'une table
     * @return mixed
     */
    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table;
        $result = $this->_con->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * méthode qui permet de récupérer les détails d'une ligne d'une table
     * @param $id
     * @return mixed
     */
    public function getOne($id) {
        $this->id = $id;
        $query = 'SELECT * FROM ' . $this->table . ' WHERE `id`=:id' ;
        $result = $this->_con->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
}