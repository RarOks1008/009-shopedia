<?php
    namespace App\Controllers;
    use App\Models\Shop;
    use App\Config\DATABASE;

    class ShopController {
        private $model;

        public function __construct(){
            $this->model = new Shop(DATABASE::instance());
        }

        public function getShops($user_id) {
            return $this->model->getShops($user_id);
        }

        public function addShop($request, $user_id) {
            if(isset($request['shop_add_edit_submit'])) {
                $name = $request['shop_add_edit_name'];

                if ($name != "") {
                    $this->model->addShop($name, $user_id);
                }
            }
            header("Location: index.php?page=main");
        }

        public function updateShop($request) {
            if(isset($request['shop_add_edit_submit'])) {
                $name = $request['shop_add_edit_name'];
                $id = $request['shop_add_edit_id'];

                if ($name != "") {
                    $this->model->updateShop($name, $id);
                }
            }
            header("Location: index.php?page=main");
        }

        public function deleteShop($id) {
            $this->model->deleteShop($id);
            header("Location: index.php?page=main");
        }
    }
