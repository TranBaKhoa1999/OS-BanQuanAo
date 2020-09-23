<?php 

require_once "../src/models/customerModel.php";

    class CustomerService {
        
        private $customerModel;

        public function __construct()
        {
            $this->customerModel = new CustomerModel();
        }

        public function GetAllCustomers(){
            return $this->customerModel->GetAll();
        }

        public function GetSingleCustomer($email){
            return $this->customerModel->GetSingle($email);
        }

        public function InsertCustomer($email,$name,$phone,$country,$city,$address){
            return $this->customerModel->Add($email,$name,$phone,$country,$city,$address);
        }

        public function UpdateCustomer($email,$name,$phone,$country,$city,$address){
            return $this->customerModel->Update($email,$name,$phone,$country,$city,$address);
        }

    }

?>