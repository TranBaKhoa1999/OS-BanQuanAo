<?php 

require_once "../src/config/db.php";

    class Billing_detailModel extends DBConnection {
        
        public function GetAll(){
            $sql = "SELECT * FROM billing_detail";
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

        public function GetSingle($id_billing){
            $sql = "SELECT * FROM billing_detail WHERE id_billing = $id_billing";
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

        public function Add($id_billing,$id_product,$count,$price_buy){
            $sql = "INSERT INTO billing_detail(id_billing,id_product,count,price_buy) VALUE(:id_billing,:id_product,:count,:price_buy)";

            $data = $this->runQuery($sql);

            $data->bindParam(':id_billing',$id_billing);
            $data->bindParam(':id_product',$id_product);
            $data->bindParam(':count',$count);
            $data->bindParam(':price_buy',$price_buy);

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
        
        public function Update($id_billing,$id_product,$count,$price_buy){
            $sql = "UPDATE billing_detail SET count=:count,price_buy=:price_buy WHERE id_billing=$id_billing AND id_product=$id_product";
            $data = $this->runQuery($sql);

            $data->bindParam(':count',$count);
            $data->bindParam(':price_buy',$price_buy);

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