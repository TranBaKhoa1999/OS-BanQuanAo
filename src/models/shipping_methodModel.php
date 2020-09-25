<?php 

require_once "../src/config/db.php";

    class Shipping_methodModel extends DBConnection {
        
        public function GetAll(){
            $sql = "SELECT * FROM shipping_method";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $brand = $data->fetchAll(PDO::FETCH_OBJ);
                return ($brand);
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }

        public function GetSingle($id){
            $sql = "SELECT * FROM shipping_method WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $brand = $data->fetchAll(PDO::FETCH_OBJ);
                return $brand;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }

        public function Add($name,$cost,$status){
            $sql = "INSERT INTO shipping_method(name,cost,status) VALUE(:name,:cost,:status)";

            $data = $this->runQuery($sql);
            $data->bindParam(':name',$name);
            $data->bindParam(':cost',$cost);
            $data->bindParam(':status',$status);

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
        
        public function Update($id,$name,$cost,$status){
            $sql = "UPDATE shipping_method SET name=:name,cost=:cost,status=:status WHERE id = $id";
            $data = $this->runQuery($sql);

            $data->bindParam(':name',$name);
            $data->bindParam(':cost',$cost);
            $data->bindParam(':status',$status);


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

    }

?>