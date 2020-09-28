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
            $total=0;
            for($i = 0 ; $i<count($arr);$i++){
                $total += (int)$arr[$i]->Total;
            }
            $sum = [
                'Bills' =>$arr,
                'Total Revenue' =>$total
            ];
            return $sum;
        }

        public function RevenueMonth($month)
        {
            $arr = $this->billingModel->RevenueMonth($month);
            $total=0;
            for($i = 0 ; $i<count($arr);$i++){
                $total += (int)$arr[$i]->Total;
            }
            $sum = [
                'Bills' =>$arr,
                'Total Revenue' =>$total
            ];
            return $sum;
        }

        public function RevenueYear($year)
        {
            $arr = $this->billingModel->RevenueYear($year);
            $total=0;
            for($i = 0 ; $i<count($arr);$i++){
                $total += (int)$arr[$i]->Total;
            }
            $sum = [
                'Bills' =>$arr,
                'Total Revenue' =>$total
            ];
            return $sum;
        }

    }

?>