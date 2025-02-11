<?php

namespace App\Controllers;

use App\Utils\ApiResponse;
use App\Models\DAO\PokemonDAO;

class PokemonController {

    private $pokemon;

    public function __construct(){
        
        $this->pokemon = new PokemonDAO();
    }

    public function getAllPokemon() {

        $pokemon = $this->pokemon->getAllPokemon();

        if(isset($pokemon)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                200,
                'Datos obtenidos correctamente',
                $pokemon
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

    public function getPokemonByType($tipo) {

        $pokemon = $this->pokemon->getPokemonByType($tipo);

        if(isset($pokemon)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                200,
                'Datos obtenidos correctamente',
                $pokemon
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

    public function getPokemonByGen($gen) {

        $pokemon = $this->pokemon->getPokemonByGen($gen);

        if(isset($pokemon)) {

            return $this->sendJsonResponse(new ApiResponse(
                'success',
                200,
                'Datos obtenidos correctamente',
                $pokemon
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

    private function sendJsonResponse($apiResponse) {
        header('Content-Type: application/json');
        http_response_code($apiResponse->getCode());
        echo $apiResponse->toJson();
    }

}

?>