<?php
namespace Controllers;

use vendor\Controller;
use Models\Order_other as OrderOtherModels;

class Order_other extends Controller
{
    private $rm;

    public function __construct()
    {
        $this->rm = new OrderOtherModels();
    }

    public function newPetInfo()
    {
        $orderId = $_POST['orderId'];
        $petSort = $_POST['petSort'];
        $petName = $_POST['petName'];
        $petWeight = $_POST['petWeight'];
        $petOther = $_POST['petOther'];

        return $this->rm->newPetInfo($orderId, $petSort, $petName, $petWeight, $petOther);

    }
    public function newOrderInfo()
    {
        $orderId = $_POST['orderId'];
        $orderStatus = $_POST['orderStatus'];
        $orderCost = $_POST['orderCost'];
        $orderCompleteTime = $_POST['orderCompleteTime'];
        $orderOther = $_POST['orderOther'];
        return $this->rm->newOrderInfo($orderId, $orderStatus, $orderCost, $orderCompleteTime, $orderOther);
    }

    public function updateOrderInfo()
    {
        $orderId = $_POST['orderId'];
        $orderStatus = $_POST['orderStatus'];
        $orderCost = $_POST['orderCost'];
        $orderCompleteTime = $_POST['orderCompleteTime'];
        $orderOther = $_POST['orderOther'];
        return $this->rm->updateOrderInfo($orderId, $orderStatus, $orderCost, $orderCompleteTime, $orderOther);
    }
    public function updatePetInfo()
    {
        $orderId = $_POST['orderId'];
        $petSort = $_POST['petSort'];
        $petName = $_POST['petName'];
        $petWeight = $_POST['petWeight'];
        $petOther = $_POST['petOther'];

        return $this->rm->updatePetInfo($orderId, $petSort, $petName, $petWeight, $petOther);
    }

    public function getOrderInfo()
    {
        $orderId = $_POST['orderId'];
        return $this->rm->getOrderInfo($orderId);
    }
    public function getOrderInfos()
    {
        return $this->rm->getOrderInfos();
    }

    public function getPetInfo()
    {
        $orderId = $_POST['orderId'];
        return $this->rm->getPetInfo($orderId);
    }
    public function getPetInfos()
    {
        return $this->rm->getPetInfos();
    }

    public function removeOrderInfo()
    {
        $orderId = $_POST['orderId'];
        return $this->rm->removeOrderInfo($orderId);
    }
    public function removePetInfo()
    {
        $orderId = $_POST['orderId'];
        return $this->rm->removePetInfo($orderId);
    }

}
?>