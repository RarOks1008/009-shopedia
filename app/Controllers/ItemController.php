<?php
    namespace App\Controllers;
    use App\Models\Item;
    use App\Config\DATABASE;

    class ItemController {
        private $model;

        public function __construct(){
            $this->model = new Item(DATABASE::instance());
        }

        public function getItems($user_id) {
            return $this->model->getItems($user_id);
        }

        public function addItem($request, $user_id) {
            if(isset($request['item_add_edit_submit'])) {
                $name = $request['item_add_edit_name'];
                $quantity = $request['item_add_edit_quantity'];
                $measure = $request['item_add_edit_measure'];
                $shop = $request['item_add_edit_shop'];

                if ($name != "" && $quantity != "" && $measure != "" && $shop != "") {
                    $this->model->addItem($name, $quantity, $measure, $user_id, $shop);
                }
            }
            header("Location: index.php?page=main");
        }

        public function updateItem($request) {
            if(isset($request['item_add_edit_submit'])) {
                $name = $request['item_add_edit_name'];
                $id = $request['item_add_edit_id'];
                $quantity = $request['item_add_edit_quantity'];
                $measure = $request['item_add_edit_measure'];
                $shop = $request['item_add_edit_shop'];

                if ($name != "" && $quantity != "" && $measure != "" && $shop != "") {
                    $this->model->updateItem($name, $quantity, $measure, $shop, $id);
                }
            }
            header("Location: index.php?page=main");
        }

        public function deleteItem($id) {
            $this->model->deleteItem($id);
            header("Location: index.php?page=main");
        }
    }
