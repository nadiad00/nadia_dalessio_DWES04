<?php

namespace App\Controllers;

use App\Utils\ApiResponse;
use App\Models\DAO\EquipoDAO;

class EquipoController {

    private $equipo;

    public function __construct(){
        
        $this->equipo = new EquipoDAO();
    }
    
    public function getAllTeams() {

        $equipo = $this->equipo->getAllTeams();

        if(isset($equipo)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                200,
                'Datos obtenidos correctamente',
                $equipo
            ));

        } else {

            return $this->sendJsonResponse(new ApiResponse(
                'no success',
                500,
                'Error al obtener los datos',
                null
            ));

        }
    }

    public function getTeamById($id) {

        $equipo = $this->equipo->getTeamById($id);

        if(isset($equipo)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                200,
                'Datos obtenidos correctamente',
                $equipo
            ));

        } else {

            return $this->sendJsonResponse(new ApiResponse(
                'no success',
                500,
                'Error al obtener los datos',
                null
            ));

        }
    }

    public function createTeam($datosNuevos) {

        $equipo = $this->equipo->createTeam($datosNuevos);

        if(isset($equipo)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                201,
                'Datos creados correctamente',
                $equipo
            ));

        } else {

            return $this->sendJsonResponse(new ApiResponse(
                'no success',
                500,
                'Error al crear los datos',
                null
            ));

        }
    }

    public function updateTeam($datosUpdt) {

        $equipo = $this->equipo->createTeam($datosUpdt);

        if(isset($equipo)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                201,
                'Datos modificados correctamente',
                $equipo
            ));

        } else {

            return $this->sendJsonResponse(new ApiResponse(
                'no success',
                500,
                'Error al modificar los datos',
                null
            ));

        }
    }

    public function deleteTeam($id) {

        $equipo = $this->equipo->deleteTeam($id);

        if(isset($equipo)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                200,
                'Datos eliminados correctamente',
                $equipo
            ));

        } else {

            return $this->sendJsonResponse(new ApiResponse(
                'no success',
                500,
                'Error al eliminar los datos',
                null
            ));

        }
    }

    private function sendJsonResponse($apiResponse) {
        header('Content-Type: application/json');
        http_response_code($apiResponse->getCode());
        echo $apiResponse->toJson();
    }
}

?>