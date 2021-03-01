<?php


abstract class AbstractController
{
    /**
     * fonction permettant l'instanciation d'un model
     * @param string $model
     * @return mixed
     */
    public function loadModel(string $model)
    {
        require_once(ROOT . '/model/' . $model . '.php');
        // retour de l'instance du model
        return new $model();
    }

    /**
     * affichage d'une vue, avec paramêtre
     * @param string $file
     * @param array $data
     */
    public function render(string $file, array $data = [])
    {
        // création d'une variable selon la clé associative
        extract($data);
        // on démarre le buffer
        ob_start();
        require_once(ROOT . '/views/' . strtolower(get_class($this)) . '/' . $file . '.php');
        // on récupère ce qu'il y a dans le buffer
        $content = ob_get_clean();
        require_once(ROOT . '/views/layout/default.php');
    }

    /**
     * fonction de débogage
     * @param $data
     */
    public function dd($data)
    {
        var_dump($data);
        die();
    }

    /**
     * fonction de validation de formulaire, prend en paramêtre les données envoyé en post, les regex contenu dans un tableau
     * @param array $regex
     * @param array $post
     * @return array
     */
    public function validForm(array $regex, array $post): array
    {
        // déclaration d'un tableau d'erreur
        $formError = [];
        // boucle permettant de parcourir le tableau contenant les regex
        foreach ($regex as $key => $value) {
            // si le post est vide
            if (!empty($post[$key])) {
                // si la valuer du post correspond à la regex
                if (!preg_match($value, $post[$key])) {
                    // déclaratin d'un message d'erreur
                    $formError[$key] = 'Erreur sur le champ ' . $key;
                }
            } else {
                // déclaration d'un message d'erreur
                $formError[$key] = 'Champ ' . $key . ' vide';
            }
        }
        return $formError;
    }

}