<?php 

require_once "../src/models/productModel.php";
require_once "../src/models/statisticalModel.php";

    class StatisticalService {
        
        private $productModel;
        private $statisticalModel;

        public function __construct()
        {
            $this->productModel = new ProductModel();
            $this->statisticalModel = new StatisticalModel();
        }

        public function GetAllStatistical(){
            return $this->statisticalModel->GetAll();
        }
        public function GetSingleStatistical($id_product){
            return $this->statisticalModel->GetSingle($id_product);
        }

    }

?>