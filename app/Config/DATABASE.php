<?php
namespace App\Config;

class DATABASE {

    private $connection;
    private static $database;

    private function __construct() {
        $this->connect();
    }

    public static function instance() {
        if(self::$database === null){
            self::$database = new DATABASE();
        }
        return self::$database;
    }

    private function connect() {
        try {
            $this->connection = new \PDO("mysql:host=".SERVER.";dbname=".DBNAME.";charset=utf8", USERNAME, PASSWORD);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function executeQuery(string $query) {
        return $this->connection->query($query)->fetchAll();
    }

    public function executeQueryAll(string $query, Array $params) {
        $prepare = $this->connection->prepare($query);
        $prepare->execute($params);
        return $prepare->fetchAll();
    }

    public function executeQueryOneRow(string $query, Array $params) {
        $prepare = $this->connection->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }

    public function executeInsert(string $query, Array $params) {
        $prepare = $this->connection->prepare($query);
        $prepare->execute($params);
    }

    public function executeUpdate(string $query, Array $params) {
        $prepare = $this->connection->prepare($query);
        $prepare->execute($params);
    }

    public function executeDelete(string $query, Array $params) {
        $prepare = $this->connection->prepare($query);
        $prepare->execute($params);
    }
}
