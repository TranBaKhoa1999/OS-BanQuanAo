<?php 

require_once "../src/config/db.php";

    class CategoryModel extends DBConnection {
        
        public function GetAll(){
            $data = $this->runQuery('select * from loaisanpham');
            $data->execute();
            if($data->rowcount() > 0){
                // $loaiSanPham = array();
                // while($row = $data->fetch(PDO::FETCH_ASSOC)){
            
                //     $item = array(
                //         'id'=>$row['id'],
                //         'tenloai'=>$row['tenloai']
                //     );
                //     array_push($loaiSanPham, $item);
                // }
                // header('Content-Type:application/json; charset=UTF-8');
                $loaiSanPham = $data->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($loaiSanPham);
            }
            else{
                echo json_encode(
                    array('message'=>'not found')
                );
            }
        }
        public function GetSingle($id){
            $sql = "SELECT * FROM loaisanpham WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $loaiSanPham = $data->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($loaiSanPham);
            }
            else{
                echo json_encode(
                    array('message'=>'not found')
                );
            }
        }
        public function Add($tenloai){
            $sql = "INSERT INTO loaisanpham(tenloai) VALUE(:ten_loai)";

            $data = $this->runQuery($sql);
            $data->bindParam(':ten_loai',$tenloai);

            if($data->execute()){
                echo json_encode(
                    array('message'=>'add success!')
                );
            }
            else{
                echo json_encode(
                    array('message'=>'add fail!')
                );
            }
        }
        
        public function Update($id,$tenloai){
            $sql = "UPDATE loaisanpham SET tenloai =:ten_loai WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->bindParam(':ten_loai',$tenloai);
            $data->execute();
            if($data->execute()){
                echo json_encode(
                    array('message'=>'update success!')
                );
            }
            else{
                echo json_encode(
                    array('message'=>'update fail!')
                );
            }
        }
        public function Delete($id){
            $sql = "DELETE FROM loaisanpham WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->execute()){
                echo json_encode(
                    array('message'=>'delete success!')
                );
            }
            else{
                echo json_encode(
                    array('message'=>'delete fail!')
                );
            }
        }

    }

?>