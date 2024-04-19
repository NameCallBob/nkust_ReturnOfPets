<?php
namespace Controllers;

use vendor\Controller;
use Models\Company as CompanyModel;

class Company extends Controller
{
    private $em;

    public function __construct()
    {
        $this->em = new CompanyModel();
    }

    public function getCompany()
    {
        $account = $_POST['account'];
        return $this->em->getCompany($account);
    }
    public function getCompanys()
    {
        return $this->em->getCompanys();
    }
    public function newCompany(){
        $name= $_POST['name'];
        $area= $_POST['area'];
        $address= $_POST['address'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $account= $_POST['account'];
        $password= $_POST['password'];
        return $this -> em -> newCompany($name,$area,$address,$email,$phone,$account,$password);
    }

    public function removeCompany()
    {
        $account = $_POST['account'];
        return $this->em->removeCompany($account);
    }
    public function updateCompany(){
        $name= $_POST['name'];
        $area= $_POST['area'];
        $address= $_POST['address'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $account= $_POST['account'];
        $password= $_POST['password'];
        return $this -> em -> updateCompany($name,$area,$address,$email,$phone,$account,$password);

    }

}






?>