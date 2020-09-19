<?php 

require_once "../src/config/db.php";

    class ProductModel extends DBConnection {
        
        // ------------------------------------------------------------- GET -------------------------------------------
        public function GetAll(){
            $data = $this->runQuery('select * from product');
            $data->execute();
            if($data->rowcount() > 0){
                $products = $data->fetchAll(PDO::FETCH_OBJ);
                return($products);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        public function GetSingle($id){
            $sql = "SELECT * FROM product WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $product = $data->fetchAll(PDO::FETCH_OBJ);
                return($product);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        public function GetLastId(){
            $sql = "SELECT MAX(id) id from product";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $id = $data->fetchAll(PDO::FETCH_OBJ);
                return($id);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

        //sort by cate
        public function SortByCate($idCate){
            $sql = "SELECT * FROM product WHERE idloai = $idCate";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $product = $data->fetchAll(PDO::FETCH_OBJ);
                return($product);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        //sort by cost
        public function SortByCost($type){
            $sql="";
            if($type=="up"){
                $sql = "SELECT * FROM product ORDER BY gia";
            }
            else{
                $sql = "SELECT * FROM product ORDER BY gia DESC";
            }
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $product = $data->fetchAll(PDO::FETCH_OBJ);
                return($product);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        //sort by cost and cate
        public function SortAll($idCate,$type){
            if($type=="up"){
                $sql = "SELECT * FROM product WHERE idloai = $idCate ORDER BY gia";
            }
            else{
                $sql = "SELECT * FROM product WHERE idloai = $idCate ORDER BY gia DESC";
            }
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $product = $data->fetchAll(PDO::FETCH_OBJ);
                return($product);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        // ------------------------------------------------------------- ADD ------------------------------------------------
        public function Add($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date){
            $sql = "INSERT INTO product(name,image,brand,sku,attribute,price,sale_price,description,visibility,date) VALUE(:name,:image,:brand,:sku,:attribute,:price,:sale_price,:description,:visibility,:date)";

            $data = $this->runQuery($sql);
            
            $data->bindParam(':name',$name);
            $data->bindParam(':image',$image);
            $data->bindParam(':brand',$brand);
            $data->bindParam(':sku',$sku);
            $data->bindParam(':attribute',$attribute);
            $data->bindParam(':price',$price);
            $data->bindParam(':sale_price',$sale_price);
            $data->bindParam(':description',$description);
            $data->bindParam(':visibility',$visibility);
            $data->bindParam(':date',$date);

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
        // -------------------------------------------------------------UPDATE----------------------------------------------
        public function Update($id,$name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date){
            $sql = "UPDATE product SET name = :name, image =:image,brand =:brand,sku =:sku,attribute =:attribute,price =:price,sale_price =:sale_price,description =:description, visibility=:visibility , date=:date 
            WHERE id = $id";
            $data = $this->runQuery($sql);
            
            $data->bindParam(':name',$name);
            $data->bindParam(':image',$image);
            $data->bindParam(':brand',$brand);
            $data->bindParam(':sku',$sku);
            $data->bindParam(':attribute',$attribute);
            $data->bindParam(':price',$price);
            $data->bindParam(':sale_price',$sale_price);
            $data->bindParam(':description',$description);
            $data->bindParam(':visibility',$visibility);
            $data->bindParam(':date',$date);

            $data->execute();
            if($data->execute()){
                return (
                    array('message'=>'update success!')
                );
            }
            else{
                return (
                    array('message'=>'update fail!')
                );
            }
        }
        // -------------------------------------------------------------DELETE----------------------------------------------
        public function Delete($id){
            $sql = "DELETE FROM product WHERE id = $id";
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