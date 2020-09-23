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
            $listProduct =  $this->productModel->GetAll();
            $listShow = array();
            $size="null";
            $color="null";
            $brandShow = "null";
            foreach($listProduct as $product){
                if($product->Attribute != null){
                    $attribute = $this->attributeModel->GetSingle($product->Attribute);

                    $size = $attribute[0]->Size;
                    $color = $attribute[0]->Color;

                 }
                if($product->Brand !=null ){
                    $brand = $this->brandModel->GetSingle($product->Brand);
                    $brandShow=$brand[0]->Name;
                }
                $sum= [
                    'Id'    => $product->Id,
                    'Name'  => $product->Name,
                    'Image' => $product->Image,
                    'Brand' => $brandShow,
                    'SKU'   => $product->SKU,
                    'Size'  => $size,
                    'Color' => $color,
                    'Price' => $product->Price,
                    'Sale Price'=>$product->Sale_Price,
                    'Description' =>$product->Description,
                    'Visibility' =>$product->Visibility,
                    'Date' =>$product->Date,
                    'Id Attribute' =>$product->Attribute,
                    'Id Brand' =>$product->Brand
                ];
                array_push($listShow,$sum);
            }
            return $listShow;
        }
        public function GetSingleProduct($id){
            if($this->productModel->GetSingle($id)){

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
                    'Date' =>$product[0]->Date,
                    'Id Attribute' =>$product[0]->Attribute,
                    'Id Brand' =>$product[0]->Brand

                ];
                return $sum;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        
        }
        // get product by cate
        public function GetAllProductsByCate($id_cate){
            if($this->product_cateModel->GetIdProductsByCate($id_cate) ){
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
                        'Id'    => $id,
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
                        'Date' =>$product[0]->Date,
                        'Id Attribute' =>$product[0]->Attribute,
                        'Id Brand' =>$product[0]->Brand

                    ];
                    array_push($listProduct,$sum);
                }
                return $listProduct;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
            
        }
        // get product by brand
        public function GetAllProductsByBrand($id_Brand){
            if($this->productModel->GetAllProductsByBrand($id_Brand)){
                $listProduct =  $this->productModel->GetAllProductsByBrand($id_Brand);
                $listShow = array();
                $size="null";
                $color="null";
                $brandShow = "null";
                foreach($listProduct as $product){
                    if($product->Attribute != null){
                        $attribute = $this->attributeModel->GetSingle($product->Attribute);

                        $size = $attribute[0]->Size;
                        $color = $attribute[0]->Color;

                    }
                    if($product->Brand !=null ){
                        $brand = $this->brandModel->GetSingle($product->Brand);
                        $brandShow=$brand[0]->Name;
                    }
                    $sum= [
                        'Id'    => $product->Id,
                        'Name'  => $product->Name,
                        'Image' => $product->Image,
                        'Brand' => $brandShow,
                        'SKU'   => $product->SKU,
                        'Size'  => $size,
                        'Color' => $color,
                        'Price' => $product->Price,
                        'Sale Price'=>$product->Sale_Price,
                        'Description' =>$product->Description,
                        'Visibility' =>$product->Visibility,
                        'Date' =>$product->Date,
                        'Id Attribute' =>$product->Attribute,
                        'Id Brand' =>$product->Brand
        
                    ];
                    array_push($listShow,$sum);
                }
                return $listShow;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
            
        }
        //get all product by cate and brand
        public function GetAllProductsByCateAndBrand($id_cate,$id_Brand){
            if($this->product_cateModel->GetIdProductsByCate($id_cate))
            {
                $listIdProduct =  $this->product_cateModel->GetIdProductsByCate($id_cate);

                $listProduct = array();

                foreach($listIdProduct as $key){
                    if($key->id_product == null){
                        return $listIdProduct;
                    }
                    $id = $key->id_product;
                    $product = $this->productModel->GetSingle($id);

                    if($product[0]->Brand == $id_Brand ){ // nếu brand khớp thì add vào list
                        $brandName = $this->brandModel->GetSingle($product[0]->Brand);
                        if($product[0]->Attribute != null){
                            $attribute = $this->attributeModel->GetSingle($product[0]->Attribute);
                        }
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
                            'Date' =>$product[0]->Date,
                            'Id Attribute' =>$product[0]->Attribute,
                            'Id Brand' =>$product[0]->Brand
    
                        ];
                        array_push($listProduct,$sum);
                    } // end if brand = brand

                } // end foreach
                return $listProduct;

            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

        // add Product
        public function InsertProduct($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date,$cate){

            if( $this->productModel->Add($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date) ){ // nếu add sản phẩm thành công tiến hành add cate

                $listCate = explode('/', $cate); // tách chuỗi - xóa đưa vào mảng
                $id = $this->productModel->GetLastId();

                for($i = 0; $i<count($listCate);$i++){
                    $this->product_cateModel->Add($listCate[$i],$id[0]->id); // Insert lại theo dữ liệu đưa lên - dạng chuỗi // 
                    $thisCount = $this->categoryModel->GetSingle($listCate[$i]);
                    $num = (int)($thisCount[0]->Count) + 1;
                    $this->categoryModel->UpdateCount($listCate[$i],$num);
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
        public function UpdateProduct($id,$name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date,$cate){
            
            if($this->productModel->Update($id,$name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date) ){

                $listCate = explode('/', $cate); // tách chuỗi - xóa đưa vào mảng

                $this->product_cateModel->DeleteCategoryOfProduct($id); // xóa hết các Cate cũ của product

                // Giảm số lượng Count của Cate cũ
                $listProduct_Cate = $this->product_cateModel->GetIdCatesByProduct($id); // lấy ra danh sách cate của product

                foreach($listProduct_Cate as $cate){
                    $thisCount = $this->categoryModel->GetSingle($cate->id_category);
                    $num = (int)($thisCount[0]->Count) - 1;
                    $this->categoryModel->UpdateCount($cate->id_category,$num);
                }

                // Insert lại theo dữ liệu đưa lên - dạng chuỗi // 
                for($i = 0; $i<count($listCate);$i++){
                    $this->product_cateModel->Add($listCate[$i],$id);
                    // tăng số lượng cate mới
                    $thisCount = $this->categoryModel->GetSingle($listCate[$i]);
                    $num = (int)($thisCount[0]->Count) + 1;
                    $this->categoryModel->UpdateCount($listCate[$i],$num); 
                }
                return (
                    array('message'=>'Update Success')
                );
            }
            else{
                return(
                    array('message'=>'Update Fail!')
                );
            }
        }
        // delete product
        public function DeleteProduct($id){ // change visibility => 'xoa'
            if($this->productModel->ChangeVisibility($id,"Delete")){
                
                $this->product_cateModel->DeleteCategoryOfProduct($id); // xóa bảng liên quan ( produt_cate);

                $listCate = $this->product_cateModel->GetIdCatesByProduct($id); // lấy ra danh sách cate của product

                foreach($listCate as $cate){
                    $thisCount = $this->categoryModel->GetSingle($cate->id_category);
                    $num = (int)($thisCount[0]->Count) - 1;
                    $this->categoryModel->UpdateCount($cate->id_category,$num);
                }
                return (
                    array('message'=>'Delete Success')
                );
            }
            else{
                return(
                    array('message'=>'Delete Fail!')
                );
            }

        }
    }

?>