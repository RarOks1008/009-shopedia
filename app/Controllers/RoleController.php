<?php
    namespace App\Controllers;
    use App\Models\Role;
    use App\Config\DATABASE;

    class RoleController {
        private $model;

        public function __construct(){
            $this->model = new Role(DATABASE::instance());
        }

        public function getRoles() {
            return $this->model->getRoles();
        }
    }
