<?php 

require_once "../src/models/shipping_methodModel.php";
require_once "../src/models/payment_methodModel.php";

    class MethodService {
        
        private $shipping_methodModel;
        private $payment_methodModel;

        public function __construct()
        {
            $this->shipping_methodModel = new Shipping_methodModel();
            $this->payment_methodModel = new Payment_methodModel();
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
            if($status =="inactive") // ngưng hoạt động // chỉ dc dừng khi các bill liên quan đã done
            {
                 $bills_relative = $this->shipping_methodModel->GetAllBillRelative($id);
                 if($bills_relative){
                     return(
                         array('message'=>'Change status fail. Some bills using this method.')
                     );
                 }
                 else{
                     return $this->shipping_methodModel->UpdateStatus($id,$status);
                 }
            }
            else if($status == "delete") // đã xóa // chỉ dc xóa khi các bill liên quan đã Done
            {
                $bills_relative = $this->shipping_methodModel->GetAllBillRelative($id);
                if($bills_relative){
                    return(
                        array('message'=>'Change status fail. Some bills using this method.')
                    );
                }
                else{
                    return $this->shipping_methodModel->UpdateStatus($id,$status);
                }
            }
            else if($status == "stop support") // ngưng hỗ trợ // có thể ngưng hỗ trợ bất cứ lúc nào
            {
                return $this->shipping_methodModel->UpdateStatus($id,$status);
            }
            else if($status == "active") // hoạt động  // có thể hoạt động khi chưa xóa method này
            {
                
                $method = $this->shipping_methodModel->GetSingle($id);
                $current_Status = $method[0]->Status;
                if($current_Status !=null && $current_Status !='delete'){
                    return $this->shipping_methodModel->UpdateStatus($id,$status);
                }
                else{
                    return(
                        array('message'=>'Change status fail')
                    );
                }
               
            }
        }
        public function UpdateStatusPaymentMethod($id,$status){
            if($status =="inactive") // ngưng hoạt động // chỉ dc dừng khi các bill liên quan đã done
            {
                 $bills_relative = $this->payment_methodModel->GetAllBillRelative($id);
                 if($bills_relative){
                     return(
                         array('message'=>'Change status fail. Some bills using this method.')
                     );
                 }
                 else{
                     return $this->payment_methodModel->UpdateStatus($id,$status);
                 }
            }
            else if($status == "delete") // đã xóa // chỉ dc xóa khi các bill liên quan đã Done
            {
                $bills_relative = $this->payment_methodModel->GetAllBillRelative($id);
                if($bills_relative){
                    return(
                        array('message'=>'Change status fail. Some bills using this method.')
                    );
                }
                else{
                    return $this->payment_methodModel->UpdateStatus($id,$status);
                }
            }
            else if($status == "stop support") // ngưng hỗ trợ // có thể ngưng hỗ trợ bất cứ lúc nào
            {
                return $this->payment_methodModel->UpdateStatus($id,$status);
            }
            else if($status == "active") // hoạt động  // có thể hoạt động khi chưa xóa method này
            {
                
                $method = $this->payment_methodModel->GetSingle($id);
                $current_Status = $method[0]->Status;
                if($current_Status !=null && $current_Status !='delete'){
                    return $this->payment_methodModel->UpdateStatus($id,$status);
                }
                else{
                    return(
                        array('message'=>'Change status fail')
                    );
                }
               
            }
        }

    }

?>