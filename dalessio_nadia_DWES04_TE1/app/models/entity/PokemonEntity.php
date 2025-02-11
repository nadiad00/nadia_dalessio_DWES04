<?php

namespace App\Models\Entity;

class PokemonEntity {
    
    private $idPokemon;
    private $namePkm;
    private $typePkm;
    private $generation;

    public function __construct($idPokemon, $namePkm, $typePkm, $generation){
        
        $this->idPokemon = $idPokemon;
        $this->namePkm = $namePkm;
        $this->typePkm = $typePkm;
        $this->generation = $generation;
    }

    /**
     * Get the value of idPokemon
     */
    public function getIdPokemon()
    {
        return $this->idPokemon;
    }

    /**
     * Set the value of idPokemon
     */
    public function setIdPokemon($idPokemon): self
    {
        $this->idPokemon = $idPokemon;

        return $this;
    }

    /**
     * Get the value of namePkm
     */
    public function getNamePkm()
    {
        return $this->namePkm;
    }

    /**
     * Set the value of namePkm
     */
    public function setNamePkm($namePkm): self
    {
        $this->namePkm = $namePkm;

        return $this;
    }

    /**
     * Get the value of typePkm
     */
    public function getTypePkm()
    {
        return $this->typePkm;
    }

    /**
     * Set the value of typePkm
     */
    public function setTypePkm($typePkm): self
    {
        $this->typePkm = $typePkm;

        return $this;
    }

    /**
     * Get the value of generation
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    /**
     * Set the value of generation
     */
    public function setGeneration($generation): self
    {
        $this->generation = $generation;

        return $this;
    }
}

?>