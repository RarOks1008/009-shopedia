<?php
    namespace App\Models;
    use App\Config\DATABASE;

    class Shop {
        private $database;

        public function __construct(DATABASE $database) {
            $this->database = $database;
        }

        public function getShops($user_id) {
            return $this->database->executeQueryAll("SELECT ID, name FROM shop WHERE user_id = ?", [$user_id]);
        }

        public function addShop($name, $user_id) {
            $this->database->executeInsert("INSERT INTO shop (name, user_id) VALUES (?, ?)", [$name, $user_id]);
        }

        public function updateShop($name, $id) {
            $this->database->executeUpdate("UPDATE shop SET name = ? WHERE ID = ?", [$name, $id]);
        }

        public function deleteShop($id) {
            $this->database->executeDelete("DELETE FROM shop WHERE ID = ?", [$id]);
        }
    }
