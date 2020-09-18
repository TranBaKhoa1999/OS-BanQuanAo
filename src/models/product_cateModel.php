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
        public function GetSingle($id){
            $sql = "SELECT * FROM product_cate WHERE id = $id";
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
        public function Add($name,$logo,$description){
            $sql = "INSERT INTO product_cate(name,logo,description) VALUE(:name,:logo,:description)";

            $data = $this->runQuery($sql);
            $data->bindParam(':name',$name);
            $data->bindParam(':logo',$logo);
            $data->bindParam(':description',$description);

            if($data->execute()){
                return (
                    array('message'=>'add success!')
                );
            }
            else{
                return (
                    array('message'=>'add fail!')
                );
            }
        }
        // --------------------------------------------------------------- UPDATE ---------------------------------------------
        public function Update($id,$name,$logo,$description){
            $sql = "UPDATE product_cate SET name =:name, logo =:logo, description = :description WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->bindParam(':name',$name);
            $data->bindParam(':logo',$logo);
            $data->bindParam(':description',$description);

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
        // --------------------------------------------------------------- DELETE ---------------------------------------------
        public function Delete($id){
            $sql = "DELETE FROM product_cate WHERE id = $id";
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