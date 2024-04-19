<?php
namespace Models;
use vendor\DB;

class Action {
    public function getRoles($action){
        $sql = "SELECT role_action.action_id FROM `action`,`role_action` WHERE action.name=? and role_action.action_id = action.action_id";
        $arg = array($action);
        $response = DB::select($sql,$arg);
        $result = $response['result'];
        for ($i = 0 ; $i < count($result);$i++){
            $result[$i] = $result[$i]['action_id'];
        }
        $response['result'] = $result;
        return $response;
    }
}