<?php 

require_once "../src/config/db.php";

    class StatisticalModel extends DBConnection {
        
        public function GetAll(){
            $sql ="SELECT id_product,a.Name,view,purchase from statistical JOIN product a Where Id_Product = a.Id and a.Visibility !='Delete' ";
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

        // get single statistical product
        public function GetSingle($id_product){
            $sql = "SELECT id_product,a.Name,view,purchase from statistical JOIN product a Where Id_Product = a.Id AND a.Id= $id_product and a.Visibility !='Delete' ";
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

    }

?>