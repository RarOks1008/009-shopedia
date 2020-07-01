<?php
    namespace App\Controllers;
    use App\Models\User;
    use App\Config\DATABASE;

    class UserController {
        private $model;

        public function __construct(){
            $this->model = new User(DATABASE::instance());
        }

        public function getUsers($id) {
            return $this->model->getUsers($id);
        }

        public function editUserRight($request) {
            if(isset($request['submit_edit_user_id'])) {
                $user = $request['edit_user_right_id'];
                $role = $request['user_right_select'];

                if ($user != "" && $role != "") {
                    $this->model->editUserRight($role, $user);
                }
            }
            header("Location: index.php?page=admin");
        }

        public function deleteUser($request) {
            if(isset($request['submit_delete_user'])) {
                $id = $request['user_delete_select'];

                if ($id != "") {
                    $this->model->deleteUser($id);
                }
            }
            header("Location: index.php?page=admin");
        }
    }
