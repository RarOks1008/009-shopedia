<?php
    namespace App\Models;
    use App\Config\DATABASE;

    class User {
        private $database;

        public function __construct(DATABASE $database) {
            $this->database = $database;
        }

        public function getUsers($id) {
            return $this->database->executeQueryAll("SELECT ID, username, role_id FROM user WHERE ID != ?", [$id]);
        }

        public function getUser($username, $password) {
            return $this->database->executeQueryOneRow("SELECT ID, username, email, role_id FROM user WHERE username = ? AND password=MD5(?)", [$username, $password]);
        }

        public function existsUser($username, $email) {
            return $this->database->executeQueryOneRow("SELECT username, email, role_id FROM user WHERE username = ? OR email = ?", [$username, $email]);
        }

        public function createUser($username, $email, $password) {
            $this->database->executeInsert("INSERT INTO user(username, email, password, role_id) VALUES (?, ?, MD5(?), 2)", [$username, $email, $password]);
        }

        public function editUserRight($role, $user) {
            $this->database->executeUpdate("UPDATE user SET role_id = ? WHERE ID = ?", [$role, $user]);
        }

        public function deleteUser($id) {
            $this->database->executeDelete("DELETE FROM user WHERE ID = ?", [$id]);
        }
    }
