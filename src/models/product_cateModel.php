<?php 

require_once "../src/config/db.php";

    class Product_cateModel extends DBConnection {
        
        public function GetAll(){
            $data = $this->runQuery('select * from product_cate');
            $data->execute();
            if($data->rowcount() > 0){
                $product_cate = $data->fetchAll(PDO::FETCH_OBJ);
                return ($product_cate);
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }

        public function GetIdProductsByCate($id){
            $sql = "SELECT id_product FROM product_cate WHERE id_Category = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $product_cate = $data->fetchAll(PDO::FETCH_OBJ);
                return $product_cate;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }

        public function GetIdCatesByProduct($id){
            $sql = "SELECT id_category FROM product_cate WHERE id_Product = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $product_cate = $data->fetchAll(PDO::FETCH_OBJ);
                return $product_cate;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }

        // --------------------------------------------------------------- ADD ---------------------------------------------
        public function Add($id_cate, $id_product){
            
            $sql = "INSERT INTO product_cate(id_category,id_product) VALUE(:id_cate,:id_product)";

            $data = $this->runQuery($sql);
            $data->bindParam(':id_cate',$id_cate);
            $data->bindParam(':id_product',$id_product);

            if($data->execute()){
                return(
                    array('message'=>'add success!')
                );
            }
            else{
                return(
                    array('message'=>'add fail!')
                );
            }
        }

        // // -------------------------------------------------------------- UPDATE ---------------------------------
        // public function Update($id_cate,$id_product){

        // }

        // -------------------------------------------------------------- DELETE--------------------------------
        public function DeleteCategoryOfProduct($id_product){
            $sql = "DELETE FROM product_cate WHERE id_Product = $id_product";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->execute()){
                return(
                    array('message'=>'delete success!')
                );
            }
            else{
                return(
                    array('message'=>'delete fail!')
                );
            }
        }



        // category Service
        public function DeleteAllProductOfCategory($id_cate){
            $sql = "DELETE FROM product_cate WHERE id_Category = $id_cate";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->execute()){
                return(
                    array('message'=>'delete success!')
                );
            }
            else{
                return(
                    array('message'=>'delete fail!')
                );
            }
        }
    }

?>