<?php
namespace Models;
use vendor\DB;


class Order_other {

    public function newPetInfo($orderId,$petSort,$petName,$petWeight,$petOther){
        $sql = "INSERT INTO `petinfo` (`orderId`, `petSort`, `petName`, `petWeight`, `petOther`) VALUES (?,?,?,?,?);";
        $arg = array($orderId,$petSort,$petName,$petWeight,$petOther);
        $response = DB::insert($sql,$arg);
        return $response;


    }

    public function newOrderInfo($orderId,$orderStatus,$orderCost,$orderCompleteTime,$orderOther){
        $sql ="INSERT INTO `orderinfo` (`orderId`, `orderStatus`, `orderCost`, `orderCompleteTime`, `orderOther`) VALUES (?,?,?,?,?);";
        $arg = array($orderId,$orderStatus,$orderCost,$orderCompleteTime,$orderOther);
        $response = DB::insert($sql,$arg);
        return $response;

    }
    public function getPetInfo($orderId){
        $sql ="SELECT * FROM `petinfo` WHERE `orderId` = ?";
        $arg = array();
        $response = DB::select($sql,$arg);
        return $response;
    }
    public function getPetInfos(){
        $sql ="SELECT * FROM `petinfo`";
        $arg = array();
        $response = DB::select($sql,$arg);
        return $response;
    }
    public function getOrderInfo($orderId){
        $sql ="SELECT * FROM `orderinfo` WHERE `orderId` = ?";
        $arg = array();
        $response = DB::select($sql,$arg);
        return $response;
    }
    public function getOrderInfos(){
        $sql ="SELECT * FROM `orderinfo`";
        $arg = null;
        $response = DB::select($sql,$arg);
        return $response;
    }
    public function removeOrderInfo($orderId){
        $sql = "";
        $arg = array();
        $response = DB::delete();
        return $response;
    }
    public function removePetInfo($orderId){
        $sql = "DELETE FROM petinfo WHERE `petinfo`.`orderId` = ?";
        $arg = array();
        $response = DB::delete();
        return $response;
    }
    public function updateOrderInfo($orderId, $orderStatus, $orderCost, $orderCompleteTime, $orderOther){

    }
    public function updatePetInfo($orderId, $petSort, $petName, $petWeight, $petOther){

    }
}
?>