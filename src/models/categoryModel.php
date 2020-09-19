<?php 

require_once "../src/config/db.php";

    class CategoryModel extends DBConnection {

        // ------------------------------------------------- GET---------------------------------------------------
        public function GetAll(){
            $data = $this->runQuery('select * from category');
            $data->execute();
            if($data->rowcount() > 0){
                $category = $data->fetchAll(PDO::FETCH_OBJ);
                return($category);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

        public function GetSingle($id){
            $sql = "SELECT * FROM category WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $category = $data->fetchAll(PDO::FETCH_OBJ);
                return($category);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

        // public function GetCategoriesByBrand($id){
        //     $sql = "SELECT * FROM category WHERE brand = $id";
        //     $data = $this->runQuery($sql);
        //     $data->execute();
        //     if($data->rowcount() > 0){
        //         $category = $data->fetchAll(PDO::FETCH_OBJ);
        //         return($category);
        //     }
        //     else{
        //         return(
        //             array('message'=>'not found')
        //         );
        //     }
        // }

        //----------------------------------------------- ADD -------------------------------------
        public function Add($name,$image,$description,$parentCategory,$count){
            $sql = "INSERT INTO category(name,image,description,parentcategory,count) VALUE(:name,:image,:description,:parentCategory,:count)";

            $data = $this->runQuery($sql);
            $data->bindParam(':name',$name);
            $data->bindParam(':image',$image);
            $data->bindParam(':description',$description);
            $data->bindParam(':parentCategory',$parentCategory);
            $data->bindParam(':count',$count);

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
        public function Update($id,$name,$image,$description,$parentCategory){
            $sql = "UPDATE category SET name = :name, image =:image, description =:description, parentcategory =:parentCategory,brand =:brand WHERE id = $id";
            $data = $this->runQuery($sql);

            $data->bindParam(':name',$name);
            $data->bindParam(':image',$image);
            $data->bindParam(':description',$description);
            $data->bindParam(':parentCategory',$parentCategory);
            // $data->bindParam(':count',$count);

            $data->execute();
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

        public function UpdateCount($id, $count){
            $sql = "UPDATE category SET count=:count WHERE id = $id";
            $data = $this->runQuery($sql);

            $data->bindParam(':count',$count);

            $data->execute();
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
        public function Delete($id){
            $sql = "DELETE FROM category WHERE id = $id";
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