<?php


class VoitureEntity {

    public int $id;

    public string $voit_prix;

    public string $voit_model;

    public int $marque_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getVoitPrix(): string
    {
        return $this->voit_prix;
    }

    public function setVoitPrix(string $price)
    {
        $this->voit_prix = $price;
        return $this;
    }

    public function getVoitModel(): string
    {
        return $this->voit_model;
    }

    public function setVoitModel(string $model) {
        $this->voit_model = $model;
        return $this;
    }

    public function getMarque(): int
    {
        return $this->marque_id;
    }

    public function setMarque(int $marque_id)
    {
        $this->marque_id = $marque_id;
        return $this;
    }
}