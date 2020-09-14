<?php 

require_once SITE_ROOT."/Config/DBCon.php";

    class LoaiSanPham_Model extends DBConnection {
        public function GetAll(){
            $data = $this->runQuery('select * from loaisanpham');
            $data->execute();
            return $data;
        }
    }

?>