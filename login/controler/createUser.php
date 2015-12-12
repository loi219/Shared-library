<?php

require($_SERVER["DOCUMENT_ROOT"] . "/DB/Database.php");


Class CreateUser
{

    function __construct($arrayUser)
    {

        $this->getUserValues($arrayUser);
    }

    private function getUserValues($arrayUser)
    {

        $uname = $arrayUser["username"];
        $upass = $arrayUser["password"];

        $email = $arrayUser["email"];
        $time = time();


            $db = new Database();
            $query = ("INSERT INTO users(user_name,user_password_hash,user_email,user_registration_datetime) VALUES('$uname','$upass','$email',$time)");
            $db->query($query);



        if($db->error()){
            echo $db->error();
        }else{

            header("Location: /");

        }
    }


}