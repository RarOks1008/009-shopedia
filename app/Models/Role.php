<?php
    namespace App\Models;
    use App\Config\DATABASE;

    class Role {
        private $database;

        public function __construct(DATABASE $database) {
            $this->database = $database;
        }

        public function getRoles() {
            return $this->database->executeQuery("SELECT * FROM role");
        }
    }
