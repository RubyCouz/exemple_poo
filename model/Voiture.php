<?php


class Voiture extends Model
{
    public function __construct()
    {
        $this->table = 'voiture';
        $this->getConnection();
    }



}