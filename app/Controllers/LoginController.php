<?php
    namespace App\Controllers;
    use App\Models\User;
    use App\Config\DATABASE;

    class LoginController {
        private $model;

        public function __construct(){
            $this->model = new User(DATABASE::instance());
        }

        public function login($request) {
            if(isset($request['signin'])) {
                $username = $request['username'];
                $password = $request['password'];

                $user = $this->model->getUser($username, $password);

                if($user) {
                    $_SESSION['user'] = $user;
                } else {
                    $_SESSION['l_error'] ="User not registered or wrong credentials!";
                }
                header("Location: index.php?page=login");
            } else {
                \http_response_code(404);
            }
        }
    }
