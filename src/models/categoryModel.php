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
                header('Content-Type:application/json; charset=UTF-8');
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
                header('Content-Type:application/json; charset=UTF-8');
                echo json_encode(
                    array('message'=>'not found')
                );
            }
        }
    }

?>