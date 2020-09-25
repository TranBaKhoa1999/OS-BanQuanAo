<?php 

require_once "../src/models/productModel.php";
require_once "../src/models/billingModel.php";
require_once "../src/models/billing_detailModel.php";
require_once "../src/models/shipping_methodModel.php";
require_once "../src/models/payment_methodModel.php";
require_once "../src/models/customerModel.php";

    class BillService {
        
        private $productModel;
        private $billingModel;
        private $billing_detailModel;
        private $shipping_methodModel;
        private $payment_methodModel;
        private $customerModel;

        public function __construct()
        {
            $this->productModel = new ProductModel();
            $this->billingModel = new BillingModel();
            $this->billing_detailModel = new Billing_detailModel();
            $this->shipping_methodModel = new Shipping_methodModel();
            $this->payment_methodModel = new Payment_methodModel();
            $this->customerModel = new CustomerModel();
        }

        public function GetAllBills(){
            return $this->BillingModel->GetAll();
        }

        public function GetSingleBill($id_billing){
            $payment="";
            $name_payment="";
            $shipping="";
            $name_ship="";
            $cost_ship;
            $name_customer="";
            $phone_customer="";
            $address_customer="";

            if($this->BillingModel->GetSingle($id_billing) ){

                $bill =  $this->BillingModel->GetSingle($id_billing);

                //get detail bill
                if($bill[0]->Email != null){ // get detail customer
                    $customer = $this->CustomerModel->GetSingle($bill[0]->Email);
                    $name_customer=$customer[0]->Name;
                    $phone_customer=$customer[0]->Phone;
                    $address_customer= $customer[0]->Address;
                }
                if($bill[0]->Shipping_method !=null ){ // get detail ship method of bill
                    $shipping = $this->Shipping_methodModel->GetSingle($bill[0]->Shipping_method);
                    $cost_ship=$shipping[0]->Cost;
                    $name_ship=$shipping[0]->name;
                }
                if($bill[0]->Payment_method !=null ){ // get detail payment method of bill
                    $payment = $this->Payment_methodModel->GetSingle($bill[0]->Payment_method);
                    $name_payment=$payment[0]->Name;
                }
                
                //
                $sum= [
                    'Id'    => $product[0]->Id,
                    'Shipping Method'  => $name_ship,
                    'Shipping Cost' =>$cost_ship,
                    'Payment Method' => $name_payment,
                    'Total' => $bill[0]->Total,
                    'Date'   => $bill[0]->Date,
                    'Status'  => $bill[0]->Status,
                    'Customer Name' => $name_customer,
                    'Phone' =>$phone_customer,
                    'Customer Address' =>$address_customer
                ];
                return $sum;
            }
            else{
                return (
                    array('message'=>'not found')
                );
            }

        }

        public function InsertBrand($name, $logo, $description){
            return $this->brandModel->Add($name, $logo, $description);
        }

        public function UpdateBrand($id, $name, $logo, $description){
            return $this->brandModel->Update($id, $name, $logo, $description);
        }

    }

?>