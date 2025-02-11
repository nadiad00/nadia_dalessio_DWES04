<?php

namespace App\Models\Entity;

class EquipoEntity {
    
    private $equipoId;
    private $pokemon1;
    private $pokemon2;
    private $pokemon3;
    private $pokemon4;
    private $pokemon5;
    private $pokemon6;

    public function __construct($equipoId, $pokemon1, $pokemon2, $pokemon3, $pokemon4, $pokemon5, $pokemon6){
        
        $this->equipoId = $equipoId;
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
        $this->pokemon3 = $pokemon3;
        $this->pokemon4 = $pokemon4;
        $this->pokemon5 = $pokemon5;
        $this->pokemon1 = $pokemon6;
    }

    /**
     * Get the value of equipoId
     */
    public function getEquipoId()
    {
        return $this->equipoId;
    }

    /**
     * Set the value of equipoId
     */
    public function setEquipoId($equipoId): self
    {
        $this->equipoId = $equipoId;

        return $this;
    }

    /**
     * Get the value of pokemon1
     */
    public function getPokemon1()
    {
        return $this->pokemon1;
    }

    /**
     * Set the value of pokemon1
     */
    public function setPokemon1($pokemon1): self
    {
        $this->pokemon1 = $pokemon1;

        return $this;
    }

    /**
     * Get the value of pokemon2
     */
    public function getPokemon2()
    {
        return $this->pokemon2;
    }

    /**
     * Set the value of pokemon2
     */
    public function setPokemon2($pokemon2): self
    {
        $this->pokemon2 = $pokemon2;

        return $this;
    }

    /**
     * Get the value of pokemon3
     */
    public function getPokemon3()
    {
        return $this->pokemon3;
    }

    /**
     * Set the value of pokemon3
     */
    public function setPokemon3($pokemon3): self
    {
        $this->pokemon3 = $pokemon3;

        return $this;
    }

    /**
     * Get the value of pokemon4
     */
    public function getPokemon4()
    {
        return $this->pokemon4;
    }

    /**
     * Set the value of pokemon4
     */
    public function setPokemon4($pokemon4): self
    {
        $this->pokemon4 = $pokemon4;

        return $this;
    }

    /**
     * Get the value of pokemon5
     */
    public function getPokemon5()
    {
        return $this->pokemon5;
    }

    /**
     * Set the value of pokemon5
     */
    public function setPokemon5($pokemon5): self
    {
        $this->pokemon5 = $pokemon5;

        return $this;
    }

    /**
     * Get the value of pokemon6
     */
    public function getPokemon6()
    {
        return $this->pokemon6;
    }

    /**
     * Set the value of pokemon6
     */
    public function setPokemon6($pokemon6): self
    {
        $this->pokemon6 = $pokemon6;

        return $this;
    }
}

?>