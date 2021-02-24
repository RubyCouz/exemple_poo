<?php


abstract class AbstractController
{
    public function loadModel(string $model)
    {
        require_once(ROOT . '/model/' . $model . '.php');
        return new $model();
    }

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
}