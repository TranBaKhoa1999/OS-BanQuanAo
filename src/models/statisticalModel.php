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
        
        //add new statistical khi add new product
        public function Add($id_product,$view,$purchase){
            $sql ="INSERT INTO `statistical`(`Id_Product`, `View`, `Purchase`) VALUES ($id_product,$view,$purchase)";
            $data = $this->runQuery($sql);

            if($data->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        //update luot mua
        public function UpdatePurchase($id_product,$count_buy){
            $sql = "UPDATE statistical SET purchase =purchase+$count_buy WHERE id_product = $id_product";
            $data = $this->runQuery($sql);
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
        // update view khi customer xem sản phẩm
        public function UpdateView($id_product){
            $sql = "UPDATE statistical SET view =view+1 WHERE id_product = $id_product";
            $data = $this->runQuery($sql);
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