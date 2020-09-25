<?php 

require_once "../src/config/db.php";

    class BillingModel extends DBConnection {
        
        public function GetAll(){
            $sql = "SELECT * FROM billing";
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
            $sql = "SELECT * FROM billing WHERE id = $id";
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

        public function Add($email,$payment_method,$shipping_method,$total,$date,$status){
            $sql = "INSERT INTO billing(email,payment_method,shipping_method,total,date,status) VALUE(:email,:payment_method,:shipping_method,:total,:date,:status)";

            $data = $this->runQuery($sql);
            $data->bindParam(':email',$email);
            $data->bindParam(':payment_method',$payment_method);
            $data->bindParam(':shipping_method',$shipping_method);
            $data->bindParam(':total',$total);
            $data->bindParam(':date',$date);
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
        
        public function Update($id,$email,$payment_method,$shipping_method,$total,$date){
            $sql = "UPDATE billing SET email =:email, payment_method =:payment_method, shipping_method =:shipping_method, total=:total,date =:date WHERE id = $id";
            $data = $this->runQuery($sql);

            $data->bindParam(':email',$email);
            $data->bindParam(':payment_method',$payment_method);
            $data->bindParam(':shipping_method',$shipping_method);
            $data->bindParam(':total',$total);
            $data->bindParam(':date',$date);
            // $data->bindParam(':status',$status);


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
        public function ChangeStatus($id,$status){
            $sql = "UPDATE billing SET status =:status WHERE id = $id";
            $data = $this->runQuery($sql);

            $data->bindParam(':status',$status);
            if($data->execute()){
                return (
                    array('message'=>'change status success!')
                );
            }
            else{
                return (
                    array('message'=>'change status fail!')
                );
            }
        }


    }

?>