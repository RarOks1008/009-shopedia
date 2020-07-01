<?php
    namespace App\Models;
    use App\Config\DATABASE;

    class Measure {
        private $database;

        public function __construct(DATABASE $database) {
            $this->database = $database;
        }

        public function getMeasures() {
            return $this->database->executeQuery("SELECT * FROM measure");
        }

        public function addMeasure($name) {
            $this->database->executeInsert("INSERT INTO measure (name) VALUES (?)", [$name]);
        }

        public function updateMeasure($name, $id) {
            $this->database->executeUpdate("UPDATE measure SET name = ? WHERE ID = ?", [$name, $id]);
        }

        public function deleteMeasure($id) {
            $this->database->executeDelete("DELETE FROM measure WHERE ID = ?", [$id]);
        }
    }
