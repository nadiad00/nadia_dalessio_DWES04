<?php

namespace App\Models\DAO;

use App\Core\DatabaseSingleton;
use App\Models\DTO\EquipoDTO;
use PDO;

class EquipoDAO {

    private $db;

    public function __construct(){
        
        $this->db = DataBaseSingleton::getInstance();
    }

    public function getAllTeams() {

        $connection = $this->db->getConnection();
        $query = "SELECT 
                    p1.NamePkm AS nombre_p1,
                    p2.NamePkm AS nombre_p2,
                    p3.NamePkm AS nombre_p3,
                    p4.NamePkm AS nombre_p4,
                    p5.NamePkm AS nombre_p5,
                    p6.NamePkm AS nombre_p6
                FROM equipos e
                JOIN pokemon p1 ON p1.`idPokemon` = e.`Pokemon1`
                JOIN pokemon p2 ON p2.`idPokemon` = e.`Pokemon2`
                JOIN pokemon p3 ON p3.`idPokemon` = e.`Pokemon3`
                JOIN pokemon p4 ON p4.`idPokemon` = e.`Pokemon4`
                JOIN pokemon p5 ON p5.`idPokemon` = e.`Pokemon5`
                JOIN pokemon p6 ON p6.`idPokemon` = e.`Pokemon6`";

        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $equiposDTO = array();

        for($i = 0; $i < count($result); $i++) {

            $fila = $result[$i];
            $equipoDTO = new EquipoDTO(
                $fila['nombre_p1'],
                $fila['nombre_p2'],
                $fila['nombre_p3'],
                $fila['nombre_p4'],
                $fila['nombre_p5'],
                $fila['nombre_p6']
            );

            $equiposDTO[] = $equipoDTO;
        }

        return $equiposDTO;
    }

    public function getTeamById($id) {

        $connection = $this->db->getConnection();
        $query = "SELECT 
                    p1.NamePkm AS nombre_p1,
                    p2.NamePkm AS nombre_p2,
                    p3.NamePkm AS nombre_p3,
                    p4.NamePkm AS nombre_p4,
                    p5.NamePkm AS nombre_p5,
                    p6.NamePkm AS nombre_p6
                FROM equipos e
                JOIN pokemon p1 ON p1.`idPokemon` = e.`Pokemon1`
                JOIN pokemon p2 ON p2.`idPokemon` = e.`Pokemon2`
                JOIN pokemon p3 ON p3.`idPokemon` = e.`Pokemon3`
                JOIN pokemon p4 ON p4.`idPokemon` = e.`Pokemon4`
                JOIN pokemon p5 ON p5.`idPokemon` = e.`Pokemon5`
                JOIN pokemon p6 ON p6.`idPokemon` = e.`Pokemon6`
                WHERE e.`Equipo` = ?";

        $statement = $connection->prepare($query);
        $statement->bindParam(1, $id[0]);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $aux = $result[0];
        
            $equipoDTO = new EquipoDTO(
                $aux['nombre_p1'],
                $aux['nombre_p2'],
                $aux['nombre_p3'],
                $aux['nombre_p4'],
                $aux['nombre_p5'],
                $aux['nombre_p6']
            );

        return $equipoDTO;

    }

    public function createTeam($datosNuevo) {

        $connection = $this->db->getConnection();
        $query = "REPLACE INTO Equipos (Equipo, Pokemon1, Pokemon2, Pokemon3, Pokemon4, Pokemon5, Pokemon6) VALUES
	                (:id, :p1, :p2, :p3, :p4, :p5, :p6)";
        $aux = $datosNuevo[0];
        $parms = array(
            ":id" => $aux[0],
            ":p1" => $aux[1],
            ":p2" => $aux[2],
            ":p3" => $aux[3],
            ":p4" => $aux[4],
            ":p5" => $aux[5],
            ":p6" => $aux[6] 
        );
        $statement = $connection->prepare($query);
        $statement->execute($parms);

        return $this->getTeamById($aux);

    }

    public function deleteTeam($id) {
        
        $connection = $this->db->getConnection();
        $query = "DELETE FROM equipos WHERE `Equipo` = ?";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $id[0]);
        $statement->execute();

        return $this->getAllTeams();
        
    }
    
}

?>