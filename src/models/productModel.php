<?php 

require_once "../src/config/db.php";

    class ProductModel extends DBConnection {
        
        public function GetAll(){
            $data = $this->runQuery('select * from sanpham');
            $data->execute();
            if($data->rowcount() > 0){
                $SanPham = $data->fetchAll(PDO::FETCH_OBJ);
                return($SanPham);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        public function GetSingle($id){
            $sql = "SELECT * FROM sanpham WHERE id = $id";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $SanPham = $data->fetchAll(PDO::FETCH_OBJ);
                return($SanPham);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }


        //sort by cate
        public function SortByCate($idCate){
            $sql = "SELECT * FROM sanpham WHERE idloai = $idCate";
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $SanPham = $data->fetchAll(PDO::FETCH_OBJ);
                return($SanPham);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        //sort by cost
        public function SortByCost($type){
            $sql="";
            if($type=="up"){
                $sql = "SELECT * FROM sanpham ORDER BY gia";
            }
            else{
                $sql = "SELECT * FROM sanpham ORDER BY gia DESC";
            }
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $SanPham = $data->fetchAll(PDO::FETCH_OBJ);
                return($SanPham);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }
        //sort by cost and cate
        public function SortAll($idCate,$type){
            if($type=="up"){
                $sql = "SELECT * FROM sanpham WHERE idloai = $idCate ORDER BY gia";
            }
            else{
                $sql = "SELECT * FROM sanpham WHERE idloai = $idCate ORDER BY gia DESC";
            }
            $data = $this->runQuery($sql);
            $data->execute();
            if($data->rowcount() > 0){
                $SanPham = $data->fetchAll(PDO::FETCH_OBJ);
                return($SanPham);
            }
            else{
                return(
                    array('message'=>'not found')
                );
            }
        }

    }

?>