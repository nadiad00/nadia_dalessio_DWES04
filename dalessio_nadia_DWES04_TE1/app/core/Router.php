<?php

namespace App\Core;

class Router{
    
    protected $routes = [];

    public function __construct() {

        $this->routes = [
            '/' => 'PokemonController@getAllPokemon',
            '/pokemon' => 'PokemonController@getAllPokemon',
            '/pokemon/get' => 'PokemonController@getAllPokemon',
            '/pokemon/get/{tipo}' => 'PokemonController@getPokemonByType',
            '/pokemon/get/{gen}' => 'PokemonController@getPokemonByGen',
            '/equipo' => 'EquipoController@getAllTeams',
            '/equipo/get' => 'EquipoController@getAllTeams',
            '/equipo/get/{id}' => 'EquipoController@getTeamById',
            '/equipo/post' => 'EquipoController@createTeam',
            '/equipo/update' => 'EquipoController@updateTeam',
            '/equipo/delete/{id}' => 'EquipoController@deleteTeam'
        ];
    }

    public function match($uri) {
        
        $uri = str_replace(BASE_URL, '', $uri);
        $uri = parse_url($uri, PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach($this->routes as $route => $params) {

            if(str_contains($uri, "pokemon")) {

                if(str_contains($route, "{tipo}")) {
                    
                    $pattern = str_replace(['{tipo}', '/'], ['(acero|agua|bicho|dragon|electrico|fantasma|fuego|hada|hielo|lucha|normal|planta|psiquico|roca|siniestro|tierra|veneno|volador)', '\/'], $route);
                    $pattern = '/^' . $pattern . '$/i';

                    if(preg_match($pattern, $uri, $matches)) {
                        array_shift($matches);
                        list($controller, $method) = explode('@', $params);
                        $controller = 'App\\Controllers\\' . $controller;
                        $this->executeMethod($controller, $method, $requestMethod, $matches[0]);
                        return true;
                    }

                } elseif(str_contains($route, "{gen}")) {
                    
                    $pattern = str_replace(['{gen}', '/'], ['([0-9])', '\/'], $route);
                    $pattern = '/^' . $pattern . '$/';

                    if(preg_match($pattern, $uri, $matches)) {
                        array_shift($matches);
                        list($controller, $method) = explode('@', $params);
                        $controller = 'App\\Controllers\\' . $controller;
                        $this->executeMethod($controller, $method, $requestMethod, $matches[0]);
                        return true;
                    }
                
                }
            }

            $pattern = str_replace(['{id}', '/'], ['([0-9]+)', '\/'], $route);
            $pattern = '/^' . $pattern . '$/';

            if(preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                list($controller, $method) = explode('@', $params);
                $controller = 'App\\Controllers\\' . $controller;
                $this->executeMethod($controller, $method, $requestMethod, $matches);
                return true;
            }
        }

        return false;
    }

    private function executeMethod($controller, $method, $requestMethod, $matches) {

        if(class_exists($controller) && method_exists($controller, $method)) {

            $controllerInstance = new $controller();

            if(in_array($requestMethod, ['POST', 'PUT', 'DELETE'])) {

                $input = json_decode(file_get_contents('php://input'), true);
                $matches[] = $input;
            }

            call_user_func([$controllerInstance, $method], $matches);
            return;

        }
    }

}