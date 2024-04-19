<?php
namespace Models;

use vendor\DB;

class Method
{
    public function getMethod($memid)
    {
        $sql = "SELECT `memid`,`metName`,`bottomPrice`,`content` FROM `method` WHERE `memid` =? ";
        $arg = array($memid);
        $response = DB::select($sql, $arg);
        return $response;
    }
    public function getMethods()
    {
        $sql = "SELECT `memid`,`metName`,`bottomPrice`,`content` FROM `method`;";
        $arg = null;
        $response = DB::select($sql, $arg);
        return $response;
    }
    public function removeMethod($metid)
    {
        $sql = "";
        $arg = array($metid);
        $response = DB::delete($sql, $arg);
        return $response;
    }
}
?>