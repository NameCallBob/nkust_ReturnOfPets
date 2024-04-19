<?php
namespace Controllers;

use vendor\Controller;
use Models\Method as MethodModel;

class Method extends Controller
{
    private $em;

    public function __construct()
    {
        $this->em = new MethodModel();
    }

    public function getMethod()
    {
        $memid = $_POST['memid'];
        return $this->em->getMethod($memid);
    }
    public function getMethods()
    {
        return $this->em->getMethods();
    }

    public function removeMethod()
    {
        $memid = $_POST['memid'];
        return $this->em->removeMethod($memid);
    }

}






?>