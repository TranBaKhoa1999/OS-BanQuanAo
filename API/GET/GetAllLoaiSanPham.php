<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type:application/json; charset=UTF-8');

    include_once '../../Config/config.php';
    
    require_once SITE_ROOT."/Config/DBCon.php";
    require_once SITE_ROOT."/Models/LoaiSanPham_Model.php";

    $models = new LoaiSanPham_Model;
    $result = $models->GetAll();
    if($result->rowcount() > 0){
        $loaiSanPham = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $item = array(
                'id'=>$row['id'],
                'tenloai'=>$row['tenloai']
            );
            array_push($loaiSanPham, $item);
        }
        echo json_encode($loaiSanPham);
    }
    else{
        echo json_encode(
            array('message'=>'not found')
        );
    }
?>