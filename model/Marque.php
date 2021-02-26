<?php


class Marque extends Model
{
    public function __construct()
    {
        $this->table = 'marque';
        $this->getConnection();
    }
}