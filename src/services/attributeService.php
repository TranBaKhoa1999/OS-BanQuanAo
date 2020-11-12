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

        public function InsertAttribute($size, $color){
            return $this->attributeModel->Add($size, $color);
        }

        public function UpdateAttribute($id, $size, $color){
            return $this->attributeModel->Update($id, $size, $color);
        }
        public function DeleteAttribute($id){
            return $this->attributeModel->Delete($id);
        }

    }

?>