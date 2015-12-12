<?php

include("../DeleteBooks.php");
include("../GetBook.php");

class GetID
{


    function __construct()
    {

        $this->ifSetGetToDelete();
    }


    function ifSetGetToDelete()
    {
        if (isset($_GET['delete'])) {
            $setId = new DeleteBooks();

            $setId->getIdToDelete($_GET['delete']);
        }
    }

    function ifSetGetToDetails()
    {


        if (isset($_POST['showId'])) {
            $id = new GetBook();
            $id->getBooksById($_POST['showId']);
        }
    }
}

new GetID();
