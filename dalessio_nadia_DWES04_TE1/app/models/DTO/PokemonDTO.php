<?php

namespace App\Models\DTO;

use JsonSerializable;

class PokemonDTO implements JsonSerializable{
    
    private $namePkm;
    private $typePkm;
    private $generation;

    public function __construct($namePkm, $typePkm, $generation){
        
        $this->namePkm = $namePkm;
        $this->typePkm = $typePkm;
        $this->generation = $generation;
    }

    /**
     * Get the value of namePkm
     */
    public function getNamePkm()
    {
        return $this->namePkm;
    }

    /**
     * Get the value of typePkm
     */
    public function getTypePkm()
    {
        return $this->typePkm;
    }

    /**
     * Get the value of generation
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    public function jsonSerialize(): mixed {
        
        return get_object_vars($this);
    }

}

?>