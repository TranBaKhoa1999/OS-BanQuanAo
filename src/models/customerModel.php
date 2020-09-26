<?php 

require_once "../src/config/db.php";

    class CustomerModel extends DBConnection {
        
        public function GetAll(){
            $sql = "SELECT * FROM customer";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $customer = $data->fetchAll(PDO::FETCH_OBJ);
                return ($customer);
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }

        public function GetSingle($email){
            $sql = "SELECT * FROM customer WHERE email = '$email' ";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $customer = $data->fetchAll(PDO::FETCH_OBJ);
                return $customer;
            }
            else{
                false;
            }
        }

        public function Add($email,$name,$phone,$city,$district,$address){
            $sql = "INSERT INTO `customer`(`Email`, `Name`, `Phone`, `City`, `District`, `Address`) VALUE ('$email','$name','$phone','$city','$district','$address')";
            
            $data = $this->runQuery($sql);

            // $data->bindParam(':email',$email);
            // $data->bindParam(':name',$name);
            // $data->bindParam(':phone',$phone);
            // $data->bindParam(':city',$city);
            // $data->bindParam(':country',$district);
            // $data->bindParam(':address',$address);
            

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
        
        public function Update($email, $name,$phone,$district,$city, $address){
            $sql = "UPDATE customer SET name =:name, phone =:phone, city =:city,district =:district, address =:address WHERE email = '$email' ";
            $data = $this->runQuery($sql);
            
            $data->bindParam(':name',$name);
            $data->bindParam(':phone',$phone);
            $data->bindParam(':city',$city);
            $data->bindParam(':district',$district);
            $data->bindParam(':address',$address);

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

    }

?>