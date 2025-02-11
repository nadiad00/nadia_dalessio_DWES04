<?php

namespace App\Models\DAO;

use App\Core\DatabaseSingleton;
use App\Models\DTO\PokemonDTO;
use PDO;
use PDOException;

class PokemonDAO {

    private $db;

    public function __construct(){
        
        $this->db = DataBaseSingleton::getInstance();
    }

    public function getAllPokemon() {

        try {

            $connection = $this->db->getConnection();
            $query = "SELECT * FROM Pokemon";
            $statement = $connection->query($query);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error num. " . $e->getCode() . ": " . $e->getMessage();
        }
        
        $pokemonsDTO = array();

        for($i = 0; $i < count($result); $i++) {

            $fila = $result[$i];
            $pokemonDTO = new PokemonDTO(
                $fila['NamePkm'],
                $fila['TypePkm'],
                $fila['Generation']
            );

            $pokemonsDTO[] = $pokemonDTO;
        }

        return $pokemonsDTO;
    }

    public function getPokemonByType($tipo) {

        try {

            $connection = $this->db->getConnection();
            $query = "SELECT * FROM pokemon WHERE `TypePkm` LIKE :tipo";
            $statement = $connection->prepare($query);
            $statement->bindValue(':tipo', '%' . $tipo . '%');
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error num. " . $e->getCode() . ": " . $e->getMessage();
        }
        
        $pokemonsDTO = array();

        for($i = 0; $i < count($result); $i++) {

            $fila = $result[$i];
            $pokemonDTO = new PokemonDTO(
                $fila['NamePkm'],
                $fila['TypePkm'],
                $fila['Generation']
            );

            $pokemonsDTO[] = $pokemonDTO;
        }

        return $pokemonsDTO;
    }

    public function getPokemonByGen($gen) {

        try {

            $connection = $this->db->getConnection();
            $query = "SELECT * FROM pokemon WHERE `Generation` = ?";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $gen);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error num. " . $e->getCode() . ": " . $e->getMessage();
        }
        
        $pokemonsDTO = array();

        for($i = 0; $i < count($result); $i++) {

            $fila = $result[$i];
            $pokemonDTO = new PokemonDTO(
                $fila['NamePkm'],
                $fila['TypePkm'],
                $fila['Generation']
            );

            $pokemonsDTO[] = $pokemonDTO;
        }

        return $pokemonsDTO;
    }

}

?>