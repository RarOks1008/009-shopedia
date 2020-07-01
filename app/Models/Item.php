<?php
    namespace App\Models;
    use App\Config\DATABASE;

    class Item {
        private $database;

        public function __construct(DATABASE $database) {
            $this->database = $database;
        }

        public function getItems($user_id) {
            return $this->database->executeQueryAll("SELECT i.ID as item_id, i.name AS name, i.quantity AS quantity, m.name AS measure, s.name AS shop, m.ID AS measure_id, s.ID AS shop_id FROM item i INNER JOIN measure m ON i.measure_id = m.ID INNER JOIN shop s ON i.shop_id = s.ID WHERE i.user_id = ?", [$user_id]);
        }

        public function addItem($name, $quantity, $measure, $user_id, $shop) {
            $this->database->executeInsert("INSERT INTO item (name, quantity, measure_id, user_id, shop_id) VALUES (?, ?, ?, ?, ?)", [$name, $quantity, $measure, $user_id, $shop]);
        }

        public function updateItem($name, $quantity, $measure, $shop, $id) {
            $this->database->executeUpdate("UPDATE item SET name = ?, quantity = ?, measure_id = ?, shop_id = ? WHERE ID = ?", [$name, $quantity, $measure, $shop, $id]);
        }

        public function deleteItem($id) {
            $this->database->executeDelete("DELETE FROM item WHERE ID = ?", [$id]);
        }
    }
