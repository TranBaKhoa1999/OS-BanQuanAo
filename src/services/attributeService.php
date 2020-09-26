<?php 

require_once "../src/models/attributeModel.php";

    class AttributeService {
        
        private $attributeModel;

        public function __construct()
        {
            $this->attributeModel = new AttributeModel();
        }

        public function GetAllAttributes(){
            return $this->attributeModel->GetAll();
        }

        public function GetSingleAttribute($id){
            return $this->attributeModel->GetSingle($id);
        }

        public function InsertAttribute($name, $logo, $description){
            return $this->attributeModel->Add($name, $logo, $description);
        }

        public function UpdateAttribute($id, $name, $logo, $description){
            return $this->attributeModel->Update($id, $name, $logo, $description);
        }
        public function DeleteAttribute($id){
            return $this->attributeModel->Delete($id);
        }

    }

?>