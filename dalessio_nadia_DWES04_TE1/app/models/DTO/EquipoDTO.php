<?php

namespace App\Models\DTO;

use JsonSerializable;

class EquipoDTO implements JsonSerializable{
    
    private $pokemon1;
    private $pokemon2;
    private $pokemon3;
    private $pokemon4;
    private $pokemon5;
    private $pokemon6;

    public function __construct($pokemon1, $pokemon2, $pokemon3, $pokemon4, $pokemon5, $pokemon6){
        
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
        $this->pokemon3 = $pokemon3;
        $this->pokemon4 = $pokemon4;
        $this->pokemon5 = $pokemon5;
        $this->pokemon6 = $pokemon6;
    }


    /**
     * Get the value of pokemon1
     */
    public function getPokemon1()
    {
        return $this->pokemon1;
    }

    /**
     * Get the value of pokemon2
     */
    public function getPokemon2()
    {
        return $this->pokemon2;
    }

    /**
     * Get the value of pokemon3
     */
    public function getPokemon3()
    {
        return $this->pokemon3;
    }

    /**
     * Get the value of pokemon4
     */
    public function getPokemon4()
    {
        return $this->pokemon4;
    }

    /**
     * Get the value of pokemon5
     */
    public function getPokemon5()
    {
        return $this->pokemon5;
    }

    /**
     * Get the value of pokemon6
     */
    public function getPokemon6()
    {
        return $this->pokemon6;
    }

    public function jsonSerialize(): mixed {
        
        return get_object_vars($this);
    }
}

?>