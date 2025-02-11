<?php

namespace App\Core;

use PDO;

class DatabaseSingleton{

    private static $instance;
    private $connection;
    private $config = [];

    private function __construct(){
        
        $this->config = $this->loadConfig();
        $this->connection = new PDO(
            "mysql:host={$this->config['host']};dbname={$this->config['db_name']}",
            $this->config['user'],
            $this->config['password']
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function loadConfig(){

        $json_file = file_get_contents(__DIR__ . '\..\..\config\db-conf.json');
        $config = json_decode($json_file, true);
        return $config;
    }

    public static function getInstance() {

        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        
        return $this->connection;
    }
}


?>