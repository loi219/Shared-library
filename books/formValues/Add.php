<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/header.php");
//include($_SERVER["DOCUMENT_ROOT"]."/head_foot/footer.php");


require($_SERVER["DOCUMENT_ROOT"] . "/DB/Database.php");
require("../SearchBooks.php");
require("../AddBook.php");

class Add
{

    function __construct()
    {

        $this->whatIsSet();
    }

    function whatIsSet()
    {
        $searchBook = new SearchBooks();


        if (isset($_GET['s'])) {

            $this->ifSetGetToAdd();
        }
        if (isset($_POST['id'])) {

            $searchBook->chooseArrayBook($_POST['id']);


        }


    }

    function ifSetGetToAdd()
    {
        $searchBook = new SearchBooks();

        if (isset($_GET['s'])) {

            $searchBook->setChoice($_GET['s']);


        }


    }
    private function temp(){


        echo $_GET['id'];
    }


}

new Add();
