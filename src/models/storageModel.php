<?php 

require_once "../src/config/db.php";

    class StorageModel extends DBConnection {

        // ------------------------------------------------- GET---------------------------------------------------
        public function GetAll(){
            $sql = "SELECT Id_product,a.Name,count,stock,price_in FROM `storage` JOIN product a Where Id_Product = Id and a.Visibility !='Delete' ";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $storage = $data->fetchAll(PDO::FETCH_OBJ);
                return($storage);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

        public function GetSingle($id){
            $sql = "SELECT Id_product,a.Name,count,stock,price_in FROM storage JOIN product a Where Id_Product = Id and a.Visibility !='Delete' AND id_Product = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $storage = $data->fetchAll(PDO::FETCH_OBJ);
                return($storage);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

        // public function GetCategoriesByBrand($id){
        //     $sql = "SELECT * FROM storage WHERE brand = $id";
        //     $data = $this->runQuery($sql);
        //     $data->execute();
        //     if($data->rowcount() > 0){
        //         $storage = $data->fetchAll(PDO::FETCH_OBJ);
        //         return($storage);
        //     }
        //     else{
        //         return(
        //             array('message'=>'not found')
        //         );
        //     }
        // }

        //----------------------------------------------- ADD -------------------------------------
        public function Add($id_Product, $price_In, $count, $stock){
            $sql = "INSERT INTO storage(Id_Product, Price_In, Count, Stock) VALUE(:Id_Product, :Price_In, :Count, :Stock)";
            $data = $this->runQuery($sql);

            $data->bindParam(':Id_Product', $id_Product);
            $data->bindParam(':Price_In', $price_In);
            $data->bindParam(':Count', $count);
            $data->bindParam(':Stock', $stock);

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

        // ------------------------------------------ UPDATE ------------------------------------------
        public function Update($id_Product, $price_In, $count, $stock){
            $sql = "UPDATE storage SET Price_In =:Price_In, Stock =:Stock WHERE Id_Product = $id_Product";
            $data = $this->runQuery($sql);

            $data->bindParam(':Id_Product', $id_Product);
            $data->bindParam(':Price_In', $price_In);
            $data->bindParam(':Count', $count);
            $data->bindParam(':Stock', $stock);

            if($data->execute()){
                return(
                    array('message'=>'update success!')
                );
            }
            else{
                return(
                    array('message'=>'update fail!')
                );
            }
        }

        // ---------------------------------------- DELETE -------------------------------------------
        // public function Delete($id_Product){
        //     $sql = "DELETE FROM storage WHERE Id_Product = $id_Product";
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