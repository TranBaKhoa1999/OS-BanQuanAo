<?php 

require_once "../src/config/db.php";

    class AttributeModel extends DBConnection {
        
        public function GetAll(){
            $data = $this->runQuery('select * from attribute');
            $data->execute();
            if($data->rowcount() > 0){
                $attribute = $data->fetchAll(PDO::FETCH_OBJ);
                return ($attribute);
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }
        public function GetSingle($id){
            $sql = "SELECT * FROM attribute WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $attribute = $data->fetchAll(PDO::FETCH_OBJ);
                return $attribute;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }
        }
        public function Add($size,$color){
            $sql = "INSERT INTO attribute(size,color) VALUE(:size,:color)";

            $data = $this->runQuery($sql);
            $data->bindParam(':size',$size);
            $data->bindParam(':color',$color);

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
        
        public function Update($id,$size,$color){
            $sql = "UPDATE attribute SET size =:size, color =:color WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->bindParam(':size',$size);
            $data->bindParam(':color',$color);

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
        public function Delete($id){
            $sql = "DELETE FROM attribute WHERE id = $id";
            $data = $this->runQuery($sql);

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