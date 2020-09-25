<?php 

require_once "../src/models/shipping_methodModel.php";
require_once "../src/models/payment_methodModel.php";

    class BrandService {
        
        private $shipping_methodModel;
        private $payment_methodModel;

        public function __construct()
        {
            $this->shipping_methodModel = new Shipping_methodModel();
            $this->$payment_methodModel = new Payment_methodModel();
        }

        public function GetAllShippingMethod(){
            return $this->shipping_methodModel->GetAll();
        }
        public function GetAllPaymentMethod(){
            return $this->payment_methodModel->GetAll();
        }


        public function GetSingleShippingMethod($id){
            return $this->shipping_methodModel->GetSingle($id);
        }
        public function GetSinglePaymentMethod($id){
            return $this->payment_methodModel->GetSingle($id);
        }

        public function UpdateStatusShippingMethod($id,$status){
            if($status =="stop active") // ngưng hoạt động
            {
                 // chỉ dc dừng khi các bill liên quan đã done
            }
            else if($status == "delete") // đã xóa
            {
                // chỉ dc xóa khi các bill liên quan đã Done
            }
            else if($status == "stop support") // ngưng hỗ trợ
            {
                // có thể ngưng hỗ trợ bất cứ lúc nào
            }
            else if($status == "active") // hoạt động
            {
                // có thể hoạt động khi chưa xóa method này
            }
        }
        public function UpdateStatusPaymentMethod($id,$status){
            if($status =="stop active") // ngưng hoạt động
            {
                 // chỉ dc dừng khi các bill liên quan đã done
            }
            else if($status == "delete") // đã xóa
            {
                // chỉ dc xóa khi các bill liên quan đã Done
            }
            else if($status == "stop support") // ngưng hỗ trợ
            {
                // có thể ngưng hỗ trợ bất cứ lúc nào
            }
            else if($status == "active") // hoạt động
            {
                // có thể hoạt động khi chưa xóa method này
            }
        }

    }

?>