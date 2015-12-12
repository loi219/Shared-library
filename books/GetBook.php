<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


require($_SERVER["DOCUMENT_ROOT"].'/DB/Database.php');

class GetBook{

    private $arrayBooks;

    function getBooks(){

      $db  = new Database();

        $query='SELECT * FROM books ORDER By title';


        $arrayBooks=$db->select($query);

        return $this->arrayBooks=$arrayBooks ;
    }


    function getBooksById($idBook){
        $db  = new Database();

        $query="SELECT * FROM books b LEFT JOIN users u  ON b.fk_owner = u.user_id WHERE b.id_book ='$idBook'";



        $arrayBooks=$db->select($query);

        return $this->arrayBooks=$arrayBooks ;

    }


    function getBooksIdUser($idUser){
        $db  = new Database();

        $query="SELECT * FROM books  WHERE fk_owner='$idUser' ORDER BY title ";


        $arrayBooks=$db->select($query);

        return $this->arrayBooks=$arrayBooks ;
    }

    function getBooksByIdUser($idUser,$idBook){
        $db  = new Database();

        $query="SELECT * FROM books b LEFT JOIN users u  ON b.fk_owner = u.user_id WHERE b.id_book ='$idBook' AND b.fk_user='$idUser'";



        $arrayBooks=$db->select($query);

        return $this->arrayBooks=$arrayBooks ;

    }










}
new GetBook();


?>