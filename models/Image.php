<?php

class Image extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ajouter($data)
    {
        $this->sql = "insert into Image(id_film, chemin_image) 
            VALUE(:id_film, :chemin_image)";
        return $this->getLines($data, null);
    }


}