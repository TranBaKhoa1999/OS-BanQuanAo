<?php 

require_once "../src/models/productModel.php";
require_once "../src/models/categoryModel.php";
require_once "../src/models/product_cateModel.php";
require_once "../src/models/brandModel.php";

    class CategoryService {
        
        private $productModel;
        private $categoryModel;
        private $product_cateModel;
        private $brandModel;

        public function __construct()
        {
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel();
            $this->product_cateModel = new Product_cateModel();
            $this->brandModel = new BrandModel();
        }

        public function GetAllCategory(){
            return $this->categoryModel->GetAll();
        }

        public function GetSingleCategory($id){
            return $this->categoryModel->GetSingle($id);
        }

        public function InsertCategory($name, $image, $description, $parentCategory, $count){
            return $this->categoryModel->Add($name, $image, $description, $parentCategory, $count);
        }

        public function UpdateCategory($id, $name, $image, $description, $parentCategory){
            return $this->categoryModel->Update($id, $name, $image, $description, $parentCategory);
        }

        public function UpdateCountCategory($id, $count){
            return $this->categoryModel->UpdateCount($id, $count);
        }

        public function DeleteCategory($id){
            $this->product_cateModel->DeleteAllProductOfCategory($id);
            return $this->categoryModel->Delete($id);
        }

    }

?>