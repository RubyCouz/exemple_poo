<?php


class Home extends AbstractController
{
    public function __construct()
    {
    }
    public function homePage() {
        $this->render('home');
    }
}