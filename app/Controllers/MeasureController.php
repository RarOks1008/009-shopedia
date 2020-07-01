<?php
    namespace App\Controllers;
    use App\Models\Measure;
    use App\Config\DATABASE;

    class MeasureController {
        private $model;

        public function __construct(){
            $this->model = new Measure(DATABASE::instance());
        }

        public function getMeasures() {
            return $this->model->getMeasures();
        }

        public function addMeasure($request) {
            if(isset($request['submit_add_measure'])) {
                $name = $request['add_measure'];

                if ($name != "") {
                    $this->model->addMeasure($name);
                }
            }
            header("Location: index.php?page=admin");
        }

        public function updateMeasure($request) {
            if(isset($request['submit_edit_measure'])) {
                $name = $request['edit_measure'];
                $id = $request['edit_measure_id'];

                if ($name != "") {
                    $this->model->updateMeasure($name, $id);
                }
            }
            header("Location: index.php?page=admin");
        }

        public function deleteMeasure($request) {
            if(isset($request['submit_delete_measure'])) {
                $id = $request['measure_delete_select'];

                if ($id != "") {
                    $this->model->deleteMeasure($id);
                }
            }
            header("Location: index.php?page=admin");
        }
    }
