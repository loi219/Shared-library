<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require($_SERVER["DOCUMENT_ROOT"] . "/lib/password.php");
require($_SERVER["DOCUMENT_ROOT"] . "/login/controler/createUser.php");

class UserValues
{

    private $userName;
    private $email;
    private $securePassword;

function __construct(){

    $this->userData();
}

   private function setUsername(){
        if (isset($_POST['username'])){

            $this->userName = $_POST['username'];
        }



    }

   private function setEmail(){
        if (isset($_POST['email'])){

            $this->email = $_POST['email'];
        }



    }

    private function setPassword()
    {
        if (isset($_POST['password'])) {

            $this->password = $_POST['password'];
        }
    }

    private function setPasswordConfirmation(){
        if (isset($_POST['confirm-password'])) {

            $this->password = $_POST['confirm-password'];
        }

    }


    public function getUsername()
    {
        $this->setUsername();
        return $this->userName;
    }


    public function getEmail()
    {
        $this->setEmail();
        return $this->email;
    }

    private function getPassword()
    {
        if($this->setPassword() === $this->setPasswordConfirmation()){
        $this->setPassword();
        return $this->password;
    }}




public function getSecurePassword(){
    $this->securePassword();
return $this->securePassword;
}

        private function securePassword(){
$password=$this->getPassword();
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $this->securePassword=$hash;

    }





       private function userData()
        {
            $username=$this->getUsername();
            $password = $this->getSecurePassword();
            $email=$this->getEmail();


            $arrayValues=array("username"=>$username,"email"=>$email,"password"=>$password);


            new CreateUser($arrayValues);




        }





}
new UserValues();