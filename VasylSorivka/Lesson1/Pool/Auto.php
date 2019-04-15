<?php


class Auto
{
    protected $models;

    public function __construct($models)
    {
        $this->models = $models;
    }

    public function getModels()
    {
        return $this->models;
    }

}