<?php

namespace App\Repositories\MysqlRepository;

use PDO;
use PDOException;

class MysqlConnection {

    private string $localhost;
    private string $dbname;
    private string $user;
    private string $password;
    public $mysql;

    public function __construct()
    {
        try {
            $this->mysql = $this->getConnection();
        }
        catch (PDOException $ex) {
            echo  "Error with data base connection: ". $ex->getMessage();
            die();
        }
    }

    private function getConnection()
    {
        $this->setDataConnection();
        
        $charset = "utf-8";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $dsn = "mysql:host={$this->localhost};dbname={$this->dbname};$charset";

        $pdo = new PDO($dsn, $this->user, $this->password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    private function setDataConnection()
    {
        require_once("./src/config.php");
        
        $this->localhost = DBHOST;
        $this->dbname = DBNAME;
        $this->user = USER;
        $this->password = PASSWORD;
    } 
}