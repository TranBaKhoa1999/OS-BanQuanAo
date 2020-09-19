<?php 

require_once "../src/models/productModel.php";
require_once "../src/models/categoryModel.php";
require_once "../src/models/product_cateModel.php";
require_once "../src/models/attributeModel.php";

    class ProductService {

        private $productModel;
        private $categoryModel;
        private $product_cateModel;

        public function __construct()
        {
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel();
            $this->product_cateModel = new Product_cateModel();
            $this->attributeModel = new AttributeModel();
        }

        public function GetAllProducts(){
            return $this->productModel->GetAll();
        }
        public function GetSingleProduct($id){
            return $this->productModel->GetSingle($id);
        }
        // get product by cate
        public function GetAllProductsByCate($id_cate){
            $listIdProduct =  $this->product_cateModel->GetIdProductsByCate($id_cate);
            $listProduct = array();
            foreach($listIdProduct as $key){
                 $id = $key->id_product;
                $product = $this->productModel->GetSingle($id);

                $attribute = $this->attributeModel->GetSingle($product[0]->Attribute);
                // $product = (object) array_merge( (array)$product, array( 'size' => '1234' ) );
                
                array_push($listProduct,$product);
            }
            return $listProduct;
        }

        // add Product
        public function InsertProduct($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date){
            return $this->productModel->Add($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date);
        }
        // Add Product _ cate
        public function InsertProduct_cate($id_cate,$id_product){
            return $this->product_cateModel->Add($id_cate,$id_product);
        }
    }

?>