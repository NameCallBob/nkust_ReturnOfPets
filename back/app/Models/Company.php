<?php

namespace Models;

use vendor\DB;

class Company
{
    /**
     * 確認員工權限是否可用
     * @param string $id 員工ID
     * @return $response:dict object
     */
    public function getRoles()
    {
        $sql = "SELECT action_id FROM `role_action` WHERE `role_name` = 'company'";
        $arg = null;
        $response = DB::select($sql, $arg);
        $result = $response['result'];
        for ($i = 0; $i < count($result); $i++) {
            $result[$i] = $result[$i]['action_id'];
            // echo $result[$i]['role_id'];
        }
        $response['result'] = $result;
        return $response;
    }
    /**
     * 確認帳號密碼正確
     */
    public function checkidpw($account, $passwd)
    {
        $sql = "SELECT * FROM `Company` WHERE `account` = ? AND `password` = ? ;";
        $arg = array($account, $passwd);
        $response = DB::select($sql, $arg);
        $rows = $response['result'];
        if (count($rows) == 0) {
            $response['status'] = 404;
            $response['message'] = '帳號或密碼錯誤';
        }
        return $response;
    }

    public function getCompany($account)
    {
        $sql = "SELECT * FROM `company` WHERE `account` = ?";
        $arg = array($account);
        $response = DB::select($sql,$arg);
        return $response;


    }
    public function getCompanys()
    {
        $sql = "SELECT * FROM `company`";
        $arg = null;
        $response = DB::select($sql,$arg);
        return $response;

    }
    public function newCompany($name,$area,$address,$email,$phone,$account,$password)
    {$member_quatity = DB::select("SELECT * FROM `company`",NULL);
        $id =  count($member_quatity['result']) + 2;
        $id = sprintf("com_%05d",$id);
        $sql = "INSERT INTO `company` (`comid`, `name`, `area`, `address`, `email`, `phone`, `account`, `password`) VALUES ('$id',?,?,?,?,?,?,?);";
        $arg = array($name,$area,$address,$email,$phone,$account,$password);
        $response = DB::insert($sql,$arg);
        return $response;
    }
    public function removeCompany($account)
    {
        $sql = "DELETE FROM company WHERE `company`.`account` = ?";
        $arg = array($account);
        $response = DB::delete($sql,$arg);
        return $response;
    }
    public function updateCompany($name,$area,$address,$email,$phone,$account,$password)
    {
        $sql = "UPDATE `company` SET `name`=?,`area`=?,`address`=?,`email`=?,`phone`=?,`password`=? WHERE `account`=?";
        $arg = array($name,$area,$address,$email,$phone,$password,$account);
        $response = DB::update($sql,$arg);
        return $response;
    }

}

?>