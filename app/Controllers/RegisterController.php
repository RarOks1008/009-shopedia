<?php
    namespace App\Controllers;
    use App\Models\User;
    use App\Config\DATABASE;

    class RegisterController {
        private $model;

        public function __construct(){
            $this->model = new User(DATABASE::instance());
        }

        public function register($request) {
            if(isset($request['register'])) {
                $username = $request['username'];
                $password = $request['password'];
                $email = $request['email'];

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['r_error']= "Email not valid!";
                }
                else {
                    $user = $this->model->existsUser($username, $email);

                    if($user) {
                        $_SESSION['r_error'] ="Email or username already in use!";
                    } else {
                        $this->model->createUser($username, $email, $password);
                        $_SESSION['r_error'] ="User created successfully, you can now login with your credentials!";
                    }
                }
                header("Location: index.php?page=register");
            } else {
                \http_response_code(404);
            }
        }
    }
