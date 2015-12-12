<?php

include($_SERVER["DOCUMENT_ROOT"]."/head_foot/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");



class DeleteBooks{



function getIdToDelete ($idBook){


    $this->deleteBookById($idBook);

}


    private function deleteBookById($idBook){


        $db = new Database();

        $query="DELETE FROM books where id_book='$idBook'";

        $db->query($query);
        header("Location: /view/user/viewBooks.php ");


    }




}