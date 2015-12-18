<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include($_SERVER["DOCUMENT_ROOT"]."/head_foot/header.php");

require($_SERVER["DOCUMENT_ROOT"] . "/DB/Database.php");
require("../SearchBooks.php");
require($_SERVER["DOCUMENT_ROOT"]."/view/addBook.php");

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

    }

    function ifSetGetToAdd()
    {


        if (isset($_GET['s'])) {

            new AddBookView();


        }


    }

}

new Add();
