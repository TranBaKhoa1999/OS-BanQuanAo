<?php 

require_once "../src/models/productModel.php";
require_once "../src/models/categoryModel.php";
require_once "../src/models/product_cateModel.php";
require_once "../src/models/attributeModel.php";
require_once "../src/models/brandModel.php";

    class ProductService {
        
        private $productModel;
        private $categoryModel;
        private $product_cateModel;
        private $attributeModel;
        private $brandModel;

        public function __construct()
        {
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel();
            $this->product_cateModel = new Product_cateModel();
            $this->attributeModel = new AttributeModel();
            $this->brandModel = new BrandModel();
        }

        public function GetAllProducts(){
            return $this->productModel->GetAll();
        }
        public function GetSingleProduct($id){
            $product =  $this->productModel->GetSingle($id);
            //get properties
            if($product[0]->Attribute != null){
                $attribute = $this->attributeModel->GetSingle($product[0]->Attribute);
             }
            if($product[0]->Brand !=null ){
                $brandName = $this->brandModel->GetSingle($product[0]->Brand);
            }
            //
            $sum= [
                'Id'    => $product[0]->Id,
                'Name'  => $product[0]->Name,
                'Image' => $product[0]->Image,
                'Brand' => $brandName[0]->Name,
                'SKU'   => $product[0]->SKU,
                'Size'  => $attribute[0]->Size,
                'Color' => $attribute[0]->Color,
                'Price' => $product[0]->Price,
                'Sale Price'=>$product[0]->Sale_Price,
                'Description' =>$product[0]->Description,
                'Visibility' =>$product[0]->Visibility,
                'Date' =>$product[0]->Date

            ];
            return $sum;

        }
        // get product by cate
        public function GetAllProductsByCate($id_cate){
            $listIdProduct =  $this->product_cateModel->GetIdProductsByCate($id_cate);
            
            $listProduct = array();
            foreach($listIdProduct as $key){
                if($key->id_product == null){
                    return $listIdProduct;
                }
                $id = $key->id_product;
                $product = $this->productModel->GetSingle($id);

                 // get properties of product
                if($product[0]->Attribute != null){
                    $attribute = $this->attributeModel->GetSingle($product[0]->Attribute);
                 }
                if($product[0]->Brand !=null ){
                    $brandName = $this->brandModel->GetSingle($product[0]->Brand);
                }
                // end get properties
                $sum= [
                    'Id'    => $product[0]->Id,
                    'Name'  => $product[0]->Name,
                    'Image' => $product[0]->Image,
                    'Brand' => $brandName[0]->Name,
                    'SKU'   => $product[0]->SKU,
                    'Size'  => $attribute[0]->Size,
                    'Color' => $attribute[0]->Color,
                    'Price' => $product[0]->Price,
                    'Sale Price'=>$product[0]->Sale_Price,
                    'Description' =>$product[0]->Description,
                    'Visibility' =>$product[0]->Visibility,
                    'Date' =>$product[0]->Date

                ];
                array_push($listProduct,$sum);
            }
            return $listProduct;
        }

        // add Product
        public function InsertProduct($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date,$cate){

            if($this->productModel->Add($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date)){ // nếu add sản phẩm thành công tiến hành add cate
                $listCate = explode('/', $cate); // tách chuỗi - xóa đưa vào mảng
                $id = $this->productModel->GetLastId();
                for($i = 0; $i<count($listCate);$i++){
                    $this->product_cateModel->Add($listCate[$i],$id[0]->id);
                }
                return (
                    array('message'=>'Insert Success')
                );
            }
            else{
                return(
                    array('message'=>'Insert Fail!')
                );
            }

        }
        // Add Product _ cate
        public function InsertProduct_cate($id_cate,$id_product){
            return $this->product_cateModel->Add($id_cate,$id_product);
        }

        // update product
        public function UpdateProduct($id,$name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date){
            return $this->productModel->Update($id,$name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date);
        }
    }

?>