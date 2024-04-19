<?php
    namespace Controllers;
    use vendor\Controller;
    use Models\Order as OrderModel;

    class Order extends Controller{
        private $rm;
        public function __construct(){
            $this->rm = new OrderModel();
        }

        public function getOrders(){
        return $this->rm->getOrders();
        }
        public function getOrder(){
        $account= $_POST['memid'];
        return $this->rm->getOrder($account);
        }

        public function newOrder(){
            
        return $this->rm->newOrder($time, $id, $name, $amount);
        }
        function removeOrder(){
            $id = $_POST['order_id'];
        return $this->rm->removeOrder($id);
        }
        function updateOrder(){
            $time = $_POST['time'];
            $name = $_POST['name'];
            $id = $_POST['id'];
            $amount = $_POST['amount'];
            return $this->rm->updateOrder($time,$id,$name,$amount);
        }
    }