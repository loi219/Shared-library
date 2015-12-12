<?php


require($_SERVER["DOCUMENT_ROOT"] . "/DB/Database.php");


class GetUser{


function getUserBySession($userID){
$db  = new Database();


$query="SELECT * FROM users  WHERE user_id='$userID' ";


$arrayUser=$db->select($query);

return $arrayUser;
}




}

?>
