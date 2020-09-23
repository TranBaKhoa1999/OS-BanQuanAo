<?php 

require_once "../src/config/db.php";

    class CustomerModel extends DBConnection {
        
        public function GetAll(){
            $sql = "SELECT * FROM customer";
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

        public function GetSingle($email){
            $sql = "SELECT * FROM customer WHERE email = '$email' ";
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

        public function Add($email, $name,$phone,$country,$city, $address){
            $sql = "INSERT INTO customer(email,name,phone,country,city,address) VALUE(:email,:name,:phone,:country,:city,:address)";

            $data = $this->runQuery($sql);
            $data->bindParam(':email',$email);
            $data->bindParam(':name',$name);
            $data->bindParam(':phone',$phone);
            $data->bindParam(':country',$country);
            $data->bindParam(':city',$city);
            $data->bindParam(':address',$address);
            

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
        
        public function Update($email, $name,$phone,$country,$city, $address){
            $sql = "UPDATE customer SET name =:name, phone =:phone, country =:country, city =:city, address =:address WHERE email = '$email' ";
            $data = $this->runQuery($sql);
            $data->bindParam(':name',$name);
            $data->bindParam(':phone',$phone);
            $data->bindParam(':country',$country);
            $data->bindParam(':city',$city);
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

        // public function Delete($id){
        //     $sql = "DELETE FROM brand WHERE id = $id";
        //     $data = $this->runQuery($sql);
        //     $data->execute();
        //     if($data->execute()){
        //         return(
        //             array('message'=>'delete success!')
        //         );
        //     }
        //     else{
        //         return(
        //             array('message'=>'delete fail!')
        //         );
        //     }
        // }

    }

?>