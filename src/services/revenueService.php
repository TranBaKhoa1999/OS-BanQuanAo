<?php 

require_once "../src/models/billingModel.php";

    class RevenueService {
        
        private $billingModel;

        public function __construct()
        {
            $this->billingModel = new BillingModel();
        }

        public function RevenueDay($day)
        {
            $arr = $this->billingModel->RevenueDay($day);
            return $arr;
        }

        public function RevenueMonth($month)
        {
            $arr = $this->billingModel->RevenueMonth($month);
            return $arr;
        }

        public function RevenueYear($year)
        {
            $arr = $this->billingModel->RevenueYear($year);
            return $arr;
        }

    }

?>