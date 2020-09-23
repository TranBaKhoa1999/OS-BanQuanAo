<?php 

require_once "../src/models/productModel.php";
require_once "../src/models/categoryModel.php";
require_once "../src/models/product_cateModel.php";
require_once "../src/models/attributeModel.php";
require_once "../src/models/brandModel.php";
require_once "../src/models/storageModel.php";

    class CategoryService {
        
        private $productModel;
        private $categoryModel;
        private $product_cateModel;
        private $attributeModel;
        private $brandModel;
        private $storageModel;

        public function __construct()
        {
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel();
            $this->product_cateModel = new Product_cateModel();
            $this->attributeModel = new AttributeModel();
            $this->brandModel = new BrandModel();
            $this->storageModel = new StorageModel();
        }

        public function GetAllStorage(){
            return $this->storageModel->GetAll();
        }

        public function GetSingleStorage($id_Product){
            return $this->storageModel->GetSingle($id_Product);
        }

        public function InsertStorage($id_Product, $price_In, $count, $stock){
            return $this->storageModel->Add($id_Product, $price_In, $count, $stock);
        }

        public function UpdateCategory($id_Product, $price_In, $count, $stock){
            return $this->storageModel->Update($id_Product, $price_In, $count, $stock);
        }

    }

?>